<?php
/*
** Template Name: Login
*/

global $wpdb, $user_ID;  
/* Showing the Login form only if the user is not logged in */
if ( !is_user_logged_in() ) {

    $success = '';
    $error = '';
    global $wpdb, $PasswordHash, $current_user, $user_ID;
     
    if(isset($_POST['user-login']) && $_POST['user-login'] == 'SignIn' ) {
        $password = $wpdb->escape(trim($_POST['password']));
        $username = $wpdb->escape(trim($_POST['username']));
        
        if( $password == "" || $username == "" ) {
            $error = 'Please don\'t leave the required fields.';
        } else {
     
            
            $creds                  = array();
            $creds['user_login']    = stripslashes( trim( $_POST['username'] ) );
            $creds['user_password'] = stripslashes( trim( $_POST['password'] ) );
            $redirect_to            = home_url();

            $user = wp_signon( $creds, $secure_cookie );


            if( is_wp_error($user) ) {
                $error = 'Username or Password is wrong.';
            } else {
                wp_safe_redirect( $redirect_to );	
            }
            
        }
        
    }

get_header();

?>

<div id="content">
	<div class="wrapper">
	<div class="form-section login-form">
    <h3>Login</h3>
    <form action="" method="post" name="user_registeration">
    <?php if(isset($error)){echo '<div class="form-error">'.$error.'</div>';}?>
        <label>Username <span class="error">*</span></label>  
        <input type="text" name="username" placeholder="Enter Your Username" class="text" required /><br />
        <label>Password <span class="error">*</span></label>
        <input type="password" name="password" class="text" placeholder="Enter Your password" required /> <br />
        <input type="submit" name="user-login" value="SignIn" />
    </form>
    </div>
    </div>
</div><!-- EOF : content ID -->
    
<?php get_footer();
}  
else {  
    /* Redirecting users to Home page */
    $url = home_url();
    wp_safe_redirect( $url );
    exit; 
}
?>