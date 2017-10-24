<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0.22
 */

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
if ( !function_exists('prorange_customizer_theme_setup1') ) {
	add_action( 'after_setup_theme', 'prorange_customizer_theme_setup1', 1 );
	function prorange_customizer_theme_setup1() {
		
		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		prorange_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Source Sans Pro',
				'family' => 'sans-serif',
				'styles' => '400,700,600'		// Parameter 'style' used only for the Google fonts
				),
			// Font-face packed with theme
			array(
				'name'   => 'Libre Baskerville',
				'family' => 'serif',
                'styles' => '400,400italic,700'
            )
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		prorange_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		prorange_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'prorange'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '16px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.688em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.7em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '3.75rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.15em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '2.39em',
				'margin-bottom'		=> '0.31em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '3rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '3em',
				'margin-bottom'		=> '0.46em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '2.25em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.35em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '4em',
				'margin-bottom'		=> '0.6em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '1.875rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.3043em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '4.8565em',
				'margin-bottom'		=> '0.9em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '1.5em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.35em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '6.1em',
				'margin-bottom'		=> '1.1em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '1.2143em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '-0.6px',
				'margin-top'		=> '7.5176em',
				'margin-bottom'		=> '1.5412em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'prorange'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'prorange'),
				'font-family'		=> 'Libre Baskerville, serif',
				'font-size' 		=> '2.125em',
				'font-weight'		=> '700',
				'font-style'		=> 'italic',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '14px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.6px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'prorange'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'prorange'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'prorange'),
				'description'		=> esc_html__('Font settings of the main menu items', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '0.875rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'prorange'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'prorange'),
				'font-family'		=> 'Source Sans Pro, sans-serif',
				'font-size' 		=> '0.875rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		prorange_storage_set('scheme_color_groups', array(
			'main'	=> array(
							'title'			=> __('Main', 'prorange'),
							'description'	=> __('Colors of the main content area', 'prorange')
							),
			'alter'	=> array(
							'title'			=> __('Alter', 'prorange'),
							'description'	=> __('Colors of the alternative blocks (sidebars, etc.)', 'prorange')
							),
			'extra'	=> array(
							'title'			=> __('Extra', 'prorange'),
							'description'	=> __('Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'prorange')
							),
			'inverse' => array(
							'title'			=> __('Inverse', 'prorange'),
							'description'	=> __('Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'prorange')
							),
			'input'	=> array(
							'title'			=> __('Input', 'prorange'),
							'description'	=> __('Colors of the form fields (text field, textarea, select, etc.)', 'prorange')
							),
			)
		);
		prorange_storage_set('scheme_color_names', array(
			'bg_color'	=> array(
							'title'			=> __('Background color', 'prorange'),
							'description'	=> __('Background color of this block in the normal state', 'prorange')
							),
			'bg_hover'	=> array(
							'title'			=> __('Background hover', 'prorange'),
							'description'	=> __('Background color of this block in the hovered state', 'prorange')
							),
			'bd_color'	=> array(
							'title'			=> __('Border color', 'prorange'),
							'description'	=> __('Border color of this block in the normal state', 'prorange')
							),
			'bd_hover'	=>  array(
							'title'			=> __('Border hover', 'prorange'),
							'description'	=> __('Border color of this block in the hovered state', 'prorange')
							),
			'text'		=> array(
							'title'			=> __('Text', 'prorange'),
							'description'	=> __('Color of the plain text inside this block', 'prorange')
							),
			'text_dark'	=> array(
							'title'			=> __('Text dark', 'prorange'),
							'description'	=> __('Color of the dark text (bold, header, etc.) inside this block', 'prorange')
							),
			'text_light'=> array(
							'title'			=> __('Text light', 'prorange'),
							'description'	=> __('Color of the light text (post meta, etc.) inside this block', 'prorange')
							),
			'text_link'	=> array(
							'title'			=> __('Link', 'prorange'),
							'description'	=> __('Color of the links inside this block', 'prorange')
							),
			'text_hover'=> array(
							'title'			=> __('Link hover', 'prorange'),
							'description'	=> __('Color of the hovered state of links inside this block', 'prorange')
							),
			'text_link2'=> array(
							'title'			=> __('Link 2', 'prorange'),
							'description'	=> __('Color of the accented texts (areas) inside this block', 'prorange')
							),
			'text_hover2'=> array(
							'title'			=> __('Link 2 hover', 'prorange'),
							'description'	=> __('Color of the hovered state of accented texts (areas) inside this block', 'prorange')
							),
			'text_link3'=> array(
							'title'			=> __('Link 3', 'prorange'),
							'description'	=> __('Color of the other accented texts (buttons) inside this block', 'prorange')
							),
			'text_hover3'=> array(
							'title'			=> __('Link 3 hover', 'prorange'),
							'description'	=> __('Color of the hovered state of other accented texts (buttons) inside this block', 'prorange')
							)
			)
		);
		prorange_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'prorange'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#ffffff',
					'bd_color'			=> '#e6e6e6',       //
		
					// Text and links colors
					'text'				=> '#789499',       //
					'text_light'		=> '#505a61',       //
					'text_dark'			=> '#406870',       //
					'text_link'			=> '#406870',       //
					'text_hover'		=> '#bcb892',       //
					'text_link2'		=> '#406870',       //
					'text_hover2'		=> '#8be77c',
					'text_link3'		=> '#61a8d7',
					'text_hover3'		=> '#eec432',
		
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#f0f4f7',       //  sidebar
					'alter_bg_hover'	=> '#e7ecf0',       //
					'alter_bd_color'	=> '#dfe3e3',       //
					'alter_bd_hover'	=> '#dadada',
					'alter_text'		=> '#99acaf',      //
					'alter_light'		=> '#b4b2b0',       //
					'alter_dark'		=> '#365a61',       //
					'alter_link'		=> '#fe7259',
					'alter_hover'		=> '#72cfd5',
					'alter_link2'		=> '#80d572',
					'alter_hover2'		=> '#8be77c',
					'alter_link3'		=> '#ddb837',
					'alter_hover3'		=> '#eec432',
		
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#263d42',   //
					'extra_bg_hover'	=> '#28272e',
					'extra_bd_color'	=> '#e1e7eb',   //
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#bfbfbf',
					'extra_light'		=> '#989ea1',
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#72cfd5',
					'extra_hover'		=> '#fe7259',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#f1f5f7',   //
					'input_bg_hover'	=> '#f1f5f7',
					'input_bd_color'	=> '#e8edf0',   //
					'input_bd_hover'	=> '#d3dde3',   //
					'input_text'		=> '#406870',   //
					'input_light'		=> '#406870',   //
					'input_dark'		=> '#406870',   //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#67bcc1',
					'inverse_bd_hover'	=> '#5aa4a9',
					'inverse_text'		=> '#ffffff',       //
					'inverse_light'		=> '#333333',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			),
		
			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'prorange'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#406870',//
					'bd_color'			=> '#1c1b1f',
		
					// Text and links colors
					'text'				=> '#b7b7b7',
					'text_light'		=> '#5f5f5f',
					'text_dark'			=> '#ffffff',
					'text_link'			=> '#406870',   //
					'text_hover'		=> '#bcb892',   //
					'text_link2'		=> '#80d572',
					'text_hover2'		=> '#8be77c',
					'text_link3'		=> '#61a8d7',
					'text_hover3'		=> '#eec432',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#1f3236',   //
					'alter_bg_hover'	=> '#31464b',   //
					'alter_bd_color'	=> '#313131',
					'alter_bd_hover'	=> '#3d3d3d',
					'alter_text'		=> '#a6a6a6',
					'alter_light'		=> '#5f5f5f',
					'alter_dark'		=> '#ffffff',
					'alter_link'		=> '#ffaa5f',
					'alter_hover'		=> '#fe7259',
					'alter_link2'		=> '#80d572',
					'alter_hover2'		=> '#8be77c',
					'alter_link3'		=> '#ddb837',
					'alter_hover3'		=> '#eec432',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#1e1d22',
					'extra_bg_hover'	=> '#28272e',
					'extra_bd_color'	=> '#313131',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#a6a6a6',
					'extra_light'		=> '#5f5f5f',
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffaa5f',
					'extra_hover'		=> '#fe7259',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',

					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#263d42',
					'input_bg_hover'	=> '#263d42',
					'input_bd_color'	=> '#263d42',
					'input_bd_hover'	=> '#353535',
					'input_text'		=> '#b7b7b7',
					'input_light'		=> '#5f5f5f',
					'input_dark'		=> '#ffffff',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#e36650',
					'inverse_bd_hover'	=> '#cb5b47',
					'inverse_text'		=> '#406870',
					'inverse_light'		=> '#5f5f5f',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			)
		
		));
	}
}

			
// Additional (calculated) theme-specific colors
// Attention! Don't forget setup custom colors also in the theme.customizer.color-scheme.js
if (!function_exists('prorange_customizer_add_theme_colors')) {
	function prorange_customizer_add_theme_colors($colors) {
		if (substr($colors['text'], 0, 1) == '#') {
			$colors['bg_color_0']  = prorange_hex2rgba( $colors['bg_color'], 0 );
			$colors['inverse_text_04']  = prorange_hex2rgba( $colors['inverse_text'], 0.4 );
            $colors['bg_color_02']  = prorange_hex2rgba( $colors['bg_color'], 0.2 );
			$colors['bg_color_07']  = prorange_hex2rgba( $colors['bg_color'], 0.7 );
            $colors['bg_color_06']  = prorange_hex2rgba( $colors['bg_color'], 0.6 );
			$colors['bg_color_08']  = prorange_hex2rgba( $colors['bg_color'], 0.8 );
			$colors['bg_color_09']  = prorange_hex2rgba( $colors['bg_color'], 0.9 );
			$colors['inverse_link_06']  = prorange_hex2rgba( $colors['inverse_link'], 0.6 );
			$colors['alter_bg_color_07']  = prorange_hex2rgba( $colors['alter_bg_color'], 0.7 );
			$colors['alter_bg_color_04']  = prorange_hex2rgba( $colors['alter_bg_color'], 0.4 );
			$colors['alter_bg_color_02']  = prorange_hex2rgba( $colors['alter_bg_color'], 0.2 );
			$colors['alter_bd_color_02']  = prorange_hex2rgba( $colors['alter_bd_color'], 0.2 );
			$colors['extra_bg_color_07']  = prorange_hex2rgba( $colors['extra_bg_color'], 0.7 );
			$colors['text_dark_07']  = prorange_hex2rgba( $colors['text_dark'], 0.7 );
            $colors['text_dark_078']  = prorange_hex2rgba( $colors['text_dark'], 0.78 );
            $colors['text_dark_06']  = prorange_hex2rgba( $colors['text_dark'], 0.6 );
            $colors['text_dark_03']  = prorange_hex2rgba( $colors['text_dark'], 0.3 );
			$colors['text_link_02']  = prorange_hex2rgba( $colors['text_link'], 0.2 );
            $colors['text_light_06']  = prorange_hex2rgba( $colors['text_light'], 0.6 );
            $colors['text_link_06']  = prorange_hex2rgba( $colors['text_link'], 0.6 );
            $colors['text_hover_08']  = prorange_hex2rgba( $colors['text_hover'], 0.8);
			$colors['text_link_07']  = prorange_hex2rgba( $colors['text_link'], 0.7 );
			$colors['text_link_blend'] = prorange_hsb2hex(prorange_hex2hsb( $colors['text_link'], 2, -5, 5 ));
			$colors['alter_link_blend'] = prorange_hsb2hex(prorange_hex2hsb( $colors['alter_link'], 2, -5, 5 ));
		} else {
			$colors['bg_color_0'] = '{{ data.bg_color_0 }}';
			$colors['bg_color_02'] = '{{ data.bg_color_02 }}';
			$colors['bg_color_07'] = '{{ data.bg_color_07 }}';
			$colors['bg_color_08'] = '{{ data.bg_color_08 }}';
			$colors['bg_color_09'] = '{{ data.bg_color_09 }}';
			$colors['alter_bg_color_07'] = '{{ data.alter_bg_color_07 }}';
			$colors['alter_bg_color_04'] = '{{ data.alter_bg_color_04 }}';
			$colors['alter_bg_color_02'] = '{{ data.alter_bg_color_02 }}';
			$colors['alter_bd_color_02'] = '{{ data.alter_bd_color_02 }}';
			$colors['extra_bg_color_07'] = '{{ data.extra_bg_color_07 }}';
			$colors['text_dark_07'] = '{{ data.text_dark_07 }}';
			$colors['text_link_02'] = '{{ data.text_link_02 }}';
			$colors['text_link_07'] = '{{ data.text_link_07 }}';
			$colors['text_link_blend'] = '{{ data.text_link_blend }}';
			$colors['alter_link_blend'] = '{{ data.alter_link_blend }}';
		}
		return $colors;
	}
}


			
// Additional theme-specific fonts rules
// Attention! Don't forget setup fonts rules also in the theme.customizer.color-scheme.js
if (!function_exists('prorange_customizer_add_theme_fonts')) {
	function prorange_customizer_add_theme_fonts($fonts) {
		$rez = array();	
		foreach ($fonts as $tag => $font) {
			//$rez[$tag] = $font;
			if (substr($font['font-family'], 0, 2) != '{{') {
				$rez[$tag.'_font-family'] 		= !empty($font['font-family']) && !prorange_is_inherit($font['font-family'])
														? 'font-family:' . trim($font['font-family']) . ';' 
														: '';
				$rez[$tag.'_font-size'] 		= !empty($font['font-size']) && !prorange_is_inherit($font['font-size'])
														? 'font-size:' . prorange_prepare_css_value($font['font-size']) . ";"
														: '';
				$rez[$tag.'_line-height'] 		= !empty($font['line-height']) && !prorange_is_inherit($font['line-height'])
														? 'line-height:' . trim($font['line-height']) . ";"
														: '';
				$rez[$tag.'_font-weight'] 		= !empty($font['font-weight']) && !prorange_is_inherit($font['font-weight'])
														? 'font-weight:' . trim($font['font-weight']) . ";"
														: '';
				$rez[$tag.'_font-style'] 		= !empty($font['font-style']) && !prorange_is_inherit($font['font-style'])
														? 'font-style:' . trim($font['font-style']) . ";"
														: '';
				$rez[$tag.'_text-decoration'] 	= !empty($font['text-decoration']) && !prorange_is_inherit($font['text-decoration'])
														? 'text-decoration:' . trim($font['text-decoration']) . ";"
														: '';
				$rez[$tag.'_text-transform'] 	= !empty($font['text-transform']) && !prorange_is_inherit($font['text-transform'])
														? 'text-transform:' . trim($font['text-transform']) . ";"
														: '';
				$rez[$tag.'_letter-spacing'] 	= !empty($font['letter-spacing']) && !prorange_is_inherit($font['letter-spacing'])
														? 'letter-spacing:' . trim($font['letter-spacing']) . ";"
														: '';
				$rez[$tag.'_margin-top'] 		= !empty($font['margin-top']) && !prorange_is_inherit($font['margin-top'])
														? 'margin-top:' . prorange_prepare_css_value($font['margin-top']) . ";"
														: '';
				$rez[$tag.'_margin-bottom'] 	= !empty($font['margin-bottom']) && !prorange_is_inherit($font['margin-bottom'])
														? 'margin-bottom:' . prorange_prepare_css_value($font['margin-bottom']) . ";"
														: '';
			} else {
				$rez[$tag.'_font-family']		= '{{ data["'.$tag.'_font-family"] }}';
				$rez[$tag.'_font-size']			= '{{ data["'.$tag.'_font-size"] }}';
				$rez[$tag.'_line-height']		= '{{ data["'.$tag.'_line-height"] }}';
				$rez[$tag.'_font-weight']		= '{{ data["'.$tag.'_font-weight"] }}';
				$rez[$tag.'_font-style']		= '{{ data["'.$tag.'_font-style"] }}';
				$rez[$tag.'_text-decoration']	= '{{ data["'.$tag.'_text-decoration"] }}';
				$rez[$tag.'_text-transform']	= '{{ data["'.$tag.'_text-transform"] }}';
				$rez[$tag.'_letter-spacing']	= '{{ data["'.$tag.'_letter-spacing"] }}';
				$rez[$tag.'_margin-top']		= '{{ data["'.$tag.'_margin-top"] }}';
				$rez[$tag.'_margin-bottom']		= '{{ data["'.$tag.'_margin-bottom"] }}';
			}
		}
		return $rez;
	}
}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------

