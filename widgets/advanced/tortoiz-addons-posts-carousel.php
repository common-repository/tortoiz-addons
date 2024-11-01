<?php
/**
 * Posts Carousel Widget.
 *
 * @since 2.2.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Posts_Carousel_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 2.2.0
	 */
	public function get_name() {
		return 'tortoiz_addons_posts_carousel';
	}

	/**
	 * Get widget title.
	 *
	 * @since 2.2.0
	 */
	public function get_title() {
		return __( 'Tortoiz Posts Carousel', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 2.2.0
	 */
	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 2.2.0
	 */
	public function get_categories() {
		return [ 'tortoiz-addons-ext-advanced' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.2.0
	 */
	public function get_keywords() {
		return [ 'tortoizAddons posts carousel', 'tortoizAddons carousel', 'tortoizAddons blog post', 'tortoizAddons blogpost' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 2.2.0
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
	 * @since 2.2.0
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
	 * @since 2.2.0
	 */
	protected function _register_controls() {
		// Start Posts Content
		// ====================
		$this->start_controls_section(
			'posts_content',
			[
				'label' => __( 'Posts Content', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'categories',
			[
				'label' => esc_html__( 'Categories', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => tortoiz_addons_get_categories(),
			]
		);
		Tortoiz_Addons_Common_Data::posts_content($this);
		$this->add_control(
			'posts_meta',
			[
				'label' => __( 'Meta', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'posts_excerpt',
			[
				'label' => __( 'Excerpt', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'posts_text',
			[
				'label' => __( 'Content', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tortoiz-addons-ext' ),
				'label_off' => __( 'No', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'posts_txt_len',
			[
				'label' => __( 'Text Word', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'min' => 1,
				'max' => 500,
				'default' => 10,
			]
		);

		$this->end_controls_section();
		// End Posts Content
		// ==================


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
				'desktop_default' => '2',
				'tablet_default' => '2',
				'mobile_default' => '1',
			]
		);
		Tortoiz_Addons_Common_Data::carousel_content( $this, '.tortoiz-addons-posts-carousel' );

		$this->end_controls_section();
		// End Carousel Settings
		// ======================


		// Start Post Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Post', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 50,
					],
				],
				'default' => [
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-thumb',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-thumb',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '40',
					'right' => '20',
					'bottom' => '40',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'right' => '15',
					'bottom' => '0',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-posts-carousel .owl-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'vertical_align',
			[
				'label' => __( 'Verticle Align', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'tortoiz-addons-ext' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => __( 'Center', 'tortoiz-addons-ext' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => __( 'Right', 'tortoiz-addons-ext' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'flex-end',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-thumb' => 'align-items: {{VALUE}};',
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
					'{{WRAPPER}} .tortoiz-addons-pc-content' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay',
			[
				'label' => __( 'Overlay Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 'box_overlay_tabs' );

		$this->start_controls_tab(
			'box_overlay_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
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
						'default' => 'rgba(0,0,0,0.4)',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-thumb .tortoiz-addons-overlay',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_overlay_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'overlay_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => 'rgba(0,0,0,0.6)',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-thumb:hover .tortoiz-addons-overlay',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Post Style
		// =====================


		// Start Title Style
		// =====================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'tortoiz-addons-ext' ),
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
							'size' => '24',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-title, {{WRAPPER}} .tortoiz-addons-pc-title a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-title a',
			]
		);

		$this->start_controls_tabs( 'title_tabs' );

		$this->start_controls_tab(
			'title_normal',
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
					'{{WRAPPER}} .tortoiz-addons-pc-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-title a:hover, {{WRAPPER}} .tortoiz-addons-pc-title a:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Meta Style
		// =====================
		$this->start_controls_section(
			'meta_style',
			[
				'label' => __( 'Meta', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'posts_meta!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '18',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-meta, {{WRAPPER}} .tortoiz-addons-pc-meta a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'meta_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-meta, {{WRAPPER}} .tortoiz-addons-pc-meta a',
			]
		);
		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-meta' => 'color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'link_tabs' );

		$this->start_controls_tab(
			'link_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'link_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-meta a:hover, {{WRAPPER}} .tortoiz-addons-pc-meta a:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'meta_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '8',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Meta Style
		// =====================


		// Start Text Style
		// =====================
		$this->start_controls_section(
			'text_style',
			[
				'label' => __( 'Text', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '15',
						],
					],
					'line_height'   => [
						'default' => [
							'size' => '20',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-text',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-pc-text',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-pc-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Text Style
		// =================


		// Start Nav & Dots Style
		// ===========================
		$this->start_controls_section(
			'nav_dots_style',
			[
				'label' => __( 'Nav & Dots', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::nav_dots_style( $this, '.tortoiz-addons-posts-carousel' );

		$this->end_controls_section();
		// End Nav & Dots Style
		// ==========================


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
			Group_Control_Border::get_type(),
			[
				'name' => 'center_item_border',
				'selector' => '{{WRAPPER}} .active.center  .tortoiz-addons-pc-thumb',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'center_item_shadow',
				'selector' => '{{WRAPPER}} .active.center  .tortoiz-addons-pc-thumb',
			]
		);

		$this->end_controls_section();
		// End Center Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$new_offset = $data['offset'] + ( ( $paged - 1 ) * $data['posts_num'] );
		$category	= !empty($data['categories']) ? implode( ',', $data['categories'] ) : '';
		$default	= [
			'category_name'		=> $category,
			'orderby'			=> [ $data['order_by'] => $data['sort'] ],
			'posts_per_page'	=> $data['posts_num'],
			'paged'				=> $paged,
			'offset'			=> $new_offset,
			'has_password'		=> false,
			'post_status'		=> 'publish',
			'post__not_in'		=> get_option( 'sticky_posts' ),
		];

		$excerpt = $data['posts_excerpt'];
		$txt_len = $data['posts_txt_len'];
		// Post Query
		$post_query = new WP_Query( $default );
		if ( $post_query->have_posts() ) :
			?>
			<div class="tortoiz-addons-posts-carousel owl-carousel"
			data-item-lg="<?php echo esc_attr( $data['show_item'] ); ?>"
			data-item-md="<?php echo esc_attr( $data['show_item_tablet'] ); ?>"
			data-item-sm="<?php echo esc_attr( $data['show_item_mobile'] ); ?>"
			data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
			data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
			data-center="<?php echo esc_attr( $data['center'] ); ?>"
			data-slide-anim="<?php echo esc_attr( $data['slide_anim'] ); ?>"
			data-slide-anim-out="<?php echo esc_attr( $data['slide_anim_out'] ); ?>"
			data-nav="<?php echo esc_attr( $data['nav'] ); ?>"
			data-dots="<?php echo esc_attr( $data['dots'] ); ?>"
			data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
			data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
			data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
			data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
			data-delay="<?php echo esc_attr( $data['delay'] ); ?>">
				<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
					<div class="tortoiz-addons-pc-thumb tortoiz-addons-bg-cover tortoiz-addons-flex"
						<?php if ( has_post_thumbnail() ): ?>
							style="background-image: url(<?php the_post_thumbnail_url(); ?>);"
						<?php else: ?>
							style="background-image: url(<?php echo esc_url( TORTOIZ_EXT_URL .'assets/img/featured-img.jpg' ); ?>);"
						<?php endif; ?>>
						<div class="tortoiz-addons-overlay"></div>
						<div class="tortoiz-addons-pc-content">
							<h2 class="tortoiz-addons-pc-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php if ( 'yes' == $data['posts_meta'] ): ?>
								<div class="tortoiz-addons-pc-meta">
									<?php the_author_posts_link(); ?>
									|
									<?php printf( '%s', get_the_date() ); ?>
								</div>
							<?php endif; ?>
							<?php if (  'yes' == $excerpt && has_excerpt() ): ?>
								<div class="tortoiz-addons-pc-text">
									<?php
										$excerpt = preg_replace( '/'. get_shortcode_regex() .'/', '', get_the_excerpt() );
										echo wp_kses_post( wp_trim_words( $excerpt, $txt_len ) );
									?>
								</div>
							<?php elseif ( 'yes' == $data['posts_text'] ): ?>
								<div class="tortoiz-addons-pc-text">
									<?php
										$content = preg_replace( '/'. get_shortcode_regex() .'/', '', get_the_content() );
										echo wp_kses_post( wp_trim_words( $content, $txt_len ) );
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			</div><!-- .tortoiz-addons-posts-carousel -->
			<?php
		else:
			?>
				<h3><?php _e('No Posts found', 'tortoiz-addons-ext'); ?></h3>
			<?php
		endif;
	}


	protected function _content_template() {

	}
}