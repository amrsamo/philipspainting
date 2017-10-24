<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */


// Socials
if ( prorange_is_on(prorange_get_theme_option('socials_in_footer')) && ($prorange_output = prorange_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php prorange_show_layout($prorange_output); ?>
		</div>
	</div>
	<?php
}
?>