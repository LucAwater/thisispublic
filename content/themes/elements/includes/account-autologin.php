<?php
// code from: https://www.websavers.ca/using-wp-approve-user-plugin-with-woocommerce/

/* Stop auto login */
function user_autologout(){
  if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    $approved_status = get_user_meta($user_id, 'wp-approve-user', true);

    //if the user hasn't been approved yet by WP Approve User plugin, destroy the cookie to kill the session and log them out
    if ( $approved_status == 1 ) {
      return $redirect_url;
    } else {
      wp_logout();

      return get_permalink(woocommerce_get_page_id('myaccount')) . "?approved=false";
    }
  }
}
add_action('woocommerce_registration_redirect', 'user_autologout', 2);

function registration_message(){
  $not_approved_message = '<div class="woocommerce-message"><p class="registration">Send in your registration application today!<br /> NOTE: Your account will be held for moderation and you will be unable to login until it is approved.</p></div>';

  if( isset($_REQUEST['approved']) ){
    $approved = $_REQUEST['approved'];
    if ($approved == 'false')  echo "<div class='woocommerce-message'><p class='registration successful'>Registration successful! You will be notified upon approval of your account.<br><br>Make sure to check your spam folder if our email doesn't turn up.</p></div>";
    else echo $not_approved_message;
  }
  else echo $not_approved_message;
}
add_action('woocommerce_before_customer_login_form', 'registration_message', 2);
?>