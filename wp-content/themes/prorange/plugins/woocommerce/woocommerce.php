<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('prorange_woocommerce_theme_setup1')) {
	add_action( 'after_setup_theme', 'prorange_woocommerce_theme_setup1', 1 );
	function prorange_woocommerce_theme_setup1() {
		add_theme_support( 'woocommerce' );
		add_filter( 'prorange_filter_list_sidebars', 	'prorange_woocommerce_list_sidebars' );
		add_filter( 'prorange_filter_list_posts_types',	'prorange_woocommerce_list_post_types');
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('prorange_woocommerce_theme_setup3')) {
	add_action( 'after_setup_theme', 'prorange_woocommerce_theme_setup3', 3 );
	function prorange_woocommerce_theme_setup3() {
		if (prorange_exists_woocommerce()) {
		
			prorange_storage_merge_array('options', '', array(
				// Section 'WooCommerce' - settings for show pages
				'shop' => array(
					"title" => esc_html__('Shop', 'prorange'),
					"desc" => wp_kses_data( __('Select parameters to display the shop pages', 'prorange') ),
					"type" => "section"
					),
				'expand_content_shop' => array(
					"title" => esc_html__('Expand content', 'prorange'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'prorange') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'blog_columns_shop' => array(
					"title" => esc_html__('Shop loop columns', 'prorange'),
					"desc" => wp_kses_data( __('How many columns should be used in the shop loop (from 2 to 4)?', 'prorange') ),
					"std" => 2,
					"options" => prorange_get_list_range(2,4),
					"type" => "select"
					),
				'related_posts_shop' => array(
					"title" => esc_html__('Related products', 'prorange'),
					"desc" => wp_kses_data( __('How many related products should be displayed in the single product page  (from 2 to 4)?', 'prorange') ),
					"std" => 2,
					"options" => prorange_get_list_range(2,4),
					"type" => "select"
					),
				'shop_mode' => array(
					"title" => esc_html__('Shop mode', 'prorange'),
					"desc" => wp_kses_data( __('Select style for the products list', 'prorange') ),
					"std" => 'thumbs',
					"options" => array(
						'thumbs'=> esc_html__('Thumbnails', 'prorange'),
						'list'	=> esc_html__('List', 'prorange'),
					),
					"type" => "select"
					),
				'shop_hover' => array(
					"title" => esc_html__('Hover style', 'prorange'),
					"desc" => wp_kses_data( __('Hover style on the products in the shop archive', 'prorange') ),
					"std" => 'shop',
					"options" => apply_filters('prorange_filter_shop_hover', array(
						'none' => esc_html__('None', 'prorange'),
						'shop' => esc_html__('Icons', 'prorange'),
						'shop_buttons' => esc_html__('Buttons', 'prorange')
					)),
					"type" => "select"
					),
				'header_style_shop' => array(
					"title" => esc_html__('Header style', 'prorange'),
					"desc" => wp_kses_data( __('Select style to display the site header on the shop archive', 'prorange') ),
					"std" => 'inherit',
					"options" => array(),
					"type" => "select"
					),
				'header_position_shop' => array(
					"title" => esc_html__('Header position', 'prorange'),
					"desc" => wp_kses_data( __('Select position to display the site header on the shop archive', 'prorange') ),
					"std" => 'inherit',
					"options" => array(),
					"type" => "select"
					),
				'header_widgets_shop' => array(
					"title" => esc_html__('Header widgets', 'prorange'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the shop pages', 'prorange') ),
					"std" => 'hide',
					"options" => array(),
					"type" => "select"
					),
				'sidebar_widgets_shop' => array(
					"title" => esc_html__('Sidebar widgets', 'prorange'),
					"desc" => wp_kses_data( __('Select sidebar to show on the shop pages', 'prorange') ),
					"std" => 'woocommerce_widgets',
					"options" => array(),
					"type" => "select"
					),
				'sidebar_position_shop' => array(
					"title" => esc_html__('Sidebar position', 'prorange'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the shop pages', 'prorange') ),
					"refresh" => false,
					"std" => 'left',
					"options" => array(),
					"type" => "select"
					),
				'hide_sidebar_on_single_shop' => array(
					"title" => esc_html__('Hide sidebar on the single product', 'prorange'),
					"desc" => wp_kses_data( __("Hide sidebar on the single product's page", 'prorange') ),
					"std" => 0,
					"type" => "checkbox"
					),
				'widgets_above_page_shop' => array(
					"title" => esc_html__('Widgets above the page', 'prorange'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'prorange') ),
					"std" => 'hide',
					"options" => array(),
					"type" => "select"
					),
				'widgets_above_content_shop' => array(
					"title" => esc_html__('Widgets above the content', 'prorange'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'prorange') ),
					"std" => 'hide',
					"options" => array(),
					"type" => "select"
					),
				'widgets_below_content_shop' => array(
					"title" => esc_html__('Widgets below the content', 'prorange'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'prorange') ),
					"std" => 'hide',
					"options" => array(),
					"type" => "select"
					),
				'widgets_below_page_shop' => array(
					"title" => esc_html__('Widgets below the page', 'prorange'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'prorange') ),
					"std" => 'hide',
					"options" => array(),
					"type" => "select"
					),
				'footer_scheme_shop' => array(
					"title" => esc_html__('Footer Color Scheme', 'prorange'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'prorange') ),
					"std" => 'dark',
					"options" => array(),
					"type" => "select"
					),
				'footer_widgets_shop' => array(
					"title" => esc_html__('Footer widgets', 'prorange'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'prorange') ),
					"std" => 'footer_widgets',
					"options" => array(),
					"type" => "select"
					),
				'footer_columns_shop' => array(
					"title" => esc_html__('Footer columns', 'prorange'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'prorange') ),
					"dependency" => array(
						'footer_widgets_shop' => array('^hide')
					),
					"std" => 0,
					"options" => prorange_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_shop' => array(
					"title" => esc_html__('Footer fullwide', 'prorange'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'prorange') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('prorange_woocommerce_theme_setup9')) {
	add_action( 'after_setup_theme', 'prorange_woocommerce_theme_setup9', 9 );
	function prorange_woocommerce_theme_setup9() {
		
		if (prorange_exists_woocommerce()) {
			add_action( 'wp_enqueue_scripts', 								'prorange_woocommerce_frontend_scripts', 1100 );
			add_filter( 'prorange_filter_merge_styles',						'prorange_woocommerce_merge_styles' );
			add_filter( 'prorange_filter_get_post_info',		 				'prorange_woocommerce_get_post_info');
			add_filter( 'prorange_filter_post_type_taxonomy',				'prorange_woocommerce_post_type_taxonomy', 10, 2 );
			if (!is_admin()) {
				add_filter( 'prorange_filter_detect_blog_mode',				'prorange_woocommerce_detect_blog_mode' );
				add_filter( 'prorange_filter_get_post_categories', 			'prorange_woocommerce_get_post_categories');
				add_filter( 'prorange_filter_allow_override_header_image',	'prorange_woocommerce_allow_override_header_image' );
				add_action( 'prorange_action_before_post_meta',				'prorange_woocommerce_action_before_post_meta');
			}
		}
		if (is_admin()) {
			add_filter( 'prorange_filter_tgmpa_required_plugins',			'prorange_woocommerce_tgmpa_required_plugins' );
		}

		// Add wrappers and classes to the standard WooCommerce output
		if (prorange_exists_woocommerce()) {

			// Remove WOOC sidebar
			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove add_to_cart button
			//remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_add_to_cart', 10);
			
			// Remove link around product category
			remove_action('woocommerce_before_subcategory',				'woocommerce_template_loop_category_link_open', 10);
			remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);
			
			// Open main content wrapper - <article>
			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'prorange_woocommerce_wrapper_start', 10);
			// Close main content wrapper - </article>
			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);		
			add_action(    'woocommerce_after_main_content',			'prorange_woocommerce_wrapper_end', 10);

			// Close header section
			add_action(    'woocommerce_archive_description',			'prorange_woocommerce_archive_description', 15 );

			// Add theme specific search form
			add_filter(    'get_product_search_form',					'prorange_woocommerce_get_product_search_form' );

			// Change text on 'Add to cart' button
			add_filter(    'woocommerce_product_add_to_cart_text',		'prorange_woocommerce_add_to_cart_text' );
			add_filter(    'woocommerce_product_single_add_to_cart_text','prorange_woocommerce_add_to_cart_text' );

			// Add list mode buttons
			add_action(    'woocommerce_before_shop_loop', 				'prorange_woocommerce_before_shop_loop', 10 );

			// Set columns number for the products loop
			add_filter(    'loop_shop_columns',							'prorange_woocommerce_loop_shop_columns' );
			add_filter(    'post_class',								'prorange_woocommerce_loop_shop_columns_class' );
			add_filter(    'product_cat_class',							'prorange_woocommerce_loop_shop_columns_class', 10, 3 );
			// Open product/category item wrapper
			add_action(    'woocommerce_before_subcategory_title',		'prorange_woocommerce_item_wrapper_start', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'prorange_woocommerce_item_wrapper_start', 9 );
			// Close featured image wrapper and open title wrapper
			add_action(    'woocommerce_before_subcategory_title',		'prorange_woocommerce_title_wrapper_start', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'prorange_woocommerce_title_wrapper_start', 20 );

			// Add tags before title
			add_action(    'woocommerce_before_shop_loop_item_title',	'prorange_woocommerce_title_tags', 30 );

			// Wrap product title into link
			add_action(    'the_title',									'prorange_woocommerce_the_title');
			// Wrap category title into link
			add_action(		'woocommerce_shop_loop_subcategory_title',  'prorange_woocommerce_shop_loop_subcategory_title', 9, 1);

			// Close title wrapper and add description in the list mode
			add_action(    'woocommerce_after_shop_loop_item_title',	'prorange_woocommerce_title_wrapper_end', 7);
			add_action(    'woocommerce_after_subcategory_title',		'prorange_woocommerce_title_wrapper_end2', 10 );
			// Close product/category item wrapper
			add_action(    'woocommerce_after_subcategory',				'prorange_woocommerce_item_wrapper_end', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'prorange_woocommerce_item_wrapper_end', 20 );

			// Add product ID into product meta section (after categories and tags)
			add_action(    'woocommerce_product_meta_end',				'prorange_woocommerce_show_product_id', 10);
			
			// Set columns number for the product's thumbnails
			add_filter(    'woocommerce_product_thumbnails_columns',	'prorange_woocommerce_product_thumbnails_columns' );

			// Set columns number for the related products
			add_filter(    'woocommerce_output_related_products_args',	'prorange_woocommerce_output_related_products_args' );

			// Decorate price
			add_filter(    'woocommerce_get_price_html',				'prorange_woocommerce_get_price_html' );

	
			// Detect current shop mode
			if (!is_admin()) {
				$shop_mode = prorange_get_value_gpc('prorange_shop_mode');
				if (empty($shop_mode) && prorange_check_theme_option('shop_mode'))
					$shop_mode = prorange_get_theme_option('shop_mode');
				if (empty($shop_mode))
					$shop_mode = 'thumbs';
				prorange_storage_set('shop_mode', $shop_mode);
			}
		}
	}
}



