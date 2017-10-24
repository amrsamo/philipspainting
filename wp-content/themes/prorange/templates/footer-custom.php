<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

$prorange_footer_scheme =  prorange_is_inherit(prorange_get_theme_option('footer_scheme')) ? prorange_get_theme_option('color_scheme') : prorange_get_theme_option('footer_scheme');
$prorange_footer_id = str_replace('footer-custom-', '', prorange_get_theme_option("footer_style"));
$prorange_footer_meta = get_post_meta($prorange_footer_id, 'trx_addons_options', true);
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($prorange_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($prorange_footer_id))); 
						if (!empty($prorange_footer_meta['margin']) != '') 
							echo ' '.esc_attr(prorange_add_inline_css_class('margin-top: '.esc_attr(prorange_prepare_css_value($prorange_footer_meta['margin'])).';'));
						?> scheme_<?php echo esc_attr($prorange_footer_scheme); 
						?>">
	<?php
    // Custom footer's layout
    do_action('prorange_action_show_layout', $prorange_footer_id);
	?>
</footer><!-- /.footer_wrap -->
