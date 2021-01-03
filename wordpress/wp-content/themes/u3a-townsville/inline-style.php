<?php
	
	/*---------------------------First highlight color-------------------*/

	$u3a_townsville_first_color = get_theme_mod('u3a_townsville_first_color');

	$custom_css = '';

	if($u3a_townsville_first_color != false){
		$custom_css .='#topbar .custom-social-icons i:hover, .search-box i:hover, .top-btn:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .view-more, .scrollup i, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer .tagcloud a:hover, #footer-2, .pagination span, .pagination a, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .main-navigation a:hover, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($u3a_townsville_first_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_first_color != false){
		$custom_css .='.left-services:hover a, .right-services:hover a, #footer li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation ul.sub-menu a:hover{';
			$custom_css .='color: '.esc_html($u3a_townsville_first_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_first_color != false){
		$custom_css .='#topbar .custom-social-icons i:hover{';
			$custom_css .='border-color: '.esc_html($u3a_townsville_first_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_first_color != false){
		$custom_css .='.post-info hr{';
			$custom_css .='border-top-color: '.esc_html($u3a_townsville_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$u3a_townsville_second_color = get_theme_mod('u3a_townsville_second_color');

	if($u3a_townsville_second_color != false){
		$custom_css .='.search-box i, .top-btn, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .view-more:hover, #footer input[type="submit"], input[type="submit"], .pagination .current, .pagination a:hover, #sidebar .custom-social-icons i:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button{';
			$custom_css .='background-color: '.esc_html($u3a_townsville_second_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_second_color != false){
		$custom_css .='a, #sidebar caption, .post-navigation a, .woocommerce-message::before, .woocommerce .quantity .qty, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($u3a_townsville_second_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_second_color != false){
		$custom_css .='.woocommerce .quantity .qty{';
			$custom_css .='border-color: '.esc_html($u3a_townsville_second_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_second_color != false){
		$custom_css .='.woocommerce-message, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($u3a_townsville_second_color).';';
		$custom_css .='}';
	}
	if($u3a_townsville_second_color != false){
		$custom_css .='.main-navigation ul ul, .header-fixed{';
			$custom_css .='border-bottom-color: '.esc_html($u3a_townsville_second_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'u3a_townsville_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .home-page-header{';
			$custom_css .='width: 97%;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'u3a_townsville_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'u3a_townsville_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:left; left:10%; right:50%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:right; left:50%; right:10%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'u3a_townsville_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info, .content-bttn{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin:10px auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
		$custom_css .='.content-bttn{';
			$custom_css .='margin:20px 0;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin-bottom:10px;';
		$custom_css .='}';
		$custom_css .='.post-main-box h2{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$stickyheader = get_theme_mod( 'u3a_townsville_stickyheader_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.header-fixed{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'u3a_townsville_resp_slider_hide_show',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'u3a_townsville_metabox_hide_show',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.post-info{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'u3a_townsville_sidebar_hide_show',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}