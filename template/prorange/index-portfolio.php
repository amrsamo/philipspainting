<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

prorange_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', prorange_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded', prorange_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
wp_enqueue_script( 'masonry', prorange_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
wp_enqueue_script( 'prorange-gallery-script', prorange_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$prorange_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$prorange_sticky_out = prorange_get_theme_option('sticky_style')=='columns' 
							&& is_array($prorange_stickies) && count($prorange_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$prorange_cat = prorange_get_theme_option('parent_cat');
	$prorange_post_type = prorange_get_theme_option('post_type');
	$prorange_taxonomy = prorange_get_post_type_taxonomy($prorange_post_type);
	$prorange_show_filters = prorange_get_theme_option('show_filters');
	$prorange_tabs = array();
	if (!prorange_is_off($prorange_show_filters)) {
		$prorange_args = array(
			'type'			=> $prorange_post_type,
			'child_of'		=> $prorange_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $prorange_taxonomy,
			'pad_counts'	=> false
		);
		$prorange_portfolio_list = get_terms($prorange_args);
		if (is_array($prorange_portfolio_list) && count($prorange_portfolio_list) > 0) {
			$prorange_tabs[$prorange_cat] = esc_html__('All', 'prorange');
			foreach ($prorange_portfolio_list as $prorange_term) {
				if (isset($prorange_term->term_id)) $prorange_tabs[$prorange_term->term_id] = $prorange_term->name;
			}
		}
	}
	if (count($prorange_tabs) > 0) {
		$prorange_portfolio_filters_ajax = true;
		$prorange_portfolio_filters_active = $prorange_cat;
		$prorange_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters prorange_tabs prorange_tabs_ajax">
			<ul class="portfolio_titles prorange_tabs_titles">
				<?php
				foreach ($prorange_tabs as $prorange_id=>$prorange_title) {
					?><li><a href="<?php echo esc_url(prorange_get_hash_link(sprintf('#%s_%s_content', $prorange_portfolio_filters_id, $prorange_id))); ?>" data-tab="<?php echo esc_attr($prorange_id); ?>"><?php echo esc_html($prorange_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$prorange_ppp = prorange_get_theme_option('posts_per_page');
			if (prorange_is_inherit($prorange_ppp)) $prorange_ppp = '';
			foreach ($prorange_tabs as $prorange_id=>$prorange_title) {
				$prorange_portfolio_need_content = $prorange_id==$prorange_portfolio_filters_active || !$prorange_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $prorange_portfolio_filters_id, $prorange_id)); ?>"
					class="portfolio_content prorange_tabs_content"
					data-blog-template="<?php echo esc_attr(prorange_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(prorange_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($prorange_ppp); ?>"
					data-post-type="<?php echo esc_attr($prorange_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($prorange_taxonomy); ?>"
					data-cat="<?php echo esc_attr($prorange_id); ?>"
					data-parent-cat="<?php echo esc_attr($prorange_cat); ?>"
					data-need-content="<?php echo (false===$prorange_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($prorange_portfolio_need_content) 
						prorange_show_portfolio_posts(array(
							'cat' => $prorange_id,
							'parent_cat' => $prorange_cat,
							'taxonomy' => $prorange_taxonomy,
							'post_type' => $prorange_post_type,
							'page' => 1,
							'sticky' => $prorange_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		prorange_show_portfolio_posts(array(
			'cat' => $prorange_cat,
			'parent_cat' => $prorange_cat,
			'taxonomy' => $prorange_taxonomy,
			'post_type' => $prorange_post_type,
			'page' => 1,
			'sticky' => $prorange_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>