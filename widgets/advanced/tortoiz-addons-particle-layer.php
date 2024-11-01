<?php

/**
 * Particle Layer Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Frontend;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Particle_Layer_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_particle_layer';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Particle Layer', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-parallax';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-ext-advanced' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons banner', 'tortoizAddons layer', 'tortoizAddons particle' ];
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
			'jquery-particle',
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
		// Start Content
		// =====================
		$this->start_controls_section(
			'particle_content',
			[
				'label' => __( 'Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'save_templates',
			[
				'label' => __( 'Use Save Templates', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$this->add_control(
			'template',
			[
				'label' => __( 'Choose Template', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => tortoiz_addons_get_page_templates(),
				'condition' => [
					'save_templates!' => '',
				],
				'description' => __('NOTE: Don\'t try to edit after insertion template. If you need to change the style or layout then you try to change the main template then save and then insert', 'tortoiz-addons-ext'),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'default' => 'Welcome to get start your business',
			]
		);
		$this->add_control(
			'title_span',
			[
				'label' => __( 'Title Span', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title Span', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use SPAN for multi-color title.', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Selct Tag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
				],
				'default' => 'h1',
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Sub Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'separator' => 'before',
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => __( 'Selct Tag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h2',
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'tortoiz-addons-ext' ),
				'separator' => 'before',
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
			]
		);

		$this->end_controls_section();
		// End Content
		// =====================


		// Start Primary Button
		// =====================
		$this->start_controls_section(
			'primary_btn_content',
			[
				'label' => __( 'Primary Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		Tortoiz_Addons_Common_Data::button_content( $this, '.tortoiz-addons-banner-pbtn', 'Learn More', 'pbtn', true, true );
		$this->add_control(
			'pbtn_id',
			[
				'label' => __( 'CSS ID', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter ID', 'tortoiz-addons-ext' ),
				'description' => __( 'Make sure this ID unique', 'tortoiz-addons-ext' ),
			]
		);

		$this->end_controls_section();
		// End Primary Button
		// =====================


		// Start Secondary Button
		// =====================
		$this->start_controls_section(
			'secondary_btn_content',
			[
				'label' => __( 'Secondary Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		Tortoiz_Addons_Common_Data::button_content( $this, '.tortoiz-addons-banner-sbtn', 'Read More', 'sbtn', true, true );
		$this->add_responsive_control(
			'button_space',
			[
				'label' => __( 'Button Spacing', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'desktop_default' => [
					'size' => 20,
				],
				'mobile_default' => [
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-sbtn' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'sbtn_id',
			[
				'label' => __( 'CSS ID', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter ID', 'tortoiz-addons-ext' ),
				'description' => __( 'Make sure this ID unique', 'tortoiz-addons-ext' ),
			]
		);

		$this->end_controls_section();
		// End Secondary Button
		// =====================


		// Start Particle Content
		// =====================
		$this->start_controls_section(
			'particle_settings',
			[
				'label' => __( 'Particle Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
			]
		);
		$this->add_control(
			'ball_color',
			[
				'label' => __( 'Ball Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
			]
		);
		$this->add_control(
			'particle_number',
			[
				'label' => __( 'Number', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 150,
				'step' => 1,
				'min' => 50,
				'max' => 500,
			]
		);
		$this->add_control(
			'particle_link_width',
			[
				'label' => __( 'Link Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
				'step' => 1,
				'min' => 1,
				'max' => 20,
			]
		);
		$this->add_control(
			'particle_link',
			[
				'label' => __( 'Link Distance', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 50,
				'step' => 1,
				'min' => 10,
				'max' => 200,
			]
		);
		$this->add_control(
			'particle_create_link',
			[
				'label' => __( 'Create Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
				'step' => 1,
				'min' => 50,
				'max' => 200,
			]
		);
		$this->add_control(
			'particle_ball',
			[
				'label' => __( 'Ball Max Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 10,
				'step' => 1,
				'min' => 10,
				'max' => 100,
			]
		);
		$this->add_control(
			'anim_speed',
			[
				'label' => __( 'Animation Speed', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 20,
				'step' => 10,
				'min' => 10,
				'max' => 100,
			]
		);
		$this->add_control(
			'link_state',
			[
				'label' => __( 'Disable Links', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'mouse_state',
			[
				'label' => __( 'Disable Mouse', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);

		$this->end_controls_section();
		// End Particle Content
		// =====================


		// Start Animation
		// =====================
		$this->start_controls_section(
			'animation_settings',
			[
				'label' => __( 'Animation Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_anim',
			[
				'label' => __( 'Title Animation', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInLeft',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$this->add_control(
			'subtitle_anim',
			[
				'label' => __( 'Sub Title Animation', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInRight',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$this->add_control(
			'desc_anim',
			[
				'label' => __( 'Description Animation', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$this->add_control(
			'buttons_anim',
			[
				'label' => __( 'Buttons Animation', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);

		$this->end_controls_section();
		// End Animation
		// =====================


		// Start Container Style
		// =====================
		$this->start_controls_section(
			'container_style',
			[
				'label' => __( 'Container', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'container_width',
			[
				'label' => __( 'Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 2000,
					],
					'em' => [
						'max' => 100,
					],
				],
				'default' =>[
					'unit' => '%',
					'size' => '100',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-container' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'container_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'desktop_default' => [
					'top' => '180',
					'right' => '50',
					'bottom' => '180',
					'left' => '50',
					'isLinked' => false,
				],
				'tablet_default' => [
					'top' => '80',
					'right' => '100',
					'bottom' => '100',
					'left' => '100',
					'isLinked' => false,
				],
				'mobile_default' => [
					'top' => '60',
					'right' => '20',
					'bottom' => '60',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-particle-layer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-banner-container' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'template_style',
			[
				'label' => __( 'Template Style', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'template_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-particle-template' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Container Style
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
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-title' => 'color: {{VALUE}};',
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
							'size' => '40',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '50',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-title' => 'margin-bottom: {{size}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Title Span Style
		// =======================
		$this->start_controls_section(
			'title_span_style',
			[
				'label' => __( 'Title Span', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title_span!' => '',
				],
			]
		);

		$this->add_control(
			'title_span_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-title > span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_span_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-title > span',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_span_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-title > span',
			]
		);

		$this->end_controls_section();
		// End Title Span Style
		// =====================


		// Start Sub Title Style
		// =====================
		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => __( 'Sub Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				],
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '30',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '40',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-subtitle',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-subtitle',
			]
		);
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => __( 'Margin Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '10',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Sub Title Style
		// =====================


		// Start Descripton Style
		// =====================
		$this->start_controls_section(
			'desc_style',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'desc!' => '',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '16',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-banner-desc',
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Description Style
		// =====================


		// Start Primary button Style
		// ===========================
		$this->start_controls_section(
			'pbtn_style',
			[
				'label' => __( 'Primary Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-banner-pbtn', 'pbtn' );
		$this->add_responsive_control(
			'pbtn_width',
			[
				'label' => __( 'Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 50,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-pbtn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pbtn_radius',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-pbtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pbtn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'desktop_default' => [
					'top' => '12',
					'right' => '25',
					'bottom' => '12',
					'left' => '25',
					'isLinked' => false,
				],
				'mobile_default' => [
					'top' => '10',
					'right' => '15',
					'bottom' => '10',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-pbtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		Tortoiz_Addons_Common_Data::tooltip_style( $this, 'pbtn', '.tortoiz-addons-banner-pbtn' );

		$this->end_controls_section();
		// End Primary Button Style
		// ==========================


		// Start Secondary button Style
		// ===========================
		$this->start_controls_section(
			'sbtn_style',
			[
				'label' => __( 'Secondary Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-banner-sbtn', 'sbtn' );
		$this->add_responsive_control(
			'sbtn_width',
			[
				'label' => __( 'Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 50,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-sbtn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'sbtn_radius',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-sbtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'sbtn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'desktop_default' => [
					'top' => '12',
					'right' => '25',
					'bottom' => '12',
					'left' => '25',
					'isLinked' => false,
				],
				'mobile_default' => [
					'top' => '10',
					'right' => '15',
					'bottom' => '10',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-banner-sbtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		Tortoiz_Addons_Common_Data::tooltip_style( $this, 'sbtn', '.tortoiz-addons-banner-sbtn' );

		$this->end_controls_section();
		// End Secondary Button Style
		// ==========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-particle-layer">
			<div class="tortoiz-addons-banner-container">
				<?php
					if ( 'yes' == $data['save_templates'] && $data['template'] ) {
						$frontend = new Frontend;
						echo '<div class="tortoiz-addons-particle-template">'. $frontend->get_builder_content( $data['template'], true ) .'</div>';
					}
				?>

				<?php if ( $data['title'] ): ?>
					<?php $title_span = $data['title_span'] ? '<span>'.$data['title_span'].'</span>' : ''; ?>
					<?php printf('<%3$s class="tortoiz-addons-banner-title animated %1$s">%2$s%4$s</%3$s>', $data['title_anim'], $data['title'], $data['title_tag'], $title_span); ?>
				<?php endif; ?>

				<?php if ( $data['subtitle'] ): ?>
					<?php printf('<%3$s class="tortoiz-addons-banner-subtitle animated %1$s">%2$s</%3$s>', $data['subtitle_anim'], $data['subtitle'], $data['title_tag']); ?>
				<?php endif; ?>

				<?php if ( $data['desc'] ): ?>
					<?php printf('<div class="tortoiz-addons-banner-desc animated %1$s">%2$s</div>', $data['desc_anim'], $data['desc']); ?>
				<?php endif; ?>

				<?php if ( $data['pbtn_text'] || $data['sbtn_text'] ): ?>
					<div class="tortoiz-addons-banner-btns animated <?php echo esc_attr( $data['buttons_anim'] ); ?>">
						<?php if ( $data['pbtn_text'] ): ?>
							<a class="tortoiz-addons-banner-pbtn <?php echo esc_attr( $data['pbtn_effect']) ?>"
							href="<?php echo esc_url( $data['pbtn_link']['url'] ); ?>"
							<?php if ( $data['pbtn_id'] ): ?>
								id="<?php echo esc_attr( $data['pbtn_id'] ); ?>"
							<?php endif; ?>
							<?php if ( 'on' == $data['pbtn_link']['is_external'] ): ?>
								target="_blank" 
							<?php endif; ?>
							<?php if ( 'on' == $data['pbtn_link']['nofollow'] ): ?>
								rel="nofollow" 
							<?php endif; ?>
							role="button">
								<?php Tortoiz_Addons_Common_Data::button_html($data, 'pbtn'); ?>
							</a>
						<?php endif ?>

						<?php if ( $data['sbtn_text'] ): ?>
							<a class="tortoiz-addons-banner-sbtn <?php echo esc_attr( $data['sbtn_effect']) ?>"
							href="<?php echo esc_url( $data['sbtn_link']['url'] ); ?>"
							<?php if ( $data['sbtn_id'] ): ?>
								id="<?php echo esc_attr( $data['sbtn_id'] ); ?>"
							<?php endif; ?>
							<?php if ( 'on' == $data['sbtn_link']['is_external'] ): ?>
								target="_blank" 
							<?php endif; ?>
							<?php if ( 'on' == $data['sbtn_link']['nofollow'] ): ?>
								rel="nofollow" 
							<?php endif; ?>
							role="button">
								<?php Tortoiz_Addons_Common_Data::button_html($data, 'sbtn'); ?>
							</a>
						<?php endif ?>
					</div>
				<?php endif ?>
			</div>
			<div class="tortoiz-addons-particle"
			data-link-color="<?php echo esc_attr( $data['link_color']); ?>"
			data-ball-color="<?php echo esc_attr( $data['ball_color']); ?>"
			data-number="<?php echo esc_attr( $data['particle_number']); ?>"
			data-link="<?php echo esc_attr( $data['particle_link']); ?>"
			data-clink="<?php echo esc_attr( $data['particle_create_link']); ?>"
			data-linkw="<?php echo esc_attr( $data['particle_link_width']); ?>"
			data-size="<?php echo esc_attr( $data['particle_ball']); ?>"
			data-speed="<?php echo esc_attr( $data['anim_speed']); ?>"
			data-dlink="<?php echo esc_attr( $data['link_state']); ?>"
			data-dmouse="<?php echo esc_attr( $data['mouse_state']); ?>"></div>
		</div><!-- .tortoiz-addons-particle-layer -->
		<?php
	}


	protected function _content_template() {
		
	}
}