<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_link = get_permalink();
$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($prorange_post_format) ); ?>><?php
	prorange_show_post_featured(array(
		'thumb_size' => prorange_get_thumb_size( 'big' ),
		'show_no_image' => false,
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">' . prorange_get_post_categories('') . '</div>'
							. '<h6 class="post_title entry-title"><a href="' . esc_url($prorange_link) . '">' . get_the_title() . '</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="' . esc_url($prorange_link) . '">' . prorange_get_date() . '</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>