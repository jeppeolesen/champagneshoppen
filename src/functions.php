<?php 
	// Enqueue scripts and styles.
	function add_stylesheet() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}

	add_action( 'wp_enqueue_scripts', 'add_stylesheet' );

	// Add slider script to landing page only
	if ( !is_admin() ) {
		wp_register_script('main', get_template_directory_uri() . '/scripts/main.js', '1.0.0', true);
	};

	wp_enqueue_script('main');

	// Enable menu configurations
	function register_menus() {
		register_nav_menus(
			array(
				'navigation' => __( 'Navigation' ),
				'footer' => __( 'Footer' )
			)
		);
	};

	add_action( 'init', 'register_menus' );

	// Add copyright notice in footer
	function copyright_notice( $wp_customize ) {
		$wp_customize -> add_setting( 'copyright_notice' );
		$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'copyright_notice',
			array(
				'label' => 'Copyright notice',
				'description' => 'Enter the copyright notice to be displayed in the footer',
				'section' => 'title_tagline',
				'settings' => 'copyright_notice'
			)
		));
	};

	add_action( 'customize_register', 'copyright_notice' );

?>