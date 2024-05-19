<?php
/*--------------------------------------------------------------------------------------*\
|  CUSTOMIZER: COLORS
\*--------------------------------------------------------------------------------------*/
function customizer_settings($wp_customize) {
    // Sectie toevoegen voor kleuropties
    $wp_customize->add_section('theme_colors', array(
        'title' => __('Theme Colors', 'flavus'),
        'priority' => 30,
    ));


    $wp_customize->add_setting('primary_color', array(
        'default' => '#965e07',
        'sanitize_callback' => 'sanitize_hex_color',

    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'primary_color',
    )));


    $wp_customize->add_setting('secondary_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',

    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary Color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'secondary_color',
    )));


    $wp_customize->add_setting('background_color2', array(
        'default' => '#fffaf6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label' => __('Background Color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'background_color2',
    )));


    $wp_customize->add_setting('text_color', array(
        'default' => '#290000',
        'sanitize_callback' => 'sanitize_hex_color',

    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'text_color',
    )));


    $wp_customize->add_setting('heading_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',

    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_color', array(
        'label' => __('Heading Color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'heading_color',
    )));


    $wp_customize->add_setting('button_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',

    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_text_color', array(
        'label' => __('Button default text color', 'flavus'),
        'section' => 'theme_colors',
        'settings' => 'button_text_color',
    )));
}

add_action('customize_register', 'customizer_settings');



/*--------------------------------------------------------------------------------------*\
|  FONTS
\*--------------------------------------------------------------------------------------*/
function custom_theme_customize_register( $wp_customize ) {

    // SECTION
    $wp_customize->add_section( 'fonts', array(
        'title'    => __( 'Fonts', 'flavus' ),
        'priority' => 30,
        'description' => __( 'Customize the typography for body and heading text.', 'flavus' ),
    ));


    // BODY FONT
    $wp_customize->add_setting( 'body_font_dropdown_setting', array(
        'default'           => 'Chillax', 
        'sanitize_callback' => 'sanitize_text_field',
        'description' => __( 'Customize the typography for body text.', 'flavus' ),

    ));
    $wp_customize->add_control( 'body_font_dropdown_control', array(
        'label'    => __( 'Body font', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'body_font_dropdown_setting',
        'type'     => 'select',
        'choices'  => array(
            'Chillax' => 'Chillax',
            'Lora' => 'Lora',
            'LT_renovate' => 'LT_renovate',
            'LT_wave' => 'LT_wave',
            'Nunito_Sans' => 'Nunito_Sans',
            'Oswald' => 'Oswald',
            'Platypi' => 'Platypi',
            'Playfair_Display' => 'Playfair_Display',
            'Poppins' => 'Poppins',
            'Roboto' => 'Roboto',
            'Space_Grotesk' => 'Space_Grotesk',
        ),
    ));


    /* BODY LINE-HEIGHT */
    $wp_customize->add_setting( 'body_line_height_setting', array(
        'default'           => '1.5', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'body_line_height_control', array(
        'label'    => __( 'Body line-height', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'body_line_height_setting',
        'type'     => 'number',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 5,
            'step'  => 0.1, 
        ),
    ));


    /* BODY LETTER-SPACING */
    $wp_customize->add_setting( 'body_letter_spacing_setting', array(
        'default'           => '0', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'body_letter_spacing_control', array(
        'label'    => __( 'Body letter-spacing', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'body_letter_spacing_setting',
        'type'     => 'number',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 5,
            'step'  => 0.1, 
        ),
    ));



    // HEADING FONT
    $wp_customize->add_setting( 'heading_font_dropdown_setting', array(
        'default'           => 'Chillax', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'heading_font_dropdown_control', array(
        'label'    => __( 'Heading font', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'heading_font_dropdown_setting',
        'type'     => 'select',
        'choices'  => array(
            'Chillax' => 'Chillax',
            'Lora' => 'Lora',
            'LT_renovate' => 'LT_renovate',
            'LT_wave' => 'LT_wave',
            'Nunito_Sans' => 'Nunito_Sans',
            'Oswald' => 'Oswald',
            'Platypi' => 'Platypi',
            'Playfair_Display' => 'Playfair_Display',
            'Poppins' => 'Poppins',
            'Roboto' => 'Roboto',
            'Space_Grotesk' => 'Space_Grotesk',
        ),
    ));


    /* HEADING LINE-HEIGHT */
    $wp_customize->add_setting( 'heading_line_height_setting', array(
        'default'           => '1.25', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'heading_line_height_control', array(
        'label'    => __( 'Heading line-height', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'heading_line_height_setting',
        'type'     => 'number',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 5,
            'step'  => 0.1,
        ),
    ));


    /* HEADING LETTER-SPACING */
    $wp_customize->add_setting( 'heading_letter_spacing_setting', array(
        'default'           => '0', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'heading_letter_spacing_control', array(
        'label'    => __( 'Heading letter-spacing', 'flavus' ),
        'section'  => 'fonts',
        'settings' => 'heading_letter_spacing_setting',
        'type'     => 'number',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 5,
            'step'  => 0.1, 
        ),
    ));

}
add_action( 'customize_register', 'custom_theme_customize_register' );






/*--------------------------------------------------------------------------------------*\
|  FOOTER
\*--------------------------------------------------------------------------------------*/
function gegevens( $wp_customize ) {

    // SECTION
    $wp_customize->add_section( 'gegevens', array(
        'title'    => __( 'Gegevens', 'flavus' ),
        'priority' => 30,
    ));



 
    $wp_customize->add_setting( 'gegevens_adres_settings', array(
        'default'  => 'Jouw adres',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'gegevens_adres_control', array(
        'label'    => __( 'Adres', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_adres_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'gegevens_email_settings', array(
        'default'  => 'Jouw emailadres',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'gegevens_email_control', array(
        'label'    => __( 'E-mail', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_email_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'gegevens_telefoon_settings', array(
        'default'  => 'Jouw telefoon nummer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'gegevens_telefoon_control', array(
        'label'    => __( 'Telefoon', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_telefoon_settings',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting( 'gegevens_facebook_settings', array(
        'default'  => 'www.facebook.com/profile',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'gegevens_facebook_control', array(
        'label'    => __( 'Facebook', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_facebook_settings',
        'type'     => 'url',
    ));

    $wp_customize->add_setting( 'gegevens_instagram_settings', array(
        'default'  => 'www.instagram.com/profile',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'gegevens_instagram_control', array(
        'label'    => __( 'Instagram', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_instagram_settings',
        'type'     => 'url',
    )); 

    $wp_customize->add_setting( 'gegevens_linkedin_settings', array(
        'default'  => 'www.linkedin.com/profile',
        'sanitize_callback' => 'sanitize_text_field',
    ));    
    $wp_customize->add_control( 'gegevens_linkedin_control', array(
        'label'    => __( 'LinkedIn', 'flavus' ),
        'section'  => 'gegevens',
        'settings' => 'gegevens_linkedin_settings',
        'type'     => 'url',
    ));

}
add_action( 'customize_register', 'gegevens' );

?>