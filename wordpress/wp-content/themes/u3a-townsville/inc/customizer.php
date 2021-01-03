<?php
/**
 * U3A_TOWNSVILLE Theme Customizer
 *
 * @package U3A_TOWNSVILLE
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function u3a_townsville_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'u3a_townsville_custom_controls' );

function u3a_townsville_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'u3a_townsville_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'u3a Settings', 'u3a_townsville' ),
	) );

	// Layout
	$wp_customize->add_section( 'u3a_townsville_left_right', array(
    	'title'      => __( 'General Settings', 'u3a_townsville' ),
		'panel' => 'u3a_townsville_panel_id'
	) );

	$wp_customize->add_setting('u3a_townsville_width_option',array(
        'default' => __('Full Width','u3a_townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));
	$wp_customize->add_control(new U3a_Townsville_Image_Radio_Control($wp_customize, 'u3a_townsville_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','u3a_townsville'),
        'description' => __('Here you can change the width layout of Website.','u3a_townsville'),
        'section' => 'u3a_townsville_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('u3a_townsville_theme_options',array(
        'default' => __('Right Sidebar','u3a_townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'	        
	) );
	$wp_customize->add_control('u3a_townsville_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','u3a_townsville'),
        'description' => __('Here you can change the sidebar layout for posts. ','u3a-townsville'),
        'section' => 'u3a_townsville_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','u3a-townsville'),
            'Right Sidebar' => __('Right Sidebar','u3a-townsville'),
            'One Column' => __('One Column','u3a-townsville'),
            'Three Columns' => __('Three Columns','u3a-townsville'),
            'Four Columns' => __('Four Columns','u3a-townsville'),
            'Grid Layout' => __('Grid Layout','u3a-townsville')
        ),
	));

	$wp_customize->add_setting('u3a_townsville_page_layout',array(
        'default' => __('One Column','u3a-townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));
	$wp_customize->add_control('u3a_townsville_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','u3a-townsville'),
        'description' => __('Here you can change the sidebar layout for pages. ','u3a-townsville'),
        'section' => 'u3a_townsville_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','u3a-townsville'),
            'Right Sidebar' => __('Right Sidebar','u3a-townsville'),
            'One Column' => __('One Column','u3a-townsville')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'u3a_townsville_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','u3a-townsville' ),
		'section' => 'u3a_townsville_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'u3a_townsville_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','u3a-townsville' ),
		'section' => 'u3a_townsville_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'u3a_townsville_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','u3a-townsville' ),
        'section' => 'u3a_townsville_left_right'
    )));

	$wp_customize->add_setting('u3a_townsville_loader_icon',array(
        'default' => __('Two Way','u3a-townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));
	$wp_customize->add_control('u3a_townsville_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','u3a-townsville'),
        'section' => 'u3a_townsville_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','u3a-townsville'),
            'Dots' => __('Dots','u3a-townsville'),
            'Rotate' => __('Rotate','u3a-townsville')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'u3a_townsville_topbar', array(
    	'title'      => __( 'Topbar Settings', 'u3a-townsville' ),
		'panel' => 'u3a_townsville_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'u3a_townsville_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','u3a-townsville' ),
        'section' => 'u3a_townsville_topbar'
    )));

	$wp_customize->add_setting( 'u3a_townsville_search_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_search_hide_show',array(
          'label' => esc_html__( 'Show / Hide Search','u3a-townsville' ),
          'section' => 'u3a_townsville_topbar'
    )));

	$wp_customize->add_setting('u3a_townsville_header_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('u3a_townsville_header_call_text',array(
		'label'	=> __('Add Phone Text.','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Toll Free', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('u3a_townsville_header_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('u3a_townsville_header_call',array(
		'label'	=> __('Add Phone No.','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( '+07 123 125 1234', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('u3a_townsville_top_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('u3a_townsville_top_btn_text',array(
		'label'	=> __('Add Button Text','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'GET APPOINTMENT', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('u3a_townsville_top_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('u3a_townsville_top_btn_url',array(
		'label'	=> __('Add Button URL','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'https://www.example.com', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'u3a_townsville_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'u3a-townsville' ),
		'panel' => 'u3a_townsville_panel_id'
	) );

	$wp_customize->add_setting( 'u3a_townsville_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','u3a-townsville' ),
          'section' => 'u3a_townsville_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'u3a_townsville_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'u3a_townsville_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'u3a_townsville_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'u3a-townsville' ),
			'description' => __('Slider image size (1500 x 590)','u3a-townsville'),
			'section'  => 'u3a_townsville_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('u3a_townsville_slider_content_option',array(
        'default' => __('Left','u3a-townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));
	$wp_customize->add_control(new U3a_Townsville_Image_Radio_Control($wp_customize, 'u3a_townsville_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','u3a-townsville'),
        'section' => 'u3a_townsville_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'u3a_townsville_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'u3a_townsville_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','u3a-townsville' ),
		'section'     => 'u3a_townsville_slidersettings',
		'type'        => 'range',
		'settings'    => 'u3a_townsville_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('u3a_townsville_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));

	$wp_customize->add_control( 'u3a_townsville_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','u3a-townsville' ),
	'section'     => 'u3a_townsville_slidersettings',
	'type'        => 'select',
	'settings'    => 'u3a_townsville_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','u3a-townsville'),
      '0.1' =>  esc_attr('0.1','u3a-townsville'),
      '0.2' =>  esc_attr('0.2','u3a-townsville'),
      '0.3' =>  esc_attr('0.3','u3a-townsville'),
      '0.4' =>  esc_attr('0.4','u3a-townsville'),
      '0.5' =>  esc_attr('0.5','u3a-townsville'),
      '0.6' =>  esc_attr('0.6','u3a-townsville'),
      '0.7' =>  esc_attr('0.7','u3a-townsville'),
      '0.8' =>  esc_attr('0.8','u3a-townsville'),
      '0.9' =>  esc_attr('0.9','u3a-townsville')
	),
	));

	//Services section
	$wp_customize->add_section( 'u3a_townsville_services_section' , array(
    	'title'      => __( 'Our Services Section', 'u3a-townsville' ),
		'priority'   => null,
		'panel' => 'u3a_townsville_panel_id'
	) );

	$wp_customize->add_setting('u3a_townsville_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('u3a_townsville_section_title',array(
		'label'	=> __('Section Title','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Services', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('u3a_townsville_left_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'u3a_townsville_sanitize_choices',
	));
	$wp_customize->add_control('u3a_townsville_left_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display left services','u3a-townsville'),
		'description' => __('Image Size (250 x 250)','u3a-townsville'),
		'section' => 'u3a_townsville_services_section',
	));

	$wp_customize->add_setting( 'u3a_townsville_about', array(
		'default'           => '',
		'sanitize_callback' => 'u3a_townsville_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'u3a_townsville_about', array(
		'label'    => __( 'Select About us Page', 'u3a-townsville' ),
		'description' => __('Image size (350 x 500)','u3a-townsville'),
		'section'  => 'u3a_townsville_services_section',
		'type'     => 'dropdown-pages'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('u3a_townsville_right_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'u3a_townsville_sanitize_choices',
	));
	$wp_customize->add_control('u3a_townsville_right_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display right services','u3a-townsville'),
		'description' => __('Image Size (250 x 250)','u3a-townsville'),
		'section' => 'u3a_townsville_services_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'u3a_townsville_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'u3a_townsville_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','u3a-townsville' ),
		'section'     => 'u3a_townsville_services_section',
		'type'        => 'range',
		'settings'    => 'u3a_townsville_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('u3a_townsville_blog_post',array(
		'title'	=> __('Blog Post Settings','u3a-townsville'),
		'panel' => 'u3a_townsville_panel_id',
	));	

	$wp_customize->add_setting( 'u3a_townsville_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','u3a-townsville' ),
        'section' => 'u3a_townsville_blog_post'
    )));

    $wp_customize->add_setting( 'u3a_townsville_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_toggle_author',array(
		'label' => esc_html__( 'Author','u3a-townsville' ),
		'section' => 'u3a_townsville_blog_post'
    )));

    $wp_customize->add_setting( 'u3a_townsville_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ) );
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_toggle_comments',array(
		'label' => esc_html__( 'Comments','u3a-townsville' ),
		'section' => 'u3a_townsville_blog_post'
    )));

    $wp_customize->add_setting( 'u3a_townsville_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'u3a_townsville_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','u3a-townsville' ),
		'section'     => 'u3a_townsville_blog_post',
		'type'        => 'range',
		'settings'    => 'u3a_townsville_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('u3a_townsville_blog_layout_option',array(
        'default' => __('Default','u3a-townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
    ));
    $wp_customize->add_control(new U3a_Townsville_Image_Radio_Control($wp_customize, 'u3a_townsville_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','u3a-townsville'),
        'section' => 'u3a_townsville_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('u3a_townsville_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('u3a_townsville_button_text',array(
		'label'	=> __('Add Button Text','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_blog_post',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('u3a_townsville_404_page',array(
		'title'	=> __('404 Page Settings','u3a-townsville'),
		'panel' => 'u3a_townsville_panel_id',
	));	

	$wp_customize->add_setting('u3a_townsville_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('u3a_townsville_404_page_title',array(
		'label'	=> __('Add Title','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('u3a_townsville_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('u3a_townsville_404_page_content',array(
		'label'	=> __('Add Text','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('u3a_townsville_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('u3a_townsville_404_page_button_text',array(
		'label'	=> __('Add Button Text','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('u3a_townsville_responsive_media',array(
		'title'	=> __('Responsive Media','u3a-townsville'),
		'panel' => 'u3a_townsville_panel_id',
	));

    $wp_customize->add_setting( 'u3a_townsville_stickyheader_hide_show',array(
      	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_stickyheader_hide_show',array(
        'label' => esc_html__( 'Sticky Header','u3a-townsville' ),
        'section' => 'u3a_townsville_responsive_media'
    )));

    $wp_customize->add_setting( 'u3a_townsville_resp_slider_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_resp_slider_hide_show',array(
	    'label' => esc_html__( 'Show / Hide Slider','u3a-townsville' ),
	    'section' => 'u3a_townsville_responsive_media'
    )));

	$wp_customize->add_setting( 'u3a_townsville_metabox_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_metabox_hide_show',array(
        'label' => esc_html__( 'Show / Hide Metabox','u3a-townsville' ),
        'section' => 'u3a_townsville_responsive_media'
    )));

    $wp_customize->add_setting( 'u3a_townsville_sidebar_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_sidebar_hide_show',array(
        'label' => esc_html__( 'Show / Hide Sidebar','u3a-townsville' ),
        'section' => 'u3a_townsville_responsive_media'
    )));

	//Content Creation
	$wp_customize->add_section( 'u3a_townsville_content_section' , array(
    	'title' => __( 'Customize Home Page', 'u3a-townsville' ),
		'priority' => null,
		'panel' => 'u3a_townsville_panel_id'
	) );

	$wp_customize->add_setting('u3a_townsville_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new U3a_Townsville_Content_Creation( $wp_customize, 'u3a_townsville_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','u3a-townsville' ),
		),
		'section' => 'u3a_townsville_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'u3a-townsville' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('u3a_townsville_footer',array(
		'title'	=> __('Footer','u3a-townsville'),
		'panel' => 'u3a_townsville_panel_id',
	));	
	
	$wp_customize->add_setting('u3a_townsville_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('u3a_townsville_footer_text',array(
		'label'	=> __('Copyright Text','u3a-townsville'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'u3a-townsville' ),
        ),
		'section'=> 'u3a_townsville_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'u3a_townsville_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'u3a_townsville_switch_sanitization'
    ));  
    $wp_customize->add_control( new U3a_Townsville_Toggle_Switch_Custom_Control( $wp_customize, 'u3a_townsville_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','u3a-townsville' ),
      	'section' => 'u3a_townsville_footer'
    )));	

	$wp_customize->add_setting('u3a_townsville_scroll_top_alignment',array(
        'default' => __('Right','u3a-townsville'),
        'sanitize_callback' => 'u3a_townsville_sanitize_choices'
	));
	$wp_customize->add_control(new U3a_Townsville_Image_Radio_Control($wp_customize, 'u3a_townsville_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','u3a-townsville'),
        'section' => 'u3a_townsville_footer',
        'settings' => 'u3a_townsville_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'u3a_townsville_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class U3a_Townsville_Customize {

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
		$manager->register_section_type( 'U3a_Townsville_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new U3a_Townsville_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'KG Mechanical  Pro', 'u3a-townsville' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'u3a-townsville' ),
			'pro_url'  => esc_url('https://www.kgthemes.com/themes/wordpress-maintenance-service-theme/'),
		)));

		// Register sections.
		$manager->add_section(new U3a_Townsville_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'u3a-townsville' ),
			'pro_text' => esc_html__( 'Docs', 'u3a-townsville' ),
			'pro_url'  => admin_url('themes.php?page=u3a_townsville_guide'),
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

		wp_enqueue_script( 'u3a-townsville-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'u3a-townsville-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
U3a_Townsville_Customize::get_instance();