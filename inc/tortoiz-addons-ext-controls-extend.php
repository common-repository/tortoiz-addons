<?php
namespace Tortoiz_Extension;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tortoiz_Addons_Ext_Controls Class for extends controls
 *
 * @since 3.0.1
 */
class Tortoiz_Addons_Ext_Controls{
	public function __construct() {
		$this->controls_files();

		add_action('elementor/controls/controls_registered', [$this, 'controls'], 15 );
	}

	private function controls_files(){
		require_once TORTOIZ_EXT_INC .'controls/icon.php';
		require_once TORTOIZ_EXT_INC .'controls/gradient-text.php';
	}

	public function controls( $manager ) {
		$manager->unregister_control( $manager::ICON );
		$manager->register_control( $manager::ICON, new \Tortoiz_Extension\Tortoiz_Addons_Ext_Icon());
		$manager->add_group_control( Tortoiz_Addons_Ext_Gradient_Text::get_type(), new \Tortoiz_Extension\Tortoiz_Addons_Ext_Gradient_Text());
	}
}