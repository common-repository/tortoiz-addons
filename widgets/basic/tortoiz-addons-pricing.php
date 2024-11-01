<?php

/**
 * Pricing Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Pricing_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_pricing';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Pricing', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		return [ 'tortoizAddons price', 'tortoizAddons pricing table', 'tortoizAddons plan' ];
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
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Box Content
		// =====================
		$this->start_controls_section(
			'pricing_box_content',
			[
				'label' => __( 'Pricing', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Basic',
			]
		);
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Price', 'tortoiz-addons-ext' ),
				'default' => '$20',
			]
		);
		$this->add_control(
			'price_suffix',
			[
				'label' => __( 'Price Suffix', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Suffix', 'tortoiz-addons-ext' ),
				'condition' => [
					'price!' => '',
				],
				'default' => 'M',
			]
		);
		$this->add_control(
			'thumbs',
			[
				'label' => __( 'Show Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$this->add_control(
			'img_position',
			[
				'label' => __( 'Image Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'tortoiz-addons-ext' ),
					'middle' => __( 'Middle', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
				],
				'condition' => [
					'thumbs!' => '',
				],
				'default' => 'middle',
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'thumbs!' => '',
				],
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$this->add_control(
			'ribbon_title',
			[
				'label' => __( 'Ribbon Title', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'ribbon_position',
			[
				'label' => __( 'Ribbon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'tortoiz-addons-ribbon-left' => [
						'title' => __( 'Left', 'tortoiz-addons-ext' ),
						'icon' => 'eicon-h-align-left',
					],
					'tortoiz-addons-ribbon-right' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'condition' => [
					'ribbon_title!' => '',
				],
				'default' => 'tortoiz-addons-ribbon-right',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Content', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Content', 'tortoiz-addons-ext' ),
			]
		);
		$repeater->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-body {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon',
			[
				'name' => 'icon',
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
			]
		);
		$repeater->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item',
			[
				'label' => __( 'Add Content', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => '1GB Storage',
					],
					[
						'title' => '1 Web Hosting',
					],
					[
						'title' => '20GB Bandwith',
					],
					[
						'title' => '5 Subdomain',
					],
					[
						'title' => 'SSD Server',
					],
					[
						'title' => 'Free SSL',
					],
					[
						'title' => '24/7 Support',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		// End Box Content
		// =====================


		// Start Button Content
		// =====================
		$this->start_controls_section(
			'btn_content',
			[
				'label' => __( 'Order Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		Tortoiz_Addons_Common_Data::button_content( $this, '.tortoiz-addons-order-btn', 'Order' );
		$this->end_controls_section();
		// End Button Content
		// ====================


		// Start Box Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Box', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'effects',
			[
				'label' => __( 'Effects', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-pricing-move' => __( 'Move', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pricing-zoom' => __( 'Zoom', 'tortoiz-addons-ext' ),
					'' => __( 'None', 'tortoiz-addons-ext' ),
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'scale',
			[
				'label' => __( 'Scale', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'step' => 0.1,
						'min' => 0.1,
						'max' => 5,
					],
				],
				'default' => [
					'size' => '1.1',
				],
				'condition' => [
					'effects' => 'tortoiz-addons-pricing-zoom',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing.tortoiz-addons-pricing-zoom:hover' => 'transform: scale({{SIZE}});',
				],
			]
		);
		$this->add_control(
			'move',
			[
				'label' => __( 'Move', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'condition' => [
					'effects' => 'tortoiz-addons-pricing-move',
				],
			]
		);

		$this->start_popover();
		$this->add_responsive_control(
			'translateX',
			[
				'label' => __( 'Horizontal', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'step' => 1,
						'min' => -100,
						'max' => 100,
					],
				],
				'desktop_default' => [
					'size' => '0',
				],
				'tablet_default' => [
					'size' => '0',
				],
				'mobile_default' => [
					'size' => '0',
				],
				'condition' => [
					'effects' => 'tortoiz-addons-pricing-move',
				],
			]
		);
		$this->add_responsive_control(
			'translateY',
			[
				'label' => __( 'Vertical', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'step' => 1,
						'min' => -100,
						'max' => 100,
					],
				],
				'desktop_default' => [
					'size' => '-10',
				],
				'tablet_default' => [
					'size' => '-10',
				],
				'mobile_default' => [
					'size' => '-10',
				],
				'condition' => [
					'effects' => 'tortoiz-addons-pricing-move',
				],
				'selectors' => [
					'(desktop){{WRAPPER}} .tortoiz-addons-pricing:hover' => 'transform: translate({{translateX.SIZE || 0}}px, {{translateY.SIZE || 0}}px);',
					'(tablet){{WRAPPER}} .tortoiz-addons-pricing:hover' => 'transform: translate({{translateX_tablet.SIZE || 0}}px, {{translateY_tablet.SIZE || 0}}px);',
					'(mobile){{WRAPPER}} .tortoiz-addons-pricing:hover' => 'transform: translate({{translateX_mobile.SIZE || 0}}px, {{translateY_mobile.SIZE || 0}}px);',
				],
			]
		);
		$this->end_popover();

		$this->start_controls_tabs( 'box_tabs' );

		$this->start_controls_tab(
			'box_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#fff',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'color' => [
						'default' => '#1085e4',
					],
					'width' => [
						'default' => [
							'top' => '1',
							'right' => '1',
							'bottom' => '1',
							'left' => '1',
							'isLinked' => true,
						]
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_hover_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing:hover',
			]
		);
		$this->add_control(
			'box_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing:hover',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
		// =====================


		// Start Title Style
		// =====================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-title',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-title',
			]
		);
		$this->add_responsive_control(
			'title_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '20',
					'right' => '15',
					'bottom' => '20',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_alignment',
			[
				'label' => __( 'Alignment', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Price Style
		// =====================
		$this->start_controls_section(
			'price_style',
			[
				'label' => __( 'Price', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'price!' => '',
				],
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-price-tag',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-price-tag',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'price_box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-price-tag',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'price_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-price-tag',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'price_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-price-tag',
			]
		);
		$this->add_control(
			'suffix_size',
			[
				'label' => __( 'Suffix Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '12',
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag .tortoiz-addons-price-suffix' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '20',
					'bottom' => '15',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_alignment',
			[
				'label' => __( 'Alignment', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-price-tag' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Price Style
		// =====================


		// Start Button Style
		// =====================
		$this->start_controls_section(
			'btn_style',
			[
				'label' => __( 'Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_text!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-order-btn' );
		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '4',
					'right' => '4',
					'bottom' => '4',
					'left' => '4',
					'isLinked' => true,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-order-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '12',
					'right' => '25',
					'bottom' => '12',
					'left' => '25',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-order-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '30',
					'right' => '0',
					'bottom' => '40',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =====================


		// Start Content Style
		// =====================
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_icon',
			[
				'label' => __( 'Icon Styles', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
				],
				'default' => 'left',
			]
		);
		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Icon Spacing', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-body li .tortoiz-addons-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tortoiz-addons-pricing-body li .tortoiz-addons-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-body li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
					'transform'   => [
						'default' => [
							'size' => 'uppercase',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-body li',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pricing-body li',
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pricing-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Content Style
		// =====================


		// Start Ribbon Style
		// =====================
		$this->start_controls_section(
			'ribbon_style',
			[
				'label' => __( 'Ribbon', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ribbon_title!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ribbon_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '16',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-ribbon-right, {{WRAPPER}} .tortoiz-addons-ribbon-left',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'ribbon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-ribbon-right, {{WRAPPER}} .tortoiz-addons-ribbon-left',
			]
		);
		$this->add_control(
			'ribbon_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f8f8f8',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-ribbon-right, {{WRAPPER}} .tortoiz-addons-ribbon-left' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'ribbon_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#61ce70',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-ribbon-right, {{WRAPPER}} .tortoiz-addons-ribbon-left',
			]
		);

		$this->end_controls_section();
		// End Ribbon Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-pricing <?php echo esc_attr( $data['effects'] ); ?>">
			<?php if ( $data['ribbon_title'] && $data['ribbon_position'] ): ?>
				<div class="<?php echo esc_attr( $data['ribbon_position'] ); ?>">
					<?php printf( '%s', $data['ribbon_title'] ); ?>
				</div>
			<?php endif; ?>

			<?php if ( 'yes' == $data['thumbs'] && 'top' == $data['img_position'] ): ?>
				<div class="tortoiz-addons-pricing-img">
					<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">
				</div>
			<?php endif; ?>

			<?php if ( $data['title'] ): ?>
				<?php printf( '<h3 class="tortoiz-addons-pricing-title">%1$s</h3>', $data['title'] ); ?>
			<?php endif; ?>

			<?php if ( 'yes' == $data['thumbs'] && 'middle' == $data['img_position'] ): ?>
				<div class="tortoiz-addons-pricing-img">
					<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">
				</div>
			<?php endif; ?>

			<?php if ( $data['price']): ?>
				<h4 class="tortoiz-addons-price-tag">
					<span><?php printf( '%s', $data['price'] ); ?></span><span class="tortoiz-addons-price-suffix"><?php printf( '%s', $data['price_suffix'] ); ?></span>
				</h4>
			<?php endif; ?>

			<?php if ( 'yes' == $data['thumbs'] && 'bottom' == $data['img_position'] ): ?>
				<div class="tortoiz-addons-pricing-img">
					<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">
				</div>
			<?php endif; ?>

			<ul class="tortoiz-addons-pricing-body">
				<?php foreach ($data['item'] as $index => $item) : ?>
					<li class="elementor-repeater-item-<?php echo esc_attr( $item[ '_id' ] ); ?>">
						<?php if ( $item['icon'] && $data['icon_align'] == 'left' ): ?>
							<i class="<?php echo esc_attr($item['icon']); ?> tortoiz-addons-icon-left"></i>
						<?php endif; ?>
						<?php printf( '%s', $item['title'] ); ?>
						<?php if ( $item['icon'] && $data['icon_align'] == 'right' ): ?>
							<i class="<?php echo esc_attr($item['icon']); ?> tortoiz-addons-icon-right"></i>
						<?php endif; ?>
					</li>
				<?php endforeach ?>
			</ul>

			<?php if ( $data['btn_text'] || $data['btn_icon'] ) : ?>
				<div class="tortoiz-addons-pricing-btn">
					<a class="tortoiz-addons-order-btn <?php echo esc_attr( $data['btn_effect']); ?>"
					href="<?php echo esc_url( $data['btn_link']['url'] ); ?>"
					<?php if ( 'on' == $data['btn_link']['is_external'] ): ?>
						target="_blank" 
					<?php endif; ?>
					<?php if ( 'on' == $data['btn_link']['nofollow'] ): ?>
						rel="nofollow" 
					<?php endif; ?>>
						<?php Tortoiz_Addons_Common_Data::button_html($data); ?>
					</a>
				</div>
			<?php endif; ?>
		</div><!-- .tortoiz-addons-pricing -->
		<?php
	}


	protected function _content_template() {

	}
}