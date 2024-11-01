<?php
// namespace Tortoiz_Extension;

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

/**
 * Tortoiz_Addons_Common_Data Class for Common Controls.
 *
 * @since 2.3.0
 */

class Tortoiz_Addons_Common_Data{
	public static function animation() {
		return [
			'none' => __( 'None', 'tortoiz-addons-ext' ),
			'fadeIn' => __( 'Fade In', 'tortoiz-addons-ext' ),
			'fadeInUp' => __( 'Fade In Up', 'tortoiz-addons-ext' ),
			'fadeInDown' => __( 'Fade In Down', 'tortoiz-addons-ext' ),
			'fadeInLeft' => __( 'Fade In Left', 'tortoiz-addons-ext' ),
			'fadeInRight' => __( 'Fade In Right', 'tortoiz-addons-ext' ),
			'zoomIn' => __('Zoom In', 'tortoiz-addons-ext'),
			'zoomInLeft' => __('Zoom In Left', 'tortoiz-addons-ext'),
			'zoomInRight' => __('Zoom In Right', 'tortoiz-addons-ext'),
			'zoomInDown' => __('Zoom In Down', 'tortoiz-addons-ext'),
			'zoomInUp' => __('Zoom In Up', 'tortoiz-addons-ext'),
			'bounceIn' => __('Bounce In', 'tortoiz-addons-ext'),
			'bounceInDown' => __('Bounce In Down', 'tortoiz-addons-ext'),
			'bounceInLeft' => __('Bounce In Left', 'tortoiz-addons-ext'),
			'bounceInRight' => __('Bounce In Right', 'tortoiz-addons-ext'),
			'bounceInUp' => __('Bounce In Up', 'tortoiz-addons-ext'),
			'slideInDown' => __('Slide In Down', 'tortoiz-addons-ext'),
			'slideInLeft' => __('Slide In Left', 'tortoiz-addons-ext'),
			'slideInRight' => __('Slide In Right', 'tortoiz-addons-ext'),
			'slideInUp' => __('Slide In Up', 'tortoiz-addons-ext'),
			'rotateIn' => __('Rotate In', 'tortoiz-addons-ext'),
			'rotateInDownLeft' => __('Rotate In Down Left', 'tortoiz-addons-ext'),
			'rotateInDownRight' => __('Rotate In Down Right', 'tortoiz-addons-ext'),
			'rotateInUpLeft' => __('Rotate In Up Left', 'tortoiz-addons-ext'),
			'rotateInUpRight' => __('Rotate In Up Right', 'tortoiz-addons-ext'),
			'flipInX' => __( 'Flip In X', 'tortoiz-addons-ext' ),
			'flipInY' => __( 'Flip In Y', 'tortoiz-addons-ext' ),
			'lightSpeedIn' => __('Light Speed In', 'tortoiz-addons-ext'),
			'swing' => __( 'Swing', 'tortoiz-addons-ext' ),
			'bounce' => __('Bounce', 'tortoiz-addons-ext'),
			'flash' => __('Flash', 'tortoiz-addons-ext'),
			'pulse' => __('Pulse', 'tortoiz-addons-ext'),
			'rubberBand' => __('Rubber Band', 'tortoiz-addons-ext'),
			'shake' => __('Shake', 'tortoiz-addons-ext'),
			'headShake' => __('Head Shake', 'tortoiz-addons-ext'),
			'swing' => __('Swing', 'tortoiz-addons-ext'),
			'tada' => __('Tada', 'tortoiz-addons-ext'),
			'wobble' => __('Wobble', 'tortoiz-addons-ext'),
			'jello' => __('Jello', 'tortoiz-addons-ext'),
			'rollIn' => __('Roll In', 'tortoiz-addons-ext'),
		];
	}

