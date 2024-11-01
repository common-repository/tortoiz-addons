<div class="tortoiz-addons-ext-wrap">
	<h1><?php _e( 'Tortoiz Addons Settings', 'tortoiz-addons-ext' ); ?></h1>
	<p class="tortoiz-addons-ext-pb">
		<?php _e('Thank you for using <strong><i>Tortoiz Addons</i></strong>. This plugin has been developed by <a href="https://tortoizaddons.com" target="_blank">Tortoiz Addons</a> and I hope you enjoy using it.', 'tortoiz-addons-ext'); ?>
	</p>

	<form action="options.php" method="POST">
		<?php settings_errors(); ?>
		<?php do_settings_sections( 'tortoiz_addons_ext_license_info' ); ?>

		<h2 class="tortoiz-addons-ext-pt"><?php _e( 'API Settings', 'tortoiz-addons-ext' ); ?></h2>
		<div class="tortoiz-addons-ext-pb">
			<?php do_settings_sections( 'tortoiz_addons_ext_settings' ); ?>
		</div>

		<div class="tortoiz-addons-ext-options tortoiz-addons-ext-pt">
			<h2><?php _e( 'Widget Settings', 'tortoiz-addons-ext' ); ?></h2>
			<p class="tortoiz-addons-ext-pb">
				<?php _e( 'You can disable widget(s) if you would like to not using on your site.', 'tortoiz-addons-ext' ); ?>
			</p>

			<?php
				$get_widgets = get_option( 'tortoiz_addons_widgets' );
				foreach ($get_widgets as $cat => $data) {
					printf("<div class='tortoiz-addons-ext-pb'><h2>%s</h2>", __( ucfirst($cat), 'tortoiz-addons-ext' ));
					do_settings_sections( 'tortoiz_addons_widgets_'.$cat );
					echo '</div>';
				}
				settings_fields( 'tortoiz_addons_settings_group' );
			?>
		</div>

		<div class="tortoiz-addons-ext-options tortoiz-addons-ext-pt tortoiz-addons-ext-pb">
<!-- 			<h2><?php //_e( 'Template Settings', 'tortoiz-addons-ext' ); ?></h2>
<p class="tortoiz-addons-ext-pb">
	<?php// _e( 'You can use <strong><i>TORTOIZ TEMPLATES</i></strong> on your site.', 'tortoiz-addons-ext' ); ?>
</p> -->

			<div class="tortoiz-addons-ext-pb">
				<?php //do_settings_sections( 'tortoiz_addons_ext_templates' ); ?>
			</div>
			<?php submit_button(); ?>
		</div>
	</form>

	<div class="tortoiz-addons-ext-options">
		<h2><?php _e( 'Rollback to Previous Version', 'tortoiz-addons-ext' ); ?></h2>
		<p>
			<?php _e( 'Experiencing an issue with this version? You can rollback the previous version.', 'tortoiz-addons-ext' ); ?>
		</p>
		<?php
			printf( '<a href="%1$s" class="tortoiz-addons-ext-rollback-btn button elementor-button-spinner elementor-rollback-button">%2$s</a>',
				wp_nonce_url( admin_url( 'admin-post.php?action=tortoiz_addons_ext_rollback' ), 'tortoiz_addons_ext_rollback' ),
				sprintf(
					__( 'Reinstall v%s', 'elementor' ),
					TORTOIZ_EXT_PREVIOUS_VERSION
				)
			);
		?>
		<p style="color: #e00;">
			<?php _e( 'Warning: Please backup your database before making the rollback.', 'tortoiz-addons-ext' ); ?>
		</p>
	</div>

	<div class="tortoiz-addons-ext-options">
	    <p>Did you like <strong><i>Tortoiz Addons</i></strong> Plugin? Please <a href="https://wordpress.org/support/plugin/tortoiz-addons-extension-for-elementor/reviews/#new-post" target="_blank">Click Here to Rate it ★★★★★</a></p>
	</div>
</div>