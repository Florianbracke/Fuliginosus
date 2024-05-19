<?php

/*--------------------------------------------------------------------------------------*\
| ADD WP BLOCKS
\*--------------------------------------------------------------------------------------*/
function my_init_block_types() {
    register_block_type(get_stylesheet_directory()  . '/assets/blocks/card-carousel');
}
add_action('init', 'my_init_block_types');


/*--------------------------------------------------------------------------------------*\
| ADD WP BLOCK SCRIPTS
\*--------------------------------------------------------------------------------------*/
function register_custom_block_js(){
    wp_enqueue_style( 'swiper-style' , get_stylesheet_directory_uri() . '/assets/blocks/card-carousel/style.css',  filemtime(get_stylesheet_directory() .'/assets/blocks/card-carousel/style.css')  );
    wp_register_script('card-carousel', get_stylesheet_directory_uri() . '/assets/blocks/card-carousel/index.js', array('swiper-js'),filemtime(get_stylesheet_directory_uri() . '/assets/blocks/card-carousel/index.js'), true);
}
add_action('wp_enqueue_scripts', 'register_custom_block_js');
add_action('admin_enqueue_scripts', 'register_custom_block_js');


/*--------------------------------------------------------------------------------------*\
| CSS EDITOR STYLES
\*--------------------------------------------------------------------------------------*/
function card_carousel_editor_style()
{
	add_editor_style('card-carousel-editor-style.css');
}
add_action('after_setup_theme', 'card_carousel_editor_style');



