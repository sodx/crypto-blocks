<?php
/**
 * Setup Class
 *
 * @package CryptoBlocks
 */

namespace CB;

use Carbon_Fields\Carbon_Fields;
use CB\PostTypes\CryptoNewsCPT;

/**
 * Setup
 */
class Setup {

    /**
     * These actions are hooked in as soon as the plugin loads.
     */
    public static function run() {
        $n = function( $function ) {
            return "CB\\$function";
        };

        self::initialize_post_types();

        add_action( 'after_setup_theme', $n( 'Setup::initialize_carbon_fields' ) );
        add_action( 'carbon_fields_register_fields', $n( 'Settings::register_plugin_options' ), 30 );
        add_action( 'init', $n( 'Setup::register_blocks' ) );

        $crypto_news_parser = new CryptoNewsParser();
        add_action( 'admin_post_run_crypto_news_parser', [ $crypto_news_parser, 'fetch_news' ] );
    }

    /**
     * Initializes Post Types.
     *
     * @return void
     */
    private static function initialize_post_types() {
         new CryptoNewsCPT();
    }

    /**
     * Initializes Carbon Fields.
     *
     * @return void
     */
    public static function initialize_carbon_fields() {
        Carbon_Fields::boot();
    }

    /**
     * Registers the block using the metadata loaded from the `block.json` file.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
     *
     * @see https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/writing-your-first-block-type/
     */
    public static function register_blocks() {
        $blocks_folders = scandir( CB_BLOCKS_BUILD_DIR_PATH );
        if ( ! $blocks_folders ) {
            return;
        }
        $blocks = array_filter( $blocks_folders, fn( $val ) => ! str_starts_with( $val, '.' ) && ! str_starts_with( $val, '_' ) );
        foreach ( $blocks as $block ) {
            register_block_type( CB_BLOCKS_BUILD_DIR_PATH . $block );
        }
    }
}
