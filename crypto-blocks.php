<?php
/**
 * Plugin Name:     Crypto Blocks
 * Plugin URI:      https://github.com/sodx/crypto-blocks
 * Description:     Plugin for rendering a chart of cryptocurrency prices.
 * Version:         0.0.1
 * Author:          sodx <stephengalych@gmail.com>
 * Author URI:      https://github.com/sodx
 * Update URI:      false
 * Text Domain:     crypto-blocks
 *
 * @package CryptoBlocks
 */

namespace CB;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

if ( ! defined( 'CB_BLOCKS_BUILD_DIR_PATH' ) ) {
    define( 'CB_BLOCKS_BUILD_DIR_PATH', plugin_dir_path( __FILE__ ) . 'build/blocks/' );
}
if ( ! defined( 'CB_BLOCKS_BUILD_DIR_URL' ) ) {
    define( 'CB_BLOCKS_BUILD_DIR_URL', plugin_dir_url( __FILE__ ) . 'build/blocks/' );
}

/**
 * Runs the plugin!
 *
 * @return void
 */
function run() {
    Setup::run();
}

run();


