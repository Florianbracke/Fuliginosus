<?php


/*--------------------------------------------------------------------------------------*\
|  ADMIN BAR: ADD FRONT - BACK SWITCH
\*--------------------------------------------------------------------------------------*/
function custom_options_page_links() {
    global $wp_admin_bar;
	if (is_admin()) {
		$wp_admin_bar->add_menu(
			array(
				'id'    => 'frontend',
				'title' => 'Frontend <span class="frontend-icon"></span>',
				'href'  => get_home_url(),
			)
		);
	} else{
		$wp_admin_bar->add_menu(
			array(
				'id'    => 'backend',
				'title' => 'Backend <span class="backend-icon"></span>',
				'href'  => get_admin_url(),
			)
		);
	}
}
add_action('admin_bar_menu', 'custom_options_page_links');


/*--------------------------------------------------------------------------------------*\
|  ADMIN BAR: STYLE FRONT - BACK SWITCH
\*--------------------------------------------------------------------------------------*/
function override_admin_bar_css() { 

   if ( is_admin_bar_showing() ) { ?>

		<style type="text/css">
			#wp-admin-bar-frontend .frontend-icon::before {
				font-family: 'dashicons';
				content: '\f105';
				font-size: 14px;
				position: relative;
				float: left;
				margin-right: 6px;
			}
			#wp-admin-bar-backend .backend-icon::before {
				font-family: 'dashicons';
				content: '\f105';
				font-size: 14px;
				position: relative;
				float: left;
				margin-right: 6px;
			}
		</style>

   <?php }
}
add_action( 'admin_head', 'override_admin_bar_css' );
add_action( 'wp_head', 'override_admin_bar_css' );


/*--------------------------------------------------------------------------------------*\
|  ADMIN BAR: REMOVE COMMENTS + UPDATES
\*--------------------------------------------------------------------------------------*/
function remove_wp_nodes()
{
global $wp_admin_bar;
$wp_admin_bar->remove_node('updates');
$wp_admin_bar->remove_menu('comments');
$wp_admin_bar->remove_node( 'new-link' );
$wp_admin_bar->remove_node( 'new-user' );
$wp_admin_bar->remove_node( 'new-media' );
}
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );


/*--------------------------------------------------------------------------------------*\
|  ADMIN BAR: REMOVE NODES
\*--------------------------------------------------------------------------------------*/
function remove_nodes_admin_bar(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_menu('site-name');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_menu('comments');

    // sub menu '+ nieuw'
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('new-projecten');
    $wp_admin_bar->remove_menu('gravityforms-new-form');
    $wp_admin_bar->add_node( 
        array( 
            'id' => 'customize', 
            'title' => 'Instellingen', 
        ) 
    );

}
add_action( 'wp_before_admin_bar_render', 'remove_nodes_admin_bar',999 );




?>