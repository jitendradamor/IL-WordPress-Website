<?php
add_action('wp_enqueue_scripts', 'mytheme_scripts');

function mytheme_scripts($hook) {

    /* The main style.css */
    $ver = rand(1000000,1000000000); 
    wp_enqueue_style( 'style', get_stylesheet_uri() ,array() , $ver );

    /* add style of the theme */
    // wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.1', 'all');

    /* add Javascript of the theme */
    // wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'custom-ja', get_template_directory_uri() . '/assets/js/custom.js', array ( 'jquery' ), 1.1, true);

}
?>