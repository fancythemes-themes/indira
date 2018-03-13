<?php
/**
 * Indira functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */

if ( ! function_exists( 'indira_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own indira_setup() function to override in a child theme.
 *
 * @since Indira 1.0
 */
function indira_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/indira
	 * If you're building a theme based on Indira, use a find and replace
	 * to change 'indira' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'indira', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Indira 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 300,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'      => esc_html__( 'Primary Menu', 'indira' ),
		'social'       => esc_html__( 'Social Links Menu', 'indira' ),
		'footer-menu'  => esc_html__( 'Footer Menu', 'indira' ),
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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );*/

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', indira_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // indira_setup
add_action( 'after_setup_theme', 'indira_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Indira 1.0
 */
function indira_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indira_content_width', 840 );
}
add_action( 'after_setup_theme', 'indira_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Indira 1.0
 */
function indira_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'indira' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'indira' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Full Width Header Widget', 'indira' ),
		'description'	=> esc_html__( 'Placed on the top before main content. Best use for featured posts.', 'indira'),
		'id'            => 'header-widget-full-width',
		'before_widget' => '<div id="%1$s" class="widget header-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Full Width Footer Widget', 'indira' ),
		'id'            => 'footer-widget-full-width',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'indira' ),
		'id'            => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'indira' ),
		'id'            => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'indira' ),
		'id'            => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'indira' ),
		'id'            => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'indira_widgets_init' );

if ( ! function_exists( 'indira_fonts_url' ) ) :
/**
 * Register Google fonts for Indira.
 *
 * Create your own indira_fonts_url() function to override in a child theme.
 *
 * @since Indira 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function indira_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Copse, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Copse font: on or off', 'indira' ) ) {
		$fonts[] = 'Copse:400';
	}

	/* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'indira' ) ) {
		$fonts[] = 'Source Sans Pro:400,400i,700,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Indira 1.0
 */
function indira_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'indira_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Indira 1.0
 */
function indira_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'indira-fonts', indira_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'indira-style', get_stylesheet_uri() );

	if ( class_exists('Jetpack') ) {
		// Theme for Jetpack stylesheet.
		//wp_enqueue_style( 'indira-jetpack-style', get_template_directory_uri() . '/css/jetpack.css', array( 'indira-style' ), '20161012' );
	}

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'indira-ie', get_template_directory_uri() . '/css/ie.css', array( 'indira-style' ), '20160816' );
	wp_style_add_data( 'indira-ie', 'conditional', 'lt IE 10' );

	wp_enqueue_script( 'indira-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20160816' );

	wp_enqueue_script( 'indira-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'indira-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'indira-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'indira-script', 'screenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'indira' ),
		'collapse' => esc_html__( 'collapse child menu', 'indira' ),
		'loadMoreText' => esc_html__( 'Load More', 'indira' ),
		'loadingText'  => esc_html__( 'Loading...', 'indira' ),
	) );

	wp_enqueue_script( 'indira-svgxuse', get_template_directory_uri() . '/js/svgxuse.js', array(), '1.1.22', true );

	wp_enqueue_script( 'indira-flexslider-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '20160816', true );

}
add_action( 'wp_enqueue_scripts', 'indira_scripts' );


/**
 * Enqueues admin scripts and styles.
 *
 * @since Indira 1.0
 */
