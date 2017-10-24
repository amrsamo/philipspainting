<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($prorange_columns).' post_format_'.esc_attr($prorange_post_format).(is_sticky() && !is_paged() ? ' sticky' : '') ); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$prorange_image_hover = prorange_get_theme_option('image_hover');
	// Featured image
	prorange_show_post_featured(array(
		'thumb_size' => prorange_get_thumb_size(strpos(prorange_get_theme_option('body_style'), 'full')!==false || $prorange_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $prorange_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $prorange_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>