
<?php 


/**
 * Filter prevents other users from viewing post property of other authors except the administrator
 */


// filter

function mypo_parse_query_useronly( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {

			$user = wp_get_current_user(); // who is current user
			$user_info = get_userdata($user->ID); // get id 
			$user_role = implode(', ', $user_info->roles); // get roles 

			if($user_info->roles[0] != "administrator" && $user_info->roles[0] != "editor"){
					add_action( 'views_edit-post', 'child_remove_some_post_views' );
            		global $current_user;
            		$wp_query->set( 'author', $current_user->id );
			}
    }
}

add_filter('parse_query', 'mypo_parse_query_useronly' );

// end

/**
 * Remove All, Published and Trashed posts views.
 *
 * Requires WP 3.1+.
 * @param array $views
 * @return array
 */
function child_remove_some_post_views( $views ) {
	unset($views['all']);
	unset($views['publish']);
	unset($views['trash']);
	unset($views['draft']);
	unset($views['pending']);
	return $views;
}


?>
