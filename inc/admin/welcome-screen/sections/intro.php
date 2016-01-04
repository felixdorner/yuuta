<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$yuuta = wp_get_theme( 'yuuta' );

?>
<h1 style="margin-right: 0;"><?php echo '<strong>Yuuta</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $yuuta['Version'] ) . '</sup>'; ?></h1>
<p style="font-size: 1.2em;margin: 0 0 2em;"><?php esc_html_e( 'Awesome! You\'ve decided to use Yuuta as your theme.', 'yuuta' ); ?></p>

<div id="col-container">
	<div id="col-right" style="padding-left: 30px;">		
		<h4 style="margin-top:0;"><?php esc_html_e( 'About this Theme', 'yuuta' ); ?></h4>
		<p><?php echo esc_attr( $yuuta['Description'] ); ?></p>	
		<h4><?php esc_html_e( 'Support', 'yuuta' ); ?></h4>
		<p><?php esc_html_e( 'As this is a free theme, support is limited to the basics. You can find me helping out in the designated support forum.', 'yuuta' ); ?></p>
		<p><a href="https://wordpress.org/support/theme/yuuta" class="button"><?php esc_html_e( 'Support Forum', 'yuuta' ); ?></a></p>
		<h4><?php esc_html_e( 'Can I Contribute?', 'yuuta' ); ?></h4>
		<p><?php esc_html_e( 'Found a bug? Want to contribute a patch or create a new feature? GitHub is the place to go! Or would you like to translate Yuuta in to your language?', 'yuuta' ); ?></p>
		<p><a href="https://github.com/felixdorner/yuuta" class="button"><?php esc_html_e( 'GitHub', 'yuuta' ); ?></a> <a href="https://translate.wordpress.org/projects/wp-themes/yuuta" class="button"><?php _e( 'Translate', 'yuuta' ); ?></a></p>
		<h4><?php esc_html_e( 'Are you enjoying Yuuta?', 'yuuta' ); ?></h4>
		<p><?php echo sprintf( esc_html__( 'Why not leave a review on %sWordPress.org%s? I would really appreciate it! :-)', 'yuuta' ), '<a href="https://wordpress.org/themes/yuuta">', '</a>' ); ?></p>
	</div>

	<div id="col-left">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="yuuta" class="image-50" width="440" />
	</div>
</div>

<p style="font-size: 1.2em; padding: 1.618em 0; margin: 1.618em 0 2.618em 0; border-top: 1px solid rgba(0,0,0,0.1); border-bottom: 1px solid rgba(0,0,0,0.1);">
	<?php echo sprintf( esc_html__( 'Looking for more themes? Take a look at my website. %sWebsite%s', 'yuuta' ), '<a href="http://felixdorner.de" class="button-primary" style="float: right;">', '</a>' ); ?>
</p>

<p>Made with &#10084; in Berlin.</p>