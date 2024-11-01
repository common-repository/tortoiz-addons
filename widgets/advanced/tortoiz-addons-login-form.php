<?php

/**
 * Login Form Widget.
 *
 * @since 3.1.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Plugin;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Login_Form_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 3.1.0
	 */
	public function get_name() {
		return 'tortoiz_addons_login_form';
	}

	/**
	 * Get widget title.
	 *
	 * @since 3.1.0
	 */
	public function get_title() {
		return __( 'Tortoiz Login Form', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 3.1.0
	 */
	public function get_icon() {
		return 'eicon-editor-external-link';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 3.1.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-ext-advanced' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 3.1.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons login form', 'tortoizAddons form', 'tortoizAddons email' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 3.1.0
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
	 * @since 3.1.0
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
	 * @since 3.1.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Form Content
		// ====================
		$this->start_controls_section(
			'form_content',
			[
				'label' => __( 'Form Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'email_placeholder',
			[
				'label' => __( 'Email Placeholder Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Placeholder Text', 'tortoiz-addons-ext' ),
				'default' => 'Enter Email *',
			]
		);
		$this->add_control(
			'password_placeholder',
			[
				'label' => __( 'Password Placeholder Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Placeholder Text', 'tortoiz-addons-ext' ),
				'default' => 'Enter Password *',
			]
		);
		$this->add_control(
			'redirect_url',
			[
				'label' => __( 'Redirect URL after login', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Redirect URL', 'tortoiz-addons-ext' ),
				'default' => admin_url(),
			]
		);
		$this->add_control(
			'remember_login',
			[
				'label' => __( 'Remember text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Remember Text', 'tortoiz-addons-ext' ),
				'default' => 'Keep me logged in',
			]
		);

		$this->end_controls_section();
		// End Form Content
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
		Tortoiz_Addons_Common_Data::button_content($this, '.tortoiz-addons-login-btn', 'Log In', 'btn', false);
		$this->end_controls_section();
		// End Button Content
		// ====================


		// Start Fields Style
		// ====================
		$this->start_controls_section(
			'fields_style',
			[
				'label' => __( 'Fields & Remember text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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

		$this->add_control(
			'remember',
			[
				'label' => __( 'Remember styles', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'middle' => __( 'Middle', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
				],
				'default' => 'middle',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'remember_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-login-remember-wrap',
			]
		);
		$this->add_control(
			'remember_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-login-remember-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'remember_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-login-remember-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Fields Style
		// ==================


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


		// Start Password Style
		// ===================
		$this->start_controls_section(
			'password_style',
			[
				'label' => __( 'Password', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::input_style( $this, '.tortoiz-addons-input-password', 'password' );
		$this->end_controls_section();
		// End Password Style
		// ====================


		// Start Button Style
		// =====================
		$this->start_controls_section(
			'btn_style',
			[
				'label' => __( 'Submit Button', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-login-btn' );
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
					'{{WRAPPER}} .tortoiz-addons-login-btn' => 'width: {{SIZE}}{{UNIT}};',
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
					'top' => '4',
					'right' => '4',
					'bottom' => '4',
					'left' => '4',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-login-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '13',
					'right' => '25',
					'bottom' => '13',
					'left' => '25',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-login-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'top' => '20',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-login-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-login-form' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$id = $this->get_id();
		?>
		<div class="tortoiz-addons-form">
			<form class="tortoiz-addons-login-form"
			data-uid="<?php echo esc_attr( $this->get_id() ); ?>"
			data-url="<?php echo esc_url( $data['redirect_url'] ); ?>">

				<input class="tortoiz-addons-input-field tortoiz-addons-input-email" type="email" placeholder="<?php echo esc_attr( $data['email_placeholder'] ); ?>" >
				<input class="tortoiz-addons-input-field tortoiz-addons-input-password" type="password" placeholder="<?php echo esc_attr( $data['password_placeholder'] ); ?>" >

				<?php if ( 'middle' == $data['position'] ): ?>
					<div class="tortoiz-addons-login-remember-wrap">
						<input id="<?php echo esc_attr( $id ); ?>" type="checkbox" class="tortoiz-addons-login-remember">
						<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $data['remember_login'] ); ?></label>
					</div>
				<?php endif ?>

				<button type="submit" class="tortoiz-addons-button tortoiz-addons-login-btn <?php echo esc_attr( $data['btn_effect']); ?>">
					<?php Tortoiz_Addons_Common_Data::button_html($data); ?>
				</button>

				<?php if ( 'bottom' == $data['position'] ): ?>
					<div class="tortoiz-addons-login-remember-wrap">
						<input id="<?php echo esc_attr( $id ); ?>" type="checkbox" class="tortoiz-addons-login-remember">
						<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $data['remember_login'] ); ?></label>
					</div>
				<?php endif ?>

				<p class="tortoiz-addons-login-error"></p>

				<?php wp_nonce_field( 'tortoiz_addons_login', 'tortoiz_addons_login_nonce'.$this->get_id() ); ?>
			</form><!-- .tortoiz-addons-login-form -->
		</div><!-- .tortoiz-addons-form -->
		<?php
	}


	protected function _content_template() {

	}
}