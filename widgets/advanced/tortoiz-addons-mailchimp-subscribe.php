<?php

/**
 * Mailchim Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Mailchimp_Subscribe_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_mc_subscribe';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz MailChimp', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
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
		return [ 'tortoizAddons form', 'tortoizAddons subscribe form', 'tortoizAddons mailchimp', 'tortoizAddons email' ];
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
		// Start Fields Content
		// =====================
		$this->start_controls_section(
			'fields_content',
			[
				'label' => __( 'Fields', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'api_url',
			[
				'label' => 'If you would like to change the API key <a target="_blank" href="admin.php?page=tortoiz_addons_ext_settings">click here</a>',
				'type' => Controls_Manager::RAW_HTML,
				'separator' => 'after',
			]
		);
		$this->add_control(
			'email_placeholder',
			[
				'label' => __( 'Email placeholder text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter placeholder text', 'tortoiz-addons-ext' ),
				'default' => 'Enter Email',
			]
		);
		$this->add_control(
			'fname',
			[
				'label' => __( 'First Name', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'fname_placeholder',
			[
				'label' => __( 'First name placeholder text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter placeholder text', 'tortoiz-addons-ext' ),
				'condition' => [
					'fname!' => '',
				],
				'default' => 'Enter First Name',
			]
		);
		$this->add_control(
			'lname',
			[
				'label' => __( 'Last Name', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'lname_placeholder',
			[
				'label' => __( 'Last name placeholder text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter placeholder text', 'tortoiz-addons-ext' ),
				'condition' => [
					'lname!' => '',
				],
				'default' => 'Enter Last Name',
			]
		);
		$this->add_control(
			'phone',
			[
				'label' => __( 'Phone Number', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'phone_placeholder',
			[
				'label' => __( 'Phone placeholder text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter placeholder text', 'tortoiz-addons-ext' ),
				'condition' => [
					'phone!' => '',
				],
				'default' => 'Enter Phone Number',
			]
		);

		$this->end_controls_section();
		// End Fields Content
		// =====================


		// Start Button Content
		// =====================
		$this->start_controls_section(
			'btn_content',
			[
				'label' => __( 'Submit Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		Tortoiz_Addons_Common_Data::button_content($this, '.tortoiz-addons-subs-btn', 'Subscribe', 'btn', false);
		$this->end_controls_section();
		// End Button Content
		// =====================


		// Start Fields Style
		// =====================
		$this->start_controls_section(
			'fields_style',
			[
				'label' => __( 'Fields', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'display',
			[
				'label' => __( 'Display', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline-block' => __( 'Inline', 'tortoiz-addons-ext' ),
					'block' => __( 'Block', 'tortoiz-addons-ext' ),
				],
				'default' => 'inline-block',
			]
		);
		Tortoiz_Addons_Common_Data::input_fields_style( $this );
		$this->add_responsive_control(
			'fields_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => true,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'fields_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '12',
					'bottom' => '10',
					'left' => '12',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'fields_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-input-field' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Fields Style
		// =====================


		// Start First Name Style
		// ========================
		$this->start_controls_section(
			'fname_style',
			[
				'label' => __( 'First Name', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'fname!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::input_style( $this, '.tortoiz-addons-input-fname', 'fname' );
		$this->end_controls_section();
		// End First Name Style
		// ========================


		// Start Last Name Style
		// =======================
		$this->start_controls_section(
			'lname_style',
			[
				'label' => __( 'Last Name', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'lname!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::input_style( $this, '.tortoiz-addons-input-lname', 'lname' );
		$this->end_controls_section();
		// End Last Name Style
		// ========================


		// Start Email Style
		// ===================
		$this->start_controls_section(
			'email_style',
			[
				'label' => __( 'Email', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::input_style( $this, '.tortoiz-addons-input-email' );
		$this->end_controls_section();
		// End Email Style
		// =================


		// Start Phone Style
		// ===================
		$this->start_controls_section(
			'phone_style',
			[
				'label' => __( 'Phone', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'phone!' => '',
				],
			]
		);
		Tortoiz_Addons_Common_Data::input_style( $this, '.tortoiz-addons-input-phone', 'phone' );
		$this->end_controls_section();
		// End Phone Style
		// =====================


		// Start Button Style
		// =====================
		$this->start_controls_section(
			'btn_style',
			[
				'label' => __( 'Submit Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-subs-btn' );
		$this->add_responsive_control(
			'btn_width',
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
					'{{WRAPPER}} .tortoiz-addons-subs-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-subs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'desktop_default' => [
					'top' => '13',
					'right' => '25',
					'bottom' => '13',
					'left' => '25',
					'isLinked' => false,
				],
				'mobile_default' => [
					'top' => '13',
					'right' => '15',
					'bottom' => '13',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-subs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '-4',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-subs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition' => [
					'display!' => 'inline-block',
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-subs-form' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$display_class = ('block' == $data['display']) ? 'tortoiz-addons-input-block' : '';
		?>
		<div class="tortoiz-addons-form">
			<form class="tortoiz-addons-subs-form"
			data-uid="<?php echo esc_attr( $this->get_id() ); ?>">
				<div class="tortoiz-addons-subs-input">
					<?php if ( $data['fname'] ): ?>
						<input class="tortoiz-addons-input-field tortoiz-addons-input-fname <?php echo esc_attr( $display_class ); ?>" type="text" placeholder="<?php echo esc_attr( $data['fname_placeholder'] ); ?>">
					<?php endif; ?>

					<?php if ( $data['lname'] ): ?>
						<input class="tortoiz-addons-input-field tortoiz-addons-input-lname <?php echo esc_attr( $display_class ); ?>" type="text" placeholder="<?php echo esc_attr( $data['lname_placeholder'] ); ?>">
					<?php endif; ?>

					<input class="tortoiz-addons-input-field tortoiz-addons-input-email <?php echo esc_attr( $display_class ); ?>" type="email" placeholder="<?php echo esc_attr( $data['email_placeholder'] ); ?> *">

					<?php if ( $data['phone'] ): ?>
						<input class="tortoiz-addons-input-field tortoiz-addons-input-phone <?php echo esc_attr( $display_class ); ?>" type="tel" placeholder="<?php echo esc_attr( $data['phone_placeholder'] ); ?>">
					<?php endif; ?>

					<button type="submit" class="tortoiz-addons-button tortoiz-addons-subs-btn <?php echo esc_attr( $data['btn_effect']); ?>">
						<?php Tortoiz_Addons_Common_Data::button_html($data); ?>
					</button>
				</div>
				<p class="tortoiz-addons-subs-success"></p>
				<p class="tortoiz-addons-subs-error"></p>
				<p class="tortoiz-addons-subs-process"><?php _e( 'Processing...', 'tortoiz-addons-ext' ); ?></p>

				<?php wp_nonce_field( 'tortoiz_addons_mc_subscribe', 'tortoiz_addons_mc_subscribe_nonce'.$this->get_id() ); ?>
			</form><!-- .tortoiz-addons-subs-form -->
		</div><!-- .tortoiz-addons-form -->
		<?php
	}


	protected function _content_template() {

	}
}