<?php
/**
 * Potaruru functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Potaruru
 */

if ( ! function_exists( 'pota_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pota_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Potaruru, use a find and replace
		 * to change 'pota' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pota', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pota' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pota_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'pota_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pota_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pota_content_width', 640 );
}
add_action( 'after_setup_theme', 'pota_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pota_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pota' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pota' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pota_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pota_scripts() {
	
	// Vendor
	wp_enqueue_style( 'pota-googleapis', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' );
	wp_enqueue_style( 'pota-rajdhani', 'https://fonts.googleapis.com/css?family=Rajdhani' );
	wp_enqueue_style( 'pota-font-awesome', get_template_directory_uri() . '/src/plugins/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'pota-bootstrap', get_template_directory_uri() . '/src/plugins/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'pota-animate', get_template_directory_uri() . '/src/plugins/animate/animate.min.css' );

	// Plugins
	wp_enqueue_style( 'pota-owl-carousel', get_template_directory_uri() . '/src/plugins/owl-carousel/css/owl.carousel.min.css' );

	//Theme
	wp_enqueue_style( 'pota-custom', get_template_directory_uri() . '/src/css/custom.css' );
	wp_enqueue_style( 'pota-theme', get_template_directory_uri() . '/src/css/theme.css' );
	wp_enqueue_style( 'pota-style', get_stylesheet_uri() );
	wp_enqueue_style( 'pota-woo-style', get_template_directory_uri() . '/style-woocommerce.css' );


	// vendor js
	wp_enqueue_script( 'pota-jquery', get_template_directory_uri() . '/src/plugins/jquery/jquery-3.2.1.min.js', array(), '', true);
	wp_enqueue_script( 'pota-popper', get_template_directory_uri() . '/src/plugins/popper/popper.min.js', array(), '', true);
	wp_enqueue_script( 'pota-bootstrap', get_template_directory_uri() . '/src/plugins/bootstrap/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script( 'pota-scrollmagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '', true);
    wp_enqueue_script( 'pota-infscroll', get_template_directory_uri() . '/js/infscroll.js', array(), '', true);

	// plugins js
	wp_enqueue_script( 'pota-lightbox', get_template_directory_uri() . '/src/plugins/lightbox/lightbox.js', array(), '', true);
	wp_enqueue_script( 'pota-easing', get_template_directory_uri() . '/src/plugins/easypiechart/jquery.easing.1.3.js', array(), '', true);
	wp_enqueue_script( 'pota-easypiechart', get_template_directory_uri() . '/src/plugins/easypiechart/jquery.easypiechart.min.js', array(), '', true);

	// theme js
	wp_enqueue_script( 'pota-theme', get_template_directory_uri() . '/src/js/theme.js', array(), '', true);
	wp_enqueue_script( 'pota-js', get_template_directory_uri() . '/js/pota.js', array(), '', true);

		//additional css
		wp_enqueue_style( 'addition-theme', get_template_directory_uri() . '/src/css/additional.css' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pota_scripts' );
function pota_scripts_admin(){
    wp_register_style( 'admin-style', get_template_directory_uri() . '/admin-style.css' );
    wp_enqueue_style( 'admin-style' );
}
add_action('admin_enqueue_scripts', 'pota_scripts_admin');
/**
 *	Acf Option
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


/**
 *	Post Type Products
 */
//require get_template_directory() . '/inc/post-types/products.php';

/**
 *  Image Size
 */
require get_template_directory() . '/inc/pota-image-size.php';

/**
 *  Pagination
 */
require get_template_directory() . '/inc/pota-pagination.php';

/**
 *  Post Type Function
 */
require get_template_directory() . '/inc/pota-post-function.php';
require get_template_directory() . '/inc/pota-product-function.php';

/**
 *  Video Support
 */
require get_template_directory() . '/inc/pota-video-support.php';

/**
 *  View Count
 */
require get_template_directory() . '/inc/pota-view-count.php';

/**
 *  Primary Navigation Walker
 */
require get_template_directory() . '/inc/pota-walker-nav-menu.php';

/**
 *  Woocommerce Function
 */
require get_template_directory() . '/inc/pota-woo-function.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


add_filter('oembed_dataparse','oembed_youtube_add_wrapper',10,3);
function oembed_youtube_add_wrapper($return, $data, $url) {
    if ($data->provider_name == 'YouTube') {
        return "<div class='videowrapper'>{$return}</div>";
    } else {
        return $return;
    }
}


add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="pota-cart btn btn-outline-default btn-shadow btn-md btn-rounded btn-lg pota-cart" href="<?php echo WC()->cart->get_cart_url(); ?>" target="_blank" role="button">
    	<div class="badge pota-badge-cart"><?php echo WC()->cart->get_cart_contents_count() ?></div>
    	<i class="fa fa-shopping-cart"></i>
    	My Cart : <?php echo WC()->cart->get_cart_total() ?>
    </a> 
    <?php
    $fragments['a.pota-cart'] = ob_get_clean();

    return $fragments;
}