<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_post_id    = get_the_ID();
$prorange_post_date  = prorange_get_date();
$prorange_post_title = get_the_title();
$prorange_post_link  = get_permalink();
$prorange_post_author_id   = get_the_author_meta('ID');
$prorange_post_author_name = get_the_author_meta('display_name');
$prorange_post_author_url  = get_author_posts_url($prorange_post_author_id, '');

$prorange_args = get_query_var('prorange_args_widgets_posts');
$prorange_show_date = isset($prorange_args['show_date']) ? (int) $prorange_args['show_date'] : 1;
$prorange_show_image = isset($prorange_args['show_image']) ? (int) $prorange_args['show_image'] : 1;
$prorange_show_author = isset($prorange_args['show_author']) ? (int) $prorange_args['show_author'] : 1;
$prorange_show_counters = isset($prorange_args['show_counters']) ? (int) $prorange_args['show_counters'] : 1;
$prorange_show_categories = isset($prorange_args['show_categories']) ? (int) $prorange_args['show_categories'] : 1;

$prorange_output = prorange_storage_get('prorange_output_widgets_posts');

$prorange_post_counters_output = '';
if ( $prorange_show_counters ) {
	$prorange_post_counters_output = '<span class="post_info_item post_info_counters">'
								. prorange_get_post_counters('comments')
							. '</span>';
}


$prorange_output .= '<article class="post_item with_thumb">';

if ($prorange_show_image) {
	$prorange_post_thumb = get_the_post_thumbnail($prorange_post_id, prorange_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($prorange_post_thumb) $prorange_output .= '<div class="post_thumb">' . ($prorange_post_link ? '<a href="' . esc_url($prorange_post_link) . '">' : '') . ($prorange_post_thumb) . ($prorange_post_link ? '</a>' : '') . '</div>';
}

$prorange_output .= '<div class="post_content">'
			. ($prorange_show_categories 
					? '<div class="post_categories">'
						. prorange_get_post_categories()
						. $prorange_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($prorange_post_link ? '<a href="' . esc_url($prorange_post_link) . '">' : '') . ($prorange_post_title) . ($prorange_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('prorange_filter_get_post_info', 
								'<div class="post_info">'
									. ($prorange_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($prorange_post_link ? '<a href="' . esc_url($prorange_post_link) . '" class="post_info_date">' : '') 
											. esc_html($prorange_post_date) 
											. ($prorange_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($prorange_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'prorange') . ' ' 
											. ($prorange_post_link ? '<a href="' . esc_url($prorange_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($prorange_post_author_name) 
											. ($prorange_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$prorange_show_categories && $prorange_post_counters_output
										? $prorange_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
prorange_storage_set('prorange_output_widgets_posts', $prorange_output);
?>