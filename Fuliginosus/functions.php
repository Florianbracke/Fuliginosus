<?php
/*--------------------------------------------------------------------------------------*\
| REQUIRES
\*--------------------------------------------------------------------------------------*/
require 'php/blocks.php';
require 'php/helperfunctions.php';
require 'php/meta-boxes.php';
require 'php/admin-bar.php';
require 'php/customizer.php';
require 'php/variables.php';


/*--------------------------------------------------------------------------------------*\
| BLOCKS
\*--------------------------------------------------------------------------------------*/
require 'assets/blocks/card-carousel/index.php';


/*--------------------------------------------------------------------------------------*\
| CSS
\*--------------------------------------------------------------------------------------*/
function my_theme_enqueue_styles() {
	/* theme */
	wp_enqueue_style( 'variables-style' , get_stylesheet_directory_uri() . '/css/theme/variables.css', array(), filemtime(get_stylesheet_directory() .'/css/theme/variables.css')  );
	wp_enqueue_style( 'core-classes-style', get_stylesheet_directory_uri() . '/css/theme/core-classes.css', array(), filemtime(get_stylesheet_directory() .'/css/theme/core-classes.css')  );
    wp_enqueue_style( 'custom-classes-style', get_stylesheet_directory_uri() . '/css/theme/custom-classes.css' , array(), filemtime(get_stylesheet_directory() .'/css/theme/custom-classes.css')  );

	/* base */
	wp_enqueue_style( 'fonts-style', get_stylesheet_directory_uri() . '/css/base/fonts.css' , array(), filemtime(get_stylesheet_directory() .'/css/base/fonts.css')  );
	wp_enqueue_style( 'reset-style' , get_stylesheet_directory_uri() . '/css/base/reset.css', array(), filemtime(get_stylesheet_directory() .'/css/base/reset.css')  );
	wp_enqueue_style( 'typography-style' , get_stylesheet_directory_uri() . '/css/base/typography.css', array(), filemtime(get_stylesheet_directory() .'/css/base/typography.css')  );
	wp_enqueue_style( 'colors-style', get_stylesheet_directory_uri() . '/css/base/colors.css', array(), filemtime(get_stylesheet_directory() .'/css/base/colors.css')  );
    wp_enqueue_style( 'layout-style', get_stylesheet_directory_uri() . '/css/base/layout.css' , array(), filemtime(get_stylesheet_directory() .'/css/base/layout.css')  );

	/* components */
	wp_enqueue_style( 'blocks-style', get_stylesheet_directory_uri() . '/css/components/blocks.css', array(), filemtime(get_stylesheet_directory() .'/css/components/blocks.css')  );

	/* template-parts */
	wp_enqueue_style( 'archive-style', get_stylesheet_directory_uri() . '/css/template-parts/archive.css', array(), filemtime(get_stylesheet_directory() .'/css/template-parts/archive.css')  );
    wp_enqueue_style( 'footer-style', get_stylesheet_directory_uri() . '/css/template-parts/footer.css' , array(), filemtime(get_stylesheet_directory() .'/css/template-parts/footer.css')  );
    wp_enqueue_style( 'header-style', get_stylesheet_directory_uri() . '/css/template-parts/header.css' , array(), filemtime(get_stylesheet_directory() .'/css/template-parts/header.css')  );

	/* dashicons */
	wp_enqueue_style( 'dashicons' );


}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



/*--------------------------------------------------------------------------------------*\
| CSS EDITOR STYLES
\*--------------------------------------------------------------------------------------*/
function editor_css_styles()
{
	add_theme_support('editor-styles');
	add_editor_style('/css/editor/editor-blocks.css');
	add_editor_style('/css/editor/editor-layout.css');
	add_editor_style('/css/editor/editor-typography.css');
	add_editor_style('/css/base/fonts.css');
}
add_action('after_setup_theme', 'editor_css_styles');



