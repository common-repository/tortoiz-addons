<?php
use \Elementor\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tortoiz_Addons_Ext_Hooks Class for all widgets related hook functions
 *
 * @since 3.0.0
 */
Class Tortoiz_Addons_Ext_Hooks{
	public static function mailchimp_subscribe() {
		if ( check_ajax_referer( 'tortoiz_addons_mc_subscribe', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_mc_subscribe' ) ) {

			$email = sanitize_email( $_POST['email'] );
			$fname = sanitize_text_field( $_POST['fname'] );
			$lname = sanitize_text_field( $_POST['lname'] );
			$phone = sanitize_text_field( $_POST['phone'] );
			$status = 'subscribed';
			$err = '';

			if ( '' == $fname) {
				$fname = $fname;
			} elseif ( strlen($fname) < 3 ) {
				$err = __( 'First name too short! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
			} elseif ( strlen($fname) > 32 ) {
				$err = __( 'First name too long! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
			} elseif ( preg_match("/^[a-zA-Z][ a-zA-Z0-9]{2,31}$/", $fname) ) {
				$fname = $fname;
			} else {
				$err = __( 'Special character(s) not allowed in your first name!', 'tortoiz-addons-ext' );
			}

			if ( '' == $err ) {
				if ( '' == $lname) {
					$lname = $lname;
				} elseif ( strlen($lname) < 3 ) {
					$err = __( 'Last name too short! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
				} elseif ( strlen($lname) > 32 ) {
					$err = __( 'Last name too long! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
				} elseif ( preg_match("/^[a-zA-Z][ a-zA-Z0-9]{2,31}$/", $lname) ) {
					$lname = $lname;
				} else {
					$err = __( 'Special character(s) not allowed in your last name!', 'tortoiz-addons-ext' );
				}
			}

			if ( '' == $err ) {
				if ( '' == $email) {
					$err = __( 'Invalid email!', 'tortoiz-addons-ext' );
				}
			}

			if ( '' == $err ) {
				if ( '' == $phone ) {
					$phone = $phone;
				} elseif ( preg_match("/^[0-9\(\+][ 0-9-\(\)]{2,19}$/", $phone) ) {
					$phone = $phone;
				} else {
					$err = __( 'Invalid phone number!', 'tortoiz-addons-ext' );
				}
			}

			if ( '' == $err ) {
				$mail_chimp = get_option( 'tortoiz_addons_mailchimp' );
				$api_parts = explode( '-', $mail_chimp['apikey'] );
				$list_id = $mail_chimp['list_id'];
				$url = 'https://'.$api_parts[1].'.api.mailchimp.com/3.0/lists/'.$list_id.'/members';

				$args = [
					'method' => 'POST',
					'headers' => [
						'Authorization'	=> 'Basic ' . base64_encode( 'user:'. implode('-', $api_parts) ),
						'Content-Type'	=> 'application/json; charset=utf-8',
					],
					'body' => json_encode( [
						'email_address' => $email,
						'merge_fields'	=> [
							'FNAME' 		=> $fname,
							'LNAME' 		=> $lname,
							'PHONE' 		=> $phone,
						],
						'status'        => $status
					] )
				];

				$response = wp_remote_post( $url, $args );

				if ( is_wp_error( $response ) ) {
					$err = "Internal Error!";
				} else {
					$body = json_decode( $response['body'] );
					if ( $response['response']['code'] == 200 && $body->status == $status ) {
						$err = 'success';
					} else {
						$err = $body->title.'!';
					}
				}
			}

			printf( '%s', $err );
		}
		die();
	}

	public static function ajax_contact() {
		if ( check_ajax_referer( 'tortoiz_addons_contact', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_contact' ) ) {

			$email = sanitize_email( $_POST['email'] );
			$name = sanitize_text_field( $_POST['name'] );
			$subject = sanitize_text_field( $_POST['subject'] );
			$message = sanitize_textarea_field( $_POST['message'] );
			$inbox = sanitize_text_field( $_POST['inbox'] );
			$err = '';

			if ( '' == $name) {
				$err = __( 'Name can\'t be empty!', 'tortoiz-addons-ext' );
			} elseif ( strlen($name) < 3 ) {
				$err = __( 'Name too short! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
			} elseif ( strlen($name) > 32 ) {
				$err = __( 'Name too long! Must be contain 3-32 characters.', 'tortoiz-addons-ext' );
			} elseif ( preg_match("/^[a-zA-Z][ a-zA-Z0-9]{2,31}$/", $name) ) {
				$name = $name;
			} else {
				$err = __( 'Special character(s) not allowed in your name!', 'tortoiz-addons-ext' );
			}

			if ( '' == $err ) {
				if ( '' == $email) {
					$err = __( 'Invalid email!', 'tortoiz-addons-ext' );
				}
			}

			if ( '' == $err ) {
				if ( '' == $subject) {
					$err = __( 'Subject can\'t be empty!', 'tortoiz-addons-ext' );
				} elseif ( strlen($subject) < 3 ) {
					$err = __( 'Subject too short! Must be contain 3-200 characters.', 'tortoiz-addons-ext' );
				} elseif ( strlen($subject) > 200 ) {
					$err = __( 'Subject too long! Must be contain 3-200 characters.', 'tortoiz-addons-ext' );
				} elseif ( $subject ) {
					$subject = $subject;
				} else{
					$err = __( 'Invalid subject!', 'tortoiz-addons-ext' );
				}
			}

			if ( '' == $err ) {
				if ( '' == $message) {
					$err = __( 'Message can\'t be empty!', 'tortoiz-addons-ext' );
				} elseif ( strlen($message) < 3 ) {
					$err = __( 'Message too short! Must be contain 3-2000 characters.', 'tortoiz-addons-ext' );
				} elseif ( strlen($message) > 2000 ) {
					$err = 'Message too long! Must be contain 3-2000 characters.';
				} elseif ( $message ) {
					$message = $message;
				} else{
					$err = __( 'Invalid message!', 'tortoiz-addons-ext' );
				}

				if ( '' == $err  && $inbox ) {
					$custom_email = get_option('tortoiz_addons_contact_email'.$inbox);
					wp_mail( $custom_email, $subject, $message, "From: {$email}\r\n" );
				} elseif ( '' == $err ) {
					$admin_email = get_option('admin_email');
					wp_mail( $admin_email, $subject, $message, "From: {$email}\r\n" );
				}
			}
			printf( '%s', $err );
		}
		die();
	}

	public static function ajax_login() {
		if ( check_ajax_referer( 'tortoiz_addons_login', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_login' ) ) {

			$email = sanitize_email( $_POST['email'] );
			$password = sanitize_text_field( $_POST['password'] );
			$remember = sanitize_text_field( $_POST['remember'] );
			$err = '';

			if ( '' == $email ) {
				$err = __( 'Invalid email!', 'tortoiz-addons-ext' );
			}

			if ( '' == $err ) {
				if ( '' == $password) {
					$err = __( 'Password can\'t be empty!', 'tortoiz-addons-ext' );
				} else {
					$rem = $remember == 'true' ? true : false;
					$user = wp_signon( array(
						'user_login'    => $email,
						'user_password' => $password,
						'remember'      => $rem
					), false );

					if ( is_wp_error( $user ) ) {
						$err = __( 'Email and password don\'t matched!', 'tortoiz-addons-ext' );
					}
				}
			}
			printf( '%s', $err );
		}
		die();
	}

	public static function ajax_load_more_posts() {
		if ( check_ajax_referer( 'tortoiz_addons_load_more_posts', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_load_more_posts' ) ) {

			// $data = json_decode( sanitize_text_field( $_POST['posts_data'] ) );
			$offset = sanitize_text_field( $_POST['offset'] );
			$data = sanitize_text_field( $_POST['posts_data'] );
			$data = json_decode(stripslashes($data), true);
			$content_length = (int) $data['content_length'];

			$default = [
				'cat'				=> $data['categories'],
				'posts_per_page'	=> (int) $data['posts_num'],
				'offset'			=> (int) $offset,
				'orderby'			=> [ $data['order_by'] => $data['sort'] ],
				'has_password'		=> false,
				'post_status'		=> 'publish',
				'post__not_in'		=> get_option( 'sticky_posts' ),
			];

			// Post Query
			$post_query = new WP_Query( $default );

			if ( $post_query->have_posts() ) {
				?>
				<div class="tortoiz-addons-ajax-posts">
					<?php if ( 'grid' == $data['layout'] || 'list' == $data['layout']): ?>
						<?php include realpath( TORTOIZ_EXT_LAYOUT.'/blogpost/'.$data['layout'].'.php' ); ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<?php
			}
		}
		die();
	}

	public static function ajax_user_counter() {
		if ( check_ajax_referer( 'tortoiz_addons_user_counter', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_user_counter' ) ) {
			$roles = explode( ',', sanitize_text_field( $_POST['roles'] ) );

			$users = count_users();
			$users = $users['avail_roles'];

			$count = 0;
			if ( !empty($roles) ) {
				foreach ($roles as $role) {
					$count += isset($users[$role]) ? $users[$role] : 0;
				}
			}
			printf( '%s', $count );
		}
		die();
	}

	public static function ajax_visit_counter() {
		if ( check_ajax_referer( 'tortoiz_addons_visit_counter', 'nonce') && wp_verify_nonce( $_POST['nonce'], 'tortoiz_addons_visit_counter' ) ) {

			$page = (int) sanitize_text_field( $_POST['page'] );
			if ( $page > 0 ) {
				$visit_data = get_post_meta( $page, 'tortoiz_addons_visit_counter', true);

				$data = $visit_data['tortoiz_addons_visit_today'] . '|' . $visit_data['tortoiz_addons_visit_yesterday'];
				printf( '%s', $data );
			}
		}
		die();
	}
}