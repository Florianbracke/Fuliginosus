<?php

/*--------------------------------------------------------------------------------------*\
| ADD COLORS TO HEADER
\*--------------------------------------------------------------------------------------*/
function add_root_colors_to_header() { ?>

	<style id='root-colors'>
		:root {
	        --zwart: #161916;
			--grijs: #f4f4f4;
			--wit: #ffffff;

			/* CUSTOMIZER COLORS */
			--primary-color: <?php echo get_theme_mod('primary_color', '#007bff'); ?>;
			--secondary-color: <?php echo get_theme_mod('secondary_color', '#6c757d'); ?>;
			--background-color: <?php echo get_theme_mod('background_color2', '#ffffff'); ?>;
			--text-color: <?php echo get_theme_mod('text_color', '#333333'); ?>;
			--heading-color: <?php echo get_theme_mod('heading_color', '#000000'); ?>;
			--button-text-color: <?php echo get_theme_mod('button_text_color', '#ffffff'); ?>;

			/* CUSTOMIZER TYPOGRAPHY */
			--body-line-height: <?php echo get_theme_mod('body_line_height_setting', '1.5'); ?>;
			--body-letter-spacing: <?php echo get_theme_mod('body_letter_spacing_setting', '0'); ?>;

			--heading-line-height: <?php echo get_theme_mod('heading_line_height_setting', '1.2'); ?>;
			--heading-letter-spacing: <?php echo get_theme_mod('heading_letter_spacing_setting', '0'); ?>;

			--font-text: <?php echo get_theme_mod('body_font_dropdown_setting'); ?>, sans-serif;
			--font-heading: <?php echo get_theme_mod('heading_font_dropdown_setting'); ?>, sans-serif;

			--spacing-small: 16px;
			--spacing-mid: 32px;
			--spacing-medium: 48px;
			--spacing-big: 64px;

			--spacing-gap: var(--spacing-mid);

			--padding-sides: calc(1 * var(--spacing-medium));

			--max-width: 1300px;
			--small-width: 800px;

			--border-radius-small: 4px;
			--border-radius-medium: 12px;

			--text-font-size: 16px;
			--line-height: 1.15;


			--header-logo-size: 160px;

		}
	</style>

<?php }
add_action('wp_head', 'add_root_colors_to_header', 1);
add_action('admin_head', 'add_root_colors_to_header', 1);

