<?php

/**
 * Fancytext Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Tortoiz_Extension\Tortoiz_Addons_Ext_Gradient_Text;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Fancytext_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_fancytext';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Fancy Text', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-animation-text';
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
		return [ 'tortoizAddons fancy text', 'tortoizAddons slide text' ];
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
			'typed',
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
		// Start Fancytext Content
		// =====================
		$this->start_controls_section(
			'fancytext_content',
			[
				'label' => __( 'Fancy Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'fancy_items',
			[
				'label' => __( 'Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => 'Fancy text',
			]
		);

		$this->add_control(
			'fancy_text',
			[
				'label' => __( 'Fancy Text', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'fancy_items' => 'first text',
					],
					[
						'fancy_items' => 'second text',
					],
					[
						'fancy_items' => 'third text',
					],
					[
						'fancy_items' => 'fourth text',
					],
				],
				'title_field' => '{{{ fancy_items }}}',
			]
		);
		$this->add_control(
			'fancy_prefix',
			[
				'label' => __( 'Prefix Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter prefix text', 'tortoiz-addons-ext' ),
				'default' => 'Prefix text ',
			]
		);
		$this->add_control(
			'fancy_suffix',
			[
				'label' => __( 'Suffix Text', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter suffix text', 'tortoiz-addons-ext' ),
				'default' => ' Suffix text',
			]
		);

		$this->end_controls_section();
		// End Fancytext Content
		// =======================


		// Start Fancy Settings
		// ======================
		$this->start_controls_section(
			'fancy_settings',
			[
				'label' => __( 'Fancy Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'display',
			[
				'label' => __( 'Display', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline' => __( 'Inline', 'tortoiz-addons-ext' ),
					'block' => __( 'Block', 'tortoiz-addons-ext' ),
				],
				'default' => 'inline',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-fancytext-prefix, {{WRAPPER}} .tortoiz-addons-fancytext-suffix' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .tortoiz-addons-fancytext' => 'text-align: {{VALUE}};',
				],
			]
		);
		$animation = Tortoiz_Addons_Common_Data::animation();
		unset( $animation['none'] );
		$animation['typing'] = __( 'Typing', 'tortoiz-addons-ext' );

		$this->add_control(
			'animation_type',
			[
				'label' => __( 'Animation Type', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'typing',
				'options' => $animation,
			]
		);
		$this->add_control(
			'delay',
			[
				'label' => __( 'Delay', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 10000,
				'step' => 100,
				'default' => '2000'
			]
		);
		$this->add_control(
			'typing_speed',
			[
				'label' => __( 'Typing Speed', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 10000,
				'step' => 100,
				'default' => '100',
				'condition' => [
					'animation_type' => 'typing',
				],
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'animation_type' => 'typing',
				],
				'default' => 'yes',
			]
		);
		$this->add_control(
			'cursor',
			[
				'label' => __( 'Cursor', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tortoiz-addons-ext' ),
				'label_off' => __( 'Hide', 'tortoiz-addons-ext' ),
				'default' => 'yes',
				'condition' => [
					'animation_type' => 'typing',
				],
			]
		);
		$this->add_control(
			'cursor_color',
			[
				'label' => __( 'Cursor Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'condition' => [
					'cursor' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-fancytext .typed-cursor' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tag',
			[
				'label' => __( 'Selct Tag', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p' => 'p',
				],
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// End Fancy Settings
		// ====================


		// Start Fancy Style
		// =====================
		$this->start_controls_section(
			'fancy_style',
			[
				'label' => __( 'Fancy Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fancy_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-strings, {{WRAPPER}} .typed-cursor',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'fancy_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-strings',
			]
		);
		$this->add_group_control(
			Tortoiz_Addons_Ext_Gradient_Text::get_type(),
			[
				'name' => 'fancy_color',
				'fields_options' => [
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-strings, {{WRAPPER}} .tortoiz-addons-fancytext-strings > span.animated, {{WRAPPER}} .typed-cursor',
			]
		);

		$this->end_controls_section();
		// End Fancy Style
		// =====================


		// Start Prefix Style
		// =====================
		$this->start_controls_section(
			'prefix_style',
			[
				'label' => __( 'Prefix Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'fancy_prefix!' => ''
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'prefix_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-prefix',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'prefix_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-prefix',
			]
		);
		$this->add_group_control(
			Tortoiz_Addons_Ext_Gradient_Text::get_type(),
			[
				'name' => 'prefix_color',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-prefix',
			]
		);

		$this->end_controls_section();
		// End Prefix Style
		// =====================


		// Start Suffix Style
		// =====================
		$this->start_controls_section(
			'suffix_style',
			[
				'label' => __( 'Suffix Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'fancy_suffix!' => ''
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'suffix_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-suffix',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'suffix_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-suffix',
			]
		);
		$this->add_group_control(
			Tortoiz_Addons_Ext_Gradient_Text::get_type(),
			[
				'name' => 'suffix_color',
				'selector' => '{{WRAPPER}} .tortoiz-addons-fancytext-suffix',
			]
		);

		$this->end_controls_section();
		// End Suffix Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		$fancy_text = '';
		foreach ($data['fancy_text'] as $text) {
			$fancy_text .= $text['fancy_items'].'@@';
		}
		?>
		<div class="tortoiz-addons-fancytext"
		data-fancy-text="<?php echo esc_attr( $fancy_text ); ?>"
		data-anim="<?php echo esc_attr( $data['animation_type'] ); ?>"
		data-speed="<?php echo esc_attr( $data['typing_speed'] ); ?>"
		data-delay="<?php echo esc_attr( $data['delay'] ); ?>"
		data-cursor="<?php echo esc_attr( $data['cursor'] ); ?>"
		data-loop="<?php echo esc_attr( $data['loop'] ); ?>">
			<<?php printf( '%s', $data['tag'] ); ?>>
			<?php
				if ( $data['fancy_prefix'] ) :
					?>
					<span class="tortoiz-addons-fancytext-prefix">
						<?php printf( '%s', $data['fancy_prefix'] ); ?>
					</span>
					<?php
				endif;

				if ( 'typing' == $data['animation_type'] ) :
					?>
					<span class="tortoiz-addons-fancytext-strings">
						<?php printf( '%s', $data['fancy_text'][0]['fancy_items'] ); ?>
					</span>
					<?php
				else :
					?>
					<span class="tortoiz-addons-fancytext-strings">
						<?php printf( '%s', rtrim($fancy_text, '@@') ); ?>
					</span>
					<?php
				endif;

				if ( $data['fancy_suffix'] ) :
					?>
					<span class="tortoiz-addons-fancytext-suffix">
						<?php printf( '%s', $data['fancy_suffix'] ); ?>
					</span>
					<?php
				endif;
			?>
			</<?php printf( '%s', $data['tag'] ); ?>>
		</div><!-- .tortoiz-addons-fancytext -->
		<?php
	}


	protected function _content_template() {

	}
}