<?php

/**
 * Brand Carousel Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Brand_Carousel_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_brand_carousel';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Brand Carousel', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-carousel';
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
		return [ 'tortoizAddons brand', 'tortoizAddons carousel', 'tortoizAddons logo' ];
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
	    	'owl-carousel',
	        'animate-merge',
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
	    	'jquery-owl',
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
		// Start Brand Content
		// =====================
		$this->start_controls_section(
			'brand_content',
			[
				'label' => __( 'Brand', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'brand_logo',
			[
				'label' => __( 'Choose Logo', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Brand Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Brand Name', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'tortoiz-addons-ext' ),
				'description' => __( 'This name will show only item header', 'tortoiz-addons-ext' ),
				'default' => 'Youtube',
			]
		);

		$repeater->start_controls_tabs( 'brand_tabs' );

		$repeater->start_controls_tab(
			'brand_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'brand_bg',
				'types' => ['classic'],
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}',
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'brand_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}',
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'brand_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'brand_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_hover_bg',
				'types' => ['classic'],
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}:hover',
			]
		);
		$repeater->add_control(
			'hover_brand_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner{{CURRENT_ITEM}}:hover',
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'brand',
			[
				'label' => __( 'Add Logo', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Youtube', 'tortoiz-addons-ext' ),
						'brand_logo' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/brand1.png',
						]
					],
					[
						'title' => __( 'Behance', 'tortoiz-addons-ext' ),
						'brand_logo' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/brand2.png',
						]
					],
					[
						'title' => __( 'Vimeo', 'tortoiz-addons-ext' ),
						'brand_logo' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/brand3.png',
						]
					],
					[
						'title' => __( 'Linkedin', 'tortoiz-addons-ext' ),
						'brand_logo' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/brand4.png',
						]
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		// End Brand Content
		// =====================


		// Start Carousel Settings
		// ========================
		$this->start_controls_section(
			'carousel_settings',
			[
				'label' => __( 'Carousel Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'show_item',
			[
				'label' => __( 'Show Item', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( '1', 'tortoiz-addons-ext' ),
					'2' => __( '2', 'tortoiz-addons-ext' ),
					'3' => __( '3', 'tortoiz-addons-ext' ),
					'4' => __( '4', 'tortoiz-addons-ext' ),
				],
				'desktop_default' => '4',
				'tablet_default' => '4',
				'mobile_default' => '2',
			]
		);
		Tortoiz_Addons_Common_Data::carousel_content($this, '', false);

		$this->end_controls_section();
		// End Carousel Content
		// =====================


		// Start Box Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Brand Box', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'logo_padding',
			[
				'label' => __( 'Logo Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'desktop_default' => [
					'top' => '20',
					'right' => '75',
					'bottom' => '20',
					'left' => '75',
					'isLinked' => false,
				],
				'tablet_default' => [
					'top' => '15',
					'right' => '35',
					'bottom' => '15',
					'left' => '35',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-brand-item-inner a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Box Padding', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-brand-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-brand-item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'box_tabs' );

		$this->start_controls_tab(
			'box_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'color' => [
						'default' => '#fafafa',
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner:hover',
			]
		);
		$this->add_control(
			'hover_box_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-brand-item-inner:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-brand-item-inner:hover',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Box Style
		// =====================


		// Start Center Style
		// =====================
		$this->start_controls_section(
			'center_item_style',
			[
				'label' => __( 'Center Item', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'center!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'scale',
			[
				'label' => __( 'Scale', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'step' => 0.1,
						'min' => 0.1,
						'max' => 5,
					],
				],
				'default' => [
					'size' => '1',
				],
				'selectors' => [
					'{{WRAPPER}} .active.center.owl-item' => 'transform: scale({{SIZE}}); z-index: 2;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'center_item_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .active.center .tortoiz-addons-brand-item-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'center_item_border',
				'selector' => '{{WRAPPER}} .active.center  .tortoiz-addons-brand-item-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'center_item_shadow',
				'selector' => '{{WRAPPER}} .active.center  .tortoiz-addons-brand-item-inner',
			]
		);

		$this->end_controls_section();
		// End Center Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-brand-carousel owl-carousel"
		data-item-lg="<?php echo esc_attr( $data['show_item'] ); ?>"
		data-item-md="<?php echo esc_attr( $data['show_item_tablet'] ); ?>"
		data-item-sm="<?php echo esc_attr( $data['show_item_mobile'] ); ?>"
		data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
		data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
		data-center="<?php echo esc_attr( $data['center'] ); ?>"
		data-slide-anim="<?php echo esc_attr( $data['slide_anim'] ); ?>"
		data-slide-anim-out="<?php echo esc_attr( $data['slide_anim_out'] ); ?>"
		data-nav="" data-dots=""
		data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
		data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
		data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
		data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
		data-delay="<?php echo esc_attr( $data['delay'] ); ?>">
			<?php foreach ($data['brand'] as $logo): ?>
				<?php if ( $logo['brand_logo']['url'] ): ?>
					<div class="tortoiz-addons-brand-item">
						<div class="tortoiz-addons-brand-item-inner elementor-repeater-item-<?php echo esc_attr( $logo[ '_id' ] ); ?>">
							<a <?php if ( $logo['link']['url'] ): ?>
									href="<?php echo esc_url( $logo['link']['url'] ); ?>"
									<?php if ( 'on' == $logo['link']['is_external'] ): ?>
										target="_blank" 
									<?php endif; ?>
									<?php if ( 'on' == $logo['link']['nofollow'] ): ?>
										rel="nofollow" 
									<?php endif; ?>
								<?php endif; ?>>
								<img src="<?php echo esc_url( $logo['brand_logo']['url'] ); ?>" alt="<?php echo esc_attr( $logo['title'] ); ?>">
							</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div><!-- .tortoiz-addons-brand-carousel -->
		<?php
	}


	protected function _content_template() {
		
	}
}