<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

// Logo
if (prorange_is_on(prorange_get_theme_option('logo_in_footer'))) {
	$prorange_logo_image = '';
	if (prorange_get_retina_multiplier(2) > 1)
		$prorange_logo_image = prorange_get_theme_option( 'logo_footer_retina' );
	if (empty($prorange_logo_image)) 
		$prorange_logo_image = prorange_get_theme_option( 'logo_footer' );
	$prorange_logo_text   = get_bloginfo( 'name' );
	if (!empty($prorange_logo_image) || !empty($prorange_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($prorange_logo_image)) {
					$prorange_attr = prorange_getimagesize($prorange_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($prorange_logo_image).'" class="logo_footer_image" alt=""'.(!empty($prorange_attr[3]) ? sprintf(' %s', $prorange_attr[3]) : '').'></a>' ;
				} else if (!empty($prorange_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($prorange_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>