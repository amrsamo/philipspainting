<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

// Footer sidebar
$prorange_footer_name = prorange_get_theme_option('footer_widgets');
$prorange_footer_present = !prorange_is_off($prorange_footer_name) && is_active_sidebar($prorange_footer_name);
if ($prorange_footer_present) { 
	prorange_storage_set('current_sidebar', 'footer');
	$prorange_footer_wide = prorange_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($prorange_footer_name) ) {
		dynamic_sidebar($prorange_footer_name);
	}
	$prorange_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($prorange_out)) {
		$prorange_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $prorange_out);
		$prorange_need_columns = true;	//or check: strpos($prorange_out, 'columns_wrap')===false;
		if ($prorange_need_columns) {
			$prorange_columns = max(0, (int) prorange_get_theme_option('footer_columns'));
			if ($prorange_columns == 0) $prorange_columns = min(4, max(1, substr_count($prorange_out, '<aside ')));
			if ($prorange_columns > 1)
				$prorange_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($prorange_columns).' widget ', $prorange_out);
			else
				$prorange_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($prorange_footer_wide) ? ' footer_fullwidth' : ''; ?> sc_layouts_row  sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$prorange_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($prorange_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'prorange_action_before_sidebar' );
				prorange_show_layout($prorange_out);
				do_action( 'prorange_action_after_sidebar' );
				if ($prorange_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$prorange_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>