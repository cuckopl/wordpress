<?php
/* General Options */
function creative_general_options() {
	$ImageUrl1 = get_template_directory_uri() ."/img/slider/1.jpg";
	$ImageUrl2 = get_template_directory_uri() ."/img/slider/2.jpg";
	$ImageUrl3 = get_template_directory_uri() ."/img/slider/3.jpg";

	$ImageUrl4 = get_template_directory_uri() ."/img/portfolio/01.jpg";
	$ImageUrl5 = get_template_directory_uri() ."/img/portfolio/02.jpg";
	$ImageUrl6 = get_template_directory_uri() ."/img/portfolio/03.jpg";
	$creative_general_options = array(
		'front_page_enabled' => 'on',
		'upload_image_logo' => '',
		'height' => '60',
		'width' => '150',
		'upload_image_favicon' => '',
		'custom_css' => '',
		
		'home_slider_enabled' =>'on',
		'slider_image_1' => $ImageUrl1,
		'slider_title_1' => __('Aldus PageMaker', 'creative'),
		'slider_description_1' => __('Lorem Ipsum is simply dummy text of the printing', 'creative'),
		'slider_button_text_1' => __('Read More', 'creative'),
		'slider_button_link_1' => '#',
		'slider_button_target_1' => 'on',
		'slider_image_2' => $ImageUrl2,
		'slider_title_2' => __('variations of passages', 'creative'),
		'slider_description_2' => __('Contrary to popular belief, Lorem Ipsum is not simply random text', 'creative'),
		'slider_button_text_2' => __('Read More', 'creative'),
		'slider_button_link_2' => '#',
		'slider_button_target_2' => 'on',
		'slider_image_3' => $ImageUrl3,
		'slider_title_3' => __('Contrary to popular', 'creative'),
		'slider_description_3' => __('Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'creative'),
		'slider_button_text_3' => __('Read More', 'creative'),
		'slider_button_link_3' => '#',
		'slider_button_target_3' => 'on',
		//Service Settings:
		'home_service_enabled' =>'on',
		'home_service_title' => __('Services We Provide', 'creative'),
		'home_service_description' => __('We have a strong team of web design, email marketing and corporate solution.Feel free to get a free quote!!! ', 'creative'),
		'service_icon_1'=>'fa fa-cloud-download',
		'service_title_1'=> __('Idea', 'creative'),
		'service_description_1'=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.', 'creative'),
		'service_link_1'=>'#',
		'service_target_1'=>'on',
		'service_icon_2'=>'fa fa-bullhorn',
		'service_title_2'=> __('Records', 'creative'),
		'service_description_2'=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.', 'creative'),
		'service_link_2'=>'#',
		'service_target_2'=>'on',
		'service_icon_3'=>'fa fa-user',
		'service_title_3'=> __('WordPress', 'creative'),
		'service_description_3'=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.', 'creative'),
		'service_link_3'=>'#',
		'service_target_3'=>'on',
		//Portfolio Settings:
		'home_port_enabled'=>'on',
		'home_port_title' => __('creative Portfolio Showcasse', 'creative'),
		'home_port_description' => __('creative provides you to show your portfolio contents in beautiful layout. Make a cool and colorful showcase for your site...', 'creative'),
		'port_image_1'=> $ImageUrl4,
		'port_title_1'=> __('Create', 'creative'),
		'port_tagline_1'=> __('Smart', 'creative'),
		'port_description_1'=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'creative'),
		'port_link_1'=>'#',
		'port_link_target_1'=>'on',
		'port_image_2'=> $ImageUrl5,
		'port_title_2'=> __('Content', 'creative'),
		'port_tagline_2'=> __('More', 'creative'),
		'port_description_2'=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'creative'),
		'port_link_2'=>'#',
		'port_link_target_2'=>'on',
		'port_image_3'=> $ImageUrl6,
		'port_title_3'=> __('Dictionary', 'creative'),
		'port_tagline_3'=> __('Wins', 'creative'),
		'port_description_3'=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'creative'),
		'port_link_3'=>'#',
		'port_link_target_3'=>'on',
		
		//Bog
		'home_blog_enabled' =>'on',
		'home_blog_title' => __('Latest Posts', 'creative'),
		'home_blog_description' => __('We regularly post updates on our blog. Feel free to join with our blog!', 'creative'),
		// Footer call-out
		'home_call_out_enabled' =>'on',
		'footer_call_out_title' => __('Found a reason to work with me? Lets start!', 'creative'),
		'footer_call_out_button_text' => __('Buy Now', 'creative'),
		'footer_call_out_button_link' => '#',
		'footer_call_out_button_target' => 'on',
		
		'header_social_media_enabled' => 'on',
		'footer_social_media_enabled' => 'on',
		'header_contact_enabled' => 'on',
		'facebook_link' => '#',
		'twitter_link' => '#',
		'dribbble_link' => '#',
		'linkedin_link' => '#',
		'rss_link' => '#',
		'youtube_link' => '#',
		'instagram_link' => '#',
		'googleplus_link' => '#',
		'email_id' => __('lizarweb@gmail.com', 'creative'),
		'phone_no' => __('8801111111', 'creative'),
		
		'home_footer_enabled' =>'on',
		'footer_customizations' => __('&#169; 2015 Your Company', 'creative'),
		'developed_by_text' => __('Theme Developed By', 'creative'),
		'developed_by_creative_text' => __('Weblizar Themes', 'creative'),
		'developed_by_link' => __('http://www.weblizar.com/', 'creative'),
	);
	return wp_parse_args(get_option('creative_general_options', array()), $creative_general_options);
}
add_filter("comment_id_fields", "closing_col_sm_7div_tag");
function closing_col_sm_7div_tag($result) {
	return $result . '</div>';
}
?>