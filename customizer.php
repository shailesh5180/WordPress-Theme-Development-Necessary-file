<?php
function time_customize_register($wp_customize){

    //Icon or text color change 
    $wp_customize->add_section( 'icon_color_section',array(
        'title' => __('Offer Form Icon Color','timer'),
        'priority'=>50
    ) );
    $wp_customize->add_setting('icon_color_setting', array(
        'default' => '#02bdd5',
        'transport'=>'refresh'//postMessage
    ));
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'icon_color_control', 
            array(
                'label'      => __( 'Offer Form Icon Color', 'timer' ),
                'section'    => 'icon_color_section',
                'settings'   => 'icon_color_setting',
    ) ) );
    //Text field 
    $wp_customize->add_section( 'footer_copyright_section',array(
        'title' => __('Footer Copy Right Section','timer'),
        'priority'=>70
    ) );
    $wp_customize->add_setting('footer_copyright_setting', array(
        'default' => __('Design and Developed by'),
        'transport'=>'postMessage'//refresh
    ));
    $wp_customize->add_control( 'footer_copyright_ctl', array(
        'label'      => __( 'footer text', 'timer' ),
        'section'    => 'footer_copyright_section',
        'settings'   => 'footer_copyright_setting',
        'type'       => 'text'
    ) );
    //upload media/image
    $wp_customize->add_section( 'upload_media_section',array(
        'title' => __('Upload Media Or Image','timer'),
        'priority'=>60
    ) );
    $wp_customize->add_setting('upload_setting', array(
        'default' => (''),
        'transport'=>'refresh'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
        $wp_customize, 
        'upload_image_ctl', 
        array(
            'label'      => __( 'Upload Image', 'timer' ),
            'section'    => 'upload_media_section',
            'settings'   => 'upload_setting',
        ) ) 
    );
}
add_action('customize_register','time_customize_register');




//customizer file include in functions.php
require_once get_template_directory() . '/inc/customizer.php';
//customizer file include

//inline style include functions.php
$form_icon_color=get_theme_mod('icon_color_setting','#02bdd5');
$form_iconstyle=<<<EOD
#feature .icon {
    background-color: {$form_icon_color};
}
EOD;
wp_add_inline_style( 'main-css', $form_iconstyle );

//inline style include functions.php

//if 'transport'=>'postMessage' include in functions.php
function cust_customizer_assets() {
	wp_enqueue_script( "timer-customizer-js", get_theme_file_uri( "/assets/js/customizer.js" ), array(
		'jquery',
		'customize-preview'
	), time(), true );
}

add_action( "customize_preview_init", 'cust_customizer_assets' );
//'transport'=>'postMessage' include in functions.php

///assets/js/customizer.js include for transport'=>'postMessage' 
;(function ($) {
    wp.customize('footer_copyright_setting', function (value) {
        value.bind(function (newvalue) {
            $("#copyrights").html(newvalue);
        });
    });
})(jQuery);
///assets/js/customizer.js include for transport'=>'postMessage' 

