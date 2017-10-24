<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

$prorange_args = get_query_var('prorange_logo_args');

// Site logo
$prorange_logo_image  = prorange_get_logo_image(isset($prorange_args['type']) ? $prorange_args['type'] : '');
$prorange_logo_text   = prorange_is_on(prorange_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$prorange_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($prorange_logo_image) || !empty($prorange_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($prorange_logo_image)) {
			$prorange_attr = prorange_getimagesize($prorange_logo_image);
			echo '<img src="'.esc_url($prorange_logo_image).'" alt=""'.(!empty($prorange_attr[3]) ? sprintf(' %s', $prorange_attr[3]) : '').'>' ;
		} else {
			prorange_show_layout(prorange_prepare_macros($prorange_logo_text), '<span class="logo_text">', '</span>');
			prorange_show_layout(prorange_prepare_macros($prorange_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>