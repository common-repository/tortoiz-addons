<?php

/**
 * Slider Banner Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Banner_Slider_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_banner_slider';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Banner Slider', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-slider-push';
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
		return [ 'tortoizAddons slider', 'tortoizAddons banner', 'tortoizAddons carousel' ];
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
	        'owl-carousel',
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
	    	'jquery-owl',
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
		// Start Slider Content
		// =====================
		$this->start_controls_section(
			'slider_content',
			[
				'label' => __( 'Slides', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Welcome',
			]
		);
		$repeater->add_control(
			'title_span',
			[
				'label' => __( 'Title Span', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title Span', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use SPAN for multi-color title.', 'tortoiz-addons-ext' ),
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'title_anim',
			[
				'label' => __( 'Title Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInLeft',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => __( 'Sub Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet',
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'subtitle_anim',
			[
				'label' => __( 'Sub Title Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInRight',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet',
			]
		);
		$repeater->add_control(
			'desc_anim',
			[
				'label' => __( 'Description Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$repeater->add_control(
			'buttons_anim',
			[
				'label' => __( 'Buttons Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => Tortoiz_Addons_Common_Data::animation(),
			]
		);
		$repeater->add_responsive_control(
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
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Add Slide', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'Welcome to get start your business',
						'subtitle' => 'Lorem ipsum dolor sit amet',
						'title_anim' => 'fadeInLeft',
						'subtitle_anim' => 'fadeInRight',
						'buttons_anim' => 'fadeInUp',
					],
					[
						'title' => 'Lorem ipsum dolor sit amet,',
						'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
						'title_anim' => 'zoomIn',
						'subtitle_anim' => 'zoomIn',
						'desc_anim' => 'fadeInUp',
						'buttons_anim' => 'lightSpeedIn',
					],
				],
				'title_field' => '{{{ title || subtitle }}}',
			]
		);

		$this->end_controls_section();
		// End Slider Content
		// =====================


		// Start Slider Settings
		// ======================
		$this->start_controls_section(
			'slider_settings',
			[
				'label' => __( 'Slider Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'overlay',
			[
				'label' => __( 'Overlay', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'overlay_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => 'rgba(0,0,0,0.5)',
					],
				],
				'condition' => [
					'overlay!' => '',
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-slider-content .tortoiz-addons-overlay',
			]
		);
		Tortoiz_Addons_Common_Data::carousel_content($this, '.tortoiz-addons-banner-slider', true, false);
		$this->add_control(
			'part_anim',
			[
				'label' => __( 'Particular Animation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$this->add_control(
			'slide_speed',
			[
				'label' => __( 'Speed', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1000,
				'step' => 100,
				'min' => 100,
				'max' => 5000,
				'condition' => [
					'part_anim' => '',
				],
			]
		);

		$this->end_controls_section();
		// End Slider Settings
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

		$this->end_controls_section();
		// End Secondary Button
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
			'container_height',
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
				'desktop_default' => [
					'size' => 600,
				],
				'tablet_default' => [
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-slider-content' => 'height: {{SIZE}}{{UNIT}};',
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
					'top' => '200',
					'right' => '120',
					'bottom' => '220',
					'left' => '120',
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
					'{{WRAPPER}} .tortoiz-addons-slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition' => [
					'pbtn_text!' => '',
				],
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
				'condition' => [
					'sbtn_text!' => '',
				],
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


		// Start Nav & Dots Style
		// ===========================
		$this->start_controls_section(
			'nav_dots_style',
			[
				'label' => __( 'Nav & Dots', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::nav_dots_style($this, '.tortoiz-addons-banner-slider');
		$this->end_controls_section();
		// End Nav & Dots Style
		// ==========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		$this->add_render_attribute( 'pbtn_text', 'class', 'tortoiz-addons-banner-pbtn-text' );
		$this->add_inline_editing_attributes( 'pbtn_text' );

		$this->add_render_attribute( 'sbtn_text', 'class', 'tortoiz-addons-banner-sbtn-text' );
		$this->add_inline_editing_attributes( 'sbtn_text' );
		?>
		<div class="tortoiz-addons-banner-slider owl-carousel"
		data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
		data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
		data-nav="<?php echo esc_attr( $data['nav'] ); ?>"
		data-dots="<?php echo esc_attr( $data['dots'] ); ?>"
		data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
		data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
		data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
		data-speed="<?php echo esc_attr( $data['slide_speed'] ); ?>"
		data-part-anim="<?php echo esc_attr( $data['part_anim'] ); ?>"
		data-delay="<?php echo esc_attr( $data['delay'] ); ?>">

			<?php foreach ($data['slides'] as $index => $slide) :
					$invisible = '';
					if ( $data['part_anim'] ) {
						$invisible = 'tortoiz-addons-anim-invisible';
					}

					$title_key = $this->get_repeater_setting_key( 'title', 'slides', $index );
					$subtitle_key = $this->get_repeater_setting_key( 'subtitle', 'slides', $index );
					$desc_key = $this->get_repeater_setting_key( 'desc', 'slides', $index );

					$this->add_render_attribute( $title_key, 'class', 'tortoiz-addons-banner-title '. $invisible );
					$this->add_inline_editing_attributes( $title_key );

					$this->add_render_attribute( $subtitle_key, 'class', 'tortoiz-addons-banner-subtitle '. $invisible );
					$this->add_inline_editing_attributes( $subtitle_key );

					$this->add_render_attribute( $desc_key, 'class', 'tortoiz-addons-banner-desc '. $invisible );
					$this->add_inline_editing_attributes( $desc_key );
				?>
				<div class="tortoiz-addons-slider-content tortoiz-addons-bg-cover" style="background-image: url(<?php echo esc_url( $slide['image']['url'] ); ?>);">
					<?php if ( 'yes' == $data['overlay'] ): ?>
						<div class="tortoiz-addons-overlay"></div>
					<?php endif ?>

					<div class="tortoiz-addons-banner-container elementor-repeater-item-<?php echo esc_attr( $slide[ '_id' ] ); ?>">

						<?php if ( $slide['title'] ): ?>
							<?php $title_span = $slide['title_span'] ? '<span>'.$slide['title_span'].'</span>' : ''; ?>
							<?php printf('<%4$s %1$s data-animation="animated %2$s">%3$s%5$s</%4$s>', $this->get_render_attribute_string( $title_key ), $slide['title_anim'], $slide['title'], $slide['title_tag'], $title_span); ?>
						<?php endif; ?>

						<?php if ( $slide['subtitle'] ): ?>
							<?php printf('<%4$s %1$s data-animation="animated %2$s">%3$s</%4$s>', $this->get_render_attribute_string( $subtitle_key ), $slide['subtitle_anim'], $slide['subtitle'], $slide['subtitle_tag']); ?>
						<?php endif; ?>

						<?php if ( $slide['desc'] ): ?>
							<?php printf('<div %1$s data-animation="animated %2$s">%3$s</div>', $this->get_render_attribute_string( $desc_key ), $slide['desc_anim'], $slide['desc']); ?>
						<?php endif; ?>

						<?php if ( $data['pbtn_text'] || $data['sbtn_text'] ): ?>
							<div class="tortoiz-addons-banner-btns <?php echo esc_attr($invisible); ?>" data-animation="animated <?php echo esc_attr( $slide['buttons_anim'] ); ?>">
								<?php if ( $data['pbtn_text'] ): ?>
									<a class="tortoiz-addons-banner-pbtn <?php echo esc_attr( $data['pbtn_effect']); ?>"
									href="<?php echo esc_url( $data['pbtn_link']['url'] ); ?>"
									<?php if ( 'on' == $data['pbtn_link']['is_external'] ): ?>
										target="_blank" 
									<?php endif; ?>
									<?php if ( 'on' == $data['pbtn_link']['nofollow'] ): ?>
										rel="nofollow" 
									<?php endif; ?>>
										<?php Tortoiz_Addons_Common_Data::button_html($data, 'pbtn'); ?>
									</a>
								<?php endif ?>

								<?php if ( $data['sbtn_text'] ): ?>
									<a class="tortoiz-addons-banner-sbtn <?php echo esc_attr( $data['sbtn_effect']); ?>"
									href="<?php echo esc_url( $data['sbtn_link']['url'] ); ?>"
									<?php if ( 'on' == $data['sbtn_link']['is_external'] ): ?>
										target="_blank" 
									<?php endif; ?>
									<?php if ( 'on' == $data['sbtn_link']['nofollow'] ): ?>
										rel="nofollow" 
									<?php endif; ?>>
										<?php Tortoiz_Addons_Common_Data::button_html($data, 'sbtn'); ?>
									</a>
								<?php endif ?>
							</div>
						<?php endif ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div><!-- .tortoiz-addons-banner-slider -->
		<?php
	}


	protected function _content_template() {
		
	}
}