<?php
/**
 * pamsar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pamsar
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pamsar_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on pamsar, use a find and replace
		* to change 'pamsar' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pamsar', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'pamsar' ),
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
			//'comment-form',
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
			'pamsar_custom_background_args',
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
add_action( 'after_setup_theme', 'pamsar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pamsar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pamsar_content_width', 640 );
}
add_action( 'after_setup_theme', 'pamsar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pamsar_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pamsar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pamsar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pamsar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pamsar_scripts() {
	wp_enqueue_style( 'pamsar-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pamsar-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pamsar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pamsar_scripts' );

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

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
    add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}







function editglobalcustomfields() {
    ?>
    <div class='wrap'>
    <h2>Global Custom Fields</h2>
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options') ?>

   
    <p><strong>Address</strong><br />
    <input type="text" name="address" size="45" value="<?php echo get_option('address'); ?>" /></p>

    <p><strong>Phone Number</strong><br />
    <input type="text" name="phone" size="45" value="<?php echo get_option('phone'); ?>" /></p>

    <p><strong>Email</strong><br />
    <input type="text" name="email" size="45" value="<?php echo get_option('email'); ?>" /></p>

    <p><strong>Twitter Link</strong><br />
    <input type="text" name="twitter" size="45" value="<?php echo get_option('twitter'); ?>" /></p>

    <p><strong>Facebook Link</strong><br />
    <input type="text" name="facebook" size="45" value="<?php echo get_option('facebook'); ?>" /></p>

    <p><strong>Youtube Link</strong><br />
    <input type="text" name="youtube" size="45" value="<?php echo get_option('youtube'); ?>" /></p>

    <p><strong>Skype Link</strong><br />
    <input type="text" name="skype" size="45" value="<?php echo get_option('skype'); ?>" /></p>

    <p><strong>Copy Right</strong><br />
    <input type="text" name="copy" size="45" value="<?php echo get_option('copy'); ?>" /></p>    

    <p><input type="submit" name="Submit" value="Submit" /></p>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="address,phone,email,twitter,facebook,youtube,skype,copy" />

    </form>
    </div>
    <?php
}

function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

  function create_posttype() {
 register_post_type( 'service',
  
        array(
            'labels' => array(
             'name' => __( 'Service' ),
             'singular_name' => __( 'Service' ),
             'add_new' => __( 'Add New ' ),
             'add_new_item' => __( 'Add New ' ),
             'edit_item' => __( 'Edit ' ),
             'new_item' => __( 'Add New ' ),
             'view_item' => __( 'View' ),
             'search_items' => __( 'Search' ),
             'not_found' => __( 'No home post found' ),
             'not_found_in_trash' => __( 'No home post in trash' )
           ),

         'public' => true,
         'show_ui' => true,
         'capability_type' => 'post',
         'hierarchical' => false,
         'rewrite' => true,
         'menu_position' => 20,
         'supports' => array('title', 'editor','thumbnail','custom-fields')
         )

       );
}

add_action( 'init', 'create_posttype' );

 function theme_widgets_init() {
  register_sidebar( array (
  'name' => 'Footer Menu',
  'id' => 'footer_menu',
  'before_widget' => '<div>',
  'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title11s">',
    'after_title' => '</h3>',
  ) );

    register_sidebar( array (
  'name' => 'Footer Section 1',
  'id' => 'footer_section1',
  'before_widget' => '<div>',
  'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title11s">',
    'after_title' => '</h3>',
  ) );

  }
  add_action( 'init', 'theme_widgets_init' );


