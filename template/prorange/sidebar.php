<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_sidebar_position = prorange_get_theme_option('sidebar_position');
if (prorange_sidebar_present()) {
	ob_start();
	$prorange_sidebar_name = prorange_get_theme_option('sidebar_widgets');
	prorange_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($prorange_sidebar_name) ) {
		dynamic_sidebar($prorange_sidebar_name);
	}
	$prorange_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($prorange_out)) {
		?>
		<div class="sidebar <?php echo esc_attr($prorange_sidebar_position); ?> widget_area<?php if (!prorange_is_inherit(prorange_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(prorange_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'prorange_action_before_sidebar' );
				prorange_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $prorange_out));
				do_action( 'prorange_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>