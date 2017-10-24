<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

// Page (category, tag, archive, author) title

if ( prorange_need_page_title() ) {
	prorange_sc_layouts_showed('title', true);
	prorange_sc_layouts_showed('postmeta', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal scheme_dark">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php

						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$prorange_blog_title = prorange_get_blog_title();
							$prorange_blog_title_text = $prorange_blog_title_class = $prorange_blog_title_link = $prorange_blog_title_link_text = '';
							if (is_array($prorange_blog_title)) {
								$prorange_blog_title_text = $prorange_blog_title['text'];
								$prorange_blog_title_class = !empty($prorange_blog_title['class']) ? ' '.$prorange_blog_title['class'] : '';
								$prorange_blog_title_link = !empty($prorange_blog_title['link']) ? $prorange_blog_title['link'] : '';
								$prorange_blog_title_link_text = !empty($prorange_blog_title['link_text']) ? $prorange_blog_title['link_text'] : '';
							} else
								$prorange_blog_title_text = $prorange_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($prorange_blog_title_class); ?>"><?php
								$prorange_top_icon = prorange_get_category_icon();
								if (!empty($prorange_top_icon)) {
									$prorange_attr = prorange_getimagesize($prorange_top_icon);
									?><img src="<?php echo esc_url($prorange_top_icon); ?>" alt="" <?php if (!empty($prorange_attr[3])) prorange_show_layout($prorange_attr[3]);?>><?php
								}
								echo wp_kses_data($prorange_blog_title_text);
							?></h1>
							<?php
							if (!empty($prorange_blog_title_link) && !empty($prorange_blog_title_link_text)) {
								?><a href="<?php echo esc_url($prorange_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($prorange_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'prorange_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>