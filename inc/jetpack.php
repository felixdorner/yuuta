<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package yuuta
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function yuuta_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type' => 'click',
		'container' => 'main',
		'render' => 'yuuta_infinite_scroll_render',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'yuuta_jetpack_setup' );

/**
 * Set the code to be rendered on for calling posts,
 * hooked to template parts when possible.
 *
 * Note: must define a loop.
 */
function yuuta_infinite_scroll_render() {
  while ( have_posts() ) : the_post();        
    get_template_part( 'template-parts/content', get_post_format() );
  endwhile;
}
