<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

$prorange_footer_scheme =  prorange_is_inherit(prorange_get_theme_option('footer_scheme')) ? prorange_get_theme_option('color_scheme') : prorange_get_theme_option('footer_scheme');
?>
<footer class="footer_wrap footer_default scheme_<?php echo esc_attr($prorange_footer_scheme); ?>">
	<?php

	// Footer widgets area
	get_template_part( 'templates/footer-widgets' );

	// Logo
	get_template_part( 'templates/footer-logo' );

	// Socials
	get_template_part( 'templates/footer-socials' );

	// Menu
	get_template_part( 'templates/footer-menu' );

	// Copyright area
	get_template_part( 'templates/footer-copyright' );
	
	?>
</footer><!-- /.footer_wrap -->