// Check if WooCommerce installed and activated
if ( !function_exists( 'prorange_exists_woocommerce' ) ) {
	function prorange_exists_woocommerce() {
		return class_exists('Woocommerce');
		//return function_exists('is_woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'prorange_is_woocommerce_page' ) ) {
	function prorange_is_woocommerce_page() {
		$rez = false;
		if (prorange_exists_woocommerce())
			$rez = is_woocommerce() || is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		return $rez;
	}
}

// Detect current blog mode
if ( !function_exists( 'prorange_woocommerce_detect_blog_mode' ) ) {
	//Handler of the add_filter( 'prorange_filter_detect_blog_mode', 'prorange_woocommerce_detect_blog_mode' );
	function prorange_woocommerce_detect_blog_mode($mode='') {
		if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy())
			$mode = 'shop';
		else if (is_product() || is_cart() || is_checkout() || is_account_page())
			$mode = 'shop';	//'shop_single';
		return $mode;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'prorange_woocommerce_post_type_taxonomy' ) ) {
	//Handler of the add_filter( 'prorange_filter_post_type_taxonomy',	'prorange_woocommerce_post_type_taxonomy', 10, 2 );
	function prorange_woocommerce_post_type_taxonomy($tax='', $post_type='') {
		if ($post_type == 'product')
			$tax = 'product_cat';
		return $tax;
	}
}

