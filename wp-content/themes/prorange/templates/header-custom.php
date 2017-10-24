<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.06
 */

$prorange_header_css = $prorange_header_image = '';
$prorange_header_video = prorange_get_header_video();
if (true || empty($prorange_header_video)) {
	$prorange_header_image = get_header_image();
	if (prorange_is_on(prorange_get_theme_option('header_image_override')) && apply_filters('prorange_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($prorange_cat_img = prorange_get_category_image()) != '')
				$prorange_header_image = $prorange_cat_img;
		} else if (is_singular() || prorange_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$prorange_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($prorange_header_image)) $prorange_header_image = $prorange_header_image[0];
			} else
				$prorange_header_image = '';
		}
	}
}

$prorange_header_id = str_replace('header-custom-', '', prorange_get_theme_option("header_style"));
$prorange_header_meta = get_post_meta($prorange_header_id, 'trx_addons_options', true);

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($prorange_header_id); 
						?> top_panel_custom_<?php echo esc_attr(sanitize_title(get_the_title($prorange_header_id)));
						echo !empty($prorange_header_image) || !empty($prorange_header_video) 
							? ' with_bg_image' 
							: ' without_bg_image';
						if ($prorange_header_video!='') 
							echo ' with_bg_video';
						if ($prorange_header_image!='') 
							echo ' '.esc_attr(prorange_add_inline_css_class('background-image: url('.esc_url($prorange_header_image).');'));
						if (!empty($prorange_header_meta['margin']) != '') 
							echo ' '.esc_attr(prorange_add_inline_css_class('margin-bottom: '.esc_attr(prorange_prepare_css_value($prorange_header_meta['margin'])).';'));
						if (is_single() && has_post_thumbnail()) 
							echo ' with_featured_image';
						if (prorange_is_on(prorange_get_theme_option('header_fullheight'))) 
							echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(prorange_is_inherit(prorange_get_theme_option('header_scheme')) 
														? prorange_get_theme_option('color_scheme') 
														: prorange_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($prorange_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('prorange_action_show_layout', $prorange_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );
		
?></header>