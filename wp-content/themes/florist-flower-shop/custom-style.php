<?php

	$florist_flower_shop_custom_css= "";

	/*-------------------First highlight color-------------------*/

	$florist_flower_shop_first_color = get_theme_mod('florist_flower_shop_first_color');

	if($florist_flower_shop_first_color != false){
		$florist_flower_shop_custom_css .='#footer-2, #preloader{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_first_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	if($florist_flower_shop_first_color != false){
		$florist_flower_shop_custom_css .='#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .post-info:hover a, .logo .site-title a:hover, #slider .carousel-caption h1 a:hover{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_first_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*--------------Second highlight color-------------------*/

	$florist_flower_shop_second_color = get_theme_mod('florist_flower_shop_second_color');

	if($florist_flower_shop_second_color != false){
		$florist_flower_shop_custom_css .='#footer{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_second_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	if($florist_flower_shop_first_color != false || $florist_flower_shop_second_color != false){
		$florist_flower_shop_custom_css .='.woocommerce span.onsale,#sidebar h3,span.cart-value, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .scrollup i, .pagination span, .pagination a, .widget_product_search button, .toggle-nav i, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{
		background: linear-gradient(to right, '.esc_attr($florist_flower_shop_first_color).', '.esc_attr($florist_flower_shop_second_color).');
		}';
	}

	/*------------------Third highlight color-------------------*/

	$florist_flower_shop_third_color = get_theme_mod('florist_flower_shop_third_color');

	if($florist_flower_shop_third_color != false){
		$florist_flower_shop_custom_css .='.main-navigation ul.sub-menu>li>a:before, .slide-search input[type="submit"],.main-inner-box span.entry-date,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover, .get-start-btn:hover{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_third_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	if($florist_flower_shop_third_color != false){
		$florist_flower_shop_custom_css .='a, .main-navigation a:hover, #slider .carousel-caption h1 a, .post-main-box h2 a,.post-info span a, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price, h1, h2, h3, h4, h5, h6{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_third_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*------------------Fourth highlight color-------------------*/

	$florist_flower_shop_fourth_color = get_theme_mod('florist_flower_shop_fourth_color');

	if($florist_flower_shop_fourth_color != false){
		$florist_flower_shop_custom_css .='#footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_fourth_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*------------------Fifth highlight color-------------------*/

	$florist_flower_shop_fifth_color = get_theme_mod('florist_flower_shop_fifth_color');

	if($florist_flower_shop_fourth_color != false || $florist_flower_shop_fifth_color != false){
		$florist_flower_shop_custom_css .='.get-start-btn{
		background: linear-gradient(to right, '.esc_attr($florist_flower_shop_fourth_color).', '.esc_attr($florist_flower_shop_fifth_color).');
		}';
	}

	/*----------------Sixth highlight color-------------------*/

	$florist_flower_shop_sixth_color = get_theme_mod('florist_flower_shop_sixth_color');

	if($florist_flower_shop_sixth_color != false){
		$florist_flower_shop_custom_css .='.top-bar{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_sixth_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$florist_flower_shop_slider = get_theme_mod('florist_flower_shop_slider_arrows');
	if($florist_flower_shop_slider == false){
		$florist_flower_shop_custom_css .='.page-template-custom-home-page .home-page-header{';
			$florist_flower_shop_custom_css .='position: static;';
		$florist_flower_shop_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$florist_flower_shop_theme_lay = get_theme_mod( 'florist_flower_shop_width_option','Full Width');
    if($florist_flower_shop_theme_lay == 'Boxed'){
		$florist_flower_shop_custom_css .='body{';
			$florist_flower_shop_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-caption h1 a{';
			$florist_flower_shop_custom_css .='font-size: 40px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.admin-bar #slider .carousel-caption,#slider .carousel-caption{';
			$florist_flower_shop_custom_css .=' top: 0;right: 30px !important;left: 30px; height: 470px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.page-template-custom-home-page .inner-head-box {';
			$florist_flower_shop_custom_css .='padding: 15px 50px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.slider-inner-box{';
			$florist_flower_shop_custom_css .='top: 160px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-next{';
			$florist_flower_shop_custom_css .='right: 83%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-prev{';
			$florist_flower_shop_custom_css .='left: 5%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-prev, #slider .carousel-control-next{';
			$florist_flower_shop_custom_css .='bottom: 20px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.scrollup i{';
		  $florist_flower_shop_custom_css .='right: 100px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.scrollup.left i{';
		  $florist_flower_shop_custom_css .='left: 100px;';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Wide Width'){
		$florist_flower_shop_custom_css .='body{';
			$florist_flower_shop_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.scrollup i{';
		  $florist_flower_shop_custom_css .='right: 30px;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.scrollup.left i{';
		  $florist_flower_shop_custom_css .='left: 30px;';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Full Width'){
		$florist_flower_shop_custom_css .='body{';
			$florist_flower_shop_custom_css .='max-width: 100%;';
		$florist_flower_shop_custom_css .='}';
	}

	/*------------------ Slider Content Layout -------------------*/

	$florist_flower_shop_theme_lay = get_theme_mod( 'florist_flower_shop_slider_content_option','Left');
    if($florist_flower_shop_theme_lay == 'Left'){
		$florist_flower_shop_custom_css .='#slider .carousel-caption{';
			$florist_flower_shop_custom_css .='text-align:left; right: 20%; left:20%';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Center'){
		$florist_flower_shop_custom_css .='#slider .carousel-caption{';
			$florist_flower_shop_custom_css .='text-align:center; right: 20%; left: 20%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-next{';
			$florist_flower_shop_custom_css .='right: 59%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-prev{';
			$florist_flower_shop_custom_css .='left: 34%;';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Right'){
		$florist_flower_shop_custom_css .='#slider .carousel-caption{';
			$florist_flower_shop_custom_css .='text-align:right; right: 20%; left: 20%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-next{';
			$florist_flower_shop_custom_css .='right: 46%;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='#slider .carousel-control-prev{';
			$florist_flower_shop_custom_css .='left: 47%;';
		$florist_flower_shop_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$florist_flower_shop_slider_content_padding_top_bottom = get_theme_mod('florist_flower_shop_slider_content_padding_top_bottom');
	$florist_flower_shop_slider_content_padding_left_right = get_theme_mod('florist_flower_shop_slider_content_padding_left_right');
	if($florist_flower_shop_slider_content_padding_top_bottom != false || $florist_flower_shop_slider_content_padding_left_right != false){
		$florist_flower_shop_custom_css .='.slider-inner-box{';
			$florist_flower_shop_custom_css .='top: '.esc_attr($florist_flower_shop_slider_content_padding_top_bottom).'; bottom: '.esc_attr($florist_flower_shop_slider_content_padding_top_bottom).';left: '.esc_attr($florist_flower_shop_slider_content_padding_left_right).';right: '.esc_attr($florist_flower_shop_slider_content_padding_left_right).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*---------------------------Blog Post Layout -------------------*/

	$florist_flower_shop_theme_lay = get_theme_mod( 'florist_flower_shop_blog_layout_option','Default');
    if($florist_flower_shop_theme_lay == 'Default'){
		$florist_flower_shop_custom_css .='.post-main-box{';
			$florist_flower_shop_custom_css .='';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Center'){
		$florist_flower_shop_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$florist_flower_shop_custom_css .='text-align:center;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.post-info{';
			$florist_flower_shop_custom_css .='margin-top:10px;';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_theme_lay == 'Left'){
		$florist_flower_shop_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$florist_flower_shop_custom_css .='text-align:Left;';
		$florist_flower_shop_custom_css .='}';
		$florist_flower_shop_custom_css .='.post-main-box h2{';
			$florist_flower_shop_custom_css .='margin-top:10px;';
		$florist_flower_shop_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$florist_flower_shop_resp_topbar = get_theme_mod( 'florist_flower_shop_resp_slider_hide_show',false);
	if($florist_flower_shop_resp_topbar == true && get_theme_mod( 'florist_flower_shop_slider_arrows', false) == false){
    	$florist_flower_shop_custom_css .='#topbar{';
			$florist_flower_shop_custom_css .='display:none;';
		$florist_flower_shop_custom_css .='} ';
	}
    if($florist_flower_shop_resp_topbar == true){
    	$florist_flower_shop_custom_css .='@media screen and (max-width:575px) {';
		$florist_flower_shop_custom_css .='#topbar{';
			$florist_flower_shop_custom_css .='display:block;';
		$florist_flower_shop_custom_css .='} }';
	}else if($florist_flower_shop_resp_topbar == false){
		$florist_flower_shop_custom_css .='@media screen and (max-width:575px) {';
		$florist_flower_shop_custom_css .='#topbar{';
			$florist_flower_shop_custom_css .='display:none;';
		$florist_flower_shop_custom_css .='} }';
	}

	$florist_flower_shop_resp_sidebar = get_theme_mod( 'florist_flower_shop_sidebar_hide_show',true);
    if($florist_flower_shop_resp_sidebar == true){
    	$florist_flower_shop_custom_css .='@media screen and (max-width:575px) {';
		$florist_flower_shop_custom_css .='#sidebar{';
			$florist_flower_shop_custom_css .='display:block;';
		$florist_flower_shop_custom_css .='} }';
	}else if($florist_flower_shop_resp_sidebar == false){
		$florist_flower_shop_custom_css .='@media screen and (max-width:575px) {';
		$florist_flower_shop_custom_css .='#sidebar{';
			$florist_flower_shop_custom_css .='display:none;';
		$florist_flower_shop_custom_css .='} }';
	}

	$florist_flower_shop_resp_scroll_top = get_theme_mod( 'florist_flower_shop_resp_scroll_top_hide_show',true);
	if($florist_flower_shop_resp_scroll_top == true && get_theme_mod( 'florist_flower_shop_footer_scroll',true) != true){
    	$florist_flower_shop_custom_css .='.scrollup i{';
			$florist_flower_shop_custom_css .='visibility:hidden !important;';
		$florist_flower_shop_custom_css .='} ';
	}
    if($florist_flower_shop_resp_scroll_top == true){
    	$florist_flower_shop_custom_css .='@media screen and (max-width:575px) {';
		$florist_flower_shop_custom_css .='.scrollup i{';
			$florist_flower_shop_custom_css .='visibility:visible !important;';
		$florist_flower_shop_custom_css .='} }';
	}else if($florist_flower_shop_resp_scroll_top == false){
		$florist_flower_shop_custom_css .='@media screen and (max-width:575px){';
		$florist_flower_shop_custom_css .='.scrollup i{';
			$florist_flower_shop_custom_css .='visibility:hidden !important;';
		$florist_flower_shop_custom_css .='} }';
	}

	$florist_flower_shop_resp_menu_toggle_btn_bg_color = get_theme_mod('florist_flower_shop_resp_menu_toggle_btn_bg_color');
	if($florist_flower_shop_resp_menu_toggle_btn_bg_color != false){
		$florist_flower_shop_custom_css .='.toggle-nav i{';
			$florist_flower_shop_custom_css .='background: '.esc_attr($florist_flower_shop_resp_menu_toggle_btn_bg_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*---------------- Menus Settings ------------------*/

	$florist_flower_shop_navigation_menu_font_size = get_theme_mod('florist_flower_shop_navigation_menu_font_size');
	if($florist_flower_shop_navigation_menu_font_size != false){
		$florist_flower_shop_custom_css .='.main-navigation a{';
			$florist_flower_shop_custom_css .='font-size: '.esc_attr($florist_flower_shop_navigation_menu_font_size).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_nav_menus_font_weight = get_theme_mod( 'florist_flower_shop_navigation_menu_font_weight','Default');
    if($florist_flower_shop_nav_menus_font_weight == 'Default'){
		$florist_flower_shop_custom_css .='.main-navigation a{';
			$florist_flower_shop_custom_css .='';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_nav_menus_font_weight == 'Normal'){
		$florist_flower_shop_custom_css .='.main-navigation a{';
			$florist_flower_shop_custom_css .='font-weight: normal;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_header_menus_color = get_theme_mod('florist_flower_shop_header_menus_color');
	if($florist_flower_shop_header_menus_color != false){
		$florist_flower_shop_custom_css .='.main-navigation a{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_header_menus_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_header_menus_hover_color = get_theme_mod('florist_flower_shop_header_menus_hover_color');
	if($florist_flower_shop_header_menus_hover_color != false){
		$florist_flower_shop_custom_css .='.main-navigation a:hover{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_header_menus_hover_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_header_submenus_color = get_theme_mod('florist_flower_shop_header_submenus_color');
	if($florist_flower_shop_header_submenus_color != false){
		$florist_flower_shop_custom_css .='.main-navigation ul ul a{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_header_submenus_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_header_submenus_hover_color = get_theme_mod('florist_flower_shop_header_submenus_hover_color');
	if($florist_flower_shop_header_submenus_hover_color != false){
		$florist_flower_shop_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$florist_flower_shop_custom_css .='color: '.esc_attr($florist_flower_shop_header_submenus_hover_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$florist_flower_shop_button_border_radius = get_theme_mod('florist_flower_shop_button_border_radius');
	if($florist_flower_shop_button_border_radius != false){
		$florist_flower_shop_custom_css .='.post-main-box .more-btn a{';
			$florist_flower_shop_custom_css .='border-radius: '.esc_attr($florist_flower_shop_button_border_radius).'px;';
		$florist_flower_shop_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$florist_flower_shop_footer_background_color = get_theme_mod('florist_flower_shop_footer_background_color');
	if($florist_flower_shop_footer_background_color != false){
		$florist_flower_shop_custom_css .='#footer{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_footer_background_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_copyright_font_size = get_theme_mod('florist_flower_shop_copyright_font_size');
	if($florist_flower_shop_copyright_font_size != false){
		$florist_flower_shop_custom_css .='.copyright p{';
			$florist_flower_shop_custom_css .='font-size: '.esc_attr($florist_flower_shop_copyright_font_size).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_copyright_alingment = get_theme_mod('florist_flower_shop_copyright_alingment');
	if($florist_flower_shop_copyright_alingment != false){
		$florist_flower_shop_custom_css .='.copyright p{';
			$florist_flower_shop_custom_css .='text-align: '.esc_attr($florist_flower_shop_copyright_alingment).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ----------------*/

	$florist_flower_shop_products_btn_padding_top_bottom = get_theme_mod('florist_flower_shop_products_btn_padding_top_bottom');
	if($florist_flower_shop_products_btn_padding_top_bottom != false){
		$florist_flower_shop_custom_css .='.woocommerce a.button{';
			$florist_flower_shop_custom_css .='padding-top: '.esc_attr($florist_flower_shop_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($florist_flower_shop_products_btn_padding_top_bottom).' !important;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_products_btn_padding_left_right = get_theme_mod('florist_flower_shop_products_btn_padding_left_right');
	if($florist_flower_shop_products_btn_padding_left_right != false){
		$florist_flower_shop_custom_css .='.woocommerce a.button{';
			$florist_flower_shop_custom_css .='padding-left: '.esc_attr($florist_flower_shop_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($florist_flower_shop_products_btn_padding_left_right).' !important;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_woocommerce_sale_position = get_theme_mod( 'florist_flower_shop_woocommerce_sale_position','left');
    if($florist_flower_shop_woocommerce_sale_position == 'left'){
		$florist_flower_shop_custom_css .='.woocommerce ul.products li.product .onsale{';
			$florist_flower_shop_custom_css .='left: -10px; right: auto;';
		$florist_flower_shop_custom_css .='}';
	}else if($florist_flower_shop_woocommerce_sale_position == 'right'){
		$florist_flower_shop_custom_css .='.woocommerce ul.products li.product .onsale{';
			$florist_flower_shop_custom_css .='left: auto !important; right: 5px !important;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_woocommerce_sale_padding_top_bottom = get_theme_mod('florist_flower_shop_woocommerce_sale_padding_top_bottom');
	if($florist_flower_shop_woocommerce_sale_padding_top_bottom != false){
		$florist_flower_shop_custom_css .='.woocommerce span.onsale{';
			$florist_flower_shop_custom_css .='padding-left: '.esc_attr($florist_flower_shop_woocommerce_sale_padding_top_bottom).'; padding-right: '.esc_attr($florist_flower_shop_woocommerce_sale_padding_top_bottom).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_woocommerce_sale_padding_left_right = get_theme_mod('florist_flower_shop_woocommerce_sale_padding_left_right');
	if($florist_flower_shop_woocommerce_sale_padding_left_right != false){
		$florist_flower_shop_custom_css .='.woocommerce span.onsale{';
			$florist_flower_shop_custom_css .='padding-top: '.esc_attr($florist_flower_shop_woocommerce_sale_padding_left_right).'; padding-bottom: '.esc_attr($florist_flower_shop_woocommerce_sale_padding_left_right).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$florist_flower_shop_logo_padding = get_theme_mod('florist_flower_shop_logo_padding');
	if($florist_flower_shop_logo_padding != false){
		$florist_flower_shop_custom_css .='.inner-head-box .logo{';
			$florist_flower_shop_custom_css .='padding: '.esc_attr($florist_flower_shop_logo_padding).' !important;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_logo_margin = get_theme_mod('florist_flower_shop_logo_margin');
	if($florist_flower_shop_logo_margin != false){
		$florist_flower_shop_custom_css .='.inner-head-box .logo{';
			$florist_flower_shop_custom_css .='margin: '.esc_attr($florist_flower_shop_logo_margin).';';
		$florist_flower_shop_custom_css .='}';
	}

	// Site title Font Size
	$florist_flower_shop_site_title_font_size = get_theme_mod('florist_flower_shop_site_title_font_size');
	if($florist_flower_shop_site_title_font_size != false){
		$florist_flower_shop_custom_css .='.logo p.site-title, .logo h1{';
			$florist_flower_shop_custom_css .='font-size: '.esc_attr($florist_flower_shop_site_title_font_size).';';
		$florist_flower_shop_custom_css .='}';
	}

	// Site tagline Font Size
	$florist_flower_shop_site_tagline_font_size = get_theme_mod('florist_flower_shop_site_tagline_font_size');
	if($florist_flower_shop_site_tagline_font_size != false){
		$florist_flower_shop_custom_css .='.logo p.site-description{';
			$florist_flower_shop_custom_css .='font-size: '.esc_attr($florist_flower_shop_site_tagline_font_size).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*-------------- Blog Page Settings----------------*/

	$florist_flower_shop_featured_image_border_radius = get_theme_mod('florist_flower_shop_featured_image_border_radius', 0);
	if($florist_flower_shop_featured_image_border_radius != false){
		$florist_flower_shop_custom_css .='.box-image img, .feature-box img{';
			$florist_flower_shop_custom_css .='border-radius: '.esc_attr($florist_flower_shop_featured_image_border_radius).'px;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_featured_image_box_shadow = get_theme_mod('florist_flower_shop_featured_image_box_shadow',0);
	if($florist_flower_shop_featured_image_box_shadow != false){
		$florist_flower_shop_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$florist_flower_shop_custom_css .='box-shadow: '.esc_attr($florist_flower_shop_featured_image_box_shadow).'px '.esc_attr($florist_flower_shop_featured_image_box_shadow).'px '.esc_attr($florist_flower_shop_featured_image_box_shadow).'px #cccccc;';
		$florist_flower_shop_custom_css .='}';
	}

	/*-------------- Single Blog Page ----------------*/

	$florist_flower_shop_single_blog_comment_title = get_theme_mod('florist_flower_shop_single_blog_comment_title', 'Leave a Reply');
	if($florist_flower_shop_single_blog_comment_title == ''){
		$florist_flower_shop_custom_css .='#comments h2#reply-title {';
			$florist_flower_shop_custom_css .='display: none;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_single_blog_comment_button_text = get_theme_mod('florist_flower_shop_single_blog_comment_button_text', 'Post Comment');
	if($florist_flower_shop_single_blog_comment_button_text == ''){
		$florist_flower_shop_custom_css .='#comments p.form-submit {';
			$florist_flower_shop_custom_css .='display: none;';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_comment_width = get_theme_mod('florist_flower_shop_single_blog_comment_width');
	if($florist_flower_shop_comment_width != false){
		$florist_flower_shop_custom_css .='#comments textarea{';
			$florist_flower_shop_custom_css .='width: '.esc_attr($florist_flower_shop_comment_width).';';
		$florist_flower_shop_custom_css .='}';
	}

	/*---------------- Preloader Background Color  -------------------*/

	$florist_flower_shop_preloader_bg_color = get_theme_mod('florist_flower_shop_preloader_bg_color');
	if($florist_flower_shop_preloader_bg_color != false){
		$florist_flower_shop_custom_css .='#preloader{';
			$florist_flower_shop_custom_css .='background-color: '.esc_attr($florist_flower_shop_preloader_bg_color).';';
		$florist_flower_shop_custom_css .='}';
	}

	$florist_flower_shop_preloader_border_color = get_theme_mod('florist_flower_shop_preloader_border_color');
	if($florist_flower_shop_preloader_border_color != false){
		$florist_flower_shop_custom_css .='.loader-line{';
			$florist_flower_shop_custom_css .='border-color: '.esc_attr($florist_flower_shop_preloader_border_color).'!important;';
		$florist_flower_shop_custom_css .='}';
	}