/*--------------------------------------------------------------------------------------*\
| JAVASCRIPT
\*--------------------------------------------------------------------------------------*/
function my_theme_enqueue_scripts() {
    wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/js/lightbox.js', filemtime(get_stylesheet_directory() . '/js/lightbox.js'), true);
	wp_enqueue_script( 'mobile-menu', get_stylesheet_directory_uri() . '/js/mobile-menu.js', filemtime(get_stylesheet_directory() . '/js/mobile-menu.js'), true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );



/*--------------------------------------------------------------------------------------*\
| CUSTOM THEME COLORS
\*--------------------------------------------------------------------------------------*/
function custom_theme_support() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function custom_theme_support2() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
    add_theme_support( 'custom-logo' );
}
add_action( 'init', 'custom_theme_support2' );




/*--------------------------------------------------------------------------------------*\
| CUSTOM THEME COLORS
\*--------------------------------------------------------------------------------------*/
function custom_theme_setup() {

	$grijs = '#c3c3c3';
	$wit = '#FFFEFD';
	$zwart = '#000033';
    $primary_color = get_theme_mod('primary_color', '#007bff');
    $secondary_color = get_theme_mod('secondary_color', '#6c757d');
    $background_color = get_theme_mod('background_color2', '#ffffff');
    $text_color = get_theme_mod('text_color', '#333333');
    $heading_color = get_theme_mod('heading_color', '#000000');

    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => 'Primary Color',
            'slug'  => 'primary-color',
            'color' => $primary_color,
        ),
        array(
            'name'  => 'Secondary Color',
            'slug'  => 'secondary-color',
            'color' => $secondary_color,
        ),
        array(
            'name'  => 'Background Color',
            'slug'  => 'background-color',
            'color' => $background_color,
        ),
        array(
            'name'  => 'Text Color',
            'slug'  => 'text-color',
            'color' => $text_color,
        ),
        array(
            'name'  => 'Heading Color',
            'slug'  => 'heading-color',
            'color' => $heading_color,
        ),
		array(
			'name'  => 'Zwart',
			'slug'  => 'zwart',
			'color' => $zwart,
		),
		array(
			'name'  => 'Wit',
			'slug'  => 'wit',
			'color' => $wit,
		),
		array(
			'name'  => 'Grijs',
			'slug'  => 'grijs',
			'color' => $grijs,
		)
	) );

}

add_action( 'after_setup_theme', 'custom_theme_setup' );


/*--------------------------------------------------------------------------------------*\
| STILL WORKS?
\*--------------------------------------------------------------------------------------*/
function custom_default_columns_block_alignment() {
    // Voeg 'wide' toe als standaard uitlijning voor core/columns blokken
    add_filter( 'block_editor_settings_all', function( $settings, $editor_id ) {
        $settings['blocks']['core/columns']['align']['default'] = 'wide';
        return $settings;
    }, 10, 2 );
}
add_action( 'init', 'custom_default_columns_block_alignment' );



/*--------------------------------------------------------------------------------------*\
| DEFAULT WIDE
\*--------------------------------------------------------------------------------------*/
function my_editor_assets() {
    wp_enqueue_script( 'wide-js', get_stylesheet_directory_uri() . '/js/wide.js', [ 'lodash','wp-blocks', 'wp-dom', 'wp-editor' ] , '', true );
    wp_enqueue_script( 'wp-editor', get_stylesheet_directory_uri() . '/js/editor.js', array('wp-blocks', 'wp-dom'), filemtime(get_stylesheet_directory() . '/js/editor.js'), true );
}
add_action( 'enqueue_block_editor_assets', 'my_editor_assets' );



