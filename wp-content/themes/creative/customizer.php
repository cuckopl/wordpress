<?php
function creative_customizer( $wp_customize ) {
	$ImageUrl1 = get_template_directory_uri() ."/img/slider/1.jpg";
	$ImageUrl2 = get_template_directory_uri() ."/img/slider/2.jpg";
	$ImageUrl3 = get_template_directory_uri() ."/img/slider/3.jpg";

	$ImageUrl4 = get_template_directory_uri() ."/img/portfolio/01.jpg";
	$ImageUrl5 = get_template_directory_uri() ."/img/portfolio/02.jpg";
	$ImageUrl6 = get_template_directory_uri() ."/img/portfolio/03.jpg";  
	/* Genral section */
		/* Slider Section */
	$wp_customize->add_panel( 'creative_theme_option', array(
    'title' => __( 'Creative Options','creative' ),
    'priority' => 160, // Mixed with top-level-section hierarchy.
	) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __('Theme General Options','creative'),
            'description' => __('Here you can customize Your theme\'s general Settings','creative'),
			'panel'=>'creative_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );
	$wl_theme_options = creative_general_options();	
	$wp_customize->add_setting(
		'creative_general_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'creative_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'creative_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'creative' ),
		'section'    => 'general_sec',
		'settings'   => 'creative_general_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'creative_logo_height', array(
		'label'        => __( 'Logo Height', 'creative' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'creative_general_options[height]',
	) );
	$wp_customize->add_control( 'creative_logo_width', array(
		'label'        => __( 'Logo Width', 'creative' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'creative_general_options[width]',
	) );
	
	$wp_customize->add_setting(
		'creative_general_options[upload_image_favicon]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_upload_favicon_image', array(
		'label'        => __( 'Custom favicon', 'creative' ),
		'section'    => 'general_sec',
		'settings'   => 'creative_general_options[upload_image_favicon]',
	) ) );

	/* Slider Section 
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => __('Theme Slider Options','creative'),
			'panel'=>'creative_theme_option',
            'description' => __('Here you can add slider images','creative'),
			'capability'=>'edit_theme_options',
            'priority' => 35,
			'active_callback' => 'is_front_page',
        )
    );
	$wp_customize->add_setting(
		'creative_general_options[home_slider_enabled]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_slider_enabled'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'creative_slider_enabled', array(
		'label'        => __( 'Enabled slider on front page', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[home_slider_enabled]',
	) );
	$wp_customize->add_setting(
		'creative_general_options[slider_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_image_3]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_title_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_description_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_description_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_description_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_description_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_description_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_description_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_text_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_text_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_link_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_target_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_target_1'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_target_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_target_2'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[slider_button_target_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_button_target_3'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'creative' ),
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_image_1]'
	) ) );
	$wp_customize->add_control( 'creative_slide_title_1', array(
		'label'        => __( 'Slider title one', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_title_1]'
	) );
	$wp_customize->add_control( 'creative_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_description_1]'
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_text_1]'
	) );
	
	$wp_customize->add_control( 'creative_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link', 'creative' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_link_1]'
	) );
	$wp_customize->add_control( 'creative_slider_button_target_1', array(
		'label'        => __( 'Slider link open in new tab', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_target_1]',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'creative' ),
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_image_2]'
	) ) );
	
	$wp_customize->add_control( 'creative_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_title_2]'
	) );
	$wp_customize->add_control( 'creative_slide_desc_2', array(
		'label'        => __( 'Slider Description Two', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_description_2]'
	) );
	$wp_customize->add_control( 'creative_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Two', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_text_2]'
	) );
	$wp_customize->add_control( 'creative_slide_btnlink_2', array(
		'label'        => __( 'Slider Link Two', 'creative' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_link_2]'
	) );
	$wp_customize->add_control( 'creative_slider_button_target_2', array(
		'label'        => __( 'Slider link open in new tab', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_target_2]',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'creative' ),
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_image_3]'
	) ) );
	$wp_customize->add_control( 'creative_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_title_3]'
	) );
	
	$wp_customize->add_control( 'creative_slide_desc_3', array(
		'label'        => __( 'Slider Description Three', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_description_3]'
	) );
	$wp_customize->add_control( 'creative_slide_btn_3', array(
		'label'        => __( 'Slider Button Text Three', 'creative' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_text_3]'
	) );
	$wp_customize->add_control( 'creative_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'creative' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_link_3]'
	) );
	$wp_customize->add_control( 'creative_slider_button_target_3', array(
		'label'        => __( 'Slider link open in new tab', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'slider_sec',
		'settings'   => 'creative_general_options[slider_button_target_3]',
	) );
	$wp_customize->get_setting( 'creative_general_options[upload_image_logo]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'creative_general_options[height]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'creative_general_options[width]' )->transport  = 'postMessage';
	*/
	/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','creative'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','creative'),
			'panel'=>'creative_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 36,
			'active_callback' => 'is_front_page',
        )
    );
	
	$wp_customize->add_setting(
		'creative_general_options[home_port_enabled]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_port_enabled'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[home_port_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_port_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text',
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[home_port_description]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_port_description'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'creative_sanitize_text',
		)
	);
	for($i=1;$i<=3;$i++){ 
		$wp_customize->add_setting(
			'creative_general_options[port_image_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_image_'.$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'creative_general_options[port_title_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_title_'.$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'creative_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'creative_general_options[port_tagline_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_tagline_'.$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'creative_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'creative_general_options[port_description_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_description_'.$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'creative_sanitize_text',
			)
		);
		$wp_customize->add_setting(
		'creative_general_options[port_link_'.$i.']',
			array(
			'type'    => 'option',
			'default'=>$wl_theme_options['port_link_'.$i],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
			)
		);
		$wp_customize->add_setting(
			'creative_general_options[port_link_target_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_link_target_'.$i],
				'sanitize_callback'=>'creative_sanitize_checkbox',
				'capability'        => 'edit_theme_options',
			)
		);
	}
	$wp_customize->add_control( 'creative_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'creative' ),
		'type'	=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[home_port_enabled]'
	) );
	$wp_customize->add_control( 'creative_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'creative' ),
		'type'	=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[home_port_title]'
	) );
	$wp_customize->add_control( 'creative_portfolio_description', array(
		'label'        => __( 'Portfolio Description', 'creative' ),
		'type'	=>'textarea',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[home_port_description]'
	) );
	for($i=1;$i<=3;$i++){
	$j = array('', ' One', ' Two', ' Three');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'creative_portfolio_img_'.$i, array(
		'label'        => __( 'Portfolio Image', 'creative' ).$j[$i],
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_image_'.$i.']'
	) ) );
	$wp_customize->add_control( 'creative_portfolio_title_'.$i, array(
		'label'        => __( 'Portfolio Title', 'creative').$j[$i],
		'type'=>	'text',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_title_'.$i.']'
	) );
	$wp_customize->add_control( 'creative_portfolio_text_'.$i, array(
		'label'        => __( 'Portfolio Text', 'creative').$j[$i],
		'type'=>	'text',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_tagline_'.$i.']'
	) );
	$wp_customize->add_control( 'creative_portfolio_description_'.$i, array(
		'label'        => __( 'Portfolio Description', 'creative' ).$j[$i],
		'type'=>	'textarea',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_description_'.$i.']'
	) );
	$wp_customize->add_control( 'creative_port_link_'.$i, array(
		'label'        => __( 'Portfolio Link', 'creative').$j[$i],
		'type'=>	'url',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_link_'.$i.']',
	) );
	$wp_customize->add_control( 'creative_portfolio_target_'.$i, array(
		'label'        => __( 'Portfolio link open in new tab', 'creative' ),
		'type'=>	'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'creative_general_options[port_link_target_'.$i.']',
	) );
	}

	/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','creative'),
	'panel'=>'creative_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 37
	));
	$wp_customize->add_setting(
		'creative_general_options[home_blog_enabled]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_blog_enabled'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'creative_blog_enabled', array(
		'label'        => __( 'Enable Home Blog', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'creative_general_options[home_blog_enabled]',
	) );
	$wp_customize->add_setting(
	'creative_general_options[home_blog_title]',
		array(
		'default'=>esc_attr($wl_theme_options['home_blog_title']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'creative_blog_title', array(
		'label'        => __( 'Home Blog Title', 'creative' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'creative_general_options[home_blog_title]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[home_blog_description]',
		array(
		'default'=>esc_attr($wl_theme_options['home_blog_description']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'creative_blog_desc', array(
		'label'        => __( 'Home Blog Description', 'creative' ),
		'type'=>'textarea',
		'section'    => 'blog_section',
		'settings'   => 'creative_general_options[home_blog_description]'
	) );
	/* Service Section */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","creative"),
	'panel'=>'creative_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
		'creative_general_options[home_service_enabled]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['home_service_enabled'],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'creative_general_options[home_service_title]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
		)
	);
	$wp_customize->add_setting(
	'creative_general_options[home_service_description]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_description']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
		)
	);
	$wp_customize->add_control( 'creative_service_enabled', array(
		'label'        => __( 'Enable Home Service', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[home_service_enabled]',
	) );
	$wp_customize->add_control( 'creative_service_title', array(
		'label'        => __( 'Service Title', 'creative' ),
		'type'	=>'text',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[home_service_title]'
	) );
	$wp_customize->add_control( 'creative_service_description', array(
		'label'        => __( 'Service Description', 'creative' ),
		'type'	=>'textarea',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[home_service_description]'
	) );
	for($i=1;$i<=3;$i++){
	$wp_customize->add_setting(
	'creative_general_options[service_icon_'.$i.']',
		array(
		'default'=>esc_attr($wl_theme_options['service_icon_'.$i]),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'creative_general_options[service_title_'.$i.']',
		array(
		'default'=>esc_attr($wl_theme_options['service_title_'.$i]),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'creative_general_options[service_description_'.$i.']',
		array(
		'default'=>esc_attr($wl_theme_options['service_description_'.$i]),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'creative_general_options[service_link_'.$i.']',
		array(
		'type'    => 'option',
		'default'=>$wl_theme_options['service_link_'.$i],
		'capability' => 'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'creative_general_options[service_target_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['service_target_'.$i],
			'sanitize_callback'=>'creative_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	}
	for($i=1;$i<=3;$i++){
	$j = array('', ' One', ' Two', ' Three');
	$wp_customize->add_control( new creative_Customize_Misc_Control($wp_customize, 'creative_general_options1-line', array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'creative_service_icon'.$i, array(
		'label'        => __( 'Service Icon', 'creative' ).$j[$i],
		'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','creative'),
		'section'  => 'service_section',
		'settings'   => 'creative_general_options[service_icon_'.$i.']'
    ) );
	$wp_customize->add_control( 'creative_service_title'.$i, array(
		'label'        => __( 'Service Title', 'creative').$j[$i],
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[service_title_'.$i.']'
	) );
	$wp_customize->add_control( 'creative_service_description_'.$i, array(
		'label'        => __( 'Service Description', 'creative').$j[$i],
		'type'=>	'textarea',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[service_description_'.$i.']'
	) );
	$wp_customize->add_control( 'creative_service_link_'.$i, array(
		'label'        => __( 'Service Link', 'creative').$j[$i],
		'type'=>	'url',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[service_link_'.$i.']',
	) );
	$wp_customize->add_control( 'creative_service_link_target_'.$i, array(
		'label'        => __( 'Open link in new tab', 'creative' ),
		'type'=>	'checkbox',
		'section'    => 'service_section',
		'settings'   => 'creative_general_options[service_target_'.$i.']',
	) );
	}
	/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","creative"),
	'panel'=>'creative_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 41
	));
	$wp_customize->add_setting(
	'creative_general_options[header_social_media_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[header_social_media_enabled]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_social_media_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_social_media_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_social_media_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[footer_social_media_enabled]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[header_contact_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_contact_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_contact_enabled', array(
		'label'        => __( 'Enable Header Contact', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[header_contact_enabled]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'facebook_link', array(
		'label'        => __( 'Facebook URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[facebook_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[dribbble_link]',
		array(
		'default'=>esc_attr($wl_theme_options['dribbble_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'dribbble_link', array(
		'label'        =>  __('Dribbble URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[dribbble_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[linkedin_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[rss_link]',
		array(
		'default'=>esc_attr($wl_theme_options['rss_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'rss_link', array(
		'label'        => __( 'RSS URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[rss_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[instagram_link]',
		array(
		'default'=>esc_attr($wl_theme_options['instagram_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram_link', array(
		'label'        => __( 'Instagram URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[instagram_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[googleplus_link]',
		array(
		'default'=>esc_attr($wl_theme_options['googleplus_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'googleplus_link', array(
		'label'        => __( 'Goole+ URL', 'creative' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[googleplus_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[email_id]',
		array(
		'default'=>esc_attr($wl_theme_options['email_id']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'is_email',
		)
	);
		$wp_customize->add_control( 'email_id', array(
		'label'        => __( 'Email-ID', 'creative' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'creative_general_options[email_id]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
		)
	);
		$wp_customize->add_control( 'phone_no', array(
		'label'        => __( 'Phone Number', 'creative' ),
		'type'=>'text',
		'section'    => 'social_section',
		'sanitize_callback'=>'creative_sanitize_text',
		'settings'   => 'creative_general_options[phone_no]'
	) );
	/* Footer Callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options","creative"),
	'panel'=>'creative_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 39
	));
	$wp_customize->add_setting(
	'creative_general_options[home_call_out_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['home_call_out_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'home_call_out_enabled', array(
		'label'        => __( 'Enable Footer Call-Out in Home', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'creative_general_options[home_call_out_enabled]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_call_out_title]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_call_out_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'creative_sanitize_text',
		)
	);
	$wp_customize->add_control( 'callout_title', array(
		'label'        => __( 'Call-Out Title', 'creative' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'creative_general_options[footer_call_out_title]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_call_out_button_text]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_call_out_button_text']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'callout_btn_text', array(
		'label'        => __( 'Callout Button Text', 'creative' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'creative_general_options[footer_call_out_button_text]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_call_out_button_link]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_call_out_button_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_control( 'callout_btn_link', array(
		'label'        => __( 'Call-Out Button Link', 'creative' ),
		'type'=>'url',
		'section'    => 'callout_section',
		'settings'   => 'creative_general_options[footer_call_out_button_link]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_call_out_button_target]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_call_out_button_target']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_call_out_button_target', array(
		'label'        => __( 'Open Link into new tab', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'creative_general_options[footer_call_out_button_target]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","creative"),
	'panel'=>'creative_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 40
	));
	$wp_customize->add_setting(
	'creative_general_options[home_footer_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['home_footer_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'home_footer_enabled', array(
		'label'        => __( 'Enabled Copyright Section', 'creative' ),
		'type'=>'checkbox',
		'section'    => 'footer_section',
		'settings'   => 'creative_general_options[home_footer_enabled]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'creative_footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'creative' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'creative_general_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'creative_general_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'creative_developed_by_text', array(
		'label'        => __( 'Footer Developed By Text', 'creative' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'creative_general_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[developed_by_creative_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_creative_text']),
		'type'=>'option',
		'sanitize_callback'=>'creative_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'creative_developed_by_creative_text', array(
		'label'        => __( 'Footer Company Text', 'creative' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'creative_general_options[developed_by_creative_text]'
	) );
	$wp_customize->add_setting(
	'creative_general_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'creative_developed_by_link', array(
		'label'        => __( 'Footer Customization Link', 'creative' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'creative_general_options[developed_by_link]'
	) );
}
add_action( 'customize_register', 'creative_customizer' );
function creative_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function creative_sanitize_checkbox( $input ) {
    if ( $input == 'on' ) {
        return 'on';
    } else {
        return '';
    }
}
function creative_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'creative_Customize_Misc_Control' ) ) :
class creative_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;
?>