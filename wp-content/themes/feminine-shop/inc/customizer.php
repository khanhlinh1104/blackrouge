<?php
/**
 * Feminine Shop Theme Customizer
 *
 * @package Feminine Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function feminine_shop_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'feminine_shop_custom_controls' );

function feminine_shop_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'feminine_shop_customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'feminine_shop_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$feminine_shop_parent_panel = new Feminine_Shop_WP_Customize_Panel( $wp_customize, 'feminine_shop_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'feminine-shop' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'feminine_shop_left_right', array(
    	'title' => esc_html__( 'General Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_panel_id'
	) );

	$wp_customize->add_setting('feminine_shop_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control(new Feminine_Shop_Image_Radio_Control($wp_customize, 'feminine_shop_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','feminine-shop'),
        'description' => esc_html__('Here you can change the width layout of Website.','feminine-shop'),
        'section' => 'feminine_shop_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('feminine_shop_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control('feminine_shop_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','feminine-shop'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','feminine-shop'),
        'section' => 'feminine_shop_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','feminine-shop'),
            'Right Sidebar' => esc_html__('Right Sidebar','feminine-shop'),
            'One Column' => esc_html__('One Column','feminine-shop'),
            'Three Columns' => esc_html__('Three Columns','feminine-shop'),
            'Four Columns' => esc_html__('Four Columns','feminine-shop'),
            'Grid Layout' => esc_html__('Grid Layout','feminine-shop')
        ),
	) );

	$wp_customize->add_setting('feminine_shop_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control('feminine_shop_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','feminine-shop'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','feminine-shop'),
        'section' => 'feminine_shop_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','feminine-shop'),
            'Right Sidebar' => esc_html__('Right Sidebar','feminine-shop'),
            'One Column' => esc_html__('One Column','feminine-shop')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'feminine_shop_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'feminine_shop_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','feminine-shop' ),
		'section' => 'feminine_shop_left_right'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'feminine_shop_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'feminine_shop_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','feminine-shop' ),
		'section' => 'feminine_shop_left_right'
    )));

    //Wow Animation
	$wp_customize->add_setting( 'feminine_shop_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_animation',array(
        'label' => esc_html__( 'Animations','feminine-shop' ),
        'description' => __('Here you can disable overall site animation effect','feminine-shop'),
        'section' => 'feminine_shop_left_right'
    )));

    $wp_customize->add_setting('feminine_shop_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new Feminine_Shop_Reset_Custom_Control($wp_customize, 'feminine_shop_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'feminine-shop'),
      'description' => 'feminine_shop_reset_all_settings',
      'section' => 'feminine_shop_left_right'
   	)));

    //Pre-Loader
	$wp_customize->add_setting( 'feminine_shop_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','feminine-shop' ),
        'section' => 'feminine_shop_left_right'
    )));

	$wp_customize->add_setting('feminine_shop_preloader_bg_color', array(
		'default'           => '#19203f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'feminine-shop'),
		'section'  => 'feminine_shop_left_right',
	)));

	$wp_customize->add_setting('feminine_shop_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'feminine-shop'),
		'section'  => 'feminine_shop_left_right',
	)));

	//Top Header
	$wp_customize->add_section( 'feminine_shop_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'feminine-shop' ),
		'panel' => 'feminine_shop_panel_id'
	) );

	$wp_customize->add_setting('feminine_shop_top_bar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_shop_top_bar_text',array(
		'label'	=> esc_html__('Anouncement Text','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lorem ipsum dolor sit amet ipsum dolor sit amet.', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control('feminine_shop_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','feminine-shop'),
        'section' => 'feminine_shop_top_header',
        'choices' => array(
        	'Default' => __('Default','feminine-shop'),
            'Normal' => __('Normal','feminine-shop')
        ),
	) );

	$wp_customize->add_setting('feminine_shop_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_header_menus_color', array(
		'label'    => __('Menus Color', 'feminine-shop'),
		'section'  => 'feminine_shop_top_header',
	)));

	$wp_customize->add_setting('feminine_shop_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'feminine-shop'),
		'section'  => 'feminine_shop_top_header',
	)));

	$wp_customize->add_setting('feminine_shop_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'feminine-shop'),
		'section'  => 'feminine_shop_top_header',
	)));

	$wp_customize->add_setting('feminine_shop_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'feminine-shop'),
		'section'  => 'feminine_shop_top_header',
	)));

	//Slider
	$wp_customize->add_section( 'feminine_shop_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'feminine-shop' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/feminine-wordpress-theme/">GO PRO</a>','feminine-shop'),
		'panel' => 'feminine_shop_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('feminine_shop_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_slider_arrows',
	));

	$wp_customize->add_setting( 'feminine_shop_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','feminine-shop' ),
      	'section' => 'feminine_shop_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'feminine_shop_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'feminine_shop_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'feminine_shop_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'feminine-shop' ),
			'description' => esc_html__('Slider image size (1400 x 550)','feminine-shop'),
			'section'  => 'feminine_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('feminine_shop_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control(new Feminine_Shop_Image_Radio_Control($wp_customize, 'feminine_shop_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','feminine-shop'),
        'section' => 'feminine_shop_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('feminine_shop_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','feminine-shop'),
		'description'	=> __('Enter a value in %. Example:20%','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','feminine-shop'),
		'description'	=> __('Enter a value in %. Example:20%','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'feminine_shop_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'feminine_shop_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'feminine_shop_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','feminine-shop' ),
		'section'     => 'feminine_shop_slidersettings',
		'type'        => 'range',
		'settings'    => 'feminine_shop_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Slider height
	$wp_customize->add_setting('feminine_shop_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_slider_height',array(
		'label'	=> __('Slider Height','feminine-shop'),
		'description'	=> __('Specify the slider height (px).','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'feminine_shop_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'feminine_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'feminine_shop_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','feminine-shop'),
		'section' => 'feminine_shop_slidersettings',
		'type'  => 'number',
	) );
 
	//About Section
	$wp_customize->add_section('feminine_shop_about_section',array(
		'title'	=> __('About Section','feminine-shop'),
		'description' => __('For more options of about section <br/><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/feminine-wordpress-theme/">GO PRO</a>','feminine-shop'),
		'panel' => 'feminine_shop_panel_id',
	));

	$wp_customize->add_setting('feminine_shop_about_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_shop_about_section_title',array(
		'label'	=> __('Section Title','feminine-shop'),
		'input_attrs' => array(
	        'placeholder' => __( 'Our Features & Quality Details', 'feminine-shop' ),
	    ),
		'section'=> 'feminine_shop_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'feminine_shop_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'feminine_shop_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'feminine_shop_about_page', array(
		'label'    => __( 'Select About Page', 'feminine-shop' ),
		'section'  => 'feminine_shop_about_section',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'feminine_shop_products_page', array(
		'default'           => '',
		'sanitize_callback' => 'feminine_shop_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'feminine_shop_products_page', array(
		'label'    => __( 'Select Products Page', 'feminine-shop' ),
		'section'  => 'feminine_shop_about_section',
		'type'     => 'dropdown-pages'
	) );

	//No Result Page Setting
	$wp_customize->add_section('feminine_shop_no_results_page',array(
		'title'	=> __('No Results Page Settings','feminine-shop'),
		'panel' => 'feminine_shop_panel_id',
	));	

	$wp_customize->add_setting('feminine_shop_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('feminine_shop_no_results_page_title',array(
		'label'	=> __('Add Title','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('feminine_shop_no_results_page_content',array(
		'label'	=> __('Add Text','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_no_results_page',
		'type'=> 'text'
	));
	
	//Blog Post
	$wp_customize->add_panel( $feminine_shop_parent_panel );

	$BlogPostParentPanel = new Feminine_Shop_WP_Customize_Panel( $wp_customize, 'feminine_shop_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'feminine_shop_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('feminine_shop_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_toggle_postdate', 
	));

	$wp_customize->add_setting( 'feminine_shop_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','feminine-shop' ),
        'section' => 'feminine_shop_post_settings'
    )));

    $wp_customize->add_setting( 'feminine_shop_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_toggle_author',array(
		'label' => esc_html__( 'Author','feminine-shop' ),
		'section' => 'feminine_shop_post_settings'
    )));

    $wp_customize->add_setting( 'feminine_shop_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_toggle_comments',array(
		'label' => esc_html__( 'Comments','feminine-shop' ),
		'section' => 'feminine_shop_post_settings'
    )));

    $wp_customize->add_setting( 'feminine_shop_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_toggle_time',array(
		'label' => esc_html__( 'Time','feminine-shop' ),
		'section' => 'feminine_shop_post_settings'
    )));

    $wp_customize->add_setting( 'feminine_shop_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
	));
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','feminine-shop' ),
		'section' => 'feminine_shop_post_settings'
    )));

    $wp_customize->add_setting( 'feminine_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'feminine_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'feminine_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','feminine-shop' ),
		'section'     => 'feminine_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'feminine_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'feminine_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'feminine_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','feminine-shop' ),
		'section'     => 'feminine_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'feminine_shop_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'feminine_shop_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'feminine_shop_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','feminine-shop' ),
		'section'     => 'feminine_shop_post_settings',
		'type'        => 'range',
		'settings'    => 'feminine_shop_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('feminine_shop_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','feminine-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','feminine-shop'),
		'section'=> 'feminine_shop_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('feminine_shop_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
    ));
    $wp_customize->add_control(new Feminine_Shop_Image_Radio_Control($wp_customize, 'feminine_shop_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','feminine-shop'),
        'section' => 'feminine_shop_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('feminine_shop_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control('feminine_shop_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','feminine-shop'),
        'section' => 'feminine_shop_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','feminine-shop'),
            'Excerpt' => esc_html__('Excerpt','feminine-shop'),
            'No Content' => esc_html__('No Content','feminine-shop')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'feminine_shop_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'feminine_shop_button_border_radius', array(
		'default'              => 8,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'feminine_shop_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'feminine_shop_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','feminine-shop' ),
		'section'     => 'feminine_shop_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('feminine_shop_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_button_text', 
	));

    $wp_customize->add_setting('feminine_shop_button_text',array(
		'default'=> esc_html__('READ MORE','feminine-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_button_text',array(
		'label'	=> esc_html__('Add Button Text','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'feminine_shop_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('feminine_shop_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_related_post_title', 
	));

    $wp_customize->add_setting( 'feminine_shop_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_related_post',array(
		'label' => esc_html__( 'Related Post','feminine-shop' ),
		'section' => 'feminine_shop_related_posts_settings'
    )));

    $wp_customize->add_setting('feminine_shop_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('feminine_shop_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'feminine_shop_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'feminine-shop' ),
		'panel' => 'feminine_shop_blog_post_parent_panel',
	));

	$wp_customize->add_setting('feminine_shop_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','feminine-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','feminine-shop'),
		'section'=> 'feminine_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'feminine_shop_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
	));
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_toggle_tags', array(
		'label' => esc_html__( 'Tags','feminine-shop' ),
		'section' => 'feminine_shop_single_blog_settings'
    )));

    $wp_customize->add_setting('feminine_shop_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('feminine_shop_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('feminine_shop_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_single_blog_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('feminine_shop_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','feminine-shop'),
		'panel' => 'feminine_shop_panel_id',
	));

    $wp_customize->add_setting( 'feminine_shop_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','feminine-shop' ),
      	'section' => 'feminine_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'feminine_shop_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','feminine-shop' ),
      	'section' => 'feminine_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'feminine_shop_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','feminine-shop' ),
      	'section' => 'feminine_shop_responsive_media'
    )));

     $wp_customize->add_setting('feminine_shop_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'feminine-shop'),
		'section'  => 'feminine_shop_responsive_media',
	)));

    $wp_customize->add_setting('feminine_shop_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Feminine_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'feminine_shop_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','feminine-shop'),
		'transport' => 'refresh',
		'section'	=> 'feminine_shop_responsive_media',
		'setting'	=> 'feminine_shop_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('feminine_shop_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Feminine_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'feminine_shop_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','feminine-shop'),
		'transport' => 'refresh',
		'section'	=> 'feminine_shop_responsive_media',
		'setting'	=> 'feminine_shop_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('feminine_shop_footer',array(
		'title'	=> esc_html__('Footer Settings','feminine-shop'),
		'description' => __('For more options of footer section <br/><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/feminine-wordpress-theme/">GO PRO</a>','feminine-shop'),
		'panel' => 'feminine_shop_panel_id',
	));	

	$wp_customize->add_setting('feminine_shop_footer_background_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feminine_shop_footer_background_color', array(
		'label'    => __('Footer Background Color', 'feminine-shop'),
		'section'  => 'feminine_shop_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('feminine_shop_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_footer_text', 
	));
	
	$wp_customize->add_setting('feminine_shop_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_shop_footer_text',array(
		'label'	=> esc_html__('Copyright Text','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control(new Feminine_Shop_Image_Radio_Control($wp_customize, 'feminine_shop_copyright_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','feminine-shop'),
        'section' => 'feminine_shop_footer',
        'settings' => 'feminine_shop_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'feminine_shop_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'feminine_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new Feminine_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'feminine_shop_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','feminine-shop' ),
      	'section' => 'feminine_shop_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('feminine_shop_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'feminine_shop_customize_partial_feminine_shop_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('feminine_shop_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control(new Feminine_Shop_Image_Radio_Control($wp_customize, 'feminine_shop_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','feminine-shop'),
        'section' => 'feminine_shop_footer',
        'settings' => 'feminine_shop_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('feminine_shop_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'feminine-shop'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('feminine_shop_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('feminine_shop_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'feminine_shop_sanitize_choices'
	));
	$wp_customize->add_control('feminine_shop_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','feminine-shop'),
        'section' => 'feminine_shop_woocommerce_section',
        'choices' => array(
            'left' => __('Left','feminine-shop'),
            'right' => __('Right','feminine-shop'),
        ),
	) );

	$wp_customize->add_setting('feminine_shop_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('feminine_shop_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('feminine_shop_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','feminine-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','feminine-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'feminine-shop' ),
        ),
		'section'=> 'feminine_shop_woocommerce_section',
		'type'=> 'text'
	));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Feminine_Shop_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Feminine_Shop_WP_Customize_Section' );
}

add_action( 'customize_register', 'feminine_shop_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Feminine_Shop_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'feminine_shop_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Feminine_Shop_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'feminine_shop_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function feminine_shop_customize_controls_scripts() {
	wp_enqueue_script( 'feminine-shop-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'feminine_shop_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Feminine_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Feminine_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Feminine_Shop_Customize_Section_Pro( $manager,'feminine_shop_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Feminine Shop PRO', 'feminine-shop' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'feminine-shop' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/feminine-wordpress-theme/'),
		) )	);

		$manager->add_section(new Feminine_Shop_Customize_Section_Pro($manager,'feminine_shop_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'feminine-shop' ),
			'pro_text' => esc_html__( 'DOCS', 'feminine-shop' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-feminine-shop/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'feminine-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'feminine-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'feminine-shop-customize-controls',
		'feminine_shop_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
Feminine_Shop_Customize::get_instance();