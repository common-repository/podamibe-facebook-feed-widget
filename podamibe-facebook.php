<?php
/*
Plugin Name:       Podamibe Facebook Widget
Plugin URI:        http://podamibenepal.com/wordpress-plugins/
Description:       This plugin is used for displaying facebook feeds on your desired sidebars with various settings.
Version:           1.0.6
Author:            Podamibe Nepal
Author URI:        http://podamibenepal.com/ 
License:           GPLv2 or later
Text Domain:       pfw
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'PFW_PATH', plugin_dir_path( __FILE__ ) );
include( PFW_PATH . 'inc/podamibe-facebook-widget.php');

/**
* Register and enqueue the required script
*/

function pfw_register_widget_scripts() {
	wp_enqueue_style( 'pfw-main-style', plugin_dir_url( __FILE__ ) . 'assets/pfw-style.css');
	wp_register_style( 'pfw-font-awesome', plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css');
	wp_enqueue_style( 'pfw-font-awesome' );
}
add_action( 'wp_enqueue_scripts', 'pfw_register_widget_scripts' );



/**
 * Adds extra links to the plugin activation page
 */
add_filter("plugin_row_meta", 'get_extra_meta_links', 10, 4); 
function get_extra_meta_links($meta, $file, $data, $status) {

	if (plugin_basename(__FILE__) == $file) {
		$meta[] = "<a href='http://shop.podamibenepal.com/forums/forum/support/' target='_blank'>" . __('Support', 'pfw') . "</a>";
		$meta[] = "<a href='http://shop.podamibenepal.com/downloads/podamibe-facebook-widget/' target='_blank'>" . __('Documentation  ', 'pfw') . "</a>";
		$meta[] = "<a href='https://wordpress.org/support/plugin/podamibe-facebook-feed-widget/reviews#new-post' target='_blank' title='" . __('Leave a review', 'pfw') . "'><i class='ml-stars'><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg><svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg></i></a>";
	}
	return $meta;
}