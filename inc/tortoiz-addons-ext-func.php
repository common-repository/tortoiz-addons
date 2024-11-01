<?php
namespace Tortoiz_Extension;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Tortoiz_Extension\Tortoiz_Extension_Base;
use \Tortoiz_Extension\Manager\Tortoiz_Addons_Ext_Manager;
use \Tortoiz_Extension\Admin\Tortoiz_Addons_Ext_Settings;
use \Tortoiz_Extension\Tortoiz_Addons_Ext_Controls;

/**
 * Tortoiz_Addons_Ext_Functions Class For widgets functionality
 *
 * @since 3.0.0
 */
abstract class Tortoiz_Addons_Ext_Functions extends Tortoiz_Extension_Base{
	/**
	 * Enqueue CSS files
	 *
	 * @since 3.0.0
	 */
	public function widget_styles() {
		wp_enqueue_style( 'owl-carousel', TORTOIZ_EXT_URL .'assets/css/owl.carousel.min.css', [], '2.3.4' );
		wp_enqueue_style( 'magnific-popup', TORTOIZ_EXT_URL .'assets/css/magnific-popup.min.css', [], '1.1.0' );
		wp_enqueue_style( 'animate-merge', TORTOIZ_EXT_URL .'assets/css/animate-merge.min.css', [], TORTOIZ_EXT_VERSION );
		wp_enqueue_style( 'twentytwenty', TORTOIZ_EXT_URL .'assets/css/twentytwenty.min.css', [], TORTOIZ_EXT_VERSION );
		wp_enqueue_style( 'tortoiz-addons-widgets', TORTOIZ_EXT_URL .'assets/css/tortoiz-addons-widgets.min.css', [], TORTOIZ_EXT_VERSION );
	}

	/**
	 * Enqueue JS files
	 *
	 * @since 3.0.0
	 */
	public function widget_scripts() {
		$apikey = get_option( 'tortoiz_addons_map_apikey' );
		$ajax_url = admin_url('admin-ajax.php');

		wp_register_script( 'imagesLoaded', TORTOIZ_EXT_URL .'assets/js/imagesloaded.pkgd.min.js', [], '4.1.4', true );
		wp_register_script( 'typed', TORTOIZ_EXT_URL .'assets/js/typed.min.js', ['jquery'], TORTOIZ_EXT_VERSION, true );
		wp_register_script( 'jquery-owl', TORTOIZ_EXT_URL .'assets/js/owl.carousel.min.js', ['jquery'], '2.3.4', true );
		wp_register_script( 'jquery-particle', TORTOIZ_EXT_URL .'assets/js/tortoiz-addons-particles.min.js', ['jquery'], '1.0', true );
		wp_register_script( 'magnific-popup', TORTOIZ_EXT_URL .'assets/js/jquery.magnific-popup.min.js', ['jquery'], '1.1.0', true );
		wp_register_script( 'countdown', TORTOIZ_EXT_URL .'assets/js/jquery.countdown.min.js', ['jquery'], '2.2.0', true );
		wp_register_script( 'easypiechart', TORTOIZ_EXT_URL .'assets/js/jquery.easypiechart.min.js', ['jquery'], '2.1.7', true );
		wp_register_script( 'isotope', TORTOIZ_EXT_URL .'assets/js/isotope.min.js', ['jquery', 'imagesLoaded', 'magnific-popup'], '3.0.6', true );
		wp_register_script( 'xzoom', TORTOIZ_EXT_URL .'assets/js/xzoom.min.js', ['jquery'], '1.0.14', true );
		wp_register_script( 'jquery-event-move', TORTOIZ_EXT_URL .'assets/js/jquery.event.move.min.js', ['jquery'], '2.0.0', true );
		wp_register_script( 'jquery-twentytwenty', TORTOIZ_EXT_URL .'assets/js/jquery.twentytwenty.min.js', ['jquery'], '2.0.0', true );

		if ( $apikey ) {
			wp_register_script( 'tortoiz-addons-google-map', '//maps.google.com/maps/api/js?key='. $apikey, [], TORTOIZ_EXT_VERSION, true );
		}
		wp_register_script( 'tortoiz-addons-widgets', TORTOIZ_EXT_URL .'assets/js/tortoiz-addons-widgets.min.js', ['jquery'], TORTOIZ_EXT_VERSION, true );
		wp_localize_script( 'tortoiz-addons-widgets', 'tortoizAddonsAjax', ['ajaxURL' => $ajax_url] );
	}

	/**
	 * Create widget category
	 *
	 * @since 3.0.0
	 */
	public function widget_category( $elements_manager ) {
		$elements_manager->add_category(
			'tortoiz-addons-extension',
			[
				'title' => __( 'Tortoiz Basic Widgets', 'tortoiz-addons-ext' ),
			]
		);
		$elements_manager->add_category(
			'tortoiz-addons-ext-advanced',
			[
				'title' => __( 'Tortoiz Advanced Widgets', 'tortoiz-addons-ext' ),
			]
		);
	}

	/**
	 * Register widgets
	 *
	 * @since 2.0.0
	 */
	public function register_widgets( $widgets_manager ) {
		$active_widgets = get_option( 'tortoiz_addons_widgets' );

		if ( is_array($active_widgets) ) {
			foreach ($active_widgets as $cat => $widgets) {
				foreach ($widgets as $widget => $status) {
					$file = TORTOIZ_EXT_DIR .'/widgets/'.$cat.'/tortoiz-addons-'.$widget.'.php';
					if (1 == $status && file_exists( $file )) {
						require_once( $file );
						$widget = str_replace(' ', '_', ucwords( str_replace('-', ' ', $widget) ) );
						$widget = 'Tortoiz_Addons_'.$widget.'_Widget';
						$widgets_manager->register_widget_type( new $widget() );
					}
				}
			}
		}
	}

	/**
	 * Initialize the plugin
	 *
	 * @since 3.0.0
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Register Widget Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'widget_category' ] );

		// Register Widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		// Enqueue Widget Styles
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );

		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		new Tortoiz_Addons_Ext_Settings();
		new Tortoiz_Addons_Ext_Controls();
		Tortoiz_Addons_Ext_Manager::instance();
	}
}