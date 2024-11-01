<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
	<div class="tortoiz-addons-bp-col <?php echo esc_attr( $data['columns'] ) ?>">
		<div class="tortoiz-addons-bp">
			<?php if ( has_post_thumbnail() ): ?>
				<div class="tortoiz-addons-bg-thumb">
					<?php the_post_thumbnail(); ?>
					<div class="tortoiz-addons-overlay">
						<a href="<?php the_permalink(); ?>"></a>
					</div>
				</div>
			<?php endif; ?>
			<div class="tortoiz-addons-bp-content">
				<h2 class="tortoiz-addons-bp-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="tortoiz-addons-bp-text">
					<?php
						if ( has_excerpt() &&  'yes' == $data['excerpt'] ):
							$excerpt = preg_replace( '/'. get_shortcode_regex() .'/', '', get_the_excerpt() );
							echo wp_kses_post( wp_trim_words( $excerpt, $content_length ) );
						else:
							$content = preg_replace( '/'. get_shortcode_regex() .'/', '', get_the_content() );
							echo wp_kses_post( wp_trim_words( $content, $content_length ) );
						endif;
					?>
				</div>

				<?php if ( $data['read_more_text'] ): ?>
					<div class="tortoiz-addons-btn-wrapper">
						<a href="<?php the_permalink(); ?>" class="tortoiz-addons-read-more <?php echo esc_attr( $data['read_more_effect'] ); ?>">
							<?php Tortoiz_Addons_Common_Data::button_html($data, 'read_more'); ?>
						</a>
					</div>
				<?php endif; ?>
				<?php if ( 'yes' == $data['posts_meta'] ): ?>
					<div class="tortoiz-addons-bp-meta">
						<?php _e('by', 'tortoiz-addons-ext'); ?>
						<?php the_author_posts_link(); ?>
						|
						<?php printf( '%s', get_the_date() ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>