<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.10
 */

// Copyright area
$prorange_footer_scheme =  prorange_is_inherit(prorange_get_theme_option('footer_scheme')) ? prorange_get_theme_option('color_scheme') : prorange_get_theme_option('footer_scheme');
$prorange_copyright_scheme = prorange_is_inherit(prorange_get_theme_option('copyright_scheme')) ? $prorange_footer_scheme : prorange_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($prorange_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				// Replace {{...}} and [[...]] on the <i>...</i> and <b>...</b>
				$prorange_copyright = prorange_prepare_macros(prorange_get_theme_option('copyright'));
				if (!empty($prorange_copyright)) {
					// Replace {date_format} on the current date in the specified format
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $prorange_copyright, $prorange_matches)) {
						$prorange_copyright = str_replace($prorange_matches[1], date(str_replace(array('{', '}'), '', $prorange_matches[1])), $prorange_copyright);
					}
					// Display copyright
					echo wp_kses_data(nl2br($prorange_copyright));
				}
			?></div>
		</div>
	</div>
</div>
