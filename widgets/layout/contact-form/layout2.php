<div class="tortoiz-addons-contact-input">
	<div class="tortoiz-addons-contact-input-half">
		<input class="tortoiz-addons-input-field tortoiz-addons-input-block tortoiz-addons-input-name" type="text" placeholder="<?php echo esc_attr( $data['name_placeholder'] ); ?>" >
		<input class="tortoiz-addons-input-field tortoiz-addons-input-block tortoiz-addons-input-email" type="email" placeholder="<?php echo esc_attr( $data['email_placeholder'] ); ?>" >
		<input class="tortoiz-addons-input-field tortoiz-addons-input-block tortoiz-addons-input-subject" type="text" placeholder="<?php echo esc_attr( $data['sub_placeholder'] ); ?>" >
	</div>
	<div class="tortoiz-addons-contact-input-half">
		<textarea class="tortoiz-addons-input-field tortoiz-addons-input-block tortoiz-addons-input-message" placeholder="<?php echo esc_attr( $data['msg_placeholder'] ); ?>"></textarea>
	</div>
</div>
<div class="tortoiz-addons-contact-input">
	<button type="submit" class="tortoiz-addons-button tortoiz-addons-contact-btn <?php echo esc_attr( $data['btn_effect']); ?>">
		<?php Tortoiz_Addons_Common_Data::button_html($data); ?>
	</button>
</div>