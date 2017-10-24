<?php
/* Calculate Fields Form support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('prorange_calculated_fields_form_theme_setup9')) {
	add_action( 'after_setup_theme', 'prorange_calculated_fields_form_theme_setup9', 9 );
	function prorange_calculated_fields_form_theme_setup9() {
		if (prorange_exists_calculated_fields_form()) {
			add_action( 'wp_enqueue_scripts', 							'prorange_calculated_fields_form_frontend_scripts', 1100 );
			add_filter( 'prorange_filter_merge_styles',					'prorange_calculated_fields_form_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'prorange_filter_tgmpa_required_plugins',		'prorange_calculated_fields_form_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'prorange_exists_calculated_fields_form' ) ) {
	function prorange_exists_calculated_fields_form() {
		return class_exists('CP_SESSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'prorange_calculated_fields_form_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('prorange_filter_tgmpa_required_plugins',	'prorange_calculated_fields_form_tgmpa_required_plugins');
	function prorange_calculated_fields_form_tgmpa_required_plugins($list=array()) {
		if (in_array('calculated-fields-form', prorange_storage_get('required_plugins'))) {
			$list[] = array(
					'name' 		=> esc_html__('Calculated Fields Form', 'prorange'),
					'slug' 		=> 'calculated-fields-form',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'prorange_calculated_fields_form_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'prorange_calculated_fields_form_frontend_scripts', 1100 );
	function prorange_calculated_fields_form_frontend_scripts() {
		// Remove jquery_ui from frontend
		if (prorange_get_theme_setting('disable_jquery_ui')) {
			global $wp_styles;
			$wp_styles->done[] = 'cpcff_jquery_ui';
		}
		if (prorange_is_on(prorange_get_theme_option('debug_mode')) && prorange_get_file_dir('plugins/calculated-fields-form/calculated-fields-form.css')!='')
			wp_enqueue_style( 'prorange-calculated-fields-form',  prorange_get_file_url('plugins/calculated-fields-form/calculated-fields-form.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'prorange_calculated_fields_form_merge_styles' ) ) {
	//Handler of the add_filter('prorange_filter_merge_styles', 'prorange_calculated_fields_form_merge_styles');
	function prorange_calculated_fields_form_merge_styles($list) {
		$list[] = 'plugins/calculated-fields-form/calculated-fields-form.css';
		return $list;
	}
}
?>