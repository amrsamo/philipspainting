<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
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

?><header class="top_panel top_panel_default<?php
					echo !empty($prorange_header_image) || !empty($prorange_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($prorange_header_video!='') echo ' with_bg_video';
					if ($prorange_header_image!='') echo ' '.esc_attr(prorange_add_inline_css_class('background-image: url('.esc_url($prorange_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (prorange_is_on(prorange_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(prorange_is_inherit(prorange_get_theme_option('header_scheme')) 
													? prorange_get_theme_option('color_scheme') 
													: prorange_get_theme_option('header_scheme'));
					?>"><?php

	// Background video
	if (!empty($prorange_header_video)) {
		get_template_part( 'templates/header-video' );
	}
	
	// Main menu
	if (prorange_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>