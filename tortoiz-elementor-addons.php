<?php
/**
 * Plugin Name: Tortoiz Addons
 * Plugin URI: 
 * Description: A collection of high-quality widgets for Elementor page builder.
 * Version: 1.0.0
 * Author: tortoizthemes
 * Author URI: https://tortoizthemes.com/
 * Text Domain: tortoiz-addons-ext
 * License: GPLv3
 * License URI: https://opensource.org/licenses/GPL-3.0
 * Tags: elementor, addon, extension, elementor extension, elementor addon, page builder, builder, elementor builder, elementor contact form, elementor widget, best elementor addon, best elementor extension
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('TORTOIZ_EXT_VERSION', '1.0.0');
define('TORTOIZ_EXT_PREVIOUS_VERSION', '1.0.0' );
define('TORTOIZ_EXT_FILE', __FILE__ );
define('TORTOIZ_EXT_SLUG', basename( TORTOIZ_EXT_FILE, '.php' ));
define('TORTOIZ_EXT_DIR', __DIR__);
define('TORTOIZ_EXT_URL', plugins_url('/', TORTOIZ_EXT_FILE));
define('TORTOIZ_EXT_BASENAME', plugin_basename( TORTOIZ_EXT_FILE ));
define('TORTOIZ_EXT_LAYOUT', TORTOIZ_EXT_DIR .'/widgets/layout');
define('TORTOIZ_EXT_INC', TORTOIZ_EXT_DIR .'/inc/');
define('TORTOIZ_EXT_ADMIN', TORTOIZ_EXT_DIR .'/admin/');

add_action( 'after_setup_theme', 'tortoiz_addons_plugin_textdomain' );
function tortoiz_addons_plugin_textdomain() {
	load_plugin_textdomain( 'tortoiz-addons-ext', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * TORTOIZ WIDGETS Constant
 *
 * @since 2.0.0
 */
define('TORTOIZ_WIDGETS', [
	'basic' => [
		'accordion' 			=> 1,
		'content-box' 			=> 1,
		'counter' 				=> 1,
		'dynamic-button'		=> 1,
		'fancytext' 			=> 1,
		'flip-box' 				=> 1,
		'google-map' 			=> 1,
		'image-differ'			=> 1,
		'piechart' 				=> 1,
		'pricing' 				=> 1,
		'progressbar' 			=> 1,
		'social-icons'			=> 1,
		'table'			 		=> 1,
		'team' 					=> 1,
		'title'					=> 1,
		'transform'				=> 1,
		'user-counter' 			=> 1,
		'video' 				=> 1,
		'visit-counter' 		=> 1,
	],
	'advanced' => [
		'banner-slider' 		=> 1,
		'blogpost' 				=> 1,
		'brand-carousel' 		=> 1,
		'contact-form' 			=> 1,
		'content-slider'		=> 1,
		'countdown' 			=> 1,
		'login-form' 			=> 1,
		'mailchimp-subscribe' 	=> 1,
		'modal-box'			 	=> 1,
		'news-ticker' 			=> 1,
		'particle-layer' 		=> 1,
		'portfolio' 			=> 1,
		'posts-carousel'		=> 1,
		'posts-tab' 			=> 1,
		'product-zoomer' 		=> 1,
		'review-carousel' 		=> 1,
		'search-form' 			=> 1,
	],
]);


require TORTOIZ_EXT_INC . 'tortoiz-addons-ext-base.php';
require TORTOIZ_EXT_INC . 'tortoiz-addons-ext-func.php';
require TORTOIZ_EXT_INC . 'tortoiz-addons-ext.php';

add_action('plugins_loaded', function () {
	Tortoiz_Extension::instance();
});

register_activation_hook( TORTOIZ_EXT_FILE, function() {
	Tortoiz_Extension::activation();
	flush_rewrite_rules();
});

register_deactivation_hook( TORTOIZ_EXT_FILE, function() {
	flush_rewrite_rules();
});
