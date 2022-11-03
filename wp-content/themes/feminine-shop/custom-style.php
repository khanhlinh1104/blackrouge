<?php
	/*----------------------First highlight color-------------------*/

	$feminine_shop_first_color = get_theme_mod('feminine_shop_first_color');

	$feminine_shop_custom_css= "";

	if($feminine_shop_first_color != false){
		$feminine_shop_custom_css .='#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination span, .pagination a, .widget_product_search button, .woocommerce ul.products li.product .price, .toggle-nav i, .wp-block-button__link, #preloader{';
			$feminine_shop_custom_css .='background-color: '.esc_attr($feminine_shop_first_color).';';
		$feminine_shop_custom_css .='}';
	}

	if($feminine_shop_first_color != false){
		$feminine_shop_custom_css .='a, .top-bar p,.custom-social-icons i:hover,span.cart_no i,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#sidebar h3,.copyright p,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar h3 a.rsswidget,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce span.onsale,.widget_product_search button:hover, #slider .carousel-control-next-icon:hover,#slider .carousel-control-prev-icon:hover,#about-us strong, #about-us h3, .woocommerce div.product p.price, .woocommerce div.product span.price, #footer .wp-block-search .wp-block-search__button, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_first_color).';';
		$feminine_shop_custom_css .='}';
	}

	if($feminine_shop_first_color != false){
		$feminine_shop_custom_css .='.wp-block-button .wp-block-button__link:hover{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_first_color).'!important;';
		$feminine_shop_custom_css .='}';
	}

	if($feminine_shop_first_color != false){
		$feminine_shop_custom_css .='.woocommerce ul.products li.product a img{';
			$feminine_shop_custom_css .='border-color: '.esc_attr($feminine_shop_first_color).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------- Second highlight color-------------------*/

	$feminine_shop_second_color = get_theme_mod('feminine_shop_second_color');

	if($feminine_shop_second_color != false){
		$feminine_shop_custom_css .='.top-bar,#footer-2,.main-inner-box span.entry-date,.custom-social-icons i:hover,span.cart_no i,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#sidebar h3,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce span.onsale,.widget_product_search button:hover, .wp-block-button .wp-block-button__link:hover, #footer .wp-block-search .wp-block-search__button, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$feminine_shop_custom_css .='background-color: '.esc_attr($feminine_shop_second_color).';';
		$feminine_shop_custom_css .='}';
	}

	if($feminine_shop_second_color != false){
		$feminine_shop_custom_css .='#footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .logo .site-title a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .post-info:hover a{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_second_color).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$feminine_shop_theme_lay = get_theme_mod( 'feminine_shop_width_option','Full Width');
    if($feminine_shop_theme_lay == 'Boxed'){
		$feminine_shop_custom_css .='body{';
			$feminine_shop_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='#slider .carousel-control-prev-icon{';
			$feminine_shop_custom_css .='border-width: 25px 163px 25px 0; top: 42px;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='#slider .carousel-control-next-icon{';
			$feminine_shop_custom_css .='border-width: 25px 0 25px 170px; top: 42px;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.scrollup i{';
		  $feminine_shop_custom_css .='right: 100px;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.scrollup.left i{';
		  $feminine_shop_custom_css .='left: 100px;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Wide Width'){
		$feminine_shop_custom_css .='body{';
			$feminine_shop_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.scrollup i{';
		  $feminine_shop_custom_css .='right: 30px;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.scrollup.left i{';
		  $feminine_shop_custom_css .='left: 30px;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Full Width'){
		$feminine_shop_custom_css .='body{';
			$feminine_shop_custom_css .='max-width: 100%;';
		$feminine_shop_custom_css .='}';
	}

	/*------------------ Slider Content Layout -------------------*/

	$feminine_shop_slider_image = get_theme_mod('feminine_shop_slider_image');
	if($feminine_shop_slider_image != false){
		$feminine_shop_custom_css .='#slider{';
			$feminine_shop_custom_css .='background: url('.esc_url($feminine_shop_slider_image).');';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_theme_lay = get_theme_mod( 'feminine_shop_slider_content_option','Left');
    if($feminine_shop_theme_lay == 'Left'){
		$feminine_shop_custom_css .='#slider .carousel-caption{';
			$feminine_shop_custom_css .='text-align:left; right: 48%;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Center'){
		$feminine_shop_custom_css .='#slider .carousel-caption{';
			$feminine_shop_custom_css .='text-align:center; right: 25%; left: 25%;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Right'){
		$feminine_shop_custom_css .='#slider .carousel-caption{';
			$feminine_shop_custom_css .='text-align:right; right: 10%; left: 48%;';
		$feminine_shop_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$feminine_shop_slider_content_padding_top_bottom = get_theme_mod('feminine_shop_slider_content_padding_top_bottom');
	$feminine_shop_slider_content_padding_left_right = get_theme_mod('feminine_shop_slider_content_padding_left_right');
	if($feminine_shop_slider_content_padding_top_bottom != false || $feminine_shop_slider_content_padding_left_right != false){
		$feminine_shop_custom_css .='#slider .carousel-caption{';
			$feminine_shop_custom_css .='top: '.esc_attr($feminine_shop_slider_content_padding_top_bottom).'; bottom: '.esc_attr($feminine_shop_slider_content_padding_top_bottom).';left: '.esc_attr($feminine_shop_slider_content_padding_left_right).';right: '.esc_attr($feminine_shop_slider_content_padding_left_right).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$feminine_shop_slider_height = get_theme_mod('feminine_shop_slider_height');
	if($feminine_shop_slider_height != false){
		$feminine_shop_custom_css .='#slider img{';
			$feminine_shop_custom_css .='height: '.esc_attr($feminine_shop_slider_height).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$feminine_shop_theme_lay = get_theme_mod( 'feminine_shop_blog_layout_option','Default');
    if($feminine_shop_theme_lay == 'Default'){
		$feminine_shop_custom_css .='.post-main-box{';
			$feminine_shop_custom_css .='';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Center'){
		$feminine_shop_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$feminine_shop_custom_css .='text-align:center;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.post-info{';
			$feminine_shop_custom_css .='margin-top:10px;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_theme_lay == 'Left'){
		$feminine_shop_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$feminine_shop_custom_css .='text-align:Left;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.post-main-box h2{';
			$feminine_shop_custom_css .='margin-top:10px;';
		$feminine_shop_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$feminine_shop_resp_slider = get_theme_mod( 'feminine_shop_resp_slider_hide_show',false);
	if($feminine_shop_resp_slider == true && get_theme_mod( 'feminine_shop_slider_arrows', false) == false){
    	$feminine_shop_custom_css .='#slider{';
			$feminine_shop_custom_css .='display:none;';
		$feminine_shop_custom_css .='} ';
	}
    if($feminine_shop_resp_slider == true){
    	$feminine_shop_custom_css .='@media screen and (max-width:575px) {';
		$feminine_shop_custom_css .='#slider{';
			$feminine_shop_custom_css .='display:block;';
		$feminine_shop_custom_css .='} }';
	}else if($feminine_shop_resp_slider == false){
		$feminine_shop_custom_css .='@media screen and (max-width:575px) {';
		$feminine_shop_custom_css .='#slider{';
			$feminine_shop_custom_css .='display:none;';
		$feminine_shop_custom_css .='} }';
	}

	$feminine_shop_resp_sidebar = get_theme_mod( 'feminine_shop_sidebar_hide_show',true);
    if($feminine_shop_resp_sidebar == true){
    	$feminine_shop_custom_css .='@media screen and (max-width:575px) {';
		$feminine_shop_custom_css .='#sidebar{';
			$feminine_shop_custom_css .='display:block;';
		$feminine_shop_custom_css .='} }';
	}else if($feminine_shop_resp_sidebar == false){
		$feminine_shop_custom_css .='@media screen and (max-width:575px) {';
		$feminine_shop_custom_css .='#sidebar{';
			$feminine_shop_custom_css .='display:none;';
		$feminine_shop_custom_css .='} }';
	}

	$feminine_shop_resp_scroll_top = get_theme_mod( 'feminine_shop_resp_scroll_top_hide_show',true);
	if($feminine_shop_resp_scroll_top == true && get_theme_mod( 'feminine_shop_footer_scroll',true) != true){
    	$feminine_shop_custom_css .='.scrollup i{';
			$feminine_shop_custom_css .='visibility:hidden !important;';
		$feminine_shop_custom_css .='} ';
	}
    if($feminine_shop_resp_scroll_top == true){
    	$feminine_shop_custom_css .='@media screen and (max-width:575px) {';
		$feminine_shop_custom_css .='.scrollup i{';
			$feminine_shop_custom_css .='visibility:visible !important;';
		$feminine_shop_custom_css .='} }';
	}else if($feminine_shop_resp_scroll_top == false){
		$feminine_shop_custom_css .='@media screen and (max-width:575px){';
		$feminine_shop_custom_css .='.scrollup i{';
			$feminine_shop_custom_css .='visibility:hidden !important;';
		$feminine_shop_custom_css .='} }';
	}

	$feminine_shop_resp_menu_toggle_btn_bg_color = get_theme_mod('feminine_shop_resp_menu_toggle_btn_bg_color');
	if($feminine_shop_resp_menu_toggle_btn_bg_color != false){
		$feminine_shop_custom_css .='.toggle-nav i{';
			$feminine_shop_custom_css .='background: '.esc_attr($feminine_shop_resp_menu_toggle_btn_bg_color).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------- Menus Settings ------------------*/

	$feminine_shop_navigation_menu_font_size = get_theme_mod('feminine_shop_navigation_menu_font_size');
	if($feminine_shop_navigation_menu_font_size != false){
		$feminine_shop_custom_css .='.main-navigation a{';
			$feminine_shop_custom_css .='font-size: '.esc_attr($feminine_shop_navigation_menu_font_size).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_nav_menus_font_weight = get_theme_mod( 'feminine_shop_navigation_menu_font_weight','Default');
    if($feminine_shop_nav_menus_font_weight == 'Default'){
		$feminine_shop_custom_css .='.main-navigation a{';
			$feminine_shop_custom_css .='';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_nav_menus_font_weight == 'Normal'){
		$feminine_shop_custom_css .='.main-navigation a{';
			$feminine_shop_custom_css .='font-weight: normal;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_header_menus_color = get_theme_mod('feminine_shop_header_menus_color');
	if($feminine_shop_header_menus_color != false){
		$feminine_shop_custom_css .='.main-navigation a{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_header_menus_color).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_header_menus_hover_color = get_theme_mod('feminine_shop_header_menus_hover_color');
	if($feminine_shop_header_menus_hover_color != false){
		$feminine_shop_custom_css .='.main-navigation a:hover, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation a:hover{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_header_menus_hover_color).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_header_submenus_color = get_theme_mod('feminine_shop_header_submenus_color');
	if($feminine_shop_header_submenus_color != false){
		$feminine_shop_custom_css .='.main-navigation ul ul a{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_header_submenus_color).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_header_submenus_hover_color = get_theme_mod('feminine_shop_header_submenus_hover_color');
	if($feminine_shop_header_submenus_hover_color != false){
		$feminine_shop_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$feminine_shop_custom_css .='color: '.esc_attr($feminine_shop_header_submenus_hover_color).';';
		$feminine_shop_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$feminine_shop_featured_image_border_radius = get_theme_mod('feminine_shop_featured_image_border_radius', 0);
	if($feminine_shop_featured_image_border_radius != false){
		$feminine_shop_custom_css .='.box-image img, .feature-box img{';
			$feminine_shop_custom_css .='border-radius: '.esc_attr($feminine_shop_featured_image_border_radius).'px;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_featured_image_box_shadow = get_theme_mod('feminine_shop_featured_image_box_shadow',0);
	if($feminine_shop_featured_image_box_shadow != false){
		$feminine_shop_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$feminine_shop_custom_css .='box-shadow: '.esc_attr($feminine_shop_featured_image_box_shadow).'px '.esc_attr($feminine_shop_featured_image_box_shadow).'px '.esc_attr($feminine_shop_featured_image_box_shadow).'px #cccccc;';
		$feminine_shop_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$feminine_shop_button_border_radius = get_theme_mod('feminine_shop_button_border_radius');
	if($feminine_shop_button_border_radius != false){
		$feminine_shop_custom_css .='.post-main-box .more-btn a{';
			$feminine_shop_custom_css .='border-radius: '.esc_attr($feminine_shop_button_border_radius).'px;';
		$feminine_shop_custom_css .='}';
	}

	/*---------------- Single Post Settings ------------------*/

	$feminine_shop_single_blog_comment_title = get_theme_mod('feminine_shop_single_blog_comment_title', 'Leave a Reply');
	if($feminine_shop_single_blog_comment_title == ''){
		$feminine_shop_custom_css .='#comments h2#reply-title {';
			$feminine_shop_custom_css .='display: none;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_single_blog_comment_button_text = get_theme_mod('feminine_shop_single_blog_comment_button_text', 'Post Comment');
	if($feminine_shop_single_blog_comment_button_text == ''){
		$feminine_shop_custom_css .='#comments p.form-submit {';
			$feminine_shop_custom_css .='display: none;';
		$feminine_shop_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$feminine_shop_footer_background_color = get_theme_mod('feminine_shop_footer_background_color');
	if($feminine_shop_footer_background_color != false){
		$feminine_shop_custom_css .='#footer{';
			$feminine_shop_custom_css .='background-color: '.esc_attr($feminine_shop_footer_background_color).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_copyright_font_size = get_theme_mod('feminine_shop_copyright_font_size');
	if($feminine_shop_copyright_font_size != false){
		$feminine_shop_custom_css .='.copyright p{';
			$feminine_shop_custom_css .='font-size: '.esc_attr($feminine_shop_copyright_font_size).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_copyright_alignment = get_theme_mod('feminine_shop_copyright_alignment');
	if($feminine_shop_copyright_alignment != false){
		$feminine_shop_custom_css .='.copyright p{';
			$feminine_shop_custom_css .='text-align: '.esc_attr($feminine_shop_copyright_alignment).';';
		$feminine_shop_custom_css .='}';
	}

	/*--------------Woocommerce Products Settings -----------*/

	$feminine_shop_products_btn_padding_top_bottom = get_theme_mod('feminine_shop_products_btn_padding_top_bottom');
	if($feminine_shop_products_btn_padding_top_bottom != false){
		$feminine_shop_custom_css .='.woocommerce a.button{';
			$feminine_shop_custom_css .='padding-top: '.esc_attr($feminine_shop_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($feminine_shop_products_btn_padding_top_bottom).' !important;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_products_btn_padding_left_right = get_theme_mod('feminine_shop_products_btn_padding_left_right');
	if($feminine_shop_products_btn_padding_left_right != false){
		$feminine_shop_custom_css .='.woocommerce a.button{';
			$feminine_shop_custom_css .='padding-left: '.esc_attr($feminine_shop_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($feminine_shop_products_btn_padding_left_right).' !important;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_woocommerce_sale_position = get_theme_mod( 'feminine_shop_woocommerce_sale_position','left');
    if($feminine_shop_woocommerce_sale_position == 'left'){
		$feminine_shop_custom_css .='.woocommerce ul.products li.product .onsale{';
			$feminine_shop_custom_css .='left: -10px; right: auto;';
		$feminine_shop_custom_css .='}';
	}else if($feminine_shop_woocommerce_sale_position == 'right'){
		$feminine_shop_custom_css .='.woocommerce ul.products li.product .onsale{';
			$feminine_shop_custom_css .='left: auto !important; right: 15px !important;';
		$feminine_shop_custom_css .='}';
		$feminine_shop_custom_css .='.woocommerce ul.products li.product .price{';
			$feminine_shop_custom_css .='right: auto !important; left: 0 !important; border-radius: 8px 0 8px 0;';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_woocommerce_sale_padding_top_bottom = get_theme_mod('feminine_shop_woocommerce_sale_padding_top_bottom');
	if($feminine_shop_woocommerce_sale_padding_top_bottom != false){
		$feminine_shop_custom_css .='.woocommerce span.onsale{';
			$feminine_shop_custom_css .='padding-top: '.esc_attr($feminine_shop_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($feminine_shop_woocommerce_sale_padding_top_bottom).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_woocommerce_sale_padding_left_right = get_theme_mod('feminine_shop_woocommerce_sale_padding_left_right');
	if($feminine_shop_woocommerce_sale_padding_left_right != false){
		$feminine_shop_custom_css .='.woocommerce span.onsale{';
			$feminine_shop_custom_css .='padding-left: '.esc_attr($feminine_shop_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($feminine_shop_woocommerce_sale_padding_left_right).';';
		$feminine_shop_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$feminine_shop_logo_padding = get_theme_mod('feminine_shop_logo_padding');
	if($feminine_shop_logo_padding != false){
		$feminine_shop_custom_css .='.logo{';
			$feminine_shop_custom_css .='padding: '.esc_attr($feminine_shop_logo_padding).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_logo_margin = get_theme_mod('feminine_shop_logo_margin');
	if($feminine_shop_logo_margin != false){
		$feminine_shop_custom_css .='.logo{';
			$feminine_shop_custom_css .='margin: '.esc_attr($feminine_shop_logo_margin).';';
		$feminine_shop_custom_css .='}';
	}

	// Site title Font Size
	$feminine_shop_site_title_font_size = get_theme_mod('feminine_shop_site_title_font_size');
	if($feminine_shop_site_title_font_size != false){
		$feminine_shop_custom_css .='.logo h1, .logo p.site-title{';
			$feminine_shop_custom_css .='font-size: '.esc_attr($feminine_shop_site_title_font_size).';';
		$feminine_shop_custom_css .='}';
	}

	// Site tagline Font Size
	$feminine_shop_site_tagline_font_size = get_theme_mod('feminine_shop_site_tagline_font_size');
	if($feminine_shop_site_tagline_font_size != false){
		$feminine_shop_custom_css .='.logo p.site-description{';
			$feminine_shop_custom_css .='font-size: '.esc_attr($feminine_shop_site_tagline_font_size).';';
		$feminine_shop_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$feminine_shop_preloader_bg_color = get_theme_mod('feminine_shop_preloader_bg_color');
	if($feminine_shop_preloader_bg_color != false){
		$feminine_shop_custom_css .='#preloader{';
			$feminine_shop_custom_css .='background-color: '.esc_attr($feminine_shop_preloader_bg_color).';';
		$feminine_shop_custom_css .='}';
	}

	$feminine_shop_preloader_border_color = get_theme_mod('feminine_shop_preloader_border_color');
	if($feminine_shop_preloader_border_color != false){
		$feminine_shop_custom_css .='.loader-line{';
			$feminine_shop_custom_css .='border-color: '.esc_attr($feminine_shop_preloader_border_color).'!important;';
		$feminine_shop_custom_css .='}';
	}