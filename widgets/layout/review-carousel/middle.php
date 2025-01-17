<?php if ($item['comment']): ?>
	<div <?php echo $this->get_render_attribute_string( $comment_key ); ?>>
		<?php printf( '%s',$item['comment']); ?>
	</div>
<?php endif; ?>

<div class="tortoiz-addons-review-member">
	<?php if ( $item['image']['url'] ): ?>
		<img src="<?php echo esc_url( $item['image']['url'] ); ?>" class="tortoiz-addons-review-face" alt="<?php echo esc_attr($item['name']); ?>">
	<?php endif; ?>

	<?php if ($item['name']): ?>
		<h5 <?php echo $this->get_render_attribute_string( $name_key ); ?>><?php printf( '%s',$item['name']); ?></h5>
	<?php endif; ?>

	<?php if ($item['position']): ?>
		<p <?php echo $this->get_render_attribute_string( $position_key ); ?>><?php printf( '%s',$item['position']); ?></p>
	<?php endif; ?>

	<?php if ($item['company']): ?>
		<p <?php echo $this->get_render_attribute_string( $company_key ); ?>><?php printf( '%s',$item['company']); ?></p>
	<?php endif; ?>
</div>