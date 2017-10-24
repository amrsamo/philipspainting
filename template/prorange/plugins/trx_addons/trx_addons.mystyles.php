<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('prorange_trx_addons_get_mycss')) {
	add_filter('prorange_filter_get_css', 'prorange_trx_addons_get_mycss', 10, 4);
	function prorange_trx_addons_get_mycss($css, $colors, $fonts, $scheme='') {

        if (isset($css['colors']) && $colors) {
            $css['colors'] .= <<<CSS

        .sc_testimonials_item_content:before {
            color: {$colors['extra_bd_color']};
        }
        .sc_testimonials_item_author_title {
            color: {$colors['text_hover']};
        }
        .sc_blogger_classic .post_meta_item a,
        .sc_blogger_classic .post_meta_item a:before{
            color: {$colors['text_hover']};
        }
        .sc_blogger_classic .post_meta_item a:hover:before,
        .sc_blogger_classic .post_meta_item a:hover {
            color: {$colors['text_link']};
        }
        .BigWhiteText:before,
        .sc_item_title.sc_align_center:before {
            background: linear-gradient(to right, {$colors['extra_bd_color']} 0%, {$colors['extra_bd_color']} 25%,rgba(255,255,255,0) 25%, rgba(255,255,255,0) 75%,{$colors['extra_bd_color']} 75%);
        }
        .vc_row-has-fill .sc_item_title.sc_align_center:after {
            color: {$colors['text_hover']};
        }
        .vc_row-has-fill .sc_item_title.sc_align_center:before {
            background: linear-gradient(to right, {$colors['text_hover']} 0%, {$colors['text_hover']} 25%,rgba(255,255,255,0) 25%, rgba(255,255,255,0) 75%,{$colors['text_hover']} 75%);
        }
        .sc_icons .sc_icons_icon {
            color: {$colors['text_hover']};
        }
        .BigWhiteText:after,
        .sc_icons_columns .trx_addons_column-1_4 + .trx_addons_column-1_4:before {
            color: {$colors['extra_bd_color']};
        }
        .scheme_dark button, .scheme_dark input[type="reset"], .scheme_dark input[type="submit"], .scheme_dark input[type="button"], .scheme_dark .more-link, .scheme_dark .comments_wrap .form-submit input[type="submit"], .scheme_dark #buddypress .comment-reply-link, .scheme_dark #buddypress .generic-button a, .scheme_dark #buddypress a.button, .scheme_dark #buddypress button, .scheme_dark #buddypress input[type="button"], .scheme_dark #buddypress input[type="reset"], .scheme_dark #buddypress input[type="submit"], .scheme_dark #buddypress ul.button-nav li a, .scheme_dark a.bp-title-button, .scheme_dark .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button, .scheme_dark body #booked-profile-page .booked-profile-appt-list .appt-block .booked-cal-buttons .google-cal-button>a, .scheme_dark body #booked-profile-page input[type="submit"], .scheme_dark body #booked-profile-page button, .scheme_dark body .booked-list-view input[type="submit"], .scheme_dark body .booked-list-view button, .scheme_dark body table.booked-calendar input[type="submit"], .scheme_dark body table.booked-calendar button, .scheme_dark body .booked-modal input[type="submit"], .scheme_dark body .booked-modal button, .scheme_dark .sc_button_default, .scheme_dark .sc_button:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image), .scheme_dark .sc_action_item_link, .scheme_dark .socials_share:not(.socials_type_drop) .social_icon, .scheme_dark #tribe-bar-form .tribe-bar-submit input[type="submit"], .scheme_dark #tribe-bar-form.tribe-bar-mini .tribe-bar-submit input[type="submit"], .scheme_dark #tribe-bar-views li.tribe-bar-views-option a, .scheme_dark #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option.tribe-bar-active a, .scheme_dark #tribe-events .tribe-events-button, .scheme_dark .tribe-events-button, .scheme_dark .tribe-events-cal-links a, .scheme_dark .tribe-events-sub-nav li a, .scheme_dark .woocommerce #respond input#submit, .scheme_dark .woocommerce .button, .scheme_dark .woocommerce-page .button, .scheme_dark .woocommerce a.button, .scheme_dark .woocommerce-page a.button, .scheme_dark .woocommerce button.button, .scheme_dark .woocommerce-page button.button, .scheme_dark .woocommerce input.button, .scheme_dark .woocommerce-page input.button, .scheme_dark .woocommerce input[type="button"], .scheme_dark .woocommerce-page input[type="button"], .scheme_dark .woocommerce input[type="submit"], .scheme_dark .woocommerce-page input[type="submit"], .scheme_dark .woocommerce nav.woocommerce-pagination ul li a, .scheme_dark .woocommerce #respond input#submit.alt, .scheme_dark .woocommerce a.button.alt, .scheme_dark .woocommerce button.button.alt, .scheme_dark .woocommerce input.button.alt {
            color: {$colors['bg_color']};
        }
        .sc_services_default .sc_services_item_featured_left .sc_services_item_icon,
        .sc_services_default .sc_services_item_featured_right .sc_services_item_icon,
        .sc_services_list .sc_services_item_icon {
            color: {$colors['text_dark']};
            background-color: {$colors['input_bg_color']};
        }
        .sc_services_default .sc_services_item_featured_left:hover .sc_services_item_icon,
        .sc_services_default .sc_services_item_featured_right:hover .sc_services_item_icon,
        .sc_services_list .sc_services_item_featured_left:hover .sc_services_item_icon,
        .sc_services_list .sc_services_item_featured_right:hover .sc_services_item_icon {
            color: {$colors['bg_color']};
            background-color: {$colors['text_dark']};
        }
        .cq-beforeafter .cq-beforeafter-handle.lightgray i {
            color: {$colors['text_link']};
            background-color: {$colors['alter_bg_color']};
            border-color: {$colors['alter_bg_color']};
        }
        .cq-beforeafter .cq-beforeafter-handle {
            background-color: {$colors['alter_bg_color']};
        }

        body .prorange .esg-filterbutton:hover,
        body .prorange .esg-filterbutton.selected,
        body .minimal-light .esg-filterbutton:hover,
        body .minimal-light .esg-filterbutton.selected {
             color: {$colors['bg_color']};
            background-color: {$colors['text_hover']};
        }
        body .prorange .esg-filterbutton,
        body .minimal-light .esg-filterbutton {
             color: {$colors['text_dark_078']};
             background-color: {$colors['input_bg_color']};
        }
        body .prorange .esg-navigationbutton:after {
            border-color: {$colors['text_hover']};
        }
        body .prorange .esg-navigationbutton {
             background-color: {$colors['extra_bd_color']};
        }
        body .prorange .esg-navigationbutton:hover,
        body .prorange .esg-navigationbutton.selected {
            background-color: {$colors['bg_color_0']};
        }
        .wpb-js-composer .vc_tta-color-chino.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a {
             color: {$colors['text_dark']};
             background-color: {$colors['bg_color']};
        }
        .wpb-js-composer .vc_tta-color-chino.vc_tta-style-classic .vc_tta-panel:hover .vc_tta-panel-title > a,
        .wpb-js-composer .vc_tta-color-chino.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a {
             color: {$colors['bg_color']};
             background-color: {$colors['text_hover']};
        }
        .vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon {
            color: inherit !important;
            background-color: {$colors['bg_color_0']} !important;
        }
        .sc_services_default .sc_services_item_featured_left .sc_services_item_number, .sc_services_default .sc_services_item_featured_right .sc_services_item_number {
            color: {$colors['bg_color']};
            background-color: {$colors['text_hover']};
        }
        .sc_team_short .sc_team_item_title a {
            color: {$colors['text_hover']};
        }
        .sc_team_short .sc_team_item_title a:hover {
            color: {$colors['text_link']};
        }
        .sc_team_short .sc_team_item_subtitle {
            color: {$colors['text_dark_078']};
        }
        .sc_services_list .sc_services_item_content {
            color: {$colors['text_dark_078']};
        }
        .sc_services_list .sc_services_item_title a:hover {
            color: {$colors['text_dark_078']};
        }
        .custom .tp-bullet {
             background-color: {$colors['extra_bd_color']};
        }
        .custom .tp-bullet.selected:after,
        .custom .tp-bullet:hover:after{
            border-color: {$colors['text_hover']};
        }
        .top_panel .sc_layouts_row,
        .top_panel .scheme_self.sc_layouts_row {
            color: {$colors['text']};
            background-color: {$colors['bg_color_0']};
        }
        .top_panel .sc_layouts_row.sc_layouts_row_fixed_on,
        .top_panel .scheme_self.sc_layouts_row.sc_layouts_row_fixed_on {
            color: {$colors['text']};
            background-color: {$colors['bg_color']};
        }
        .scheme_dark .sc_layouts_menu_popup .sc_layouts_menu_nav>li>a,
        .scheme_dark .sc_layouts_menu_nav>li li>a {
            color: {$colors['bg_color']};
        }
        .scheme_dark .sc_layouts_menu_nav>li>a:hover, .scheme_dark .sc_layouts_menu_nav>li.sfHover>a {
            color: {$colors['text_hover']};
        }
        .scheme_dark .sc_layouts_menu_popup .sc_layouts_menu_nav>li>a:hover, .scheme_dark .sc_layouts_menu_popup .sc_layouts_menu_nav>li.sfHover>a, .scheme_dark .sc_layouts_menu_nav>li li>a:hover, .scheme_dark .sc_layouts_menu_nav>li li.sfHover>a,
        .scheme_dark .sc_layouts_menu_nav>li li.current-menu-item>a,
        .scheme_dark .sc_layouts_menu_nav>li li.current-menu-parent>a,
        .scheme_dark .sc_layouts_menu_nav>li li.current-menu-ancestor>a {
            color: {$colors['text_dark']} !important;
        }
        .post_item_none_search .search_wrap .search_submit,
        .post_item_none_archive .search_wrap .search_submit {
            color: {$colors['text_hover']};
        }
        .post_item_none_search .search_wrap .search_submit:hover,
        .post_item_none_archive .search_wrap .search_submit:hover {
            color: {$colors['text_dark']};
        }
        .menu_mobile .search_mobile .search_field {
            background-color: {$colors['bg_color']};
             color: {$colors['text_dark']};
        }
        .menu_mobile .search_mobile .search_field::-webkit-input-placeholder {
             color: {$colors['text_dark']};
        }

CSS;
		}

		return $css;
	}
}
?>