function indira_admin_enqueue_scripts( $hook ) {
	if ( $hook == 'widgets.php' ) {
		wp_enqueue_style( 'indira-admin', get_template_directory_uri() . '/css/admin.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'indira_admin_enqueue_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Indira 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function indira_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'indira_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Indira 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function indira_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

if ( class_exists( 'Jetpack') ) :
	/**
	 * Jetpack. Only include if Jetpack plugin installed.
	 *
	 */
	require get_template_directory() . '/inc/jetpack.php';
endif;

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer framework additions.
 */
require get_template_directory() . '/inc/customizer-simple.php';

/**
 * Customizer sanitazion callback functions.
 */
require get_template_directory() . '/inc/sanitize-callbacks.php';


/**
 * TGMPA Class.
 */
require get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Posts widget.
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';

if ( class_exists( 'StormTwitter' ) ) :
	/**
	 * Twitter widget. Only include when the oAuth Twitter Feed for Developer plugin installed
	 *
	 */
	require get_template_directory() . '/inc/widgets/twitter.php';
endif;

/**
 * Instagram widget.
 *
 */
require get_template_directory() . '/inc/widgets/instagram.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Indira 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function indira_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'indira_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Indira 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function indira_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'indira_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Indira 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function indira_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'indira_widget_tag_cloud_args' );

/**
 * Adding extra markup on widget title, wrap the last word with a <span>
 *
 * @since Indira 1.0
 *
 */
function indira_widget_title( $title, $instance, $id_base) {

	$array_word = explode(' ', $title );
	$array_word[ count($array_word) - 1 ] = '<span>' . $array_word[ count($array_word) - 1 ] . '</span>';
	$title = implode(' ', $array_word);

	return $title;
}
//add_filter('widget_title', 'indira_widget_title', 10, 3);

/**
 * Replace the string 'icon_replace' on SVG use xlink:href attribute from wp_nav_menu's link_before argument by the escaped domain name from link url
 * the dot(.) on domain replaced by dash(-), eg. plus.google.com -> plus-google-com
 * so for the menu with URL linked to google plus domain will have SVG icon with use tag like
 * <use xlink:href="http://your-domain/wp-content/themes/fusion/icons/symbol-defs.svg#icon-social-plus-google-com"></use>
 *
 * see also function fusion_svg_icon() in the template-tags.php
 * see also the declaration of wp_nav_menu for theme location "social" in the header.php and footer.php
 *
 * @since Fusion 1.0
 *
 * @param string $item_output The menu item's starting HTML output.
 * @param object $item		Menu item data object.
 * @param int	$depth	   Depth of menu item. Used for padding.
 * @param array  $args		An array of arguments. @see wp_nav_menu()
 */
function indira_social_menu_item_output ( $item_output, $item, $depth, $args ) {
	$parsed_url = parse_url( $item->url);
	$class = ! empty( $parsed_url['host'] ) ? indira_map_domain_class( $parsed_url['host'] ) : '';
	if ( $class == '' ) {
		$class = 'none';
		$item_output = str_replace('social-link screen-reader-text', 'social-link', $item_output);
	}
	$output = str_replace('icon_replace', 'social-' . $class, $item_output);
	return $output;
}

/**
 * Extract domain name without tld, used as class name or icon identifier
 * Used in function indira_social_menu_item_output()
 *
 * @since Fusion 1.0
 *
 * @param string $domain a domain name
 */
function indira_map_domain_class( $domain ) {
	$available_icons = array('behance', 'delicious', 'digg', 'dribble', 'ello', 'email', 'facebook', 'flickr', 'google-plus-1', 'github', 'instagram', 'lastfm', 'line', 'linkedin', 'pinterest', 'pocket', 'print', 'reddit', 'scype', 'soundcloud', 'spotify', 'stumbleupon', 'telegram', 'tumblr', 'twitter', 'vimeo', 'whatsapp', 'wordpress', 'wordpress2', 'yahoo', 'youtube');
	$class = '';
	if ( strpos( 'plus.google.com', $domain ) !== false ) {
		$class = 'google-plus-1';
	} else {
		$texts = explode('.', $domain );
		if ( count($texts) >= 2 )
			$class = in_array( $texts[count( $texts ) - 2], $available_icons ) ? $texts[count( $texts ) - 2] : '';
		else
			$class = '';
	}
	return $class;
}

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function indira_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Jetpack',
			'slug'      => 'jetpack',
			'required'  => false,
		),

		array(
			'name'      => 'oAuth Twitter Feed for Developers',
			'slug'      => 'oauth-twitter-feed-for-developers',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'indira',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'indira_register_required_plugins' );

