<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

prorange_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$prorange_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$prorange_sticky_out = prorange_get_theme_option('sticky_style')=='columns' 
							&& is_array($prorange_stickies) && count($prorange_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($prorange_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$prorange_sticky_out) {
		?><div class="chess_wrap posts_container"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($prorange_sticky_out && !is_sticky()) {
			$prorange_sticky_out = false;
			?></div><div class="chess_wrap posts_container"><?php
		}
		get_template_part( 'content', $prorange_sticky_out && is_sticky() ? 'sticky' :'chess' );
	}
	
	?></div><?php

	prorange_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>