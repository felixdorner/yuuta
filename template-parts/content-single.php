<?php
/**
 * @package yuuta
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-template'); ?>>

	<?php if ( ( has_post_thumbnail() && ! post_password_required() ) ) : ?>
	<?php $yuuka_article_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'yuuta_thumb_large' ); ?>
	<div class="intro-image" style="background-image: url('<?php echo esc_url($yuuka_article_image[0]); ?>')">
	<?php else : ?>
	<div class="intro-image">
	<?php endif; ?>

		<div class="intro-image__inside">
			<header class="entry-header">
				<?php if ( is_sticky() ) { ?>
				<span class="sticky-tag">
					<?php echo esc_html_e( 'Featured', 'yuuta' ); ?>
				</span>
				<?php } ?>			
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
				<?php if ( ! is_page() ) {
					yuuta_posted_on();
				} ?>
				<hr>
			</header><!-- .entry-header -->
		</div>	
		
		<div class="overlay light-dark is-single"></div>

	</div>

	<div class="hentry__inside">		

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'yuuta' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php yuuta_entry_footer(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->