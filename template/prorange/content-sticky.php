<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
$prorange_animation = prorange_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($prorange_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($prorange_post_format) ); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	prorange_show_post_featured(array(
		'thumb_size' => prorange_get_thumb_size($prorange_columns==1 ? 'big' : ($prorange_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($prorange_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			prorange_show_post_meta();
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>