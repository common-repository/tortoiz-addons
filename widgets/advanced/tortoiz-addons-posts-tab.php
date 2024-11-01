<?php

/**
 * Posts Tab Widget.
 *
 * @since 1.2.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Posts_Tab_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.2.0
	 */
	public function get_name() {
		return 'tortoiz_addons_posts_tab';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.2.0
	 */
	public function get_title() {
		return __( 'Tortoiz Posts Tab', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.2.0
	 */
	public function get_icon() {
		return 'eicon-tabs';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.2.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-ext-advanced' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.2.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons posts tab', 'tortoizAddons tab', 'tortoizAddons blog posts', 'tortoizAddons blogpost' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 1.2.0
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
	 * @since 1.2.0
	 */
	public function get_script_depends() {
		return [
			'tortoiz-addons-widgets',
		];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.2.0
	 */
	protected function _register_controls() {
		// Start Tab Content
		// ===================
		$this->start_controls_section(
			'tab_content',
			[
				'label' => __( 'Tab Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'category',
			[
				'label' => __( 'Select Category', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => tortoiz_addons_get_categories(),
				'default' => 'Uncategorized',
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

		$this->add_control(
			'categories',
			[
				'label' => __('Add Categories', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'Uncategorized',
						'category' => 'Uncategorized',
					],
				],
				'title_field' => '{{{category}}}',
			]
		);
		Tortoiz_Addons_Common_Data::posts_content($this);
		$this->add_control(
			'date',
			[
				'label' => __( 'Date', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Hide', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'tag',
			[
				'label' => __( 'Tag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Hide', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'preview_right',
			[
				'label' => __( 'Preview Right', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);

		$this->end_controls_section();
		// End Tab Content
		// =================


		// Start Categories Style
		// =======================
		$this->start_controls_section(
			'cat_style',
			[
				'label' => __( 'Categories', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-pt-cat-btn', 'cat' );
		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
				],
				'separator' => 'before',
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
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn .tortoiz-addons-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn .tortoiz-addons-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_gap',
			[
				'label' => __( 'Gap From Content', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' =>[
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-btns' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_width',
			[
				'label' => __( 'Min Width', 'tortoiz-addons-ext' ),
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '15',
					'bottom' => '10',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-pt-cat-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-pt-btns' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Categories style
		// =====================


		// Start Thumb Style
		// =======================
		$this->start_controls_section(
			'thumb_style',
			[
				'label' => __( 'Thumbnail', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'thumb_width',
			[
				'label' => __( 'Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 800,
					],
				],
				'default' => [
					'size' => '422',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content-content .tortoiz-addons-pt-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content-content .tortoiz-addons-pt-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'desktop_default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '0',
					'left' => '25',
					'isLinked' => false,
				],
				'tablet_default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '0',
					'left' => '25',
					'isLinked' => false,
				],
				'mobile_default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],

				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_title_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-pt-thumb-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'thumb_title',
			[
				'label' => __( 'Title Style', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'thumb_title_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '24',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-thumb-content h2 a',
			]
		);
		$this->add_control(
			'thumb_title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-thumb-content h2 a,
					{{WRAPPER}} .tortoiz-addons-pt-thumb-content h2 a:hover,
					{{WRAPPER}} .tortoiz-addons-pt-thumb-content h2 a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'thumb_meta',
			[
				'label' => __( 'Meta Style', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'thumb_meta_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-thumb-content p,
				{{WRAPPER}} .tortoiz-addons-pt-thumb-content p a',
			]
		);
		$this->add_control(
			'thumb_meta_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-thumb-content p,
					{{WRAPPER}} .tortoiz-addons-pt-thumb-content p a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_meta_gap',
			[
				'label' => __( 'Gap From Title', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-thumb-content p' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Thumb style
		// =================


		// Start Preview Style
		// =======================
		$this->start_controls_section(
			'preview_style',
			[
				'label' => __( 'Preview List', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'preview_width',
			[
				'label' => __( 'List Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content .tortoiz-addons-pt-posts' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'list_padding',
			[
				'label' => __( 'List Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_width',
			[
				'label' => __( 'Title Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title-wraper' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'preview_thumb_width',
			[
				'label' => __( 'Preview Thumb Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-thumb' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'preview_thumb_height',
			[
				'label' => __( 'Preview Thumb Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
					'size' => '120',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-thumb, {{WRAPPER}} .tortoiz-addons-pt-title-wraper' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'preview_border',
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'color' => [
						'default' => '#fafafa',
					],
					'width' => [
						'default' => [
							'top' => '0',
							'right' => '0',
							'bottom' => '1',
							'left' => '0',
							'isLinked' => false,
						]
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-content .tortoiz-addons-pt-post',
			]
		);
		$this->add_responsive_control(
			'preview_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-content .tortoiz-addons-pt-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Preview style
		// ===================


		// Start Title Style
		// =======================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Preview Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-title h3',
			]
		);

		$this->start_controls_tabs( 'title_tabs' );

		$this->start_controls_tab(
			'title_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title h3' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-title h3',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title h3:hover' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-title h3:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
				'default' => 'left',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title style
		// ===================


		// Start Meta Style
		// =======================
		$this->start_controls_section(
			'meta_style',
			[
				'label' => __( 'Date', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'date' => 'yes',
				],
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title p' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-title p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'meta_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pt-title p',
			]
		);
		$this->add_responsive_control(
			'meta_gap',
			[
				'label' => __( 'Gap From Title', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pt-title p' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Meta style
		// ===================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		if ( !empty($data['categories']) ) :
			$id = $this->get_id();
			?>
			<div class="tortoiz-addons-posts-tab">
				<div class="tortoiz-addons-pt-btns">
					<?php
						foreach ($data['categories'] as $cats):
							$bid = $id.'-'.str_replace(' ', '-', $cats['category']);
							?>
							<button class="tortoiz-addons-pt-cat-btn tortoiz-addons-button" data-tortoiz-addons-pt="#<?php echo esc_attr($bid); ?>">
								<?php if ( $cats['icon'] && $data['icon_align'] == 'left' ): ?>
									<i class="<?php echo esc_attr($cats['icon']); ?> tortoiz-addons-icon-left"></i>
								<?php endif; ?>
								<?php printf( '%s', $cats['category'] ); ?>
								<?php if ( $cats['icon'] && $data['icon_align'] == 'right' ): ?>
									<i class="<?php echo esc_attr($cats['icon']); ?> tortoiz-addons-icon-right"></i>
								<?php endif; ?>
							</button>
					<?php endforeach; ?>
				</div>

				<div class="tortoiz-addons-pt-content">
					<?php foreach ($data['categories'] as $key => $cats):
						$cid = $id.'-'.str_replace(' ', '-', $cats['category']);
						?>
						<div class="tortoiz-addons-pt-item <?php echo $key == 0 ? 'active' : ''; ?>" id="<?php echo esc_attr($cid); ?>">
							<div class="tortoiz-addons-pt-content<?php echo 'yes' == $data['preview_right'] ? '-right' : ''; ?>">
								<div class="tortoiz-addons-pt-content-content">
									<?php
										$tc = 0;
										if ( get_query_var('paged') ) {
											$paged = get_query_var('paged');
										} else if ( get_query_var('page') ) {
											$paged = get_query_var('page');
										} else {
											$paged = 1;
										}

										$new_offset = $data['offset'] + ( ( $paged - 1 ) * $data['posts_num'] );
										$default	= [
											'category_name'		=> $cats['category'],
											'orderby'			=> [ $data['order_by'] => $data['sort'] ],
											'posts_per_page'	=> $data['posts_num'],
											'paged'				=> $paged,
											'offset'			=> $new_offset,
											'has_password'		=> false,
											'post_status'		=> 'publish',
											'post__not_in'		=> get_option( 'sticky_posts' ),
										];

										// Post Query
										$post_query = new WP_Query( $default );

										while ( $post_query->have_posts() ) : $post_query->the_post();
											$tid = $id.'-'.str_replace(' ', '-', $cats['category']).'-'.$tc;
											?>
											<?php if ( get_the_post_thumbnail_url() ): ?>
												<div class="tortoiz-addons-pt-item tortoiz-addons-bg-cover <?php echo $tc == 0 ? 'active' : ''; ?>" id="<?php echo esc_attr($tid); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
													<a class="tortoiz-addons-overlay" href="<?php the_permalink(); ?>"></a>
													<div class="tortoiz-addons-pt-thumb-content">
														<h2>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2>
														<?php if ('yes' == $data['tag'] && get_the_tags()): ?>
															<p>
																<span class="fa fa-tag"></span>
																<?php the_tags( '' ); ?>
															</p>
														<?php endif; ?>
													</div>
												</div>
											<?php else: ?>
												<div class="tortoiz-addons-pt-item tortoiz-addons-bg-cover <?php echo $tc == 0 ? 'active' : ''; ?>" id="<?php echo esc_attr($tid); ?>" style="background-image: url(<?php echo esc_url( TORTOIZ_EXT_URL .'assets/img/featured-img.jpg' ); ?>); ">
													<a class="tortoiz-addons-overlay" href="<?php the_permalink(); ?>"></a>
													<div class="tortoiz-addons-pt-thumb-content">
														<h2>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2>
														<?php if ('yes' == $data['tag'] && get_the_tags()): ?>
															<p>
																<span class="fa fa-tag"></span>
																<?php the_tags( '' ); ?>
															</p>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php
											$tc++;
										endwhile;
										wp_reset_query();
									?>
								</div>
								<div class="tortoiz-addons-pt-posts">
									<?php
										$pc = 0;
										while ( $post_query->have_posts() ) : $post_query->the_post();
											$pid = $id.'-'.str_replace(' ', '-', $cats['category']).'-'.$pc;
											?>
											<div class="tortoiz-addons-pt-post">
												<?php if ( 'yes' == $data['preview_right'] ): ?>
													<?php if ( get_the_post_thumbnail_url() ): ?>
														<div class="tortoiz-addons-pt-thumb tortoiz-addons-bg-cover" data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
														</div>
													<?php else: ?>
														<div class="tortoiz-addons-pt-thumb tortoiz-addons-bg-cover" data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>" style="background-image: url(<?php echo esc_url( TORTOIZ_EXT_URL .'assets/img/featured-img.jpg' ); ?>)">
														</div>
													<?php endif; ?>
													<div class="tortoiz-addons-pt-title-wraper tortoiz-addons-flex">
														<div class="tortoiz-addons-pt-title">
															<h3 data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>"><?php the_title(); ?></h3>
															<?php if ('yes' == $data['date']): ?>
																<p><span class="fa fa-clock-o"></span> <?php printf( '%s', get_the_date() ); ?></p>
															<?php endif ?>
														</div>
													</div>
												<?php else: ?>
													<div class="tortoiz-addons-pt-title-wraper tortoiz-addons-flex">
														<div class="tortoiz-addons-pt-title">
															<h3 data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>"><?php the_title(); ?></h3>
															<?php if ('yes' == $data['date']): ?>
																<p><span class="fa fa-clock-o"></span> <?php printf( '%s', get_the_date() ); ?></p>
															<?php endif ?>
														</div>
													</div>
													<?php if ( get_the_post_thumbnail_url() ): ?>
														<div class="tortoiz-addons-pt-thumb tortoiz-addons-bg-cover" data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
														</div>
													<?php else: ?>
														<div class="tortoiz-addons-pt-thumb tortoiz-addons-bg-cover" data-tortoiz-addons-pt="#<?php echo esc_attr( $pid ); ?>" style="background-image: url(<?php echo esc_url( TORTOIZ_EXT_URL .'assets/img/featured-img.jpg' ); ?>)">
														</div>
													<?php endif; ?>
												<?php endif ?>
											</div>
											<?php
											$pc++;
										endwhile;
										wp_reset_query();
									?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div><!-- .tortoiz-addons-posts-tab -->
			<?php
		endif;
	}


	protected function _content_template() {

	}
}