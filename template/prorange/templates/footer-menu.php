<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

// Footer menu
$prorange_menu_footer = prorange_get_nav_menu('menu_footer');
if (!empty($prorange_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php prorange_show_layout($prorange_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>