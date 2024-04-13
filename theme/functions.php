<?php

/**
 * meetup-tw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meetup-tw
 */

if (!defined('MEETUP_TW_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('MEETUP_TW_VERSION', '0.1.0');
}

if (!defined('MEETUP_TW_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `meetup_tw_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'MEETUP_TW_TYPOGRAPHY_CLASSES',
		'prose prose-slate  xl:prose-xl prose-a:text-primary'
	);
}

if (!function_exists('meetup_tw_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function meetup_tw_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on meetup-tw, use a find and replace
		 * to change 'meetup-tw' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('meetup-tw', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		//Add custom logo
		add_theme_support('custom-logo');


		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'meetup-tw'),
				'menu-2' => __('Footer Menu', 'meetup-tw'),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'meetup_tw_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meetup_tw_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'meetup-tw'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'meetup-tw'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'meetup_tw_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function meetup_tw_scripts()
{
	wp_enqueue_style('meetup-tw-style', get_stylesheet_uri(), array(), MEETUP_TW_VERSION);
	wp_enqueue_script('meetup-tw-script', get_template_directory_uri() . '/js/script.min.js', array(), MEETUP_TW_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'meetup_tw_scripts');

/**
 * Enqueue the block editor script.
 */
function meetup_tw_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'meetup-tw-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		MEETUP_TW_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'meetup_tw_enqueue_block_editor_script');

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from MEETUP_TW_TYPOGRAPHY_CLASSES.
 */
function meetup_tw_enqueue_typography_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'meetup-tw-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			MEETUP_TW_VERSION,
			true
		);
		wp_add_inline_script('meetup-tw-typography', "tailwindTypographyClasses = '" . esc_attr(MEETUP_TW_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'meetup_tw_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function meetup_tw_tinymce_add_class($settings)
{
	$settings['body_class'] = MEETUP_TW_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'meetup_tw_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailwind_opnlnk_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'tailwind_opnlnk_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailwind_opnlnk_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}
	return $classes;
}
add_filter('nav_menu_submenu_css_class', 'tailwind_opnlnk_nav_menu_add_submenu_class', 10, 3);
