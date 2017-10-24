<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

						// Widgets area inside page content
						prorange_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					prorange_create_widgets_area('widgets_below_page');

					$prorange_body_style = prorange_get_theme_option('body_style');
					if ($prorange_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$prorange_footer_style = prorange_get_theme_option("footer_style");
			if (strpos($prorange_footer_style, 'footer-custom-')===0) $prorange_footer_style = 'footer-custom';
			get_template_part( "templates/{$prorange_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (prorange_is_on(prorange_get_theme_option('debug_mode')) && prorange_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(prorange_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>