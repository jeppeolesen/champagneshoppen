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

	// Enable Customizer in WP backend
	require get_template_directory() . '/inc/customizer.php';

?>