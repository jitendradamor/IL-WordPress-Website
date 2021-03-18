<?php
/*
** Template Name: Register
*/

global $wpdb, $user_ID;  
if ( !is_user_logged_in() ) {

    $success = '';
    $error = '';
    global $wpdb, $PasswordHash, $current_user, $user_ID;
     
    if(isset($_POST['user-registeration']) && $_POST['user-registeration'] == 'SignUp' ) {
        $password = $wpdb->escape(trim($_POST['password']));
        $country = $wpdb->escape(trim($_POST['country-of-residence']));
        $email = $wpdb->escape(trim($_POST['useremail']));
        $username = $wpdb->escape(trim($_POST['username']));
        
        if( $email == "" || $password == "" || $username == "" || $country == "") {
            $error = 'Please don\'t leave the required fields.';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address.';
        } else if(email_exists($email) ) {
            $error = 'Email already exist.';
        } else {
     
            $user_id = wp_insert_user( 
                            array ( 
                                'user_pass' => apply_filters('pre_user_user_pass', $password), 
                                'user_login' => apply_filters('pre_user_user_login', $username), 
                                'user_email' => apply_filters('pre_user_user_email', $email), 
                                'role' => 'subscriber' 
                                ) 
                            );
            if( is_wp_error($user_id) ) {
                $error = 'Error on user creation.';
            } else {
                do_action('user_register', $user_id);
                add_user_meta( $user_id, 'country_of_origin', $country);
                
                $creds                  = array();
                $creds['user_login']    = $username;
                $creds['user_password'] = $password;
                $redirect_to            = home_url();

                $user = wp_signon( $creds, $secure_cookie );


                if( is_wp_error($user) ) {
                    $error = 'There is some error during user login after user creation.';
                } else {
                    wp_safe_redirect( $redirect_to );	
                }
            }
            
        }
        
    }

get_header();



?>

<div id="content">
	<div class="wrapper">
	<div class="form-section registration-form">
    <h3>Create your account</h3>
    <form action="" method="post" name="user_registeration">
    <?php if(isset($error)){echo '<div class="form-error">'.$error.'</div>';}?>
        <label>Username <span class="error">*</span></label>  
        <input type="text" name="username" placeholder="Enter Your Username" class="text" required /><br />
        <label>Email address <span class="error">*</span></label>
        <input type="email" name="useremail" class="text" placeholder="Enter Your Email" required /> <br />
        <label>Password <span class="error">*</span></label>
        <input type="password" name="password" class="text" placeholder="Enter Your password" required /> <br />
        <label>Country of Residence <span class="error">*</span></label>
        <input type="text" name="country-of-residence" class="text" placeholder="Country of Residence" required /> <br />
        <input type="submit" name="user-registeration" value="SignUp" />
    </form>
    </div>
    </div>
</div><!-- EOF : content ID -->
    
<?php get_footer();
}  
else {  
    $url = home_url();
    wp_safe_redirect( $url );
    exit; 
}
?>