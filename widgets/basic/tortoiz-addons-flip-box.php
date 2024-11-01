<?php

/**
 * Flip Box Widget.
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


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Flip_Box_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_flip_box';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Flip Box', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-flip-box';
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
		return [ 'tortoizAddons flip box', 'tortoizAddons rotate box' ];
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
		// Start Front Side Content
		// =========================
		$this->start_controls_section(
			'front_content',
			[
				'label' => __( 'Front Side', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'front_icon_format',
			[
				'label' => __( 'Icon Format', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-star',
					],
					'image' => [
						'title' => __( 'Image', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-image',
					],
				],
				'default' => 'icon',
			]
		);
		$this->add_control(
			'front_icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-android',
				'condition' => [
					'front_icon_format' => 'icon',
				],
			]
		);
		$this->add_control(
			'front_image',
			[
				'label' => __( 'Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'front_icon_format' => 'image',
				],
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$this->add_control(
			'front_title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Apps Development',
			]
		);
		$this->add_control(
			'front_desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'This is flip box description.',
			]
		);

		$this->end_controls_section();
		// End Front Side Content
		// =======================


		// Start Back Side Content
		// =========================
		$this->start_controls_section(
			'back_content',
			[
				'label' => __( 'Back Side', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'back_icon_format',
			[
				'label' => __( 'Icon Format', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-star',
					],
					'image' => [
						'title' => __( 'Image', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-image',
					],
				],
				'default' => 'icon',
			]
		);
		$this->add_control(
			'back_icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-tablet',
				'condition' => [
					'back_icon_format' => 'icon',
				],
			]
		);
		$this->add_control(
			'back_image',
			[
				'label' => __( 'Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'back_icon_format' => 'image',
				],
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$this->add_control(
			'back_title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Web Development',
			]
		);
		$this->add_control(
			'back_desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'This is flip box description.',
			]
		);
		$this->add_control(
			'back_link',
			[
				'label' => __( 'Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
			]
		);

		$this->end_controls_section();
		// End Back Side Content
		// =======================


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
					'tortoiz-addons-flipbox-effect-h-flip' => __( 'Horizontal Flip', 'tortoiz-addons-ext' ),
					'tortoiz-addons-flipbox-effect-v-flip' => __( 'Verticle Flip', 'tortoiz-addons-ext' ),
					'tortoiz-addons-flipbox-effect-zoom' => __( 'Zoom', 'tortoiz-addons-ext' ),
				],
				'default' => 'tortoiz-addons-flipbox-effect-zoom',
			]
		);

		$this->start_controls_tabs( 'box_tabs' );

		$this->start_controls_tab(
			'front_style',
			[
				'label' => __( 'Front', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'front_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front',
			]
		);
		$this->add_responsive_control(
			'front_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '20',
					'right' => '20',
					'bottom' => '30',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'front_content_padding',
			[
				'label' => __( 'Content Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'condition' => [
					'front_icon_format' => 'image',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'back_style',
			[
				'label' => __( 'Back', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'back_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#d300d0',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back',
			]
		);
		$this->add_responsive_control(
			'back_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '20',
					'right' => '20',
					'bottom' => '30',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'back_content_padding',
			[
				'label' => __( 'Content Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'condition' => [
					'back_icon_format' => 'image',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'box_height',
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
					'size' => '230',
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front, {{WRAPPER}} .tortoiz-addons-flipbox-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'alignment',
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
					'{{WRAPPER}} .tortoiz-addons-flipbox' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
		// =================


		// Start Icons Style
		// =====================
		$this->start_controls_section(
			'icons_style',
			[
				'label' => __( 'Icon or Image', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'icons_tabs' );

		$this->start_controls_tab(
			'front_icon_style',
			[
				'label' => __( 'Front', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'front_icon_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'front_icon_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
					'size' => '38',
				],
				'condition' => [
					'front_icon_format' => 'icon',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'front_image_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 30,
					],
				],
				'default'=> [
					'unit' => 'px',
					'size' => '100',
				],
				'condition' => [
					'front_icon_format' => 'image',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'front_icon_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'front_icon_image_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_responsive_control(
			'front_icon_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'front_icon_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '15',
					'bottom' => '15',
					'left' => '15',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'back_icon_style',
			[
				'label' => __( 'Back', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'back_icon_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'back_icon_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
					'size' => '38',
				],
				'condition' => [
					'back_icon_format' => 'icon',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'back_image_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 30,
					],
				],
				'default'=> [
					'unit' => 'px',
					'size' => '100',
				],
				'condition' => [
					'back_icon_format' => 'image',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'back_icon_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'back_icon_image_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img',
			]
		);
		$this->add_responsive_control(
			'back_icon_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'back_icon_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '15',
					'bottom' => '15',
					'left' => '15',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon i, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Icons Style
		// =================


		// Start Title Style
		// ===================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'title_tabs' );

		$this->start_controls_tab(
			'front_title_style',
			[
				'label' => __( 'Front', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'front_title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_title_typography',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'front_title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-title',
			]
		);
		$this->add_responsive_control(
			'front_title_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'back_title_style',
			[
				'label' => __( 'Back', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title > a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_title_typography',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title > a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'back_title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title, {{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title > a',
			]
		);
		$this->add_responsive_control(
			'back_title_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Title Style
		// =================


		// Start Descripton Style
		// ========================
		$this->start_controls_section(
			'desc_style',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'desc_tabs' );

		$this->start_controls_tab(
			'front_desc_style',
			[
				'label' => __( 'Front', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'front_desc_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_desc_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'front_desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-desc',
			]
		);
		$this->add_responsive_control(
			'front_desc_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-front .tortoiz-addons-flipbox-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'back_desc_style',
			[
				'label' => __( 'Back', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'back_desc_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_desc_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'back_desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-desc',
			]
		);
		$this->add_responsive_control(
			'back_desc_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-flipbox-back .tortoiz-addons-flipbox-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Description Style
		// =======================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-flipbox">
			<div class="tortoiz-addons-flipbox-front <?php echo esc_attr( $data['effects'] ); ?>">
				<?php if ( $data['front_icon'] ): ?>
					<div class="tortoiz-addons-flipbox-icon">
						<i class="<?php echo esc_attr( $data['front_icon'] ); ?>"></i>
					</div>
				<?php elseif( $data['front_image'] ): ?>
					<div class="tortoiz-addons-flipbox-icon">
						<img src="<?php echo esc_url( $data['front_image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">
					</div>
				<?php endif; ?>

				<div class="tortoiz-addons-flipbox-content">
					<?php if ( $data['front_title'] ): ?>
						<?php printf( '<h3 class="tortoiz-addons-flipbox-title">%1$s</h3>', $data['front_title'] ); ?>
					<?php endif; ?>

					<?php if ( $data['front_desc'] ): ?>
						<?php printf( '<div class="tortoiz-addons-flipbox-desc">%1$s</div>', $data['front_desc'] ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="tortoiz-addons-flipbox-back <?php echo esc_attr( $data['effects'] ); ?>">
				<?php if ( $data['back_icon'] ): ?>
					<div class="tortoiz-addons-flipbox-icon">
						<i class="<?php echo esc_attr( $data['back_icon'] ); ?>"></i>
					</div>
				<?php elseif( $data['back_image'] ): ?>
					<div class="tortoiz-addons-flipbox-icon">
						<img src="<?php echo esc_url( $data['back_image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">
					</div>
				<?php endif; ?>

				<div class="tortoiz-addons-flipbox-content">
					<?php if ( $data['back_title'] ): ?>
						<h3 class="tortoiz-addons-flipbox-title">
							<?php if ( $data['back_link']['url'] ): ?>
								<a href="<?php echo esc_url( $data['back_link']['url'] ); ?>"
									<?php if ( 'on' == $data['back_link']['is_external'] ): ?>
										target="_blank" 
									<?php endif; ?>
									<?php if ( 'on' == $data['back_link']['nofollow'] ): ?>
										rel="nofollow" 
									<?php endif; ?>>
									<?php printf( '%1$s', $data['back_title'] ); ?>
								</a>
							<?php else: ?>
								<?php printf( '%1$s', $data['back_title'] ); ?>
							<?php endif; ?>
						</h3>
					<?php endif; ?>

					<?php if ( $data['back_desc'] ): ?>
						<?php printf( '<div class="tortoiz-addons-flipbox-desc">%1$s</div>', $data['back_desc'] ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .tortoiz-addons-flipbox -->
		<?php
	}


	protected function _content_template() {

	}
}