<?php

/**
 * Accordion Widget.
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
use \Elementor\Frontend;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Accordion_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_accordion';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Accordion', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-accordion';
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
		return [  'tortoizAddons accordion', 'tortoizAddons panel', 'tortoizAddons faq' ];
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
		// Start Accordion Content
		// =====================
		$this->start_controls_section(
			'accordion_content',
			[
				'label' => __( 'Accordion', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'first_open',
			[
				'label' => __( 'First Item Open', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-down',
			]
		);
		$this->add_control(
			'active_icon',
			[
				'label' => __( 'Active Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-up',
			]
		);
		$this->add_control(
			'icon_position',
			[
				'label' => __( 'Icon Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
				],
				'default' => 'right',
				'condition' => [
					'icon!' => '',
					'active_icon!' => '',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter Title', 'tortoiz-addons-ext'),
				'default' => 'Web Development',
			]
		);
		$repeater->add_control(
			'save_templates',
			[
				'label' => __( 'Use Save Templates', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$repeater->add_control(
			'template',
			[
				'label' => __( 'Choose Template', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => tortoiz_addons_get_page_templates(),
				'condition' => [
					'save_templates!' => '',
				],
				'description' => __('NOTE: Don\'t try to edit after insertion template. If you need to change the style or layout then you try to change the main template then save and then insert', 'tortoiz-addons-ext'),
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label' => __('Description', 'tortoiz-addons-ext'),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'condition' => [
					'save_templates' => '',
				],
			]
		);

		$this->add_control(
			'accordion',
			[
				'label' => __('Add Item', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'Web Development',
						'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
					],
					[
						'title' => 'Graphics Design',
						'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
					],
					[
						'title' => 'Digital Marketing',
						'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		// End Accordion Content
		// =====================


		// Start Box Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Box', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
		// =====================


		// Start Header Style
		// =====================
		$this->start_controls_section(
			'header_style',
			[
				'label' => __( 'Header', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-header, {{WRAPPER}} .tortoiz-addons-accordion-icon',
			]
		);

		$this->start_controls_tabs( 'header_tabs' );

		$this->start_controls_tab(
			'header_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-header' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'header_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-header',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-header',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'header_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-header',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'header_hover',
			[
				'label' => __( 'Active', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'title_active_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-item.open .tortoiz-addons-accordion-header' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_active_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .tortoiz-addons-accordion-item.open .tortoiz-addons-accordion-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'active_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item.open .tortoiz-addons-accordion-header',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_active_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item.open .tortoiz-addons-accordion-header',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'header_active_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-item.open .tortoiz-addons-accordion-header',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'header_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '25',
					'bottom' => '15',
					'left' => '25',
					'isLinked' => false,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Header Style
		// =====================


		// Start Desc Style
		// =====================
		$this->start_controls_section(
			'desc_style',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'desc_border',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-accordion-body',
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Desc Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-accordion"
		data-open-first="<?php echo esc_attr( $data['first_open'] ); ?>">
			<?php
				foreach ($data['accordion'] as $index => $item) :
					$open_class = '';
					if ( 0 == $index && 'yes' == $data['first_open'] ) {
						$open_class = 'open';
					}

					$desc_key = $this->get_repeater_setting_key( 'desc', 'accordion', $index );

					$this->add_render_attribute( $desc_key, 'class', 'tortoiz-addons-accordion-desc' );
					$this->add_inline_editing_attributes( $desc_key );
				?>
				<div class="tortoiz-addons-accordion-item <?php echo esc_attr( $open_class ); ?>">
					<h4 class="tortoiz-addons-accordion-header tortoiz-addons-flex">
						<?php if ( 'left' == $data['icon_position']): ?>
							<span class="tortoiz-addons-accordion-icon">
								<i class="<?php echo esc_attr( $data['icon']); ?> off"></i>
								<i class="<?php echo esc_attr( $data['active_icon']); ?> on"></i>
							</span>
						<?php endif ?>
						<?php printf( '%s', $item['title'] ); ?>
						<?php if ( 'right' == $data['icon_position']): ?>
							<span class="tortoiz-addons-accordion-icon">
								<i class="<?php echo esc_attr( $data['icon']); ?> off"></i>
								<i class="<?php echo esc_attr( $data['active_icon']); ?> on"></i>
							</span>
						<?php endif ?>
					</h4>
					<div class="tortoiz-addons-accordion-body">
						<?php
							if ( 'yes' == $item['save_templates'] && $item['template'] ) :
								$frontend = new Frontend;
								echo $frontend->get_builder_content( $item['template'], true );
							else:
								?>
								<div <?php echo $this->get_render_attribute_string( $desc_key ); ?>>
									<?php printf( '%s', $item['desc'] ); ?>
								</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div><!-- .tortoiz-addons-accordion -->
		<?php
	}


	protected function _content_template() {

	}
}