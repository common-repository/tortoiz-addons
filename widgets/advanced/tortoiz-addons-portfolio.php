<?php

/**
 * Portfolio Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Plugin;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tortoiz_Addons_Portfolio_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'tortoiz_addons_portfolio';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Portfolio', 'tortoiz-addons-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-gallery-justified';
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
		return [ 'tortoizAddons portfolio', 'tortoizAddons work', 'tortoizAddons gallery', 'tortoizAddons filter' ];
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
			'magnific-popup',
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
			'magnific-popup',
			'imagesLoaded',
			'isotope',
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
		// Start Portfolio Content
		// ========================
		$this->start_controls_section(
			'portfolio_content',
			[
				'label' => __( 'Portfolio', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'effects',
			[
				'label' => __( 'Overlay Effects', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-pf-effect-fade' => __( 'Fade', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-effect-zoom' => __( 'Zoom', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-effect-move' => __( 'Fade & Buttons Move', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-effect-zoom tortoiz-addons-pf-effect-move' => __( 'Zoom & Buttons Move', 'tortoiz-addons-ext' ),
				],
				'default' => 'tortoiz-addons-pf-effect-move',
			]
		);
		$this->add_control(
			'columns',
			[
				'label' => __( 'Number of Column', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-pf-item-2' => __( '2', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-3' => __( '3', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-4' => __( '4', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-5' => __( '5', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-6' => __( '6', 'tortoiz-addons-ext' ),
					'masonry' => __( 'Masonry', 'tortoiz-addons-ext' ),
				],
				'default' => 'tortoiz-addons-pf-item-3',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_name',
			[
				'label' => __( 'Item Name', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Item Name', 'tortoiz-addons-ext' ),
				'default' => 'Lorem ipsum dolor sit amet',
			]
		);
		$repeater->add_control(
			'category',
			[
				'label' => __( 'Category', 'tortoiz-addons-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'description' => __( 'Multiple category must be comma separated.', 'tortoiz-addons-ext' ),
				'default' => 'Web Design',
			]
		);
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
			'size',
			[
				'label' => __( 'Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'tortoiz-addons-pf-item-11' => __( '1 Column 1 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-12' => __( '1 Column 2 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-21' => __( '2 Column 1 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-22' => __( '2 Column 2 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-31' => __( '3 Column 1 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-32' => __( '3 Column 2 Row', 'tortoiz-addons-ext' ),
					'tortoiz-addons-pf-item-33' => __( '3 Column 3 Row', 'tortoiz-addons-ext' ),
				],
				'description' => __( 'Size will work if the <strong>"number of columns"</strong> is <strong>"Masonry"</strong> selected', 'tortoiz-addons-ext' ),
				'default' => 'tortoiz-addons-pf-item-22',
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tortoiz-addons-ext' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'portfolio',
			[
				'label' => __( 'Add Image', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Graphic Design',
						'size' => 'tortoiz-addons-pf-item-11',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio1.jpg',
						]
					],
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Web Design',
						'size' => 'tortoiz-addons-pf-item-22',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio2.jpg',
						]
					],
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Graphic Design',
						'size' => 'tortoiz-addons-pf-item-11',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio3.jpg',
						]
					],
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Photography',
						'size' => 'tortoiz-addons-pf-item-22',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio4.jpg',
						]
					],
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Web Design',
						'size' => 'tortoiz-addons-pf-item-11',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio5.jpg',
						]
					],
					[
						'item_name' => 'Lorem ipsum dolor sit amet',
						'category' => 'Photography',
						'size' => 'tortoiz-addons-pf-item-11',
						'image' => [
							'url' => TORTOIZ_EXT_URL .'assets/img/portfolio6.jpg',
						]
					],
				],
				'title_field' => '{{{ item_name }}}',
			]
		);

		$this->end_controls_section();
		// End Portfolio Content
		// ========================


		// Start Menu Style
		// =====================
		$this->start_controls_section(
			'menu_style',
			[
				'label' => __( 'Menu Buttons', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		Tortoiz_Addons_Common_Data::button_style( $this, '.tortoiz-addons-portfolio-btn' );
		$this->add_responsive_control(
			'menu_btn_width',
			[
				'label' => __( 'Min Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
					'em' => [
						'max' => 50,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'menu_btn_gap',
			[
				'label' => __( 'Gap From Items', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' =>[
					'size' => '40',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-btns' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'menu_btn_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'menu_btn_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '10',
					'right' => '15',
					'bottom' => '10',
					'left' => '15',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'menu_btn_margin',
			[
				'label' => __( 'Margin', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '6',
					'right' => '6',
					'bottom' => '6',
					'left' => '6',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_alignment',
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
					'{{WRAPPER}} .tortoiz-addons-portfolio-btns' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Menu Style
		// =====================


		// Start Items Style
		// =====================
		$this->start_controls_section(
			'item_style',
			[
				'label' => __( 'Items', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'note',
			[
				'label' => 'If you change the <strong>Dimension</strong> then the page need to <strong>Refresh</strong> for seeing the actual result',
				'type' => Controls_Manager::RAW_HTML,
				'separator' => 'after',
			]
		);
		$this->add_responsive_control(
			'items_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 800,
					],
				],
				'mobile_default' => [
					'size' => 300,
				],
				'condition' => [
					'columns!' => 'masonry',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'items_radius',
			[
				'label' => __( 'Radius', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-item-inner, {{WRAPPER}} .tortoiz-addons-portfolio-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'items_padding',
			[
				'label' => __( 'Padding', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'overlay',
			[
				'label' => __( 'Overlay Styles', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
						'default' => 'rgba(0,0,0,0.8)',
					],
				],
				'selector' => '{{WRAPPER}} .tortoiz-addons-portfolio-overlay',
			]
		);

		$this->end_controls_section();
		// End Items Style
		// =====================


		// Start Icons Style
		// =====================
		$this->start_controls_section(
			'icons_style',
			[
				'label' => __( 'Icons', 'tortoiz-addons-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'icons_tabs' );

		$this->start_controls_tab(
			'icons_normal',
			[
				'label' => __( 'Normal', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'icons_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'icons_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icons_border',
				'selector' => '{{WRAPPER}} .tortoiz-addons-portfolio-overlay i',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icons_hover',
			[
				'label' => __( 'Hover', 'tortoiz-addons-ext' ),
			]
		);

		$this->add_control(
			'icons_hover_color',
			[
				'label' => __( 'Text Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i:hover' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'icons_hover_bg',
			[
				'label' => __( 'Background', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i:hover' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'icons_hover_border',
			[
				'label' => __( 'Border Color', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icons_gap',
			[
				'label' => __( 'Icons Gap', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '20',
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-zoom' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icons_size',
			[
				'label' => __( 'Icon Size', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '16',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icons_width',
			[
				'label' => __( 'Width', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '44',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icons_height',
			[
				'label' => __( 'Height', 'tortoiz-addons-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => '44',
				],
				'selectors' => [
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tortoiz-addons-portfolio-overlay i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'zoom_btn_radius',
			[
				'label' => __( 'Zoom button radius', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-portfolio-zoom i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'link_btn_radius',
			[
				'label' => __( 'Link button radius', 'tortoiz-addons-ext' ),
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
					'{{WRAPPER}} .tortoiz-addons-portfolio-link i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Icons Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="tortoiz-addons-portfolio <?php echo esc_attr( 'tortoiz-addons-pf-'.$this->get_id() ); ?>"
		data-layout="<?php echo esc_attr( $data['columns'] ); ?>">
			<div class="tortoiz-addons-portfolio-btns">
				<button class="tortoiz-addons-portfolio-btn tortoiz-addons-button is-checked" data-filter="*">All</button>
				<?php
					$categories = tortoiz_addons_get_portfolio_cat( $data['portfolio'] );
					foreach ( $categories as $cat ) :
						?>
						<button class="tortoiz-addons-portfolio-btn tortoiz-addons-button" data-filter=".<?php echo esc_attr( $cat ); ?>">
							<?php printf( '%s', str_replace( '_', ' ', trim( $cat, '_') ) ); ?>
						</button>
				<?php endforeach; ?>

			</div>

			<div class="tortoiz-addons-portfolio-grid">
			<?php
				foreach ( $data['portfolio'] as $item ) :
					$category = strtolower( str_replace( ' ', '_', $item['category'] ) );
					$category =  str_replace( ',', ' ', $category );

					if ( 'masonry' == $data['columns'] ) {
						$size_class = $item['size'];
					} else{
						$size_class = $data['columns'];
					}
				?>
				<?php if ( $item['image']['url'] ): ?>
					<div class="tortoiz-addons-portfolio-item <?php echo esc_attr( $category .' '. $size_class ); ?>">
						<div class="tortoiz-addons-portfolio-item-inner tortoiz-addons-bg-cover"
							style="background-image: url(<?php echo esc_url( $item['image']['url'] ); ?>);">
							<div class="tortoiz-addons-portfolio-overlay tortoiz-addons-overlay tortoiz-addons-flex <?php echo esc_attr( $data['effects'] ); ?>">
								<div class="tortoiz-addons-portfolio-icons tortoiz-addons-flex">
									<a title="<?php echo esc_attr( $item['item_name'] ); ?>" href="#" data-mfp-src="<?php echo esc_url( $item['image']['url'] ); ?>" class="tortoiz-addons-portfolio-zoom">
										<i class="fa fa-search-plus"></i>
									</a>
									<a href="<?php echo esc_url( $item['link']['url'] ); ?>"
									<?php if ( 'on' == $item['link']['is_external'] ): ?>
										target="_blank" 
									<?php endif; ?>
									<?php if ( 'on' == $item['link']['nofollow'] ): ?>
										rel="nofollow" 
									<?php endif; ?> class="tortoiz-addons-portfolio-link">
										<i class="fa fa-link"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div><!-- .tortoiz-addons-portfolio -->
		<?php
		if ( Plugin::instance()->editor->is_edit_mode() ) {
			$this->render_editor_script();
		}
	}


	protected function render_editor_script() {
		?>
		<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
			var tortoizAddonsPFClass = '.tortoiz-addons-pf-'+'<?php echo $this->get_id(); ?>',
				$this = $(tortoizAddonsPFClass),
				$isoGrid = $this.children('.tortoiz-addons-portfolio-grid'),
				$btns = $this.children('.tortoiz-addons-portfolio-btns'),
				layout = $this.data('layout');

			$this.imagesLoaded( function() {
				if ( 'masonry' == layout ) {
					var $grid = $isoGrid.isotope({
						itemSelector: '.tortoiz-addons-portfolio-item',
						percentPosition: true,
						masonry: {
							columnWidth: '.tortoiz-addons-portfolio-item',
						}
					});
				} else{
					var $grid = $isoGrid.isotope({
						itemSelector: '.tortoiz-addons-portfolio-item',
						layoutMode: 'fitRows'
					});

				}

				$btns.on('click', 'button', function () {
					var filterValue = $(this).attr('data-filter');
					$grid.isotope({filter: filterValue});
				});

				$btns.each(function (i, btns) {
					var btns = $(btns);

					btns.on('click', '.tortoiz-addons-portfolio-btn', function () {
						btns.find('.is-checked').removeClass('is-checked');
						$(this).addClass('is-checked');
					});
				});

			});

			$this.find('.tortoiz-addons-portfolio-zoom').magnificPopup({
				type: 'image',
				gallery: {
					enabled: true
				},
			});

		});
		</script>
		<?php
	}


	protected function _content_template() {

	}
}