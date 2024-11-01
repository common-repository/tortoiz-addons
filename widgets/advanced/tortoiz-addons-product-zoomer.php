<?php

/**
 * Product Zoomer Widget.
 *
 * @since 1.1.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Product_Zoomer_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.1.0
	 */
	public function get_name() {
		return 'tortoiz_addons_product_zoomer';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.1.0
	 */
	public function get_title() {
		return __( 'Tortoiz Product Zoomer', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.1.0
	 */
	public function get_icon() {
		return 'eicon-zoom-in';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.1.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-ext-advanced' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.1.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons product zoomer', 'tortoizAddons zoomer', 'tortoizAddons product viewer' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 1.1.0
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
	 * @since 1.1.0
	 */
	public function get_script_depends() {
		return [
			'xzoom',
			'tortoiz-addons-widgets',
		];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 */
	protected function _register_controls() {
		// Start Product Zoomer Content
		// =============================
		$this->start_controls_section(
			'product_content',
			[
				'label' => __( 'Product Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Product Title', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Nice Car',
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Product Description', 'tortoiz-addons-ext' ),
				'description' => __( 'You can use HTML.', 'tortoiz-addons-ext' ),
				'default' => 'Price: $100',
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-image-link', 'tortoiz-addons-ext' ),
				'default' => [
					'url' => '',
				],
				'condition' => [
					'title!' => '',
				],
			]
		);
		$this->add_control(
			'content_position',
			[
				'label' => __( 'Content Bottom', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();
		// End Product Zoomer Content
		// ===========================


		// Start Product Images
		// ======================
		$this->start_controls_section(
			'product_images',
			[
				'label' => __( 'Product Images', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __('Title', 'tortoiz-addons-ext'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'tortoiz-addons-ext' ),
				'description' => __( 'This title will be show only item header', 'tortoiz-addons-ext' ),
				'default' => 'Image Title',
			]
		);
		$repeater->add_control(
			'original_image',
			[
				'label' => __( 'Original Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'preview_image',
			[
				'label' => __( 'Thumb Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'thumb_image',
			[
				'label' => __( 'Preview Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);

		$this->add_control(
			'product_imgs',
			[
				'label' => __('Add Images', 'tortoiz-addons-ext'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'Car One',
						'original_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-original1.jpg',
						],
						'preview_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-preview1.jpg',
						],
						'thumb_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-thumb1.jpg',
						]
					],
					[
						'title' => 'Car two',
						'original_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-original2.jpg',
						],
						'preview_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-preview2.jpg',
						],
						'thumb_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-thumb2.jpg',
						]
					],
					[
						'title' => 'Car Three',
						'original_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-original3.jpg',
						],
						'preview_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-preview3.jpg',
						],
						'thumb_image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/car-thumb3.jpg',
						]
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'thumbs',
			[
				'label' => __( 'Show Preview', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Zoomer Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'lens' => __( 'Lens', 'tortoiz-addons-ext' ),
					'top' => __( 'Top', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
				],
				'default' => 'lens',
			]
		);
		$this->add_control(
			'lens_shape',
			[
				'label' => __( 'Lens Shape', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'tortoiz-addons-ext' ),
					'box' => __( 'Box', 'tortoiz-addons-ext' ),
				],
				'condition' => [
					'position' => 'lens',
				],
				'default' => 'circle',
			]
		);

		$this->end_controls_section();
		// End Product Images
		// ====================


		// Start Product Title Style
		// ===========================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-product-title, {{WRAPPER}} .tortoiz-addons-product-title a' => 'color: {{VALUE}};',
				],
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
							'size' => '24',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-product-title, {{WRAPPER}} .tortoiz-addons-product-title a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-product-title, {{WRAPPER}} .tortoiz-addons-product-title a',
			]
		);
		$this->add_responsive_control(
			'title_alignment',
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
					'justify' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-product-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-product-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Product Title Style
		// =========================


		// Start Product Desc Style
		// ===========================
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
					'{{WRAPPER}} .tortoiz-addons-product-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
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
				'selector' => '{{WRAPPER}} .tortoiz-addons-product-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-product-desc',
			]
		);
		$this->add_responsive_control(
			'desc_alignment',
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
					'justify' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-product-desc' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-product-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Product Desc Style
		// =========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-product-zoomer"
		data-position="<?php echo esc_attr( $data['position'] ) ?>"
		data-shape="<?php echo esc_attr( $data['lens_shape'] ) ?>">
			<?php if ( '' == $data['content_position'] ): ?>
				<?php if ( $data['title'] ): ?>
					<h3 class="tortoiz-addons-product-title">
						<?php if ( $data['link']['url'] ): ?>
							<a href="<?php echo esc_url( $data['link']['url'] ); ?>"
								<?php if ( 'on' == $data['link']['is_external'] ): ?>
									target="_blank" 
								<?php endif; ?>
								<?php if ( 'on' == $data['link']['nofollow'] ): ?>
									rel="nofollow" 
								<?php endif; ?>>
								<?php printf( '%1$s', $data['title'] ); ?>
							</a>
						<?php else: ?>
							<?php printf( '%1$s', $data['title'] ); ?>
						<?php endif; ?>
					</h3>
				<?php endif; ?>
				<?php if ( $data['desc'] ): ?>
					<?php printf( '<div class="tortoiz-addons-product-desc">%1$s</div>', $data['desc'] ); ?>
				<?php endif; ?>
			<?php endif; ?>

			<img class="xzoom" src="<?php echo esc_url( $data['product_imgs'][0]['preview_image']['url'] ); ?>" data-xoriginal="<?php echo esc_url( $data['product_imgs'][0]['original_image']['url'] ); ?>" alt="<?php echo esc_attr( $data['title'] ) ?>">

			<?php if ( 'yes' == $data['thumbs'] ): ?>
				<div class="xzoom-thumbs">
					<?php foreach ( $data['product_imgs'] as $img ) : ?>
						<div class="xzoom-thumb-item"
						style="width: <?php echo esc_attr( 100 / count( $data['product_imgs'] ) ); ?>%;"
						data-link="<?php echo esc_url( $img['original_image']['url'] ); ?>">
							<?php if ( $img['preview_image']['url'] && $img['thumb_image']['url']): ?>
								<img class="xzoom-gallery"
								src="<?php echo esc_url( $img['thumb_image']['url'] ); ?>"
								data-xpreview="<?php echo esc_url( $img['preview_image']['url'] ); ?>"  alt="<?php echo esc_attr( $data['title'] ) ?>">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( 'yes' == $data['content_position'] ): ?>
				<?php if ( $data['title'] ): ?>
					<h3 class="tortoiz-addons-product-title">
						<?php if ( $data['link']['url'] ): ?>
							<a href="<?php echo esc_url( $data['link']['url'] ); ?>"
								<?php if ( 'on' == $data['link']['is_external'] ): ?>
									target="_blank" 
								<?php endif; ?>
								<?php if ( 'on' == $data['link']['nofollow'] ): ?>
									rel="nofollow" 
								<?php endif; ?>>
								<?php printf( '%1$s', $data['title'] ); ?>
							</a>
						<?php else: ?>
							<?php printf( '%1$s', $data['title'] ); ?>
						<?php endif; ?>
					</h3>
				<?php endif; ?>
				<?php if ( $data['desc'] ): ?>
					<?php printf( '<div class="tortoiz-addons-product-desc">%1$s</div>', $data['desc'] ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .tortoiz-addons-image-zoomer -->
		<?php
	}


	protected function _content_template() {

	}
}