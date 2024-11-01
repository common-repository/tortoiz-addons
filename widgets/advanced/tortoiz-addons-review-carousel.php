<?php

/**
 * Review Carousel Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Review_Carousel_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_review_carousel';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Tortoiz Review Carousel', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-testimonial';
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
		return [ 'tortoizAddons client', 'tortoizAddons review', 'tortoizAddons testimonial' ];
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
		// Start Review Content
		// =====================
		$this->start_controls_section(
			'review_content',
			[
				'label' => __( 'Review', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => TORTOIZ_EXT_URL .'assets/img/choose-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'name',
			[
				'label' => __( 'Name', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'tortoiz-addons-ext' ),
				'default' => 'Jhon Doe',
			]
		);
		$repeater->add_control(
			'position',
			[
				'label' => __( 'Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Position', 'tortoiz-addons-ext' ),
				'default' => 'CEO',
			]
		);
		$repeater->add_control(
			'company',
			[
				'label' => __( 'Organization', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Organization', 'tortoiz-addons-ext' ),
				'default' => 'Google',
			]
		);
		$repeater->add_control(
			'comment',
			[
				'label' => __( 'Comment', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Comment', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At tempora cumque delectus nam obcaecati consectetur ad dolorum neque dolores nemo!',
			]
		);

		$this->add_control(
			'review',
			[
				'label' => __( 'Add Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/review1.jpg',
						],
						'name' => 'Jhin Stalker',
						'position' => 'CEO',
						'company' => 'Google',
						'comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At tempora cumque delectus nam obcaecati consectetur ad dolorum neque dolores nemo!',
					],
					[
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/review2.jpg',
						],
						'name' => 'Jhon Doe',
						'position' => 'Web Developer',
						'company' => 'Facebook',
						'comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At tempora cumque delectus nam obcaecati consectetur ad dolorum neque dolores nemo!',
					],
					[
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/review3.jpg',
						],
						'name' => 'Jhan Stalker',
						'position' => 'Graphic Designer',
						'company' => 'Behance',
						'comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At tempora cumque delectus nam obcaecati consectetur ad dolorum neque dolores nemo!',
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();
		// End Review Content
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
				'type' => Controls_Manager::HIDDEN,
				'default' => '1',
			]
		);
		Tortoiz_Addons_Common_Data::carousel_content( $this, '.tortoiz-addons-review-carousel' );

		$this->end_controls_section();
		// End Carousel Settings
		// ======================


		// Start Image Style
		// =====================
		$this->start_controls_section(
			'image_style',
			[
				'label' => __( 'Image', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_position',
			[
				'label' => __( 'Image Position', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'tortoiz-addons-ext' ),
					'middle' => __( 'Middle', 'tortoiz-addons-ext' ),
					'bottom' => __( 'Bottom', 'tortoiz-addons-ext' ),
				],
				'default' => 'top',
			]
		);
		$this->add_responsive_control(
			'image_size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
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
					'size' => '130',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-face' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tortoiz-addons-review-face' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-face' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_radius',
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
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-face' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-face',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-face',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		// End Image Style
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
					'{{WRAPPER}} .tortoiz-addons-review-name' => 'color: {{VALUE}};',
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
					'line_height'   => [
						'default' => [
							'size' => '32',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-name',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-name',
			]
		);
		$this->add_responsive_control(
			'name_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '20',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Name Style
		// =====================


		// Start Positin Style
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
					'{{WRAPPER}} .tortoiz-addons-review-position' => 'color: {{VALUE}};',
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
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-position',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-position',
			]
		);
		$this->add_responsive_control(
			'position_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Position Style
		// =====================


		// Start Company Style
		// =====================
		$this->start_controls_section(
			'company_style',
			[
				'label' => __( 'Company', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'company_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-company' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'company_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_size'   => [
						'default' => [
							'size' => '16',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-company',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'company_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-company',
			]
		);
		$this->add_responsive_control(
			'company_margin',
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
					'{{WRAPPER}} .tortoiz-addons-review-company' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Company Style
		// =====================


		// Start Comment Style
		// =====================
		$this->start_controls_section(
			'comment_style',
			[
				'label' => __( 'Comment', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'comment_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-comment' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comment_typography',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-comment',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_shadow',
				'selector' => '{{WRAPPER}} .tortoiz-addons-review-comment',
			]
		);
		$this->add_responsive_control(
			'comment_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-review-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Company Style
		// =====================


		// Start Nav & Dots Style
		// ===========================
		$this->start_controls_section(
			'nav_dots_style',
			[
				'label' => __( 'Nav & Dots', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::nav_dots_style( $this, '.tortoiz-addons-review-carousel' );

		$this->end_controls_section();
		// End Nav & Dots Style
		// ==========================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-review-carousel owl-carousel"
		data-item-lg="1" data-item-md="1" data-item-sm="1"
		data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
		data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
		data-center=""
		data-slide-anim="<?php echo esc_attr( $data['slide_anim'] ); ?>"
		data-slide-anim-out="<?php echo esc_attr( $data['slide_anim_out'] ); ?>"
		data-nav="<?php echo esc_attr( $data['nav'] ); ?>"
		data-dots="<?php echo esc_attr( $data['dots'] ); ?>"
		data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
		data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
		data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
		data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
		data-delay="<?php echo esc_attr( $data['delay'] ); ?>">
		<?php
			foreach ($data['review'] as $index => $item) :
				$name_key = $this->get_repeater_setting_key( 'name', 'review', $index );
				$position_key = $this->get_repeater_setting_key( 'position', 'review', $index );
				$company_key = $this->get_repeater_setting_key( 'company', 'review', $index );
				$comment_key = $this->get_repeater_setting_key( 'comment', 'review', $index );

				$this->add_render_attribute( $name_key, 'class', 'tortoiz-addons-review-name' );
				$this->add_inline_editing_attributes( $name_key );

				$this->add_render_attribute( $position_key, 'class', 'tortoiz-addons-review-position' );
				$this->add_inline_editing_attributes( $position_key );

				$this->add_render_attribute( $company_key, 'class', 'tortoiz-addons-review-company' );
				$this->add_inline_editing_attributes( $company_key );

				$this->add_render_attribute( $comment_key, 'class', 'tortoiz-addons-review-comment' );
				$this->add_inline_editing_attributes( $comment_key );
			?>
			<div class="tortoiz-addons-review-item">
				<?php include TORTOIZ_EXT_LAYOUT.'/review-carousel/'.$data['image_position'].'.php'; ?>
			</div>
		<?php endforeach; ?>
		</div><!-- .tortoiz-addons-review-carousel -->
		<?php
	}


	protected function _content_template() {
		
	}
}