/*--------------------------------------------------------------------------------------*\
| ADD AND REMOVE BLOCK PATTERN CATEGORIES
\*--------------------------------------------------------------------------------------*/
function removeCorePatterns() {
	unregister_block_pattern_category('buttons');
	unregister_block_pattern_category('columns');
	unregister_block_pattern_category('gallery');
	unregister_block_pattern_category('header');
	unregister_block_pattern_category('text');
	unregister_block_pattern_category('featured');
    unregister_block_pattern_category('posts');
	unregister_block_pattern_category('call-to-action');
	unregister_block_pattern_category('banner');
	unregister_block_pattern_category('footer');
    unregister_block_pattern_category('testimonials');
}
add_action('init', 'removeCorePatterns');



/*--------------------------------------------------------------------------------------*\
|   DISABLE GUTENBERG STYLE classic-theme-styles-inline-css
\*--------------------------------------------------------------------------------------*/
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'classic-theme' );
	wp_dequeue_style( 'classic-theme-styles-inline' );
	wp_dequeue_style( 'classic-theme-styles-inline-css' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );

add_action('wp_footer', function () {
	wp_dequeue_style('core-block-supports');
});



/*-----------------------------------------------------=--------------------------------*\
|  SET CUSTOM LOGO
\*--------------------------------------------------------------------------------------*/
function custom_theme_logo() {
    $custom_logo =
	'<a href="' . get_home_url() . '">' .
		'<img class="logo" src="' . esc_url(get_template_directory_uri() . '/assets/images/logo.svg') . '" alt="' . esc_attr(get_bloginfo('name')) . '" />' .
	'</a>';
    return $custom_logo;
}
add_filter('get_custom_logo', 'custom_theme_logo');



/*--------------------------------------------------------------------------------------*\
|  LOGIN PAGE CUSTOM LOGO
\*--------------------------------------------------------------------------------------*/
function my_custom_login_logo() {
echo '<style type="text/css">
h1 a {
	background-image: url('. esc_url(get_template_directory_uri() . '/assets/images/logo.svg') .') !important;
    height: auto !important;
    width: 100% !important;
    aspect-ratio: 109/75;
    background-size: cover !important;
	margin-bottom: 3rem !important;
}
.language-switcher{
	display:none;
}
</style>';
}
add_action('login_head', 'my_custom_login_logo');


/*--------------------------------------------------------------------------------------*\
|  REGISTERED / ALLOWED BLOCKS
\*--------------------------------------------------------------------------------------*/
function wpdocs_allowed_block_types ( $block_editor_context, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
		return array(
			'core/paragraph',
			'core/separator',
			'core/heading',
			'core/list',
			'core/list-item',
			'core/media-text',
			'acf/faq',
			'core/image',
			'core/gallery',
			'core/video',
			'core/buttons',
			'core/button',
			'core/columns',
			'core/column',
			'core/shortcode',
			'core/social-links',
			'core/social-link',
			'core/site-logo',
			'core/loginout',
			'core/html',
			'core/cover',
			'flavus/card-carousel',

		);
	}

	return $block_editor_context;
}

add_filter( 'allowed_block_types_all', 'wpdocs_allowed_block_types', 10, 2 );


/*--------------------------------------------------------------------------------------*\
|  SET PERMALINKS TO POSTNAME
\*--------------------------------------------------------------------------------------*/
function set_custom_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
    $wp_rewrite->flush_rules(); // Regelcache wissen om de nieuwe permalinkstructuur toe te passen
}
add_action( 'init', 'set_custom_permalinks' );




function my_default_editor_content( $content, $post ) {
    // Check if it's a new post and the post type is 'page'
    if ( 'page' === $post->post_type && 'auto-draft' === $post->post_status ) {
        // Define the default header block content
        $default_header_content =
			'<!-- wp:paragraph -->
			<p>Dit is de header</p>
			<!-- /wp:paragraph -->';
        $content .= $default_header_content;
    }

    return $content;
}
//add_filter( 'default_content', 'my_default_editor_content', 10, 2 );






// *** TODO ***
// query block optimaliseren
// kleuren invoegen via customizer
// achtegrond kleuren footer en header dynamisch maken via customizer
