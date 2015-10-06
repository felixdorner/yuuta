<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class yuuta_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'yuuta_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'yuuta_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'yuuta_welcome_style' ) );

		add_action( 'yuuta_welcome', array( $this, 'yuuta_welcome_intro' ), 				10 );		

	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.4.0
	 */
	public function yuuta_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'yuuta_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.4.0
	 */
	public function yuuta_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Thanks for choosing Yuuta! Visit the %swelcome screen%s to get started.', 'yuuta' ), '<a href="' . esc_url( admin_url( 'themes.php?page=yuuta-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=yuuta-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Yuuta', 'yuuta' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 * @since  1.4.0
	 */
	public function yuuta_welcome_style( $hook_suffix ) {		

		if ( 'appearance_page_yuuta-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'yuuta-welcome-screen', get_template_directory_uri() . '/inc/admin/css/welcome.css','20150916' );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
		}
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.4.0
	 */
	public function yuuta_welcome_register_menu() {
		add_theme_page( 'Yuuta', 'Yuuta', 'activate_plugins', 'yuuta-welcome', array( $this, 'yuuta_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 * @since 1.4.0
	 */
	public function yuuta_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked yuuta_welcome_intro - 10			 
			 */
			do_action( 'yuuta_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 * @since 1.7.0
	 */
	public function yuuta_welcome_intro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/intro.php' );
	}

}

$GLOBALS['yuuta_Welcome'] = new yuuta_Welcome();
