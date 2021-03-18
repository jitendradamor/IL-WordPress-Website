<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>
<?php
	
	global $page, $paged;

	wp_title( '-', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'mytheme' ), max( $paged, $page ) );

?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="body-wrapper">
	<div class="header">
    	<div class="wrapper">
        	<div class="logo-wrap">
        		<a href="<?php echo esc_url(home_url('/')); ?>" id="logo">
                    <img src="<?php echo get_template_directory_uri() ?>/assests/images/logo.svg" alt="Imagin Labs" />
                </a>
            </div><!-- EOF: header-wrap ID -->
            <div class="nav">
                    <?php wp_nav_menu( array( 'theme_location'  => 'header_menu',                                              
                                            'container'	   => false ) ); ?>
                    <div class="clear"></div>
            </div><!-- EOF : nav ID -->    
        </div>
    </div><!-- EOF : header ID -->

    