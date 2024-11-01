<?php

/**
 * Progressbar Widget.
 *
 * @since 1.0.0
 */


use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Progressbar_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_progressbar';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Progressbar', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-skill-bar';
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
		return [ 'tortoizAddons progressbar', 'tortoizAddons bar' ];
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
		// Start Progressbars Content
		// ===========================
		$this->start_controls_section(
			'progressbars_content',
			[
				'label' => __( 'Progressbar', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter Title', 'tortoiz-addons-ext'),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Web Development',
			]
		);
		$this->add_control(
			'percentage',
			[
				'label' => __( 'Value', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'default' => 90,
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

		$this->end_controls_section();
		// End Progressbars Content
		// ==========================


		// Start Progressbars Style
		// ==========================
		$this->start_controls_section(
			'progressbars_style',
			[
				'label' => __( 'Progressbar', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'bars_height',
			[
				'label' => __('Height', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em'],
				'default' => [
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bar_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#fafafa',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-bg',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bar_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-bg',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bars_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-bg',
			]
		);
		$this->add_responsive_control(
			'bars_border_radius',
			[
				'label' => __('Border Radius', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-bg, {{WRAPPER}} .tortoiz-addons-bar-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'track',
			[
				'label' => __( 'Track Style', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'track_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-content',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'track_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-content',
			]
		);

		$this->end_controls_section();
		// End Progressbars Style
		// =========================


		// Start Title Style
		// =====================

		$this->start_controls_section(
			'title_style',
			[
				'label' => __('Title', 'tortoiz-addons-ext'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::COLOR,
				'default'=> '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-title' => 'color: {{VALUE}};',
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
							'size' => '16',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_tshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __('Bottom Margin', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::SLIDER,
				'default'=> [
					'size' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_align',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Percentage Style
		// =========================
		$this->start_controls_section(
			'percentage_style',
			[
				'label' => __('Percentage', 'tortoiz-addons-ext'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-percent' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percentage_typography',
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
							'size' => '14',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-percent',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'percentage_tshadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-bar-percent',
			]
		);
		$this->add_responsive_control(
			'percentage_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-bar-percent' => 'padding: 0 {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'percentage_align',
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
					'{{WRAPPER}} .tortoiz-addons-bar-percent' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Percentage Style
		// ======================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$percent = 100;
		if ( $data['percentage'] && $data['max_value']) {
			$percent = round( $data['percentage'] / $data['max_value'] * 100 );
		}
		?>
		<div class="tortoiz-addons-progressbars">
			<?php if ( $data['title'] ): ?>
				<?php printf( '<h3 class="tortoiz-addons-bar-title">%1$s</h3>', $data['title'] ); ?>
			<?php endif; ?>

			<div class="tortoiz-addons-bar-bg">
				<div class="tortoiz-addons-bar-content tortoiz-addons-flex" data-percentage="<?php echo esc_attr( $percent ); ?>">
					<span class="tortoiz-addons-bar-percent">
							<?php printf( '%s', $data['prefix'].$data['percentage'].$data['suffix'] ); ?>
					</span>
				</div>
			</div>
		</div><!-- .tortoiz-addons-progressbars -->
		<?php
	}


	protected function _content_template() {

	}
}