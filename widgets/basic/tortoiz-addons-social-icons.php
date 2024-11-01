<?php
/**
 * Social Icons Widget.
 *
 * @since 2.3.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Social_Icons_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 2.3.0
	 */
	public function get_name() {
		return 'tortoiz_addons_social_icons';
	}

	/**
	 * Get widget title.
	 *
	 * @since 2.3.0
	 */
	public function get_title() {
		return __( 'Tortoiz Social Icons', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 2.3.0
	 */
	public function get_icon() {
		return 'eicon-social-icons';
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
		return [ 'tortoizAddons social icons', 'tortoizAddons icons', 'tortoizAddons socials' ];
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
		// Start Social Icons
		// ===================
		$this->start_controls_section(
			'social_content',
			[
				'label' => __( 'Social Icons', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
			]
		);
		$repeater->add_control(
			'social_name',
			[
				'label' => __( 'Name', 'tortoiz-addons-ext' ),
				'description' => __( 'This name will be show in the item header', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Facebook',
			]
		);

		$repeater->start_controls_tabs( 'icon_tabs' );

		$repeater->start_controls_tab(
			'icon_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$repeater->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i' => 'background: {{VALUE}};',
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i',
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'icon_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$repeater->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_hover_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i:hover' => 'background: {{VALUE}}'
				],
			]
		);
		$repeater->add_control(
			'icon_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social {{CURRENT_ITEM}} i:hover',
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'social_icons',
			[
				'label' => __( 'Add Social Icon', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => 'fa fa-facebook',
						'link' => [
							'url' => 'https://facebook.com',
						],
						'social_name' => 'Facebook',
					],
					[
						'icon' => 'fa fa-twitter',
						'link' => [
							'url' => 'https://twitter.com',
						],
						'social_name' => 'Twitter',
					],
					[
						'icon' => 'fa fa-linkedin',
						'link' => [
							'url' => 'https://linkedin.com',
						],
						'social_name' => 'Linkedin',
					],
				],
				'title_field' => '{{{ social_name }}}',
			]
		);

		$this->end_controls_section();
		// End Social Icons
		// =================


		// Start Social Icons
		// ===================
		$this->start_controls_section(
			'social_style',
			[
				'label' => __( 'Social Icons', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'display',
			[
				'label' => __( 'Display', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline-block' => __( 'Inline', 'tortoiz-addons-ext' ),
					'block' => __( 'Block', 'tortoiz-addons-ext' ),
				],
				'default' => 'inline-block',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'font_size',
			[
				'label' => __( 'Font Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '14',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
			[
				'label' => __( 'Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'em' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'em' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'font_line_height',
			[
				'label' => __( 'Line Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'icon_tabs' );

		$this->start_controls_tab(
			'social_icon_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'social_icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'social_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-social li i',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'social_icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social li i',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'social_icon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social li i',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'social_icon_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'social_icon_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#055394',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-social li i:hover',
			]
		);
		$this->add_control(
			'social_icon_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'social_icon_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-social li i:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => '%',
					'top' => '50',
					'right' => '50',
					'bottom' => '50',
					'left' => '50',
					'isLinked' => true,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-social li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-social li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-social' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Social Icons
		// =================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-social-icons">
			<ul class="tortoiz-addons-social">
				<?php
					foreach ($data['social_icons'] as $index => $icon):
					?>
					<li class="elementor-repeater-item-<?php echo esc_attr( $icon[ '_id' ] ); ?>">
						<a href="<?php echo esc_url( $icon['link']['url'] ); ?>"
						<?php if ( 'on' == $icon['link']['is_external'] ): ?>
							target="_blank" 
						<?php endif; ?>
						<?php if ( 'on' == $icon['link']['nofollow'] ): ?>
							rel="nofollow" 
						<?php endif; ?>>
							<i class="<?php echo esc_attr( $icon['icon'] ); ?>"></i>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div><!-- .tortoiz-addons-social-icons -->
		<?php
	}


	protected function _content_template() {

	}
}