	public static function animation_out() {
		return [
			'none' => __( 'None', 'tortoiz-addons-ext' ),
			'fadeOut' => __( 'Fade Out', 'tortoiz-addons-ext' ),
			'fadeOutUp' => __( 'Fade Out Up', 'tortoiz-addons-ext' ),
			'fadeOutDown' => __( 'Fade Out Down', 'tortoiz-addons-ext' ),
			'fadeOutLeft' => __( 'Fade Out Left', 'tortoiz-addons-ext' ),
			'fadeOutRight' => __( 'Fade Out Right', 'tortoiz-addons-ext' ),
			'zoomOut' => __('Zoom Out', 'tortoiz-addons-ext'),
			'zoomOutLeft' => __('Zoom Out Left', 'tortoiz-addons-ext'),
			'zoomOutRight' => __('Zoom Out Right', 'tortoiz-addons-ext'),
			'zoomOutDown' => __('Zoom Out Down', 'tortoiz-addons-ext'),
			'zoomOutUp' => __('Zoom Out Up', 'tortoiz-addons-ext'),
			'bounceOut' => __('Bounce Out', 'tortoiz-addons-ext'),
			'bounceOutDown' => __('Bounce Out Down', 'tortoiz-addons-ext'),
			'bounceOutLeft' => __('Bounce Out Left', 'tortoiz-addons-ext'),
			'bounceOutRight' => __('Bounce Out Right', 'tortoiz-addons-ext'),
			'bounceOutUp' => __('Bounce Out Up', 'tortoiz-addons-ext'),
			'slideOutDown' => __('Slide Out Down', 'tortoiz-addons-ext'),
			'slideOutLeft' => __('Slide Out Left', 'tortoiz-addons-ext'),
			'slideOutRight' => __('Slide Out Right', 'tortoiz-addons-ext'),
			'slideOutUp' => __('Slide Out Up', 'tortoiz-addons-ext'),
			'rotateOut' => __('Rotate Out', 'tortoiz-addons-ext'),
			'rotateOutDownLeft' => __('Rotate Out Down Left', 'tortoiz-addons-ext'),
			'rotateOutDownRight' => __('Rotate Out Down Right', 'tortoiz-addons-ext'),
			'rotateOutUpLeft' => __('Rotate Out Up Left', 'tortoiz-addons-ext'),
			'rotateOutUpRight' => __('Rotate Out Up Right', 'tortoiz-addons-ext'),
			'flipOutX' => __( 'Flip Out X', 'tortoiz-addons-ext' ),
			'flipOutY' => __( 'Flip Out Y', 'tortoiz-addons-ext' ),
			'lightSpeedOut' => __('Light Speed Out', 'tortoiz-addons-ext'),
			'rollOut' => __('Roll Out', 'tortoiz-addons-ext'),
		];
	}

