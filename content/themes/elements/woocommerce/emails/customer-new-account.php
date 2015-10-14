<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( "Thanks for your account application. Once your account has been approved, you will receive an email. You will then be able to login with these details:", 'woocommerce' ), esc_html( $blogname ), esc_html( $user_login ) ); ?></p>

<ul>
  <li><?php echo sprintf(__('Username: %s', 'woocommerce'), $user_login); ?></li>
  <?php if ( get_option( 'woocommerce_registration_generate_password' ) == 'yes' && $password_generated ) : ?>
    <li><?php printf( __( "Password: <strong>%s</strong>", 'woocommerce' ), esc_html( $user_pass ) ); ?></li>
  <?php endif; ?>
</ul>

<?php do_action( 'woocommerce_email_footer' ); ?>
