<?php

/**
 * Load the custom field groups from the PHP export.
 */
 
if (!defined('SWM_IGNORE_ACF_IMPORT') || !SWM_IGNORE_ACF_IMPORT)
{
	require_once get_template_directory() . '/inc/acf/acf.php';
}

if ( ! function_exists( 'site_setup' ) ) :
	function site_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1300, 9999 );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'site' ),
			)
		);

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'site_setup' );


/**
 * Enqueue scripts and styles.
 */

function site_add_fonts() {
	wp_enqueue_style( 'site-fonts-raleway', '//fonts.googleapis.com/css?family=Raleway:400,600&display=swap', false ); 
	wp_enqueue_style( 'site-fonts-lora', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&display=swap', false ); 
	wp_enqueue_style( 'site-fonts-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"', false ); 
}
 
add_action( 'wp_enqueue_scripts', 'site_add_fonts' );

 
function site_html5_shim(){
	echo '
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	';
}
	
add_action('wp_head', 'site_html5_shim' ) ;


function site_scripts() {
	wp_enqueue_style( 'site-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	
	wp_enqueue_script( 'site-bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array('jquery'), false, true );
	wp_enqueue_script( 'site-main', get_theme_file_uri( '/assets/js/clean-blog.js' ), array('jquery'), false, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );


function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
 
 

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

 