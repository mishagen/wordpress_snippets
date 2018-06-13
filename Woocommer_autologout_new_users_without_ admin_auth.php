<?php 

/* Autologout function for Woocommerce for registered users up to admin auth  * /

function user_autologout(){ // autologout
       if ( is_user_logged_in() ) {

                 wp_logout(); // close sesion
                 return get_permalink(woocommerce_get_page_id('myaccount')) . "?approved=false"; 

                }
        }
add_action('woocommerce_registration_redirect', 'user_autologout', 2); 


function new_registration_email_alert( $user_id ) {

    $user    = get_userdata( $user_id );
    $email   = $user->user_email;
    $message = $email . ' has registered to your website. Please log at http://yourwebsite.com/wp_login.php and check to validate user';

  $blogusers = get_users('role=Administrator'); // los administradores recib
     // $blogusers = get_users('role=shop_manager'); // los administradores de la tienda reciben aviso a su email
     
      foreach ($blogusers as $user) {
       
        wp_mail( $user->user_email, 'New User registration', $message );
      }  
}
add_action('user_register', 'new_registration_email_alert');


?>
