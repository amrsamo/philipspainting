<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the Visual Composer to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$prorange_content = '';
$prorange_blog_archive_mask = '%%CONTENT%%';
$prorange_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $prorange_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($prorange_content = apply_filters('the_content', get_the_content())) != '') {
		if (($prorange_pos = strpos($prorange_content, $prorange_blog_archive_mask)) !== false) {
			$prorange_content = preg_replace('/(\<p\>\s*)?'.$prorange_blog_archive_mask.'(\s*\<\/p\>)/i', $prorange_blog_archive_subst, $prorange_content);
		} else
			$prorange_content .= $prorange_blog_archive_subst;
		$prorange_content = explode($prorange_blog_archive_mask, $prorange_content);
		// Add VC custom styles to the inline CSS
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( !empty( $vc_custom_css ) ) prorange_add_inline_css(strip_tags($vc_custom_css));
	}
}

// Prepare args for a new query
$prorange_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$prorange_args = prorange_query_add_posts_and_cats($prorange_args, '', prorange_get_theme_option('post_type'), prorange_get_theme_option('parent_cat'));
$prorange_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($prorange_page_number > 1) {
	$prorange_args['paged'] = $prorange_page_number;
	$prorange_args['ignore_sticky_posts'] = true;
}
$prorange_ppp = prorange_get_theme_option('posts_per_page');
if ((int) $prorange_ppp != 0)
	$prorange_args['posts_per_page'] = (int) $prorange_ppp;
// Make a new query
query_posts( $prorange_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($prorange_content) && count($prorange_content) == 2) {
	set_query_var('blog_archive_start', $prorange_content[0]);
	set_query_var('blog_archive_end', $prorange_content[1]);
}

get_template_part('index');
?>