// Return true if page title section is allowed
if ( !function_exists( 'prorange_woocommerce_allow_override_header_image' ) ) {
	//Handler of the add_filter( 'prorange_filter_allow_override_header_image', 'prorange_woocommerce_allow_override_header_image' );
	function prorange_woocommerce_allow_override_header_image($allow=true) {
		return is_product() ? false : $allow;
	}
}

// Return shop page ID
if ( !function_exists( 'prorange_woocommerce_get_shop_page_id' ) ) {
	function prorange_woocommerce_get_shop_page_id() {
		return get_option('woocommerce_shop_page_id');
	}
}

// Return shop page link
if ( !function_exists( 'prorange_woocommerce_get_shop_page_link' ) ) {
	function prorange_woocommerce_get_shop_page_link() {
		$url = '';
		$id = prorange_woocommerce_get_shop_page_id();
		if ($id) $url = get_permalink($id);
		return $url;
	}
}

// Show categories of the current product
if ( !function_exists( 'prorange_woocommerce_get_post_categories' ) ) {
	//Handler of the add_filter( 'prorange_filter_get_post_categories', 		'prorange_woocommerce_get_post_categories');
	function prorange_woocommerce_get_post_categories($cats='') {
		if (get_post_type()=='product') {
			$cats = prorange_get_post_terms(', ', get_the_ID(), 'product_cat');
		}
		return $cats;
	}
}

