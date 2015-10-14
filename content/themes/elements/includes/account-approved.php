<?php
// code from: https://www.websavers.ca/using-wp-approve-user-plugin-with-woocommerce/

//Email Notifications
//Content parsing borrowed from: woocommerce/classes/class-wc-email.php
function send_user_approve_email($user_id){

    global $woocommerce;
    //Instantiate mailer
    $mailer = $woocommerce->mailer();

        if (!$user_id) return;

        $user = new WP_User($user_id);

        $user_login = stripslashes($user->user_login);
        $user_email = stripslashes($user->user_email);
        $user_pass  = "As specified during registration";

        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        $subject  = apply_filters( 'woocommerce_email_subject_customer_new_account', sprintf( __( 'Your account on %s has been approved!', 'woocommerce'), $blogname ), $user );
        $email_heading  = "User $user_login has been approved";

        // Buffer
        ob_start();

        // Get mail template
        woocommerce_get_template('emails/customer-account-approved.php', array(
                'user_login'    => $user_login,
                'user_pass'             => $user_pass,
                'blogname'              => $blogname,
                'email_heading' => $email_heading
       ));

        // Get contents
        $message = ob_get_clean();

        // Send the mail
        woocommerce_mail( $user_email, $subject, $message, $headers = "Content-Type: text/htmlrn", $attachments = "" );
}
add_action('wpau_approve', 'send_user_approve_email', 10, 1);

function send_user_unapprove_email($user_id){
        return;
}
add_action('wpau_unapprove', 'send_user_unapprove_email', 10, 1);
?>