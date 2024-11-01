<?php

/**
 * Piechart Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Piechart_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_piechart';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Piechart', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-counter-circle';
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
		return [ 'tortoizAddons piechart', 'tortoizAddons chart' ];
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
			'easypiechart',
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
		// Start piecharts Content
		// =========================
		$this->start_controls_section(
			'piecharts_content',
			[
				'label' => __( 'Piechart', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Web Development',
			]
		);
		$this->add_control(
			'value',
			[
				'label' => __( 'Value', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'default' => 75,
			]
		);
		$this->add_control(
			'max_value',
			[
				'label' => __( 'Max Value', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'default' => 100,
			]
		);
		$this->add_control(
			'prefix',
			[
				'label' => __( 'Prefix', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter prefix', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'suffix',
			[
				'label' => __( 'Suffix', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter suffix', 'tortoiz-addons-ext' ),
				'default' => '%',
			]
		);
		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'default' => [
					'size' => 250,
				],
			]
		);
		$this->add_control(
			'speed',
			[
				'label' => __( 'Animation Duration', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2000,
				'min' => 100,
				'max' => 10000,
				'step' => 100,
			]
		);

		$this->end_controls_section();
		// End piecharts Content
		// =======================


		// Start Chart Style
		// =====================
		$this->start_controls_section(
			'chart_style',
			[
				'label' => __( 'Chart', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label' => __('Bar Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
			]
		);
		$this->add_control(
			'bar_width',
			[
				'label' => __('Bar Width', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
			]
		);
		$this->add_control(
			'bar_cap',
			[
				'label' => __( 'Bar Cap', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'round' => __( 'Round', 'tortoiz-addons-ext' ),
					'square' => __( 'Square', 'tortoiz-addons-ext' ),
				],
				'default' => 'square',
			]
		);
		$this->add_control(
			'track_color',
			[
				'label' => __('Track Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
			]
		);
		$this->add_control(
			'track_width',
			[
				'label' => __('Track Width', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
			]
		);
		$this->add_control(
			'scale_color',
			[
				'label' => __('Scale Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
			]
		);

		$this->end_controls_section();
		// End Chart Style
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
			'title_position',
			[
				'label' => __( 'Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
				],
				'default' => 'bottom',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-piechart-title' => 'color: {{VALUE}};',
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
							'size' => '16',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-piechart-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-piechart-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-piechart-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Value Style
		// ========================
		$this->start_controls_section(
			'value_style',
			[
				'label' => __( 'Value', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'value_color',
			[
				'label' => __('Text Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-piechart-percent' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',
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
							'size' => '50',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-piechart-percent',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'value_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-piechart-percent',
			]
		);

		$this->end_controls_section();
		// End Value Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$percent = 100;
		if ( $data['value'] && $data['max_value'] ) {
			$percent = round( $data['value'] / $data['max_value'] * 100 );
		}
		?>
		<div class="tortoiz-addons-piechart" style="width: <?php echo esc_attr( $data['size']['size'] ); ?>px; height: <?php echo esc_attr( $data['size']['size'] ); ?>px;">
			<div class="tortoiz-addons-piechart-wrap"
			data-track="<?php echo esc_attr( $data['track_color'] ); ?>"
			data-track-width="<?php echo esc_attr( $data['track_width']['size'] ); ?>"
			data-bar="<?php echo esc_attr( $data['bar_color'] ); ?>"
			data-line="<?php echo esc_attr( $data['bar_width']['size'] ); ?>"
			data-cap="<?php echo esc_attr( $data['bar_cap'] ); ?>"
			data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
			data-scale="<?php echo esc_attr( $data['scale_color'] ); ?>"
			data-size="<?php echo esc_attr( $data['size']['size'] ); ?>"
			data-percent="<?php echo esc_attr( $percent ); ?>">
			</div>
			<div class="tortoiz-addons-piechart-content tortoiz-addons-flex">
				<div class="tortoiz-addons-piechart-center">
					<?php if ( 'bottom' == $data['title_position'] ): ?>
						<span class="tortoiz-addons-piechart-percent">
							<?php printf( '%s', $data['prefix'].$data['value'].$data['suffix'] ); ?>
						</span>
					<?php endif; ?>
					<?php if ( $data['title'] ): ?>
						<?php printf( '<h3 class="tortoiz-addons-piechart-title">%1$s</h3>', $data['title'] ); ?>
					<?php endif; ?>
					<?php if ( 'top' == $data['title_position'] ): ?>
						<span class="tortoiz-addons-piechart-percent">
							<?php printf( '%s', $data['prefix'].$data['value'].$data['suffix'] ); ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- .tortoiz-addons-piechart -->
		<?php
	}


	protected function _content_template() {

	}
}