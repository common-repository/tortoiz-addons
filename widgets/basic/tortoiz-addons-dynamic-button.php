<?php

/**
 * Dynamic Button Widget.
 *
 * @since 2.3.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Dynamic_Button_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 2.3.0
	 */
	public function get_name() {
		return 'tortoiz_addons_dynamic_button';
	}

	/**
	 * Get widget title.
	 *
	 * @since 2.3.0
	 */
	public function get_title() {
		return __( 'Tortoiz Dynamic Button', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 2.3.0
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 2.3.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-extension' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.3.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons button', 'tortoizAddons gradient button', 'tortoizAddons dynamic button', 'tortoizAddons advance button' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 2.3.0
	 */
	public function get_style_depends() {
		return [
			'tortoiz-addons-widgets',
		];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 2.3.0
	 */
	protected function _register_controls() {
		// Start Buttons Content
		// ======================
		$this->start_controls_section(
			'button_content',
			[
				'label' => __( 'Button Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'btn_effect',
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
		$this->add_control(
			'btn_type',
			[
				'label' => __( 'Button Type', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'static' => __( 'Static', 'tortoiz-addons-ext' ),
					'page' => __( 'Page', 'tortoiz-addons-ext' ),
					'taxonomy' => __( 'Taxonomy', 'tortoiz-addons-ext' ),
				],
				'default' => 'static',
			]
		);
		$this->add_control(
			'btn_page',
			[
				'label' => __( 'Select Page', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => tortoiz_addons_get_page_lists(),
				'condition' => [
					'btn_type' => 'page',
				]
			]
		);
		$taxonomy_lists = tortoiz_addons_get_taxonomy_lists();
		$this->add_control(
			'btn_taxonomy',
			[
				'label' => __( 'Select Taxonomy', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => $taxonomy_lists,
				'default' => 'category',
				'condition' => [
					'btn_type' => 'taxonomy',
				]
			]
		);
		foreach ( $taxonomy_lists as $tax_name => $tax_val) {
			$this->add_control(
				'btn_'.$tax_name,
				[
					'label' => __( 'Select '.$tax_val, 'tortoiz-addons-ext' ),
					'type' => Controls_Manager::SELECT,
					'options' => tortoiz_addons_get_term_lists($tax_name),
					'condition' => [
						'btn_type' => 'taxonomy',
						'btn_taxonomy' => $tax_name,
					]
				]
			);
		}
		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Label', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Label', 'tortoiz-addons-ext' ),
				'default' => 'Click Here',
				'condition' => [
					'btn_type' => 'static',
				]
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
				'condition' => [
					'btn_type' => 'static',
				]
			]
		);
		$this->add_control(
			'btn_icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
			]
		);
		$this->add_control(
			'btn_icon_align',
			[
				'label' => __( 'Icon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
				],
				'default' => 'right',
				'condition' => [
					'btn_icon!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_space',
			[
				'label' => __( 'Icon Spacing', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '5',
				],
				'condition' => [
					'btn_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-dynamic-btn .tortoiz-addons-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tortoiz-addons-dynamic-btn .tortoiz-addons-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'css_id',
			[
				'label' => __( 'CSS ID', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter ID', 'tortoiz-addons-ext' ),
				'description' => __( 'Make sure this ID unique', 'tortoiz-addons-ext' ),
				'condition' => [
					'btn_type' => 'static',
				]
			]
		);

		$this->end_controls_section();
		// End Button Content
		// ===================


		// Start Button Style
		// ===================
		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button Style', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-dynamic-btn' );
		$this->add_responsive_control(
			'btn_width',
			[
				'label' => __( 'Min Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-dynamic-btn' => 'min-width: {{SIZE}}{{UNIT}};;',
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
					'{{WRAPPER}} .tortoiz-addons-dynamic-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'top' => '12',
					'right' => '25',
					'bottom' => '12',
					'left' => '25',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-dynamic-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-dynamic-button' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		$btn_text = $data['btn_text'];
		if ( 'page' == $data['btn_type'] ) {
			$btn_text = get_the_title( $data['btn_page'] );
			$btn_link = get_page_link( $data['btn_page'] );
		} elseif ( 'taxonomy' == $data['btn_type'] && $data['btn_'.$data['btn_taxonomy']] ) {
			$term_id = (int)$data['btn_'.$data['btn_taxonomy']];
			$btn_text = get_term( $term_id )->name;
			$btn_link = get_term_link( $term_id );
		} else{
			$btn_link = $data['btn_link']['url'];
		}
		$data['btn_text'] = $btn_text;
		?>
		<div class="tortoiz-addons-dynamic-button">
			<a  class="tortoiz-addons-dynamic-btn <?php echo esc_attr($data['btn_effect']); ?>" href="<?php echo esc_url( $btn_link ); ?>"
				<?php if ( $data['css_id'] ): ?>
					id="<?php echo esc_attr( $data['css_id'] ); ?>"
				<?php endif; ?>
				<?php if ('static' == $data['btn_type'] && 'on' == $data['btn_link']['is_external']): ?>
					target="_blank" 
				<?php endif; ?>
				<?php if ('static' == $data['btn_type'] && 'on' == $data['btn_link']['nofollow']): ?>
					rel="nofollow" 
				<?php endif; ?>>
					<?php Tortoiz_Addons_Common_Data::button_html($data); ?>
			</a>
		</div><!-- .tortoiz-addons-dynamic-button -->
		<?php
	}


	protected function _content_template() {

	}
}