	public static function posts_content($obj) {
		$obj->add_control(
			'posts_num',
			[
				'label' => __( 'Number of Posts', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'min' => 1,
				'max' => 50,
				'default' => 3,
			]
		);
		$obj->add_control(
			'offset',
			[
				'label' => __( 'Number of Offset', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'min' => 0,
				'max' => 50,
				'default' => 0,
			]
		);
		$obj->add_control(
			'order_by',
			[
				'label' => __( 'Order by', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'date' => __( 'Date', 'tortoiz-addons-ext' ),
					'title' => __( 'Title', 'tortoiz-addons-ext' ),
					'author' => __( 'Author', 'tortoiz-addons-ext' ),
					'modified' => __( 'Modified', 'tortoiz-addons-ext' ),
					'comment_count' => __( 'Comments', 'tortoiz-addons-ext' ),
				],
				'default' => 'date',
			]
		);
		$obj->add_control(
			'sort',
			[
				'label' => __( 'Sort', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => __( 'ASC', 'tortoiz-addons-ext' ),
					'DESC' => __( 'DESC', 'tortoiz-addons-ext' ),
				],
				'default' => 'DESC',
			]
		);
	}

	public static function carousel_content( $obj, $class = '', $cond = true, $speed = true ) {
		$obj->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$obj->add_control(
			'pause',
			[
				'label' => __( 'Pause on Hover', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$obj->add_control(
			'mouse_drag',
			[
				'label' => __( 'Mouse Drag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$obj->add_control(
			'touch_drag',
			[
				'label' => __( 'Touch Drag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$obj->add_control(
			'loop',
			[
				'label' => __( 'Infinity Loop', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'default' => 'yes',
			]
		);
		$obj->add_control(
			'center',
			[
				'label' => __( 'Center', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Off', 'tortoiz-addons-ext' ),
				'condition' => [
					'show_item!' => '1'
				],
			]
		);

		if ($cond) {
			$obj->add_control(
				'dots',
				[
					'label' => __( 'Dots', 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'tortoiz-addons-ext' ),
					'label_off' => __( 'Hide', 'tortoiz-addons-ext' ),
					'default' => 'yes',
				]
			);
			$obj->add_control(
				'nav',
				[
					'label' => __( 'Navigation', 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'tortoiz-addons-ext' ),
					'label_off' => __( 'Hide', 'tortoiz-addons-ext' ),
					'default' => 'yes',
				]
			);
		}

		$obj->add_control(
			'delay',
			[
				'label' => __( 'Delay', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'step' => 100,
				'min' => 1000,
				'max' => 15000,
			]
		);
		$obj->add_control(
			'slide_anim',
			[
				'label' => __( 'Slide Animation In', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => self::animation(),
				'condition' => [
					'show_item' => '1',
				],
			]
		);
		$obj->add_control(
			'slide_anim_out',
			[
				'label' => __( 'Slide Animation Out', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => self::animation_out(),
				'condition' => [
					'show_item' => '1',
				],
			]
		);

		if ( $speed ) {
			$obj->add_control(
				'speed',
				[
					'label' => __( 'Speed', 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::NUMBER,
					'step' => 100,
					'min' => 100,
					'max' => 5000,
					'default' => 500,
					'condition' => [
						'slide_anim' => 'none',
					],
				]
			);
		}
	}

	public static function button_content( $obj, $class = '', $btn_text = 'Learn More', $prefix = 'btn', $cond = true, $tooltip = false ) {
		$obj->add_control(
			$prefix.'_effect',
			[
				'label' => __( 'Hover Effects', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-right-move' => __( 'Icon Right Move', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-right-moving' => __( 'Icon Right Moving', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-right-bouncing' => __( 'Icon Right Bouncing', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-left-move' => __( 'Icon Left Move', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-left-moving' => __( 'Icon Left Moving', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-left-bouncing' => __( 'Icon Left Bouncing', 'tortoiz-addons-ext' ),
					'tortoiz-addons-anim-zooming' => __( 'Icon Zooming', 'tortoiz-addons-ext' ),
				],
				'default' => '',
			]
		);
		$obj->add_control(
			$prefix.'_text',
			[
				'label' => __( 'Label', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Text', 'tortoiz-addons-ext' ),
				'default' => $btn_text,
			]
		);
		if ( $tooltip ) {
			$obj->add_control(
				$prefix.'_tooltip_text',
				[
					'label' => __( 'Tooltip text', 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Enter Tooltip Text', 'tortoiz-addons-ext' ),
				]
			);
		}
		if ($cond) {
			$obj->add_control(
				$prefix.'_link',
				[
					'label' => __( 'Link', 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
					'default' => [
						'url' => '#',
					],
				]
			);
		}
		$obj->add_control(
			$prefix.'_icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
			]
		);
		$obj->add_control(
			$prefix.'_icon_align',
			[
				'label' => __( 'Icon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
				],
				'default' => 'right',
				'condition' => [
					$prefix.'_icon!' => '',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_icon_space',
			[
				'label' => __( 'Icon Spacing', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '5',
				],
				'condition' => [
					$prefix.'_text!' => '',
					$prefix.'_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} '.$class.' .tortoiz-addons-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
	}

	public static function tooltip_style( $obj, $prefix, $class ) {
		$obj->add_control(
			$prefix.'_tooptip',
			[
				'label' => __( 'Tooptip Styles', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => $prefix.'_tooptip_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '12',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '16',
						],
					],
				],
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selector' => '{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text',
			]
		);
		$obj->add_control(
			$prefix.'_tooptip_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text' => 'color: {{VALUE}};',
				],
			]
		);
		$obj->add_control(
			$prefix.'_tooptip_bg',
			[
				'label' => __( 'Background Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text::after' => 'border-top-color: {{VALUE}};',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_tooptip_dist',
			[
				'label' => __( 'Distance', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 0,
					],
					'em' => [
						'min' => -5,
						'max' => 0,
					],
				],
				'default' => [
					'size' => -40,
				],
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_tooltip_radius',
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
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_tooltip_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '5',
					'right' => '10',
					'bottom' => '5',
					'left' => '10',
					'isLinked' => false,
				],
				'condition' => [
					$prefix.'_tooltip_text!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .tortoiz-addons-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}

	public static function nav_dots_style($obj, $class = '') {
		$obj->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'dots!' => '',
				],
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-dot' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} '.$class.' .owl-dot.active' => 'background-color: {{VALUE}}',
				]
			]
		);
		$obj->add_control(
			'nav_styles',
			[
				'label' => __( 'Navigation', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav!' => '',
				],
			]
		);

		$obj->start_controls_tabs( 'nav_tabs' );

		$obj->start_controls_tab(
			'nav_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$obj->add_control(
			'nav_color',
			[
				'label' => __( 'Arrow Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav!' => '',
				],
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-prev, {{WRAPPER}} '.$class.' .owl-next' => 'color: {{VALUE}}'
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'nav_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'condition' => [
					'nav!' => '',
				],
				'selector' => '{{WRAPPER}} '.$class.' .owl-prev, {{WRAPPER}} '.$class.' .owl-next',
			]
		);

		$obj->end_controls_tab();

		$obj->start_controls_tab(
			'nav_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$obj->add_control(
			'nav_hover_color',
			[
				'label' => __( 'Arrow Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-prev:hover, {{WRAPPER}} '.$class.' .owl-next:hover' => 'color: {{VALUE}}'
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'nav_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'condition' => [
					'nav!' => '',
				],
				'selector' => '{{WRAPPER}} '.$class.' .owl-prev:hover, {{WRAPPER}} '.$class.' .owl-next:hover',
			]
		);

		$obj->end_controls_tab();

		$obj->end_controls_tabs();

		$obj->add_control(
			'nav_font',
			[
				'label' => __( 'Font Family', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::FONT,
				'default' => 'Arial',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-prev, {{WRAPPER}} '.$class.' .owl-next' => 'font-family: {{VALUE}}',
				],
			]
		);
		$obj->add_control(
			'nav_top',
			[
				'label' => __( 'Nav Top (%)', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => '50',
				],
				'condition' => [
					'nav!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-prev, {{WRAPPER}} '.$class.' .owl-next' => 'top: calc({{SIZE}}{{UNIT}} - 18px);',
				],
			]
		);
		$obj->add_responsive_control(
			'nav_next_radius',
			[
				'label' => __( 'Nav Next Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '4',
					'right' => '4',
					'bottom' => '4',
					'left' => '4',
					'isLinked' => true,
				],
				'condition' => [
					'nav!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$obj->add_responsive_control(
			'nav_prev_radius',
			[
				'label' => __( 'Nav Prev Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '4',
					'right' => '4',
					'bottom' => '4',
					'left' => '4',
					'isLinked' => true,
				],
				'condition' => [
					'nav!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class.' .owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}

	public static function button_style( $obj, $class = '', $prefix = 'btn' ) {
		$obj->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => $prefix.'_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '15',
						],
					],
					'line_height'   => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'transform'   => [
						'default' => [
							'size' => 'uppercase',
						],
					],
				],
				'selector' => '{{WRAPPER}} '.$class,
			]
		);

		$obj->start_controls_tabs( $prefix.'_tabs' );

		$obj->start_controls_tab(
			$prefix.'_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$obj->add_control(
			$prefix.'_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} '.$class => 'color: {{VALUE}};',
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => $prefix.'_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} '.$class,
			]
		);
		$obj->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $prefix.'_tshadow',
				'selector' => '{{WRAPPER}} '.$class,
			]
		);
		$obj->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $prefix.'_shadow',
				'selector' => '{{WRAPPER}} '.$class,
			]
		);
		$obj->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $prefix.'_border',
				'selector' => '{{WRAPPER}} '.$class,
			]
		);
		$obj->end_controls_tab();

		$obj->start_controls_tab(
			$prefix.'_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$obj->add_control(
			$prefix.'_hover_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus' => 'color: {{VALUE}};',
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => $prefix.'_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus',
			]
		);
		$obj->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $prefix.'_hover_tshadow',
				'selector' => '{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus',
			]
		);
		$obj->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $prefix.'_hover_shadow',
				'selector' => '{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus',
			]
		);
		$obj->add_control(
			$prefix.'_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$obj->end_controls_tab();

		$obj->end_controls_tabs();
	}

	public static function input_style( $obj, $class = '', $prefix = 'email' ) {
		$obj->add_responsive_control(
			$prefix.'_width',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field'.$class => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$obj->add_responsive_control(
			$prefix.'_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}

	public static function input_fields_style( $obj ) {
		$obj->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fields_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '400',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-input-field',
			]
		);
		$obj->add_control(
			'placeholder_color',
			[
				'label' => __( 'Placeholder Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#aaa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tortoiz-addons-input-field::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tortoiz-addons-input-field::-ms-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tortoiz-addons-input-field::placeholder' => 'color: {{VALUE}};',
				],
			]
		);

		$obj->start_controls_tabs( 'field_tabs' );

		$obj->start_controls_tab(
			'fields_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$obj->add_control(
			'color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field' => 'color: {{VALUE}};',
				],
			]
		);
		$obj->add_control(
			'background',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field' => 'background: {{VALUE}};',
				],
			]
		);
		$obj->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-input-field',
			]
		);

		$obj->end_controls_tab();

		$obj->start_controls_tab(
			'fields_focus',
			[
				'label' => __( 'Focus', 'tortoiz-addons-ext' ),
			]
		);

		$obj->add_control(
			'focus_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$obj->add_control(
			'focus_background',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field:focus' => 'background: {{VALUE}};',
				],
			]
		);
		$obj->add_control(
			'focus_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field:focus' => 'border-color: {{VALUE}}'
				],
			]
		);

		$obj->end_controls_tab();

		$obj->end_controls_tabs();
	}

	public static function button_html( $data, $prefix = 'btn' ) {
		if ( isset($data[$prefix.'_tooltip_text']) && $data[$prefix.'_tooltip_text'] ) : ?>
			<?php printf( '<span class="tortoiz-addons-tooltip-text">%s</span>', $data[$prefix.'_tooltip_text'] ); ?>
		<?php
		endif;
		if ( $data[$prefix.'_icon'] && $data[$prefix.'_icon_align'] == 'left' ): ?>
			<i class="<?php echo esc_attr($data[$prefix.'_icon']); ?> tortoiz-addons-icon-left"></i>
		<?php endif; ?>
		<?php printf( '%s', $data[$prefix.'_text'] ); ?>
		<?php if ( $data[$prefix.'_icon'] && $data[$prefix.'_icon_align'] == 'right' ): ?>
			<i class="<?php echo esc_attr($data[$prefix.'_icon']); ?> tortoiz-addons-icon-right"></i>
			<?php
		endif;
	}
}
