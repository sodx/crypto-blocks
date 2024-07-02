<?php
/**
 * Crypto News CPT Class
 *
 * @package CryptoPricesChart
 * @subpackage inc/post_types
 */

namespace CB\PostTypes;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Crypto News CPT
 */
class CryptoNewsCPT {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', [ $this, 'register_crypto_news_cpt' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'add_meta' ] );
    }

    /**
     * Register the Crypto News Custom Post Type
     *
     * @return void
     */
    public static function register_crypto_news_cpt() : void {
         $labels = array(
             'name'                  => _x( 'Crypto News', 'Post Type General Name', 'crypto-blocks' ),
             'singular_name'         => _x( 'Crypto News', 'Post Type Singular Name', 'crypto-blocks' ),
             'menu_name'             => __( 'Crypto News', 'crypto-blocks' ),
             'name_admin_bar'        => __( 'Crypto News', 'crypto-blocks' ),
             'archives'              => __( 'Crypto News Archives', 'crypto-blocks' ),
             'attributes'            => __( 'Crypto News Attributes', 'crypto-blocks' ),
             'parent_item_colon'     => __( 'Parent Crypto News:', 'crypto-blocks' ),
             'all_items'             => __( 'All Crypto News', 'crypto-blocks' ),
             'add_new_item'          => __( 'Add Crypto News', 'crypto-blocks' ),
             'add_new'               => __( 'Add New', 'crypto-blocks' ),
             'new_item'              => __( 'New Crypto News', 'crypto-blocks' ),
             'edit_item'             => __( 'Edit Crypto News', 'crypto-blocks' ),
             'update_item'           => __( 'Update Crypto News', 'crypto-blocks' ),
             'view_item'             => __( 'View Crypto News', 'crypto-blocks' ),
             'view_items'            => __( 'View Crypto News', 'crypto-blocks' ),
             'search_items'          => __( 'Search Crypto News', 'crypto-blocks' ),
             'not_found'             => __( 'Not found', 'crypto-blocks' ),
             'not_found_in_trash'    => __( 'Not found in Trash', 'crypto-blocks' ),
             'featured_image'        => __( 'Featured Image', 'crypto-blocks' ),
             'set_featured_image'    => __( 'Set featured image', 'crypto-blocks' ),
             'remove_featured_image' => __( 'Remove featured image', 'crypto-blocks' ),
             'use_featured_image'    => __( 'Use as featured image', 'crypto-blocks' ),
         );

         $args = array(
             'labels'             => $labels,
             'public'             => true,
             'publicly_queryable' => true,
             'show_ui'            => true,
             'show_in_menu'       => true,
             'query_var'          => true,
             'rewrite'            => array( 'slug' => 'crypto-news' ),
             'capability_type'    => 'post',
             'has_archive'        => true,
             'hierarchical'       => false,
             'menu_position'      => null,
             'supports'           => array( 'title', 'editor', 'custom-fields' ),
         );
         register_post_type( 'crypto_news', $args );
    }

    /**
     * Add meta fields to the Crypto News CPT
     *
     * @return void
     */
    public function add_meta() : void {
        Container::make( 'post_meta', __( 'News Details', 'crypto-blocks' ) )
            ->where( 'post_type', '=', 'crypto_news' )
            ->add_fields(
                array(
                    Field::make( 'text', 'crypto_news_link', __( 'News Link', 'crypto-blocks' ) ),
                    Field::make( 'text', 'crypto_news_source', __( 'News Source', 'crypto-blocks' ) ),
                    Field::make( 'text', 'crypto_news_sentiment', __( 'Sentiment Score', 'crypto-blocks' ) ),
                    Field::make( 'textarea', 'crypto_news_summary', __( 'Summary', 'crypto-blocks' ) ),
                    Field::make( 'text', 'crypto_news_uuid', __( 'UUID', 'crypto-blocks' ) ),
                )
            );
    }
}