if ( !function_exists('prorange_customizer_theme_setup') ) {
	add_action( 'after_setup_theme', 'prorange_customizer_theme_setup' );
	function prorange_customizer_theme_setup() {

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('prorange_filter_add_thumb_sizes', array(
			'prorange-thumb-huge'		=> array(1540, 820, true),
			'prorange-thumb-big' 		=> array( 1155, 615, true),
			'prorange-thumb-med' 		=> array( 740, 522, true),
                'prorange-thumb-team' 		=> array( 740, 800, true),
			'prorange-thumb-tiny' 		=> array(  200,  200, true),
			'prorange-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'prorange-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = prorange_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'prorange_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}

	}
}

if ( !function_exists('prorange_customizer_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'prorange_customizer_image_sizes' );
	function prorange_customizer_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('prorange_filter_add_thumb_sizes', array(
			'prorange-thumb-huge'		=> esc_html__( 'Fullsize image', 'prorange' ),
			'prorange-thumb-big'			=> esc_html__( 'Large image', 'prorange' ),
			'prorange-thumb-med'			=> esc_html__( 'Medium image', 'prorange' ),
			'prorange-thumb-tiny'		=> esc_html__( 'Small square avatar', 'prorange' ),
			'prorange-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'prorange' ),
			'prorange-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'prorange' ),
			)
		);
		$mult = prorange_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'prorange' );
		}
		return $sizes;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( !function_exists( 'prorange_customizer_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'prorange_customizer_trx_addons_add_thumb_sizes');
	function prorange_customizer_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( !function_exists( 'prorange_customizer_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'prorange_customizer_trx_addons_get_thumb_size');
	function prorange_customizer_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
                'trx_addons-thumb-team',
                'trx_addons-thumb-team-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							),
							array(
							'prorange-thumb-huge',
							'prorange-thumb-huge-@retina',
							'prorange-thumb-big',
							'prorange-thumb-big-@retina',
							'prorange-thumb-med',
							'prorange-thumb-med-@retina',
                                'prorange-thumb-team',
                                'prorange-thumb-team-@retina',
							'prorange-thumb-tiny',
							'prorange-thumb-tiny-@retina',
							'prorange-thumb-masonry-big',
							'prorange-thumb-masonry-big-@retina',
							'prorange-thumb-masonry',
							'prorange-thumb-masonry-@retina',
							),
							$thumb_size);
	}
}
?>