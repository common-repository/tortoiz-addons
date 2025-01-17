<?php

/**
 * Google Map Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Css_Filter;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Google_Map_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_google_map';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Google Map', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-google-maps';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-extension' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons map', 'tortoizAddons google map', 'tortoizAddons world map' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_style_depends() {
	    return [
	        'tortoiz-addons-widgets',
	    ];
	}

	/**
	 * Get widget scripts.
	 *
	 * Retrieve the list of scripts the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_script_depends() {
	    return [
	        'tortoiz-addons-google-map',
	        'tortoiz-addons-widgets',
	    ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Map Content
		// =====================
		$this->start_controls_section(
			'map_content',
			[
				'label' => __( 'Map', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'map_api_url',
			[
				'label' => 'If you would like to change the API key <a target="_blank" href="admin.php?page=tortoiz_addons_ext_settings">click here</a>',
				'type' => Controls_Manager::RAW_HTML,
				'separator' => 'after',
			]
		);
		$this->add_control(
			'lat',
			[
				'label' => __( 'Latitude', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'default' => '23.810332',
			]
		);
		$this->add_control(
			'long',
			[
				'label' => __( 'Longitude', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'default' => '90.412518',
			]
		);
		$this->add_control(
			'zoom',
			[
				'label' => __( 'Zoom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => '1',
				'default' => '12',
			]
		);
		$this->add_control(
			'anim',
			[
				'label' => __( 'Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'DROP' => __( 'Drop', 'tortoiz-addons-ext' ),
					'BOUNCE' => __( 'Bounce', 'tortoiz-addons-ext' ),
				],
				'default' => 'BOUNCE',
			]
		);
		$this->add_control(
			'marker',
			[
				'label' => __( 'Marker', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'custom_marker',
			[
				'label' => __( 'Choose Marker', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/marker.png',
				],
				'condition' => [
					'marker!' => '',
				],
			]
		);

		$this->end_controls_section();
		// End Map Content
		// =====================


		// Start Map Style
		// =====================
		$this->start_controls_section(
			'map_style',
			[
				'label' => __( 'Map', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'map_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 50,
					],
				],
				'default' => [
					'size' => '400',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-google-map' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'map_tabs' );

		$this->start_controls_tab(
			'map_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'map_filters',
				'selector' => '{{WRAPPER}} .tortoiz-addons-google-map',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'map_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'map_filters_hover',
				'selector' => '{{WRAPPER}} .tortoiz-addons-google-map:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'hover_transition',
			[
				'label' => __( 'Transition Duration', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'default' => [
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-google-map' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_section();
		// End Map Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div id="tortoiz-addons-google-map-<?php echo esc_attr( $this->get_id() ); ?>" class="tortoiz-addons-google-map"
		data-id="tortoiz-addons-google-map-<?php echo esc_attr( $this->get_id() ); ?>"
		data-anim="<?php echo esc_attr( $data['anim'] ) ?>"
		data-zoom="<?php echo esc_attr( $data['zoom'] ) ?>"
		data-lat="<?php echo esc_attr( $data['lat'] ) ?>"
		data-long="<?php echo esc_attr( $data['long'] ) ?>"
		data-marker="<?php echo esc_attr( $data['marker'] ) ?>"
		data-marker-link="<?php echo esc_attr( $data['custom_marker']['url'] ) ?>">
		</div><!-- .tortoiz-addons-google-map -->
		<?php
	}


	protected function _content_template() {

	}
}