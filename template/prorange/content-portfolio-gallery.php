<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_blog_style = explode('_', prorange_get_theme_option('blog_style'));
$prorange_columns = empty($prorange_blog_style[1]) ? 2 : max(2, $prorange_blog_style[1]);
$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
$prorange_animation = prorange_get_theme_option('blog_animation');
$prorange_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($prorange_columns).' post_format_'.esc_attr($prorange_post_format) ); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($prorange_image[1]) && !empty($prorange_image[2])) echo intval($prorange_image[1]) .'x' . intval($prorange_image[2]); ?>"
	data-src="<?php if (!empty($prorange_image[0])) echo esc_url($prorange_image[0]); ?>"
	>

	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$prorange_image_hover = 'icon';	//prorange_get_theme_option('image_hover');
	if (in_array($prorange_image_hover, array('icons', 'zoom'))) $prorange_image_hover = 'dots';
	prorange_show_post_featured(array(
		'hover' => $prorange_image_hover,
		'thumb_size' => prorange_get_thumb_size( strpos(prorange_get_theme_option('body_style'), 'full')!==false || $prorange_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. prorange_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'prorange') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>