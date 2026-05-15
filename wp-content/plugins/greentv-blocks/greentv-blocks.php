<?php
/**
 * Plugin Name:       GreenTV Blocks
 * Plugin URI:        https://greentv.com
 * Description:       AI greeter, loop preview, and interest picker blocks for GreenTV — Forest Signal design system.
 * Version:           1.0.0
 * Author:            GreenTV
 * Author URI:        https://greentv.com
 * License:           GPL-2.0-or-later
 * Text Domain:       greentv-blocks
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'GREENTV_BLOCKS_VERSION', '1.0.0' );
define( 'GREENTV_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'GREENTV_BLOCKS_URL',  plugin_dir_url( __FILE__ ) );

function greentv_blocks_init() {
    $blocks = [ 'greeter', 'loop-preview' ];
    foreach ( $blocks as $block ) {
        $dir = GREENTV_BLOCKS_PATH . 'build/' . $block;
        if ( file_exists( $dir . '/block.json' ) ) {
            register_block_type( $dir );
        }
    }
}
add_action( 'init', 'greentv_blocks_init' );

// Enqueue shared Forest Signal CSS on the front end
function greentv_blocks_frontend_styles() {
    wp_enqueue_style(
        'greentv-forest-signal',
        GREENTV_BLOCKS_URL . 'assets/forest-signal.css',
        [],
        GREENTV_BLOCKS_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'greentv_blocks_frontend_styles' );
add_action( 'enqueue_block_editor_assets', 'greentv_blocks_frontend_styles' );
