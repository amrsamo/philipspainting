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
$prorange_columns = empty($prorange_blog_style[1]) ? 1 : max(1, $prorange_blog_style[1]);
$prorange_expanded = !prorange_sidebar_present() && prorange_is_on(prorange_get_theme_option('expand_content'));
$prorange_post_format = get_post_format();
$prorange_post_format = empty($prorange_post_format) ? 'standard' : str_replace('post-format-', '', $prorange_post_format);
$prorange_animation = prorange_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($prorange_columns).' post_format_'.esc_attr($prorange_post_format) ); ?>
	<?php echo (!prorange_is_off($prorange_animation) ? ' data-animation="'.esc_attr(prorange_get_animation_classes($prorange_animation)).'"' : ''); ?>>

	<?php
	// Add anchor
	if ($prorange_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.esc_attr(get_the_title()).'"]');
	}

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	prorange_show_post_featured( array(
											'class' => $prorange_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => prorange_get_thumb_size(
																	strpos(prorange_get_theme_option('body_style'), 'full')!==false
																		? ( $prorange_columns > 1 ? 'huge' : 'original' )
																		: (	$prorange_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('prorange_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('prorange_action_before_post_meta'); 

			// Post meta
			$prorange_post_meta = prorange_show_post_meta(array(
                    'categories' => $prorange_columns > 1 ? false : true,
                    'date' => true,
                    'edit' => false,
                    'seo' => false,
                    'share' => false,
                    'counters' => 'comments'	//comments,likes,views - comma separated in any combination
                )
								);
			prorange_show_layout($prorange_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$prorange_show_learn_more = !in_array($prorange_post_format, array('link', 'aside', 'status', 'quote'));
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
				prorange_show_layout($prorange_post_meta);
			}
			// More button
			if ( $prorange_show_learn_more ) {
				?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'prorange'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>