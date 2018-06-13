<?php

// Function replace default email in wordpress

add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
 return 'noreply@ourwebsite.com';
}

function new_mail_from_name($old) {
 return 'our name';
}
