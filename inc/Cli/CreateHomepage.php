<?php

namespace CB\Cli;

class CreateHomepage
{
    /**
     * Set the credentials for the plugin from the file.
     *
     * ## EXAMPLES
     *
     *     wp cb create-homepage
     *
     * @when after_wp_load
     */
    public function __invoke( $args, $assoc_args )
    {
        // check is it already existing page with the same title.
        $homepage = get_page_by_title( 'Crypto Blocks Homepage', OBJECT, 'page' );
        if ( $homepage ) {
            \WP_CLI::error( 'Homepage already exists.' );
        }

        $post_content = '<!-- wp:heading -->
            <h2 class="wp-block-heading">Candlestick Chart Demo</h2>
            <!-- /wp:heading -->
            
            <!-- wp:crypto-blocks/candlesticks {"source":"kraken","pair":"SOL/USDT"} -->
            <div class="wp-block-crypto-blocks-candlesticks"><div class="candlestick-chart" data-source="kraken" data-pair="SOL/USDT" data-interval="15m"></div></div>
            <!-- /wp:crypto-blocks/candlesticks -->
        ';
        $homepage = [
            'post_title' => 'Crypto Blocks Homepage',
            'post_content' => $post_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
        ];

        $homepage_id = wp_insert_post( $homepage );

        if ( is_wp_error( $homepage_id ) ) {
            \WP_CLI::error( 'Error creating homepage.' );
        }

        update_option( 'page_on_front', $homepage_id );
        update_option( 'show_on_front', 'page' );

        \WP_CLI::success( 'Homepage created!' );
    }
}