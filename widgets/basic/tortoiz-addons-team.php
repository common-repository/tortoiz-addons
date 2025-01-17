<?php

/**
 * Team Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Team_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_team';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Team', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-person';
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
		return [ 'tortoizAddons team', 'tortoizAddons member' ];
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
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Team Content
		// =====================
		$this->start_controls_section(
			'team_content',
			[
				'label' => __( 'Member', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'name',
			[
				'label' => __( 'Name', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'tortoiz-addons-ext' ),
				'default' => 'Jhon Doe',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Position', 'tortoiz-addons-ext' ),
				'default' => 'CEO',
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'lable_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, autem amet. Labore eos cum at, et illo ducimus.',
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/team.jpg',
				],
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
					'{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i' => 'background: {{VALUE}};',
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i',
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i',
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
					'{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_hover_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i:hover' => 'background: {{VALUE}}'
				],
			]
		);
		$repeater->add_control(
			'icon_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social {{CURRENT_ITEM}} i:hover',
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
		// End Team Content
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
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team, {{WRAPPER}} .tortoiz-addons-team-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
		// =====================


		// Start Overlay Style
		// =====================
		$this->start_controls_section(
			'overlay_style',
			[
				'label' => __( 'Overlay', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'effects',
			[
				'label' => __( 'Effects', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-team-move' => __( 'Move', 'tortoiz-addons-ext' ),
					'tortoiz-addons-team-zoom' => __( 'Zoom', 'tortoiz-addons-ext' ),
					'tortoiz-addons-team-zoom tortoiz-addons-team-move' => __( 'Move & Zoom', 'tortoiz-addons-ext' ),
					'' => __( 'None', 'tortoiz-addons-ext' ),
				],
				'default' => 'tortoiz-addons-team-move',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'overlay_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => 'rgba(31,140,231,0.9)',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-overlay',
			]
		);
		$this->add_responsive_control(
			'overlay_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '60',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Overlay Style
		// =====================


		// Start Name Style
		// =====================
		$this->start_controls_section(
			'name_style',
			[
				'label' => __( 'Name', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-name' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
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
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-name',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-name',
			]
		);
		$this->add_responsive_control(
			'name_margin',
			[
				'label' => __( 'Margin Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Name Style
		// =====================


		// Start Position Style
		// =====================
		$this->start_controls_section(
			'position_style',
			[
				'label' => __( 'Position', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'position_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-position' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-position',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-position',
			]
		);
		$this->add_responsive_control(
			'position_margin',
			[
				'label' => __( 'Margin Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Position Style
		// =====================


		// Start Description Style
		// =========================
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
					'{{WRAPPER}} .tortoiz-addons-team-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-desc',
			]
		);

		$this->end_controls_section();
		// End Description Style
		// =====================


		// Start Icon Style
		// =====================
		$this->start_controls_section(
			'icon_style',
			[
				'label' => __( 'Social Icon', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .tortoiz-addons-team-social li i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social li i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-team-social li i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'team_icon_tabs' );

		$this->start_controls_tab(
			'team_icon_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'team_icon_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social li i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'team_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#222',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social li i',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'team_icon_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social li i',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_icon_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social li i',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'team_icon_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'team_icon_hover_color',
			[
				'label' => __( 'Icon Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social li i:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'team_icon_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#fafafa',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social li i:hover',
			]
		);
		$this->add_control(
			'team_icon_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-team-social li i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_icon_hover_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-team-social li i:hover',
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
					'{{WRAPPER}} .tortoiz-addons-team-social li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tortoiz-addons-team-social li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Icon Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		if ( $data['image']['url'] ):
			?>
			<div class="tortoiz-addons-team <?php echo esc_attr( $data['effects'] ); ?>">
				<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['name'] ); ?>">
				<div class="tortoiz-addons-team-overlay tortoiz-addons-overlay">
					<?php if ( $data['name'] ): ?>
						<h5 class="tortoiz-addons-team-name">
							<?php printf( '%s', $data['name'] ); ?>
						</h5>
					<?php endif; ?>

					<?php if ( $data['position'] ): ?>
						<h6 class="tortoiz-addons-team-position">
							<?php printf( '%s', $data['position'] ); ?>
						</h6>
					<?php endif; ?>

					<?php if ( $data['desc'] ): ?>
						<div class="tortoiz-addons-team-desc">
							<?php printf( '%s', $data['desc'] ); ?>
						</div>
					<?php endif; ?>

					<ul class="tortoiz-addons-team-social">
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
				</div>
			</div><!-- .tortoiz-addons-team -->
		<?php
		endif;
	}


	protected function _content_template() {

	}
}