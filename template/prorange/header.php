<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
										 // Class scheme_xxx need in the <html> as context for the <body>!
										 echo esc_attr(prorange_get_theme_option('color_scheme'));
										 ?>">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'prorange_action_before' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">

			<?php
			// Desktop header
			$prorange_header_style = prorange_get_theme_option("header_style");
			if (strpos($prorange_header_style, 'header-custom-')===0) $prorange_header_style = 'header-custom';
			get_template_part( "templates/{$prorange_header_style}");

			// Side menu
			if (in_array(prorange_get_theme_option('menu_style'), array('left', 'right'))) {
				get_template_part( 'templates/header-navi-side' );
			}

			// Mobile header
			get_template_part( 'templates/header-mobile');
			?>

			<div class="page_content_wrap scheme_<?php echo esc_attr(prorange_get_theme_option('color_scheme')); ?>">

				<?php if (prorange_get_theme_option('body_style') != 'fullscreen') { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					prorange_create_widgets_area('widgets_above_page');
					?>				

					<div class="content">
						<?php
						// Widgets area inside page content
						prorange_create_widgets_area('widgets_above_content');
						?>				
