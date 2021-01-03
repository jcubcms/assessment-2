<?php

if ( ! function_exists( 'u3a_townsville_setup' ) ) :
 
function u3a_townsville_setup() {

	$GLOBALS['content_width'] = apply_filters( 'u3a_townsville_content_width', 640 );
	
	load_theme_textdomain( 'u3a-townsville', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('u3a-townsville-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'u3a-townsville' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
	add_editor_style( array( 'css/editor-style.css', u3a_townsville_font_url() ) );
}
endif;

	
	global $pagenow;

	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
	add_action( 'admin_notices', 'u3a_townsville_activation_notice' );
	}

	add_action( 'after_setup_theme', 'u3a_townsville_setup' );

	
	function u3a_townsville_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'u3a-townsville' ) .'</h3>';
	echo '<p>'. esc_html__( 'Thank you for choosing u3a townsville Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our u3a townsville Theme.', 'u3a-townsville' ) .'</p>';
	echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=u3a_townsville_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'u3a-townsville' ) .'</a></p>';
	echo '</div>';

}


function u3a_townsville_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'u3a-townsville' ),
		'description'   => __( 'Appears on blog page sidebar', 'u3a-townsville' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'u3a-townsville' ),
		'description'   => __( 'Appears on page sidebar', 'u3a-townsville' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'u3a-townsville' ),
		'description'   => __( 'Appears on page sidebar', 'u3a-townsville' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'u3a-townsville' ),
		'description'   => __( 'Appears on footer 1', 'u3a-townsville' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'u3a-townsville' ),
		'description'   => __( 'Appears on footer 2', 'u3a-townsville' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'u3a-townsville' ),
		'description'   => __( 'Appears on footer 3', 'u3a-townsville' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'u3a-townsville' ),
		'description'   => __( 'Appears on footer 4', 'u3a-townsville' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Bar Social Media', 'u3a-townsville' ),
		'description'   => __( 'Appears on top bar', 'u3a-townsville' ),
		'id'            => 'social-links',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'u3a-townsville' ),
		'description'   => __( 'Appears on shop page', 'u3a-townsville' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'u3a-townsville' ),
		'description'   => __( 'Appears on shop page', 'u3a-townsville' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'u3a_townsville_widgets_init' );


function u3a_townsville_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	$font_family[] = 'Oswald:200,300,400,500,600,700';
	$font_family[] = 'Barlow Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'ABeeZee:400,400i';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Staatliches';
	$font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';		
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}


function u3a_townsville_scripts() {
	wp_enqueue_style( 'u3a-townsville-font', u3a_townsville_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'u3a-townsville-basic-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'u3a-townsville-basic-style',$custom_css );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'u3a-townsville-custom-scripts-jquery', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'u3a_townsville_scripts' );

function u3a_townsville_ie_stylesheet(){
	wp_enqueue_style('u3a-townsville-ie', get_template_directory_uri().'/css/ie.css');
	wp_style_add_data( 'u3a-townsville-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','u3a_townsville_ie_stylesheet');

function u3a_townsville_sanitize_dropdown_pages( $page_id, $setting ) {
  	
  	$page_id = absint( $page_id );
  	
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


function u3a_townsville_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


function u3a_townsville_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

define('U3A_TOWNSVILLE_FREE_THEME_DOC','https://www.vwthemesdemo.com/docs/free-vw-maintenance-service/');
define('U3A_TOWNSVILLE_SUPPORT','https://wordpress.org/support/theme/u3a-townsville/');
define('U3A_TOWNSVILLE_REVIEW','https://wordpress.org/support/theme/u3a-townsville/reviews');
define('U3A_TOWNSVILLE_BUY_NOW','https://www.vwthemes.com/themes/wordpress-maintenance-service-theme/');
define('U3A_TOWNSVILLE_LIVE_DEMO','http://www.vwthemesdemo.com/vw-maintenance-service-pro/');
define('U3A_TOWNSVILLE_PRO_DOC','https://www.vwthemesdemo.com/docs/vw-maintenance-service-pro/');
define('U3A_TOWNSVILLE_FAQ','https://www.vwthemes.com/faqs/');
define('U3A_TOWNSVILLE_CONTACT','https://www.vwthemes.com/contact/');
define('U3A_TOWNSVILLE_CHILD_THEME','https://developer.wordpress.org/themes/advanced-topics/child-themes/');
define('U3A_TOWNSVILLE_CREDIT','https://www.vwthemes.com/themes/free-wordpress-maintenance-service/');

if ( ! function_exists( 'u3a_townsville_credit' ) ) {
	function u3a_townsville_credit(){
		echo "<a href=".esc_url(U3A_TOWNSVILLE_CREDIT).">".esc_html__('u3a townsville Theme','u3a-townsville')."</a>";
	}
}


add_filter('loop_shop_columns', 'u3a_townsville_loop_columns');
	if (!function_exists('u3a_townsville_loop_columns')) {
		function u3a_townsville_loop_columns() {
		return 3; 
	}
}


require get_template_directory() . '/inc/custom-header.php';


require get_template_directory() . '/inc/template-tags.php';


require get_template_directory() . '/inc/customizer.php';


require get_template_directory() . '/inc/social-widgets/social-icon.php';


require get_template_directory() . '/inc/typography/ctypo.php';


require get_template_directory() . '/inc/getstart/getstart.php';