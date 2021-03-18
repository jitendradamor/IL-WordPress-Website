<?php 
function extra_profile_fields( $user ) { ?>
   
    <h3><?php _e('Extra User Details'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="country_of_origin">Country of Residence</label></th>
            <td>
            <input type="text" name="country_of_origin" id="country_of_origin" value="<?php echo esc_attr( get_the_author_meta( 'country_of_origin', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
<?php

}

// Then we hook the function to "show_user_profile" and "edit_user_profile"
add_action( 'show_user_profile', 'extra_profile_fields', 10 );
add_action( 'edit_user_profile', 'extra_profile_fields', 10 );


function save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    /* Edit the following lines according to your set fields */
    update_usermeta( $user_id, 'country_of_origin', $_POST['country_of_origin'] );
}

add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );
?>