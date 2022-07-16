<?php 

//Use this code is functions.php 

function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


   // use this code is header.php where logo option or tag
   if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
   }