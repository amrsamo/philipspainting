<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
$prorange_animation = prorange_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($prorange_post_format) ); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>
	><?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	prorange_show_post_featured(array( 'thumb_size' => prorange_get_thumb_size( strpos(prorange_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	// Title and post meta
	if (get_the_title() != '') {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('prorange_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

			?>
		</div><!-- .post_header --><?php
	}
	
	// Post content
	?><div class="post_content entry-content"><?php
		if (prorange_get_theme_option('blog_content') == 'fullpost') {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'prorange' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'prorange' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$prorange_show_learn_more = true;

			// Post content area
			?><div class="post_content_inner"><?php
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
			?></div><div class="post-bottom"><div class="meta-bottom"><?php
            do_action('prorange_action_before_post_meta');

            // Post meta
            prorange_show_post_meta(array(
                    'categories' => false,
                    'date' => true,
                    'author' => true,
                    'edit' => false,
                    'seo' => false,
                    'share' => false,
                    'counters' => 'comments'	//comments,likes,views - comma separated in any combination
                )
            );
            ?></div><div class="button-bottom"><?php
			// More button
			if ( $prorange_show_learn_more ) {
				?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'prorange'); ?></a></p><?php
			}


		}
	?></div></div></div><!-- .entry-content -->
</article>