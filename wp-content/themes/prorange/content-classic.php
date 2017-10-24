<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_blog_style = explode('_', prorange_get_theme_option('blog_style'));
$prorange_columns = empty($prorange_blog_style[1]) ? 2 : max(2, $prorange_blog_style[1]);
$prorange_expanded = !prorange_sidebar_present() && prorange_is_on(prorange_get_theme_option('expand_content'));
$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
$prorange_animation = prorange_get_theme_option('blog_animation');

?><div class="<?php echo $prorange_blog_style[0] == 'classic' ? 'column' : 'masonry_item masonry_item'; ?>-1_<?php echo esc_attr($prorange_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_format_'.esc_attr($prorange_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($prorange_columns)
					. ' post_layout_'.esc_attr($prorange_blog_style[0]) 
					. ' post_layout_'.esc_attr($prorange_blog_style[0]).'_'.esc_attr($prorange_columns)
					); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	prorange_show_post_featured( array( 'thumb_size' => prorange_get_thumb_size($prorange_blog_style[0] == 'classic'
													? (strpos(prorange_get_theme_option('body_style'), 'full')!==false 
															? ( $prorange_columns > 2 ? 'big' : 'huge' )
															: (	$prorange_columns > 2
																? ($prorange_expanded ? 'med' : 'small')
																: ($prorange_expanded ? 'big' : 'med')
																)
														)
													: (strpos(prorange_get_theme_option('body_style'), 'full')!==false 
															? ( $prorange_columns > 2 ? 'masonry-big' : 'full' )
															: (	$prorange_columns <= 2 && $prorange_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($prorange_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('prorange_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );

			do_action('prorange_action_before_post_meta');

            prorange_show_post_meta(array(
                    'categories' => false,
                    'date' => true,
                    'edit' => false,
                    'seo' => false,
                    'share' => false,
                    'counters' => 'comments'	//comments,likes,views - comma separated in any combination
                )
            );
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$prorange_show_learn_more = false; //!in_array($prorange_post_format, array('link', 'aside', 'status', 'quote'));
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($prorange_post_format, array('link', 'aside', 'status'))) {
				the_content();
			} else if ($prorange_post_format == 'quote') {
				if (($quote = prorange_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))!='')
					prorange_show_layout(wpautop($quote));
				else
					the_excerpt();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($prorange_post_format, array('link', 'aside', 'status', 'quote'))) {
			prorange_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $prorange_show_learn_more ) {
			?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'prorange'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>