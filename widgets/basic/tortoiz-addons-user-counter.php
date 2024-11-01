<?php

/**
 * User Counter Widget.
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

class Tortoiz_Addons_User_Counter_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_user_counter';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz User Counter', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-number-field';
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
		return [ 'tortoizAddons user counter', 'tortoizAddons counter' ];
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
		// Start User Counter
		// ====================
		$this->start_controls_section(
			'uc_content',
			[
				'label' => __( 'User Counter', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'roles',
			[
				'label' => esc_html__( 'Select Roles', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => tortoiz_addons_get_user_roles(),        
			]
		);
		$this->add_control(
			'prefix',
			[
				'label' => __( 'Prefix Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter prefix text', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Already registered',
			]
		);
		$this->add_control(
			'suffix',
			[
				'label' => __( 'Suffix Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter suffix text', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-uc-number, {{WRAPPER}} .tortoiz-addons-uc-text' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .tortoiz-addons-user-counter' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End User Counter
		// =================


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
					'{{WRAPPER}} .tortoiz-addons-uc-text' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-uc-text',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-uc-text',
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
					'{{WRAPPER}} .tortoiz-addons-uc-number' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-uc-number',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-uc-number',
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
					'{{WRAPPER}} .tortoiz-addons-uc-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Number Style
		// ===========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$roles = count_users();
		$roles = $roles['avail_roles'];
		$data_roles = '';

		$count = 0;

		if ( !empty($data['roles']) ) {
			foreach ($data['roles'] as $role) {
				$count += isset($roles[$role]) ? $roles[$role] : 0;
			}
			$data_roles = implode(',', $data['roles']);
		}
		?>
		<div class="tortoiz-addons-user-counter" data-roles="<?php echo esc_attr( $data_roles ); ?>">
			<?php wp_nonce_field( 'tortoiz_addons_user_counter', 'tortoiz_addons_user_counter_nonce' ); ?>
			<?php if ( $data['prefix'] ): ?>
				<?php printf( '<h3 class="tortoiz-addons-uc-text">%1$s</h3>', $data['prefix'] ); ?>
			<?php endif; ?>
			<span class="tortoiz-addons-uc-number"><?php printf( '%s', $count ); ?></span>
			<?php if ( $data['suffix'] ): ?>
				<?php printf( '<h3 class="tortoiz-addons-uc-text">%1$s</h3>', $data['suffix'] ); ?>
			<?php endif; ?>
		</div><!-- .tortoiz-addons-user-counter -->
		<?php
	}


	protected function _content_template() {

	}
}