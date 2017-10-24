<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.14
 */
$prorange_header_video = prorange_get_header_video();
$prorange_embed_video = '';
if (!empty($prorange_header_video) && !prorange_is_from_uploads($prorange_header_video)) {
	if (prorange_is_youtube_url($prorange_header_video) && preg_match('/[=\/]([^=\/]*)$/', $prorange_header_video, $matches) && !empty($matches[1])) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr($matches[1]); ?>"></div><?php
	} else {
		global $wp_embed;
		if (false && is_object($wp_embed)) {
			$prorange_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($prorange_header_video) . '[/embed]' ));
			$prorange_embed_video = prorange_make_video_autoplay($prorange_embed_video);
		} else {
			$prorange_header_video = str_replace('/watch?v=', '/embed/', $prorange_header_video);
			$prorange_header_video = prorange_add_to_url($prorange_header_video, array(
				'feature' => 'oembed',
				'controls' => 0,
				'autoplay' => 1,
				'showinfo' => 0,
				'modestbranding' => 1,
				'wmode' => 'transparent',
				'enablejsapi' => 1,
				'origin' => home_url(),
				'widgetid' => 1
			));
			$prorange_embed_video = '<iframe src="' . esc_url($prorange_header_video) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?><div id="background_video"><?php prorange_show_layout($prorange_embed_video); ?></div><?php
	}
}
?>