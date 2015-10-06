<?php
/**
 * The template for displaying all single posts.
 *
 * @package yuuta
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php	if ( has_post_format( array( 'image', 'quote', 'link', 'aside', 'chat', 'audio', 'video', 'gallery' ) ) ) :
				get_template_part( 'template-parts/content', get_post_format() );				
			else :
				get_template_part( 'template-parts/content', 'single' );
			endif; ?>

			<?php	the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
