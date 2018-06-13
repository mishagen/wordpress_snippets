<?php 

/* Autologout function for Woocommerce for registered users up to admin auth  * /

function user_autologout(){ // autologout
       if ( is_user_logged_in() ) {

                 wp_logout(); // close sesion
                 return get_permalink(woocommerce_get_page_id('myaccount')) . "?approved=false"; 

                }
        }
add_action('woocommerce_registration_redirect', 'user_autologout', 2); 


?>