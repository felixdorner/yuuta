<?php
/**
 * Display functions and definitions
 *
 * @package yuuta
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 860; /* pixels */
}

/************************************************************/
/*                                                          */
/*   THEME SETUP
/*                                                          */
/************************************************************/

if ( ! function_exists( 'yuuta_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yuuta_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on yuuta, use a find and replace
	 * to change 'yuuta' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'yuuta', get_template_directory() . '/languages' );

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
   * Admin functionality
   */
  if( is_admin() ) {

    /**
     * Add styles to post editor (editor-style.css)
     */
    add_editor_style();
  }

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'yuuta_thumb_large', 1400 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yuuta' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'chat', 'audio'
	) );

	/*
	 * Enable support for Site Logo
	 * See http://jetpack.me/support/site-logo/
	 */
	add_theme_support( 'site-logo' );

}
endif; // yuuta_setup
add_action( 'after_setup_theme', 'yuuta_setup' );

/************************************************************/
/*                                                          */
/*   WIDGETS                                                */
/*                                                          */
/************************************************************/

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function yuuta_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'yuuta' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'yuuta_widgets_init' );

/************************************************************/
/*                                                          */
/*   SCRIPTS & STYLES                                        */
/*                                                          */
/************************************************************/

function yuuta_scripts() {
	wp_enqueue_style( 'yuuta-elegant-icons', get_template_directory_uri() . '/assets/fonts/elegant-icons/elegant-icons.min.css', array(), '1' );
	wp_enqueue_style( 'yuuta-style', get_stylesheet_uri(), '20150224' );
	wp_enqueue_script( 'yuuta-lightbox', get_template_directory_uri() . '/assets/js/imagelightbox.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'yuuta-scripts', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'masonry'), '20150226', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		wp_enqueue_script( 'yuuta-autogrow-textarea', get_template_directory_uri() . '/assets/js/jquery.autogrow-textarea.js', array('jquery'), '1', true );
		wp_enqueue_script( 'yuuta-comment-form', get_template_directory_uri() . '/assets/js/comment-form.js', array('jquery'), '20150308', true );
	}
}
add_action( 'wp_enqueue_scripts', 'yuuta_scripts' );

/**
 * Implement Google Fonts
 */
function yuuta_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'yuuta-roboto', "$protocol://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'yuuta-roboto-slab', "$protocol://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css" );
}
add_action( 'wp_enqueue_scripts', 'yuuta_fonts' );

/************************************************************/
/*                                                          */
/*   INCLUDES                                               */
/*                                                          */
/************************************************************/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/************************************************************/
/*                                                          */
/*   COMMENTS                                               */
/*                                                          */
/************************************************************/

function custom_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
	?>

	<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>

	<div class="comment-avatar"><?php echo get_avatar($comment,$size='60'); ?></div>
	<div class="comment-author"><?php comment_author(); ?></div>
	<div class="comment-time"><?php comment_date('M d, Y'); ?></div>
	<div class="clear"></div>

	<div class="comment-container">
		<div class="comment-entry">

		<?php if ($comment->comment_approved == '0') : ?>
			<strong><?php _e('(Your comment is awaiting moderation.)', 'yuuta') ?></strong>
		<?php endif; ?>
		
		<?php echo comment_text(); ?>
		<?php edit_comment_link( __('Edit', 'yuuta'),' [',']') ?>

		</div>
		
		<div class="clear"></div>
		
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'reply_text' => __( 'Reply', 'yuuta' ), 'max_depth' => $args['max_depth']))) ?>
	
	</div>

	<?php
}
