<?php

/**
 * Visit Counter Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Visit_Counter_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_visit_counter';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Visit Counter', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-eye';
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
		return [ 'tortoizAddons visit counter', 'tortoizAddons visitor counter', 'tortoizAddons view counter' ];
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
		// Start Visit Counter
		// ====================
		$this->start_controls_section(
			'vc_content',
			[
				'label' => __( 'Visitor Count', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'today',
			[
				'label' => __( 'Today Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter text', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Today\'s visit',
			]
		);
		$this->add_control(
			'yesterday',
			[
				'label' => __( 'Yesterday Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter text', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Yesterday\'s visit',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Today at Top', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$this->add_responsive_control(
			'display',
			[
				'label' => __( 'Display', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block', 'tortoiz-addons-ext' ),
					'inline-block' => __( 'Inline', 'tortoiz-addons-ext' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-visit-number, {{WRAPPER}} .tortoiz-addons-visit-text' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .tortoiz-addons-visit-counter' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Visit Counter
		// ===================


		// Start Text Style
		// ============================
		$this->start_controls_section(
			'text_style',
			[
				'label' => __( 'Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-visit-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-visit-text',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-visit-text',
			]
		);

		$this->end_controls_section();
		// End Text Style
		// ===========================


		// Start Number Style
		// ============================
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
					'{{WRAPPER}} .tortoiz-addons-visit-number' => 'color: {{VALUE}};',
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
							'size' => '24',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-visit-number',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-visit-number',
			]
		);
		$this->add_responsive_control(
			'number_margin',
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
					'{{WRAPPER}} .tortoiz-addons-visit-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Number Style
		// ===========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$page_id = get_the_ID();
		$today = date( "Y-m-d" );

		$visit_data = get_post_meta( $page_id, 'tortoiz_addons_visit_counter', true);

		if ( !Plugin::instance()->editor->is_edit_mode() ) {
			if ( isset( $visit_data['tortoiz_addons_visit_date'] ) ) {
				$diff = date_diff( date_create( $today ), date_create( $visit_data['tortoiz_addons_visit_date'] ) );

				if ( 0 == $diff->days ) {
					$visit_data['tortoiz_addons_visit_today']++;
				} else {
					if ( 1 == $diff->days ) {
						$visit_data['tortoiz_addons_visit_yesterday'] = $visit_data['tortoiz_addons_visit_today'];
					} else{
						$visit_data['tortoiz_addons_visit_yesterday'] = 0;
					}
					$visit_today = 1;
					$visit_data['tortoiz_addons_visit_today'] = $visit_today;
					$visit_data['tortoiz_addons_visit_date'] = $today;
				}
				update_post_meta( $page_id, 'tortoiz_addons_visit_counter', $visit_data);

			} else{
				$visit_info = [
					'tortoiz_addons_visit_today' => 0,
					'tortoiz_addons_visit_yesterday' => 0,
					'tortoiz_addons_visit_date' => $today,
				];
				add_post_meta( $page_id, 'tortoiz_addons_visit_counter', $visit_info );
			}
		}
		?>
		<div class="tortoiz-addons-visit-counter" data-page="<?php echo esc_attr( $page_id ); ?>">
			<?php wp_nonce_field( 'tortoiz_addons_visit_counter', 'tortoiz_addons_visit_counter_nonce' ); ?>
			<?php if ( $data['today'] && 'yes' == $data['position'] ): ?>
				<div class="tortoiz-addons-today">
					<?php printf( '<h3 class="tortoiz-addons-visit-text">%1$s</h3>', $data['today'] ); ?>
					<?php if ( isset($visit_data['tortoiz_addons_visit_today']) ): ?>
						<span class="tortoiz-addons-visit-number tortoiz-addons-visit-today">
							<?php printf( '%s', $visit_data['tortoiz_addons_visit_today'] ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $data['yesterday'] ): ?>
				<div class="tortoiz-addons-yesterday">
					<?php printf( '<h3 class="tortoiz-addons-visit-text">%1$s</h3>', $data['yesterday'] ); ?>
					<?php if ( isset($visit_data['tortoiz_addons_visit_yesterday']) ): ?>
						<span class="tortoiz-addons-visit-number tortoiz-addons-visit-yesterday">
							<?php printf( '%s', $visit_data['tortoiz_addons_visit_yesterday'] ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $data['today'] && '' == $data['position'] ): ?>
				<div class="tortoiz-addons-today">
					<?php printf( '<h3 class="tortoiz-addons-visit-text">%1$s</h3>', $data['today'] ); ?>
					<?php if ( isset($visit_data['tortoiz_addons_visit_today']) ): ?>
						<span class="tortoiz-addons-visit-number tortoiz-addons-visit-today">
							<?php printf( '%s', $visit_data['tortoiz_addons_visit_today'] ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div><!-- .tortoiz-addons-visit-counter -->
		<?php
	}


	protected function _content_template() {

	}
}