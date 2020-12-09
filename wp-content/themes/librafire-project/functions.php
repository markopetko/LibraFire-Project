<?php
/**
 * LibraFire Project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LibraFire_Project
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'librafire_project_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function librafire_project_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LibraFire Project, use a find and replace
		 * to change 'librafire-project' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'librafire-project', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'librafire-project' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'librafire_project_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'librafire_project_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function librafire_project_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'librafire_project_content_width', 640 );
}
add_action( 'after_setup_theme', 'librafire_project_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function librafire_project_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'librafire-project' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'librafire-project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(array(
        'name' => __('Author Box','html5reset' ),
        'id'   => 'footer-widgets-1',
        'description'   => __( 'These are widgets for the footer.','html5reset' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}
add_action( 'widgets_init', 'librafire_project_widgets_init' );

//Adding external scripts or styles

function themebs_enqueue_styles() {

    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css',  array(), '4.2.1');

}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');


function themebs_enqueue_scripts() {
    wp_register_script('jquery', ("https://code.jquery.com/jquery-3.3.1.min.js"), array(), '3.3.1', true );
    wp_enqueue_script('jquery');
  
  
    wp_register_script('bootstrap', ("https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"), array('jquery'), '4.2.1', true );
    wp_enqueue_script('bootstrap');
}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');

// This includs Bootstrap Navbar
require get_template_directory() . '/inc/bootstrap-navwalker.php';

/**
 * Enqueue scripts and styles.
 */
function librafire_project_scripts() {
	wp_enqueue_style( 'librafire-project-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'librafire-project-style', 'rtl', 'replace' );

	wp_enqueue_script( 'librafire-project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'librafire_project_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Author Box

function wporg_add_custom_box() {
    $screens = [ 'post', 'wporg_cpt' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wporg_box_id',                 // Unique ID
            'Author Box',      // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                            // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );


function wporg_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_wporg_meta_key', true );
    ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="left"<?php selected( $value, 'left' ); ?>>Left</option>
        <option value="right" <?php selected( $value, 'right' ); ?>>Right</option>
        <option value="no_img" <?php selected( $value, 'no_img' ); ?>>No author image</option>
    </select>
    <?php
}

//Similar Posts

function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'wporg_field', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
}
add_action( 'save_post', 'wporg_save_postdata' );