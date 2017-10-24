<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

// Header sidebar
$prorange_header_name = prorange_get_theme_option('header_widgets');
$prorange_header_present = !prorange_is_off($prorange_header_name) && is_active_sidebar($prorange_header_name);
if ($prorange_header_present) { 
	prorange_storage_set('current_sidebar', 'header');
	$prorange_header_wide = prorange_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($prorange_header_name) ) {
		dynamic_sidebar($prorange_header_name);
	}
	$prorange_widgets_output = ob_get_contents();
	ob_end_clean();
	if (!empty($prorange_widgets_output)) {
		$prorange_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $prorange_widgets_output);
		$prorange_need_columns = strpos($prorange_widgets_output, 'columns_wrap')===false;
		if ($prorange_need_columns) {
			$prorange_columns = max(0, (int) prorange_get_theme_option('header_columns'));
			if ($prorange_columns == 0) $prorange_columns = min(6, max(1, substr_count($prorange_widgets_output, '<aside ')));
			if ($prorange_columns > 1)
				$prorange_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($prorange_columns).' widget ', $prorange_widgets_output);
			else
				$prorange_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($prorange_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$prorange_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($prorange_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'prorange_action_before_sidebar' );
				prorange_show_layout($prorange_widgets_output);
				do_action( 'prorange_action_after_sidebar' );
				if ($prorange_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$prorange_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>