<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package yuuta
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

	  <div class="footer-branding">
	  	<?php if ( ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) ) :
				jetpack_the_site_logo();
			else : ?>
	    	<h3 class="site-title"><?php bloginfo( 'name' ); ?></h3>
				<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
			<?php endif; ?>
	  </div>

	  <?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
	  <div class="footer-links">
	  	<?php	dynamic_sidebar( 'footer-1' ); ?>
	  </div>
	  <?php } ?>

	  <hr>

	  <p class="colophon">
	  	&copy; <?php echo date('Y'); ?>, <?php bloginfo( 'name' ); ?><br />
	  	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'yuuta' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'yuuta' ), 'WordPress' ); ?></a><br />
			<?php printf( __( 'Theme: %1$s by %2$s', 'yuuta' ), 'Yuuta', '<a href="https://felixdorner.de" rel="designer">Felix Dorner</a>' ); ?>
	  </p>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
