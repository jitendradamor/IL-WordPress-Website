<?php

/* include theme commun codes */
include("inc/theme_scripts.php");
/* end of include theme commun codes */

/* include theme user related code */
include("inc/theme_users.php");
/* end of theme user related code */

/* include theme short code */
include("inc/theme_shortcode.php");
/* end of theme short code */

/*Disable Admin Bar for All Users Except Administrators */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// Redirect Logout link for non admins.
if (is_user_logged_in() && !current_user_can('administrator') && !is_admin()) {
add_action('wp_logout','auto_redirect_after_logout');
    function auto_redirect_after_logout(){
        wp_safe_redirect( 'http://mydemoserver.site/imaginelabs/login/' );
        exit;
    }
} 