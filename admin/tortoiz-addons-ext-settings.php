<?php
namespace Tortoiz_Extension\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tortoiz_Addons_Ext_Settings Class for settings panel
 *
 * @since 3.0.0
 */
class Tortoiz_Addons_Ext_Settings{

	public function __construct() {
		add_action( 'admin_menu', [$this, 'add_submenu'], 550 );
		add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts'] );
		add_action( 'admin_init', [$this, 'settings_group'] );
	}

	public function add_submenu() {
		add_submenu_page(
			'elementor',
			__('Tortoiz Addons Settings', 'tortoiz-addons-ext'),
			__('Tortoiz Addons', 'tortoiz-addons-ext'),
			'manage_options',
			'tortoiz_addons_ext_settings',
			[$this, 'page_content']
		);
	}

	public function admin_scripts( $hook ) {
		if ( 'elementor_page_tortoiz_addons_ext_settings' == $hook ) {
			// CSS Files
			wp_enqueue_style( 'tortoiz-addons-admin', TORTOIZ_EXT_URL .'admin/assets/css/tortoiz-addons-admin.min.css', [], TORTOIZ_EXT_VERSION );
		}
	}

	public function settings_group() {
		register_setting( 'tortoiz_addons_settings_group', 'tortoiz_addons_map_apikey' );
		register_setting( 'tortoiz_addons_settings_group', 'tortoiz_addons_mailchimp' );
		register_setting( 'tortoiz_addons_settings_group', 'tortoiz_addons_widgets' );
		register_setting( 'tortoiz_addons_settings_group', 'tortoiz_addons_templates_option' );

		add_settings_section( 'tortoiz_addons_api_section', '', '', 'tortoiz_addons_ext_settings' );
		add_settings_field( 'tortoiz_addons_google_map_key', __('Google Map API Key', 'tortoiz-addons-ext'), [$this, 'text_field'], 'tortoiz_addons_ext_settings', 'tortoiz_addons_api_section', ['key' => 'tortoiz_addons_map_apikey'] );
		add_settings_field( 'tortoiz_addons_mailchimp_key', __('MailChimp API Key', 'tortoiz-addons-ext'), [$this, 'text_field'], 'tortoiz_addons_ext_settings', 'tortoiz_addons_api_section', ['key' => 'tortoiz_addons_mailchimp', 'index' => 'apikey' ] );
		add_settings_field( 'tortoiz_addons_mailchimp_list_id', __('MailChimp List Id', 'tortoiz-addons-ext'), [$this, 'text_field'], 'tortoiz_addons_ext_settings', 'tortoiz_addons_api_section', ['key' => 'tortoiz_addons_mailchimp', 'index' => 'list_id' ] );

		$templates = get_option( 'tortoiz_addons_templates_option' );
		add_settings_section( 'tortoiz_addons_templates_section', '', '', 'tortoiz_addons_ext_templates' );
		add_settings_field( 'tortoiz_addons_ext_templates_only', __('Tortoiz Templates', 'tortoiz-addons-ext'), [$this, 'templates_option'], 'tortoiz_addons_ext_templates', 'tortoiz_addons_templates_section', ['temps' => 'templates_only', 'get_temps' => $templates] );

		$get_widgets = get_option( 'tortoiz_addons_widgets' );
		$set_widgets = TORTOIZ_WIDGETS;
		if ( defined('TORTOIZ_EXT_PRO_WIDGETS')) {
			$set_widgets = array_merge(TORTOIZ_WIDGETS, TORTOIZ_EXT_PRO_WIDGETS);
		}
		foreach ( $set_widgets as $cat => $widgets ) {
			$section = 'tortoiz_addons_'.$cat.'_widgets_section';
			$page = 'tortoiz_addons_widgets_'.$cat;
			add_settings_section( $section, '', '', $page );

			foreach ($widgets as $widget => $status) {
				add_settings_field( 'tortoiz_addons_'.str_replace('-', '_', $widget), __('Tortoiz '. ucwords( str_replace('-', ' ', $widget) ), 'tortoiz-addons-ext'), [$this, 'widgets_ac_dc'], $page, $section, ['widget' => $widget, 'cat' => $cat, 'get_widgets' => $get_widgets]  );
			}
		}
	}

	public function page_content() {
		require TORTOIZ_EXT_ADMIN.'partials/page-content.php';
	}

	public function text_field($field) {
		$data = get_option( $field['key'] );
		$key = $field['key'];

		if ( is_array($data) ) {
			$data = $data[ $field['index'] ];
			$key = $key.'['. $field['index'] .']';
		}
		$data = sanitize_text_field( $data );
		printf('<input class="regular-text" type="text" name="%s" value="%s">', $key, $data);
	}

	public function templates_option($data) {
		$get_temps 	= $data['get_temps'];
		$temps 		= $data['temps'];
		$name 		= 'tortoiz-addons-'.$temps;
		$checked	= isset($get_temps[ $temps ]) && 1 == $get_temps[ $temps ] ? 'checked' : '';
		$key		= 'tortoiz_addons_templates_option['.$temps.']';

		require TORTOIZ_EXT_ADMIN.'partials/switch.php';
	}

	public function widgets_ac_dc($data) {
		$widgets 	= $data['get_widgets'];
		$widget 	= $data['widget'];
		$cat 		= $data['cat'];
		$name 		= 'tortoiz-addons-'.$widget;
		$checked	= isset($widgets[ $cat ][ $widget ]) && 1 == $widgets[ $cat ][ $widget ] ? 'checked' : '';
		$key 		= 'tortoiz_addons_widgets['.$cat.']['. $widget .']';

		require TORTOIZ_EXT_ADMIN.'partials/switch.php';
	}
}