// Add 'product' to the list of the supported post-types
if ( !function_exists( 'prorange_woocommerce_list_post_types' ) ) {
	//Handler of the add_filter( 'prorange_filter_list_posts_types', 'prorange_woocommerce_list_post_types');
	function prorange_woocommerce_list_post_types($list=array()) {
		$list['product'] = esc_html__('Products', 'prorange');
		return $list;
	}
}

// Show price of the current product in the widgets and search results
if ( !function_exists( 'prorange_woocommerce_get_post_info' ) ) {
	//Handler of the add_filter( 'prorange_filter_get_post_info', 'prorange_woocommerce_get_post_info');
	function prorange_woocommerce_get_post_info($post_info='') {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				$post_info = '<div class="post_price product_price price">' . trim($price_html) . '</div>' . $post_info;
			}
		}
		return $post_info;
	}
}

// Show price of the current product in the search results streampage
if ( !function_exists( 'prorange_woocommerce_action_before_post_meta' ) ) {
	//Handler of the add_action( 'prorange_action_before_post_meta', 'prorange_woocommerce_action_before_post_meta');
	function prorange_woocommerce_action_before_post_meta() {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				?><div class="post_price product_price price"><?php prorange_show_layout($price_html); ?></div><?php
			}
		}
	}
}
	
