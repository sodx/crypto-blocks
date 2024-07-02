<?php
/**
 * NewsApiProcessor Class
 *
 * @package CryptoBlocks
 */

namespace CB;

/**
 * News API Processor
 */
class NewsApiProcessor {

    /**
     * @var string The URL to query the News API.
     */
    public string $url;

    /**
     * Constructor.
     */
    public function __construct() {
         $this->url = $this->prepare_news_query_url();
    }

    /**
     * Prepare the URL to query the News API.
     * Returns empty string if the API key is not set.
     *
     * @return string The URL to query the News API.
     */
    private function prepare_news_query_url() : string {
        $the_news_api_key = carbon_get_theme_option( FIELDS['NEWS_API_KEY'] );
        if ( ! $the_news_api_key ) {
            return '';
        }

        $url = 'https://api.thenewsapi.com/v1/news/top';
        $url = add_query_arg( 'api_token', $the_news_api_key, $url );
        $url = add_query_arg( 'language', 'en', $url );
        return add_query_arg( 'search', 'crypto | usdt | btc | eth | sol | bnb', $url );
    }

    /**
     * Make a query to the News API and return the data.
     * Returns an empty array if the query fails.
     *
     * @return array
     */
    public function make_query() : array {
        $response = wp_remote_get( $this->url );
        if ( is_wp_error( $response ) ) {
            return [];
        }
        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body );
        if ( ! $data || ! isset( $data->data ) ) {
            return [];
        }
        return $data->data;
    }

}
