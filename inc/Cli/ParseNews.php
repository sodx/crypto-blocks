<?php

namespace CB\Cli;

use CB\CryptoNewsParser;

class ParseNews
{
    /**
     * Set the credentials for the plugin from the file.
     *
     * ## EXAMPLES
     *
     *     wp cb parse-news
     *
     * @when after_wp_load
     */
    public function __invoke( $args, $assoc_args )
    {
        $crypto_news_parser = new CryptoNewsParser();
        $crypto_news_parser->fetch_news();
        \Wp_CLI::success( 'News fetched!' );
    }
}