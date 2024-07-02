<?php
/**
 * OpenAIProcessor Class
 *
 * @package CryptoBlocks
 */

namespace CB;

use Carbon_Fields\Field\Field;
use CB\Article;
use OpenAI;

/**
 * Open Ai Processorr.
 */
class OpenAIProcessor {

    /**
     * OpenAI client.
     *
     * @var \OpenAI\Client The OpenAI client.
     */
    private \OpenAI\Client $client;

    /**
     * API key.
     *
     * @var mixed|null The API key.
     */
    private $api_key;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->api_key = carbon_get_theme_option( FIELDS['OPENAI_API_KEY'] );
        $this->client = OpenAI::client( $this->api_key );
    }

    /**
     * Chat with the openAI to analyze the content.
     *
     * @param Article $article The article to analyze.
     * @return array AI response.
     */
    public function analyze_content( Article $article ) : array {
        $title = $article->get_title();
        $url = $article->get_url();
        $prompt = "Please count the sentiment rate and write excerpt of the article: $title. URL: $url.";
        $response = $this->client->chat()->create(
            [
                'model'    => 'gpt-4o',
                'messages' => [
                    [
                        'role'    => 'system',
                        'content' => 'You are a bot assistant that helps to understand sentiment rate of an article, Bad is closer to 0, good is closer to 1, neutral is closer to 0.5, and article short summary of an article with notes helpful for trader or analytic.
                        Also you should navigate through URL and read article to get information for short summary
                You should answer only with JSON. Without any other text. ' .
                            "available JSON keys: 'sentiment_score', 'article_excerpt'.
                            do not wrap everything into ```json markdown, just plain JSON.
                if you are not sure what to answer, just push an empty JSON {}" .
                "EXAMPLE OUTPUT: {
                    'sentiment_score': 0.5,
                    'article_excerpt': 'This is a quick excerpt of the article'
                    }",
                    ],
                    [
                        'role'    => 'user',
                        'content' => $prompt,
                    ],
                ],
            ]
        );

        if ( ! isset( $response['choices'][0]['message']['content'] ) ) {
            return [];
        }

        $response_content = $response['choices'][0]['message']['content'];
        $response_content = json_decode( $response_content, true );
        if ( ! $response_content ) {
            return [];
        }
        if ( ! isset( $response_content['sentiment_score'] ) || ! isset( $response_content['article_excerpt'] ) ) {
            return [];
        }
        return $response_content;
    }
}
