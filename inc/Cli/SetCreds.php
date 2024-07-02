<?php

namespace CB\Cli;

use const CB\FIELDS;

class SetCreds
{
    /**
     * Set the credentials for the plugin from the file.
     *
     * ## EXAMPLES
     *
     *     wp cb set-creds --force
     *
     * @when after_wp_load
     */
    public function __invoke( $args, $assoc_args ) {
        $file_path = CB_DIR_PATH . 'api_helper.txt';

        if ( ! file_exists( $file_path ) ) {
            \WP_CLI::error( 'File not found.' );
        }

        $creds_file = fopen( $file_path, 'r' );
        $creds_file_data = fread( $creds_file, filesize( $file_path ) );
        fclose( $creds_file );

        if ( ! $creds_file_data ) {
            \WP_CLI::error( 'File is empty.' );
        }

        // Doing this only for demo purposes. Api keys would be removed after review.
        $creds_file_data = str_replace( '%', '', $creds_file_data );
        $creds = explode( '|', $creds_file_data );
        if( count( $creds ) !== 2 ) {
            \WP_CLI::error( 'File is not formatted correctly.' );
        }

        $current_openai_api_key = carbon_get_theme_option( FIELDS['OPENAI_API_KEY'] );
        $current_news_api_key = carbon_get_theme_option( FIELDS['NEWS_API_KEY'] );

        // Check if the options are already set and ask for confirmation
        if ( ($current_openai_api_key || $current_news_api_key) && empty( $assoc_args['force'] ) ) {
            \WP_CLI::confirm( 'Options are already set. Do you want to overwrite them?' );
        }

        $openai_api_key = $creds[0];
        $news_api_key = $creds[1];
        carbon_set_theme_option( FIELDS['OPENAI_API_KEY'], $openai_api_key );
        carbon_set_theme_option( FIELDS['NEWS_API_KEY'], $news_api_key );

        \WP_CLI::success( "Options was set!" );
    }
}