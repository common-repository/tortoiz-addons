<?php
namespace Tortoiz_Extension;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tortoiz_Extension_Base Class for basic functionality
 *
 * @since 3.0.0
 */
abstract class Tortoiz_Extension_Base{
	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tortoiz-addons-ext' ),
			'<strong>' . esc_html__( 'Tortoiz Addons for Elementor', 'tortoiz-addons-ext' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'tortoiz-addons-ext' ) . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', __($message));
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tortoiz-addons-ext' ),
			'<strong>' . esc_html__( 'Tortoiz Addons for Elementor', 'tortoiz-addons-ext' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'tortoiz-addons-ext' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tortoiz-addons-ext' ),
			'<strong>' . esc_html__( 'Tortoiz Addons for Elementor', 'tortoiz-addons-ext' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'tortoiz-addons-ext' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Load Action Hooks
	 *
	 * @since 3.0.0
	 */
	public function load_actions() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action('admin_init', [$this, 'redirection']);
		add_action( 'admin_post_tortoiz_addons_ext_rollback', ['Tortoiz_Addons_Ext_Rollback', 'rollback'] );

		add_action( 'wp_ajax_tortoiz_addons_mc_subscribe', ['Tortoiz_Addons_Ext_Hooks', 'mailchimp_subscribe'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_mc_subscribe', ['Tortoiz_Addons_Ext_Hooks', 'mailchimp_subscribe'] );

		add_action( 'wp_ajax_tortoiz_addons_contact', ['Tortoiz_Addons_Ext_Hooks', 'ajax_contact'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_contact', ['Tortoiz_Addons_Ext_Hooks', 'ajax_contact'] );

		add_action( 'wp_ajax_tortoiz_addons_login', ['Tortoiz_Addons_Ext_Hooks', 'ajax_login'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_login', ['Tortoiz_Addons_Ext_Hooks', 'ajax_login'] );

		add_action( 'wp_ajax_tortoiz_addons_load_more_posts', ['Tortoiz_Addons_Ext_Hooks', 'ajax_load_more_posts'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_load_more_posts', ['Tortoiz_Addons_Ext_Hooks', 'ajax_load_more_posts'] );

		add_action( 'wp_ajax_tortoiz_addons_user_counter', ['Tortoiz_Addons_Ext_Hooks', 'ajax_user_counter'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_user_counter', ['Tortoiz_Addons_Ext_Hooks', 'ajax_user_counter'] );

		add_action( 'wp_ajax_tortoiz_addons_visit_counter', ['Tortoiz_Addons_Ext_Hooks', 'ajax_visit_counter'] );
		add_action( 'wp_ajax_nopriv_tortoiz_addons_visit_counter', ['Tortoiz_Addons_Ext_Hooks', 'ajax_visit_counter'] );
	}

	/**
	 * Load Action Hooks
	 *
	 * @since 3.0.0
	 */
	public function load_filters() {
		add_filter( 'plugin_action_links_'. TORTOIZ_EXT_BASENAME, [ $this, 'settings' ] );
	}

	/**
	 * Load Textdomain
	 *
	 * @since 1.0.0
	 */
	public function i18n() {
		load_plugin_textdomain( 'tortoiz-addons-ext' );
	}

	/**
	 * For activation
	 *
	 * @since 3.0.0
	 */
	public static function activation() {
		add_option( 'tortoiz_addons_extension_activation', true );
		$data = get_option( 'tortoiz_addons_widgets' );
		if ( !empty($data) ) {
			$data = array_merge(TORTOIZ_WIDGETS, $data);
			update_option( 'tortoiz_addons_widgets', $data);
			return true;
		}
		update_option( 'tortoiz_addons_widgets', TORTOIZ_WIDGETS);
		add_option( 'tortoiz_addons_ext_type', 'free' );
		add_option( 'tortoiz_addons_map_apikey', '' );
		add_option( 'tortoiz_addons_mailchimp', [
			'apikey'	=> '',
			'list_id'	=> '',
		] );
		add_option( 'tortoiz_addons_templates_option', [] );
		add_option( 'tortoiz_addons_ext_license_key', substr( md5( microtime() ), 0, 16 ) );
	}

	/**
	 * Redirect after activation
	 *
	 * @since 3.0.0
	 */
	public function redirection() {
		if ( did_action( 'elementor/loaded' ) && get_option('tortoiz_addons_extension_activation', false ) ) {
			delete_option('tortoiz_addons_extension_activation');

			if ( ! is_network_admin() ) {
				wp_redirect("admin.php?page=tortoiz_addons_ext_settings");
			}
		}
	}

	/**
	 * Create settings link
	 *
	 * @since 3.0.0
	 */
	public function settings( $links ) {
		$links[] = '<a href="admin.php?page=tortoiz_addons_ext_settings">Settings</a>';
		return $links;
	}
}