<?php

/**
 * Counter Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Counter_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_counter';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Counter', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-counter';
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
		return [ 'tortoizAddons counter', 'tortoizAddons number', 'tortoizAddons timer' ];
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
	        'jquery-numerator',
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
		// Start Counter Content
		// =====================
		$this->start_controls_section(
			'counter_content',
			[
				'label' => __( 'Counter', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Satisfied Customers',
			]
		);
		$this->add_control(
			'title_position',
			[
				'label' => __( 'Title Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'middle' => __( 'Middle', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
				],
				'condition' => [
					'title!' => '',
				],
				'default' => 'bottom',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-user',
			]
		);
		$this->add_control(
			'start_number',
			[
				'label' => __( 'Start Number', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
				'step' => 1,
			]
		);
		$this->add_control(
			'stop_number',
			[
				'label' => __( 'Stop Number', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'step' => 1,
			]
		);
		$this->add_control(
			'delimiter',
			[
				'label' => __( 'Thousand Delimiter', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					',' => __( 'Comma', 'tortoiz-addons-ext' ),
					'.' => __( 'Dot', 'tortoiz-addons-ext' ),
					'|' => __( 'Pipe', 'tortoiz-addons-ext' ),
					' ' => __( 'space', 'tortoiz-addons-ext' ),
				],
				'default' => ',',
			]
		);
		$this->add_control(
			'speed',
			[
				'label' => __( 'Counting Duration', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2000,
				'min' => 100,
				'max' => 10000,
				'step' => 100,
			]
		);
		$this->add_control(
			'prefix',
			[
				'label' => __( 'Prefix', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Prefix', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'prefix_space',
			[
				'label' => __( 'Prefix Space', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em'],
				'range' => [
					'px' => [
						'min' => -20,
					],
				],
				'condition' => [
					'prefix!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-prefix' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'suffix',
			[
				'label' => __( 'Suffix', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Suffix', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'suffix_space',
			[
				'label' => __( 'Suffix space', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em'],
				'range' => [
					'px' => [
						'min' => -20,
					],
				],
				'condition' => [
					'suffix!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-suffix' => 'margin-left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-counter' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Counter Content
		// =====================


		// Start Title Style
		// =====================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0a0',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-title' => 'color: {{VALUE}};',
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
					'font_size'   => [
						'default' => [
							'size' => '32',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '40',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
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
					'{{WRAPPER}} .tortoiz-addons-counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Number Style
		// =====================
		$this->start_controls_section(
			'number_style',
			[
				'label' => __( 'Number', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-number-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '50',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '70',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-number-wrap',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-number-wrap',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-number-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Icon Style
		// =====================
		$this->start_controls_section(
			'icon_style',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon!' => ''
				]
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#d300d0',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
					'size' => '40'
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-icon i',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-icon i',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-counter-icon i',
			]
		);
		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-counter-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-counter-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Icon Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-counter">
			<?php if ( $data['icon'] ): ?>
				<div class="tortoiz-addons-counter-icon">
					<i class="<?php echo esc_attr($data['icon']); ?>"></i>
				</div>
			<?php endif; ?>

			<?php if ( $data['title'] && 'middle' == $data['title_position']): ?>
				<?php printf( '<h3 class="tortoiz-addons-counter-title">%1$s</h3>', $data['title'] ); ?>
			<?php endif; ?>

			<?php if ( $data['start_number'] && $data['stop_number'] ): ?>
				<div class="tortoiz-addons-counter-number-wrap">
					<?php if ( $data['prefix']): ?>
						<span class="tortoiz-addons-counter-prefix"><?php printf( '%s', $data['prefix'] ); ?></span>
					<?php endif; ?>

					<span class="tortoiz-addons-counter-number"
					data-duration="<?php echo esc_attr($data['speed']); ?>"
					data-to-value="<?php echo esc_attr($data['stop_number']); ?>"
					data-delimiter="<?php echo esc_attr($data['delimiter']); ?>">
						<?php printf( '%s', $data['start_number'] ); ?>
					</span>

					<?php if ( $data['suffix']): ?>
						<span class="tortoiz-addons-counter-suffix">
							<?php printf( '%s', $data['suffix'] ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $data['title'] && 'bottom' == $data['title_position'] ): ?>
				<?php printf( '<h3 class="tortoiz-addons-counter-title">%1$s</h3>', $data['title'] ); ?>
			<?php endif; ?>
		</div><!-- .tortoiz-addons-counter -->
		<?php
	}


	protected function _content_template() {

	}
}