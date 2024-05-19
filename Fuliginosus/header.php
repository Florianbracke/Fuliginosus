<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
    <title><?php echo get_the_title(); ?></title>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<header class='site-header'>

		<nav class="top-nav">

			<?php the_custom_logo(); ?>

			<?php wp_nav_menu(array('menu' => 'Header Navigatie')); ?>

		</nav>

		<!-- <div class="breadcrumbs">

		</div> -->


		<div class="mobile-nav">
			<div class="button"><p>MENU</p></div>
		</div>

	</header>

    <main id="main" class="site-main">
