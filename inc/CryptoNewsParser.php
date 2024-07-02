<?php
/**
 * NewsApiProcessor Class
 *
 * @package CryptoBlocks
 */

namespace CB;

use WP_Query;

/**
 * Crypto News Parser
 */
class CryptoNewsParser {
    /**
     * Fetch the news from the News API, process them with openai.
     * Get the sentiment score and save them to the database.
     *
     * @return void
     */
    public function fetch_news() : void {
        $news_processor = new NewsApiProcessor();
        if ( $news_processor->url === '' ) {
            return;
        }

        $raw_data = $news_processor->make_query();
        if ( empty( $raw_data ) ) {
            return;
        }

        $ai_processor = new OpenAIProcessor();
        foreach ( $raw_data as $data_item ) {
            $article = new Article( (array) $data_item );
            $post_id = $this->get_post_id_by_uuid( $article->get_uuid() );
            if ( $post_id !== 0 ) {
                continue;
            }
            $response = $ai_processor->analyze_content( $article );
            if ( $response ) {
                $article->set_sentiment_score( $response['sentiment_score'] );
                $article->set_article_excerpt( $response['article_excerpt'] );
            }
            $this->save_news_article( $article );
        }
    }

    /**
     * Save the news article to the database.
     *
     * @param Article $article The article to save.
     * @return bool True if the article was saved, false otherwise.
     */
    private function save_news_article( Article $article ) : bool {
        $post_id = wp_insert_post(
            [
                'post_title'   => $article->get_title(),
                'post_content' => $article->get_description(),
                'post_status'  => 'publish',
                'post_type'    => 'crypto_news',
            ]
        );

        if ( ! $post_id ) {
            return false;
        }

        carbon_set_post_meta( $post_id, 'crypto_news_uuid', $article->get_uuid() );
        carbon_set_post_meta( $post_id, 'crypto_news_link', $article->get_url() );
        carbon_set_post_meta( $post_id, 'crypto_news_sentiment', $article->get_sentiment_score() );
        carbon_set_post_meta( $post_id, 'crypto_news_summary', $article->get_article_excerpt() );

        return true;
    }

    /**
     * Get the post ID by UUID. With the UUID we can check if the article is already in the database.
     * Returns 0 if the article is not found.
     *
     * @param string $uuid The UUID of the article.
     * @return int The post ID of the article.
     */
    private function get_post_id_by_uuid( string $uuid ) : int {
        $query = new WP_Query(
            [
                'post_type'  => 'crypto_news',
                'meta_query' => [
                    [
                        'key'   => '_crypto_news_uuid',
                        'value' => $uuid,
                    ],
                ],
            ]
        );
        if ( $query->have_posts() ) {
            return $query->posts[0]->ID;
        }
        return 0;
    }
}
