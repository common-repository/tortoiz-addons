<?php

/**
 * Blog Post Widget.
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
use \Elementor\Plugin;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Blogpost_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_blogpost';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Blog Post', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-pencil';
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
		return [ 'tortoizAddons posts', 'tortoizAddons blog', 'tortoizAddons blogpost', 'tortoizAddons blog posts' ];
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
			'imagesLoaded',
			'isotope',
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
		// Start Blogpost Content
		// =====================
		$this->start_controls_section(
			'blog_content',
			[
				'label' => __( 'Blog Post', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'grid' => __( 'Grid', 'tortoiz-addons-ext' ),
					'list' => __( 'List', 'tortoiz-addons-ext' ),
				],
				'default' => 'grid',
			]
		);
		$this->add_control(
			'columns',
			[
				'label' => __( 'Number of Column', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-bp-item-1' => __( '1', 'tortoiz-addons-ext' ),
					'tortoiz-addons-bp-item-2' => __( '2', 'tortoiz-addons-ext' ),
					'tortoiz-addons-bp-item-3' => __( '3', 'tortoiz-addons-ext' ),
					'tortoiz-addons-bp-item-4' => __( '4', 'tortoiz-addons-ext' ),
				],
				'default' => 'tortoiz-addons-bp-item-3',
			]
		);
		$this->add_control(
			'categories',
			[
				'label' => esc_html__( 'Categories', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => tortoiz_addons_get_categories(),
			]
		);
		Tortoiz_Addons_Common_Data::posts_content($this);
		$this->add_control(
			'content_length',
			[
				'label' => __( 'Content Word', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'min' => 10,
				'max' => 2000,
				'default' => 50,
			]
		);
		$this->add_control(
			'thumb_right',
			[
				'label' => __( 'Thumb Right', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
				'condition' => [
					'layout' => 'list',
				],
			]
		);
		$this->add_control(
			'excerpt',
			[
				'label' => __( 'Excerpt', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'posts_meta',
			[
				'label' => __( 'Meta', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
				'condition' => [
					'loadmore' => '',
				],
			]
		);
		$this->add_control(
			'loadmore',
			[
				'label' => __( 'Load More', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
				'condition' => [
					'pagination' => '',
				],
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Label', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Label', 'tortoiz-addons-ext' ),
				'condition' => [
					'loadmore!' => '',
				],
				'default' => 'Load More',
			]
		);

		$this->end_controls_section();
		// End Blogpost Content
		// =====================


		// Start Read More Content
		// ========================
		$this->start_controls_section(
			'read_more_content',
			[
				'label' => __( 'Read More', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		Tortoiz_Addons_Common_Data::button_content( $this, '.tortoiz-addons-read-more', '', 'read_more', false);

		$this->end_controls_section();
		// End Read More Content
		// ======================


		// Start Post Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Post', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'note',
			[
				'label' => 'If you change the <strong>Dimension</strong> then the page need to <strong>Refresh</strong> for seeing the actual result',
				'type' => Controls_Manager::RAW_HTML,
				'separator' => 'after',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp',
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
						'default' => '#fafafa',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '10',
					'bottom' => '10',
					'left' => '10',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-col' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'justify' => [
						'title' => __( 'justify', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-content' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay',
			[
				'label' => __( 'Overlay Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
						'default' => 'rgba(0,0,0,0.4)',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bg-thumb .tortoiz-addons-overlay',
			]
		);

		$this->end_controls_section();
		// End Post Style
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

		$this->add_responsive_control(
			'thumb_width',
			[
				'label' => __( 'Thumb Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '40',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'condition' => [
					'layout' => 'list',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-list .tortoiz-addons-bg-thumb' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_height',
			[
				'label' => __( 'Thumb Height (px)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
				],
				'desktop_default' => [
					'size' => 200,
				],
				'tablet_default' => [
					'size' => 250,
				],
				'condition' => [
					'layout' => 'list',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-list .tortoiz-addons-bg-thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_width',
			[
				'label' => __( 'Content Width (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => '60',
				],
				'tablet_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => '100',
				],
				'condition' => [
					'layout' => 'list',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-list .tortoiz-addons-bp-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'is_content_height',
			[
				'label' => __( 'Use content Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
				'condition' => [
					'layout' => 'list',
				],
			]
		);
		$this->add_responsive_control(
			'content_height',
			[
				'label' => __( 'Content Height (px)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
				],
				'desktop_default' => [
					'size' => 200,
				],
				'tablet_default' => [
					'size' => 250,
				],
				'condition' => [
					'layout' => 'list',
					'is_content_height' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-list .tortoiz-addons-pb-inner-content' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-content',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-content',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-content',
			]
		);
		$this->add_responsive_control(
			'content_padding',
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
					'{{WRAPPER}} .tortoiz-addons-bp-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Content Style
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
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-title, {{WRAPPER}} .tortoiz-addons-bp-title a',
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
					'{{WRAPPER}} .tortoiz-addons-bp-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-title a',
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
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-title a:hover, {{WRAPPER}} .tortoiz-addons-bp-title a:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-title a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Read More Style
		// ========================
		$this->start_controls_section(
			'read_more_style',
			[
				'label' => __( 'Read More', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'read_more_text!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-read-more' );
		$this->add_responsive_control(
			'read_more_radius',
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
					'{{WRAPPER}} .tortoiz-addons-read-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'read_more_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '20',
					'bottom' => '10',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'read_more_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '25',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Read More Style
		// =====================


		// Start Meta Style
		// =====================
		$this->start_controls_section(
			'meta_style',
			[
				'label' => __( 'Meta', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'posts_meta!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-meta, {{WRAPPER}} .tortoiz-addons-bp-meta a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'meta_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-meta, {{WRAPPER}} .tortoiz-addons-bp-meta a',
			]
		);
		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-meta' => 'color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'link_tabs' );

		$this->start_controls_tab(
			'link_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'link_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-meta a:hover, {{WRAPPER}} .tortoiz-addons-bp-meta a:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'meta_border',
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
							'right' => '0',
							'bottom' => '0',
							'left' => '0',
							'isLinked' => false,
						]
					],
				],
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-meta',
			]
		);
		$this->add_responsive_control(
			'meta_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '12',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'meta_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Meta Style
		// =====================


		// Start Pagination Style
		// =======================
		$this->start_controls_section(
			'pagination_style',
			[
				'label' => __( 'Pagination', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'pagination!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagi_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers',
			]
		);

		$this->start_controls_tabs( 'pagi_link_tabs' );

		$this->start_controls_tab(
			'pagi_link_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'pagi_link_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pagi_link_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagi_bshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pagi_link_border',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagi_link_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'pagi_link_hover_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:hover, {{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pagi_link_hover_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:hover, {{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:focus' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagi_hover_bshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:hover',
			]
		);
		$this->add_control(
			'pagi_link_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:hover, {{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers:focus',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagi_link_current',
			[
				'label' => __( 'Current', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'pagi_link_current_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers.current' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pagi_link_current_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'pagi_current_tshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers.current',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagi_current_bshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers.current',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pagi_link_current_border',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers.current',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'pagi_gap',
			[
				'label' => __( 'Spacing', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'size' => '40',
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_width',
			[
				'label' => __( 'Min Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'size' => '38',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_link_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_link_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '8',
					'right' => '12',
					'bottom' => '8',
					'left' => '12',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_link_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '4',
					'right' => '2',
					'bottom' => '4',
					'left' => '2',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bp-pagination .page-numbers' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagi_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-bp-pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Pagination Style
		// =====================


		// Start Load button Style
		// ===========================
		$this->start_controls_section(
			'load_btn_style',
			[
				'label' => __( 'Load More Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'loadmore!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-load-more-btn', 'load_btn' );
		$this->add_responsive_control(
			'load_btn_radius',
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
					'{{WRAPPER}} .tortoiz-addons-load-more-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'load_btn_padding',
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
					'{{WRAPPER}} .tortoiz-addons-load-more-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'load_btn_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '40',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-load-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'load_btn_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-load-more' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Load Button Style
		// ==========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$new_offset = $data['offset'] + ( ( $paged - 1 ) * $data['posts_num'] );
		$category	= !empty($data['categories']) ? implode( ',', $data['categories'] ) : '';
		$default	= [
			'category_name'		=> $category,
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
		if ( $post_query->have_posts() ) :
			$offset = $new_offset + $data['posts_num'];
			$content_length = $data['content_length'];

			$posts_data = [
				'posts_num'=> $data['posts_num'],
				'offset'=> $offset,
				'total_posts'=> $post_query->found_posts,
				'layout'=> $data['layout'],
				'columns'=> $data['columns'],
				'categories'=> $data['categories'],
				'order_by'=> $data['order_by'],
				'sort'=> $data['sort'],
				'content_length'=> $content_length,
				'excerpt'=> $data['excerpt'],
				'posts_meta'=> $data['posts_meta'],
				'thumb_right'=> $data['thumb_right'],
				'read_more_effect'=> $data['read_more_effect'],
				'read_more_text'=> $data['read_more_text'],
				'read_more_icon'=> $data['read_more_icon'],
				'read_more_icon_align'=> $data['read_more_icon_align'],
			];
			?>
			<div class="tortoiz-addons-blogpost <?php echo esc_attr( 'tortoiz-addons-bp-'.$this->get_id() ); ?>"
			data-uid="<?php echo esc_attr( $this->get_id() ); ?>"
			data-offset="<?php echo esc_attr( $offset ); ?>"
			data-posts-data='<?php echo json_encode( $posts_data ); ?>'>
				<div class="tortoiz-addons-bp-grid">
					<?php include TORTOIZ_EXT_LAYOUT.'/blogpost/'.$data['layout'].'.php'; ?>
					<?php wp_reset_query(); ?>
				</div>

				<?php if ( 'yes' == $data['loadmore'] && $data['btn_text'] && ($data['posts_num'] + $new_offset) < $post_query->found_posts ): ?>
					<div class="tortoiz-addons-load-more">
						<button class="tortoiz-addons-button tortoiz-addons-load-more-btn">
							<?php printf( '%s', $data['btn_text'] ); ?>
						</button>
					</div>
				<?php endif; ?>

				<?php if ( 'yes' == $data['pagination'] ): ?>
					<div class="tortoiz-addons-bp-pagination">
						<?php
							$paginate = paginate_links( [
								'total'		=> $post_query->max_num_pages,
								'current'	=> $paged,
								'prev_next'	=> false,
							] );
							echo str_replace('span', 'a', $paginate);
						?>
					</div>
				<?php endif; ?>
				<?php wp_nonce_field( 'tortoiz_addons_load_more_posts', 'tortoiz_addons_load_more_posts'.$this->get_id() ); ?>
			</div><!-- .tortoiz-addons-blogpost -->
			<?php
		else:
			?>
				<h3><?php _e('No Posts found', 'tortoiz-addons-ext'); ?></h3>
			<?php
		endif;
		if ( Plugin::instance()->editor->is_edit_mode() ) {
			$this->render_editor_script();
		}
	}


	protected function render_editor_script() {
		?>
		<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
			var tortoizAddonsBPClass = '.tortoiz-addons-bp-'+'<?php echo $this->get_id(); ?>',
				$this = $(tortoizAddonsBPClass),
				$isoGrid = $this.children('.tortoiz-addons-bp-row');

			$this.imagesLoaded( function() {
				$isoGrid.isotope({
					itemSelector: '.tortoiz-addons-bp-col',
					percentPosition: true,
					masonry: {
						columnWidth: '.tortoiz-addons-bp-col',
					}
				});
			});

			var items = $this.data('items'),
				btn = $this.find('.tortoiz-addons-load-more-btn');
		});
		</script>
		<?php
	}


	protected function _content_template() {

	}
}