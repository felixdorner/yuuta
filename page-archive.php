<?php
/**
 * Template Name: Archives
 * The template displays archives.
 *
 * @package yuuta
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( has_post_thumbnail() ) : ?>
			<article class="hentry single-template has-post-thumbnail">					
				<?php $yuuka_article_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'yuuta_thumb_large' ); ?>
				<div class="intro-image" style="background-image: url('<?php echo esc_url($yuuka_article_image[0]); ?>')">
				
			<?php else : ?>
			<article class="hentry single-template has-post-thumbnail">
				<div class="intro-image">
			<?php endif; ?>
				
					<div class="intro-image__inside">
						<header class="entry-header">
							<?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>								
							<hr>
						</header><!-- .entry-header -->
					</div>	
					
					<div class="overlay light-dark is-single"></div>			

				</div>

				<div class="hentry__inside">					

					<div class="entry-content">

						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; // end of the loop. ?>
					
						<h3 class="archive-title"><?php esc_html_e( 'Yearly', 'yuuta' ); ?></h3>
						<ul><?php wp_get_archives( array( 'type' => 'yearly', 'limit' => '12', 'show_post_count' => 1 ) ); ?></ul>				
									
						<h3 class="archive-title"><?php esc_html_e( 'Monthly', 'yuuta' ); ?></h3>
						<ul><?php wp_get_archives( array( 'type' => 'monthly', 'limit' => '12', 'show_post_count' => 1 ) ); ?></ul>				
					
						<h3 class="archive-title"><?php esc_html_e( 'Authors', 'yuuta' ); ?></h3>
						<ul><?php wp_list_authors(TRUE, TRUE, TRUE); ?></ul>
					
						<h3 class="archive-title"><?php esc_html_e( 'Categories', 'yuuta' ); ?></h3>
						<ul><?php wp_list_categories( array( 'title_li' => '', 'show_count' => 1 ) ); ?></ul>				
					
						<h3 class="archive-title"><?php esc_html_e( 'Tags', 'yuuta' ); ?></h3>
						<?php wp_tag_cloud('smallest=18&largest=32&unit=px&orderby=count'); ?>			

					</div>

					<footer class="entry-footer">
						<div class="entry-meta">					
							<?php yuuta_entry_footer(); ?>				
						</div><!-- .entry-meta -->			
					</footer><!-- .entry-footer -->

				</div>
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
