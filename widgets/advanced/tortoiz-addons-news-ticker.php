<?php

/**
 * News Ticker Widget.
 *
 * @since 1.1.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_News_Ticker_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.1.0
	 */
	public function get_name() {
		return 'tortoiz_addons_news_ticker';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.1.0
	 */
	public function get_title() {
		return __( 'Tortoiz News Ticker', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.1.0
	 */
	public function get_icon() {
		return 'eicon-t-letter';
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
		return [ 'tortoizAddons news ticker', 'tortoizAddons posts ticker', 'tortoizAddons post', 'tortoizAddons blog post', 'tortoizAddons news scroll', 'tortoizAddons posts scroll' ];
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
		// Start Ticker Content
		// =====================
		$this->start_controls_section(
			'ticker_content',
			[
				'label' => __( 'Ticker Content', 'tortoiz-addons-ext' ),
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
		$this->end_controls_section();
		// End Ticker Content
		// ===================


		// Start Ticker Settings
		// ======================
		$this->start_controls_section(
			'ticker_settings',
			[
				'label' => __( 'Ticker Settings', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'label_text',
			[
				'label' => __( 'Label Text', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Latest News',
			]
		);
		$this->add_control(
			'label_position',
			[
				'label' => __( 'Label Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' =>[
					'left' => __( 'Left', 'tortoiz-addons-ext' ),
					'right' => __( 'Right', 'tortoiz-addons-ext' ),
					'both' => __( 'Both', 'tortoiz-addons-ext' ),
				],
				'condition' => [
					'label_text!' => '',
				],
				'default' => 'both',
			]
		);
		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause On Hover', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		$this->add_control(
			'show_time',
			[
				'label' => __( 'Time', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'speed',
			[
				'label' => __( 'Scroll Speed', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 5,
				'default' => 15,
			]
		);

		$this->end_controls_section();
		// End Ticker Settings
		// ====================


		// Start Label Style
		// =====================
		$this->start_controls_section(
			'label_style',
			[
				'label' => __( 'Label', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size' => [
						'default' => [
							'size' => '16',
						],
					],
					'line_height' => [
						'default' => [
							'size' => '24',
						],
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'label_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'label_BG',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#1085e4',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label',
			]
		);
		$this->add_responsive_control(
			'label_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'label_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '15',
					'right' => '20',
					'bottom' => '15',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-nt-left-label, {{WRAPPER}} .tortoiz-addons-nt-right-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End label Style
		// =================


		// Start Headline Style
		// =====================
		$this->start_controls_section(
			'headline_style',
			[
				'label' => __( 'Headline', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'headline_tabs' );

		$this->start_controls_tab(
			'headline_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'headline_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-news a' => 'color: {{VALUE}}'
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'headline_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);
		$this->add_control(
			'headline_hover_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-news a:hover, {{WRAPPER}} .tortoiz-addons-news a:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'headline_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
					'line_height' => [
						'default' => [
							'size' => '18',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-news a',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'headline_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-news a',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'headline_BG',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],
					'color' => [
						'default' => '#f8f8f8',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-news-ticker',
			]
		);
		$this->add_responsive_control(
			'headline_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-news-ticker' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'headline_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '18',
					'right' => '18',
					'bottom' => '18',
					'left' => '18',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-news a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Headline Style
		// ====================


		// Start Time Style
		// =====================
		$this->start_controls_section(
			'time_style',
			[
				'label' => __( 'Time', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_time' => 'yes',
				],
			]
		);

		$this->add_control(
			'time_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-news a span' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'time_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-news a span',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'time_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-news a span',
			]
		);

		$this->end_controls_section();
		// End Time Style
		// ================
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
		// Post Query
		$post_query = new WP_Query( $default );
		?>
		<div class="tortoiz-addons-news-ticker"
		data-pause="<?php echo esc_attr( $data['pause_on_hover'] ); ?>"
		data-speed="<?php echo esc_attr( $data['speed'] ); ?>">
			<?php if ( $data['label_text'] && ('left' == $data['label_position'] || 'both' == $data['label_position']) ): ?>
				<div class="tortoiz-addons-nt-left-label"><?php printf( '%s', $data['label_text'] ); ?></div>
			<?php endif; ?>

			<div class="tortoiz-addons-news-wrapper">
				<div class="tortoiz-addons-news-container">
					<div class="tortoiz-addons-news-content">
						<?php if ( $post_query->have_posts() ) : ?>
							<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
								<div class="tortoiz-addons-news">
									<a href="<?php the_permalink(); ?>">
										<?php if( 'yes' == $data['show_time'] ): ?>
											<span><?php the_time(); ?></span>
										<?php endif; ?>
										<?php the_title(); ?>
									</a>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						<?php else: ?>
							<div class="tortoiz-addons-news">
								<a><?php _e($data['label_text']. ' not published yet', 'tortoiz-addons-ext'); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php if ( $data['label_text'] && 'both' == $data['label_position'] ): ?>
				<div class="tortoiz-addons-nt-right-label tortoiz-addons-nt-label-both"><?php printf( '%s', $data['label_text'] ); ?></div>
			<?php elseif ( $data['label_text'] && 'right' == $data['label_position'] ): ?>
				<div class="tortoiz-addons-nt-right-label"><?php printf( '%s', $data['label_text'] ); ?></div>
			<?php endif ?>
		</div><!-- .tortoiz-addons-news-ticker -->
		<?php
	}


	protected function _content_template() {

	}
}