// Enqueue WooCommerce custom styles
if ( !function_exists( 'prorange_woocommerce_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'prorange_woocommerce_frontend_scripts', 1100 );
	function prorange_woocommerce_frontend_scripts() {
		//if (prorange_is_woocommerce_page())
			if (prorange_is_on(prorange_get_theme_option('debug_mode')) && prorange_get_file_dir('plugins/woocommerce/woocommerce.css')!='')
				wp_enqueue_style( 'prorange-woocommerce',  prorange_get_file_url('plugins/woocommerce/woocommerce.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'prorange_woocommerce_merge_styles' ) ) {
	//Handler of the add_filter('prorange_filter_merge_styles', 'prorange_woocommerce_merge_styles');
	function prorange_woocommerce_merge_styles($list) {
		$list[] = 'plugins/woocommerce/woocommerce.css';
		return $list;
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'prorange_woocommerce_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('prorange_filter_tgmpa_required_plugins',	'prorange_woocommerce_tgmpa_required_plugins');
	function prorange_woocommerce_tgmpa_required_plugins($list=array()) {
		if (in_array('woocommerce', prorange_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('WooCommerce', 'prorange'),
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}



// Add WooCommerce specific items into lists
//------------------------------------------------------------------------

// Add sidebar
if ( !function_exists( 'prorange_woocommerce_list_sidebars' ) ) {
	//Handler of the add_filter( 'prorange_filter_list_sidebars', 'prorange_woocommerce_list_sidebars' );
	function prorange_woocommerce_list_sidebars($list=array()) {
		$list['woocommerce_widgets'] = array(
											'name' => esc_html__('WooCommerce Widgets', 'prorange'),
											'description' => esc_html__('Widgets to be shown on the WooCommerce pages', 'prorange')
											);
		return $list;
	}
}




// Decorate WooCommerce output: Loop
//------------------------------------------------------------------------

// Before main content
if ( !function_exists( 'prorange_woocommerce_wrapper_start' ) ) {
	//remove_action( 'woocommerce_before_main_content', 'prorange_woocommerce_wrapper_start', 10);
	//Handler of the add_action('woocommerce_before_main_content', 'prorange_woocommerce_wrapper_start', 10);
	function prorange_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item_single post_type_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !prorange_storage_empty('shop_mode') ? prorange_storage_get('shop_mode') : 'thumbs'; ?>">
				<div class="list_products_header">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'prorange_woocommerce_wrapper_end' ) ) {
	//remove_action( 'woocommerce_after_main_content', 'prorange_woocommerce_wrapper_end', 10);		
	//Handler of the add_action('woocommerce_after_main_content', 'prorange_woocommerce_wrapper_end', 10);
	function prorange_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article><!-- /.post_item_single -->
			<?php
		} else {
			?>
			</div><!-- /.list_products -->
			<?php
		}
	}
}

// Close header section
if ( !function_exists( 'prorange_woocommerce_archive_description' ) ) {
	//Handler of the add_action( 'woocommerce_archive_description', 'prorange_woocommerce_archive_description', 15 );
	function prorange_woocommerce_archive_description() {
		?>
		</div><!-- /.list_products_header -->
		<?php
	}
}

// Add list mode buttons
if ( !function_exists( 'prorange_woocommerce_before_shop_loop' ) ) {
	//Handler of the add_action( 'woocommerce_before_shop_loop', 'prorange_woocommerce_before_shop_loop', 10 );
	function prorange_woocommerce_before_shop_loop() {
		?>
		<div class="prorange_shop_mode_buttons"><form action="<?php echo esc_url(prorange_get_current_url()); ?>" method="post"><input type="hidden" name="prorange_shop_mode" value="<?php echo esc_attr(prorange_storage_get('shop_mode')); ?>" /><a href="#" class="woocommerce_thumbs icon-th" title="<?php esc_attr_e('Show products as thumbs', 'prorange'); ?>"></a><a href="#" class="woocommerce_list icon-th-list" title="<?php esc_attr_e('Show products as list', 'prorange'); ?>"></a></form></div><!-- /.prorange_shop_mode_buttons -->
		<?php
	}
}

// Number of columns for the shop streampage
if ( !function_exists( 'prorange_woocommerce_loop_shop_columns' ) ) {
	//Handler of the add_filter( 'loop_shop_columns', 'prorange_woocommerce_loop_shop_columns' );
	function prorange_woocommerce_loop_shop_columns($cols) {
		return max(2, min(4, prorange_get_theme_option('blog_columns')));
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'prorange_woocommerce_loop_shop_columns_class' ) ) {
	//Handler of the add_filter( 'post_class', 'prorange_woocommerce_loop_shop_columns_class' );
	//Handler of the add_filter( 'product_cat_class', 'prorange_woocommerce_loop_shop_columns_class', 10, 3 );
	function prorange_woocommerce_loop_shop_columns_class($classes, $class='', $cat='') {
		global $woocommerce_loop;
		if (is_product()) {
			if (!empty($woocommerce_loop['columns'])) {
				$classes[] = ' column-1_'.esc_attr($woocommerce_loop['columns']);
			}
		} else if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
			$classes[] = ' column-1_'.esc_attr(max(2, min(4, prorange_get_theme_option('blog_columns'))));
		}
		return $classes;
	}
}


// Open item wrapper for categories and products
if ( !function_exists( 'prorange_woocommerce_item_wrapper_start' ) ) {
	//Handler of the add_action( 'woocommerce_before_subcategory_title', 'prorange_woocommerce_item_wrapper_start', 9 );
	//Handler of the add_action( 'woocommerce_before_shop_loop_item_title', 'prorange_woocommerce_item_wrapper_start', 9 );
	function prorange_woocommerce_item_wrapper_start($cat='') {
		prorange_storage_set('in_product_item', true);
		$hover = prorange_get_theme_option('shop_hover');
		?>
		<div class="post_item post_layout_<?php echo esc_attr(prorange_storage_get('shop_mode')); ?>">
			<div class="post_featured hover_<?php echo esc_attr($hover); ?>">
				<?php do_action('prorange_action_woocommerce_item_featured_start'); ?>
				<a href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
		<?php
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'prorange_woocommerce_open_item_wrapper' ) ) {
	//Handler of the add_action( 'woocommerce_before_subcategory_title', 'prorange_woocommerce_title_wrapper_start', 20 );
	//Handler of the add_action( 'woocommerce_before_shop_loop_item_title', 'prorange_woocommerce_title_wrapper_start', 20 );
	function prorange_woocommerce_title_wrapper_start($cat='') {
				?>
				</a>
				<?php
				if (($hover = prorange_get_theme_option('shop_hover')) != 'none') {
					?><div class="mask"></div><?php
					prorange_hovers_add_icons($hover, array('cat'=>$cat));
				}
				do_action('prorange_action_woocommerce_item_featured_end');
				?>
			</div><!-- /.post_featured -->
			<div class="post_data">
				<div class="post_header entry-header">
				<?php
	}
}


// Display product's tags before the title
if ( !function_exists( 'prorange_woocommerce_title_tags' ) ) {
	//Handler of the add_action( 'woocommerce_before_shop_loop_item_title', 'prorange_woocommerce_title_tags', 30 );
	function prorange_woocommerce_title_tags() {
		global $product;
		prorange_show_layout(wc_get_product_tag_list( $product->get_id(), ', ', '<div class="post_tags product_tags">', '</div>' ));
	}
}

// Wrap product title into link
if ( !function_exists( 'prorange_woocommerce_the_title' ) ) {
	//Handler of the add_filter( 'the_title', 'prorange_woocommerce_the_title' );
	function prorange_woocommerce_the_title($title) {
		if (prorange_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.get_permalink().'">'.esc_html($title).'</a>';
		}
		return $title;
	}
}

// Wrap category title into link
if ( !function_exists( 'prorange_woocommerce_shop_loop_subcategory_title' ) ) {
	//Handler of the add_filter( 'woocommerce_shop_loop_subcategory_title', 'prorange_woocommerce_shop_loop_subcategory_title' );
	function prorange_woocommerce_shop_loop_subcategory_title($cat) {
		if (prorange_storage_get('in_product_item') && is_object($cat)) {
			$cat->name = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($cat->slug, 'product_cat')), $cat->name);
		}
		return $cat;
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'prorange_woocommerce_title_wrapper_end' ) ) {
	//Handler of the add_action( 'woocommerce_after_shop_loop_item_title', 'prorange_woocommerce_title_wrapper_end', 7);
	function prorange_woocommerce_title_wrapper_end() {
			?>
			</div><!-- /.post_header -->
		<?php
		if (prorange_storage_get('shop_mode') == 'list' && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) && !is_product()) {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			?>
			<div class="post_content entry-content"><?php prorange_show_layout($excerpt); ?></div>
			<?php
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'prorange_woocommerce_title_wrapper_end2' ) ) {
	//Handler of the add_action( 'woocommerce_after_subcategory_title', 'prorange_woocommerce_title_wrapper_end2', 10 );
	function prorange_woocommerce_title_wrapper_end2($category) {
		?>
			</div><!-- /.post_header -->
		<?php
		if (prorange_storage_get('shop_mode') == 'list' && is_shop() && !is_product()) {
			?>
			<div class="post_content entry-content"><?php prorange_show_layout($category->description); ?></div><!-- /.post_content -->
			<?php
		}
	}
}

// Close item wrapper for categories and products
if ( !function_exists( 'prorange_woocommerce_close_item_wrapper' ) ) {
	//Handler of the add_action( 'woocommerce_after_subcategory', 'prorange_woocommerce_item_wrapper_end', 20 );
	//Handler of the add_action( 'woocommerce_after_shop_loop_item', 'prorange_woocommerce_item_wrapper_end', 20 );
	function prorange_woocommerce_item_wrapper_end($cat='') {
		?>
			</div><!-- /.post_data -->
		</div><!-- /.post_item -->
		<?php
		prorange_storage_set('in_product_item', false);
	}
}

// Change text on 'Add to cart' button
if ( !function_exists( 'prorange_woocommerce_add_to_cart_text' ) ) {
	//Handler of the add_filter( 'woocommerce_product_add_to_cart_text',		'prorange_woocommerce_add_to_cart_text' );
	//Handler of the add_filter( 'woocommerce_product_single_add_to_cart_text','prorange_woocommerce_add_to_cart_text' );
	function prorange_woocommerce_add_to_cart_text($text='') {
		return esc_html__('Buy now', 'prorange');
	}
}

// Decorate price
if ( !function_exists( 'prorange_woocommerce_get_price_html' ) ) {
	//Handler of the add_filter(    'woocommerce_get_price_html',	'prorange_woocommerce_get_price_html' );
	function prorange_woocommerce_get_price_html($price='') {
		if (!is_admin() && !empty($price)) {
			$sep = get_option('woocommerce_price_decimal_sep');
			if (empty($sep)) $sep = '.';
			$price = preg_replace('/([0-9,]+)(\\'.trim($sep).')([0-9]{2})/', '\\1<span class="decimals">\\3</span>', $price);
		}
		return $price;
	}
}



// Decorate WooCommerce output: Single product
//------------------------------------------------------------------------

// Add Product ID for the single product
if ( !function_exists( 'prorange_woocommerce_show_product_id' ) ) {
	//Handler of the add_action( 'woocommerce_product_meta_end', 'prorange_woocommerce_show_product_id', 10);
	function prorange_woocommerce_show_product_id() {
		$authors = wp_get_post_terms(get_the_ID(), 'pa_product_author');
		if (is_array($authors) && count($authors)>0) {
			echo '<span class="product_author">'.esc_html__('Author: ', 'prorange');
			$delim = '';
			foreach ($authors as $author) {
				echo  esc_html($delim) . '<span>' . esc_html($author->name) . '</span>';
				$delim = ', ';
			}
			echo '</span>';
		}
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'prorange') . '<span>' . get_the_ID() . '</span></span>';
	}
}

// Number columns for the product's thumbnails
if ( !function_exists( 'prorange_woocommerce_product_thumbnails_columns' ) ) {
	//Handler of the add_filter( 'woocommerce_product_thumbnails_columns', 'prorange_woocommerce_product_thumbnails_columns' );
	function prorange_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Set columns number for the related products
if ( !function_exists( 'prorange_woocommerce_output_related_products_args' ) ) {
	//Handler of the add_filter( 'woocommerce_output_related_products_args', 'prorange_woocommerce_output_related_products_args' );
	function prorange_woocommerce_output_related_products_args($args) {
		$args['posts_per_page'] = $args['columns'] = max(2, min(4, prorange_get_theme_option('related_posts')));
		return $args;
	}
}



// Decorate WooCommerce output: Widgets
//------------------------------------------------------------------------

// Search form
if ( !function_exists( 'prorange_woocommerce_get_product_search_form' ) ) {
	//Handler of the add_filter( 'get_product_search_form', 'prorange_woocommerce_get_product_search_form' );
	function prorange_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search for products &hellip;', 'prorange') . '" value="' . get_search_query() . '" name="s" /><button class="search_button" type="submit">' . esc_html__('Search', 'prorange') . '</button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (prorange_exists_woocommerce()) { require_once PRORANGE_THEME_DIR . 'plugins/woocommerce/woocommerce.styles.php'; }
?>