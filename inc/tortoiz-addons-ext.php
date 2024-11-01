<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Tortoiz_Extension\Tortoiz_Addons_Ext_Functions;

/**
 * Tortoiz_Extension Class
 *
 * @since 3.0.0
 */
class Tortoiz_Extension extends Tortoiz_Addons_Ext_Functions{
	/**
	 * Instance
	 *
	 * @since 3.0.0
	 * @var Tortoiz_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 3.0.0
	 * @return Tortoiz_Extension An Instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		$this->files();
		$this->load_actions();
		$this->load_filters();
		$this->init();
	}

	/**
	 * Include helper & hooks files
	 *
	 * @since 3.0.0
	 */
	public function files() {
		require_once( TORTOIZ_EXT_ADMIN .'tortoiz-addons-ext-rollback.php' );
		require_once( TORTOIZ_EXT_ADMIN .'tortoiz-addons-ext-settings.php' );
		require_once( TORTOIZ_EXT_INC .'tortoiz-addons-ext-hooks.php' );
		require_once( TORTOIZ_EXT_INC .'tortoiz-addons-ext-helpers.php' );
		require_once( TORTOIZ_EXT_INC .'tortoiz-addons-ext-manager.php' );
		require_once( TORTOIZ_EXT_INC .'tortoiz-addons-ext-controls.php' );
		require_once( TORTOIZ_EXT_INC .'tortoiz-addons-ext-controls-extend.php' );
	}
}
