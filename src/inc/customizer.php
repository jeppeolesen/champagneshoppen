<?php 
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

	// Add custom header logo to WP customizer interface
	function customized_logo( $wp_customize ) {
		$wp_customize -> add_setting( 'site_logo' );
		$wp_customize -> add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
				'label' => 'Upload logo',
				'description' => 'Upload et logo der vises i toppen af siden.',
				'section' => 'title_tagline',
				'settings' => 'site_logo'
			)
		));
	};

	add_action( 'customize_register', 'customized_logo');

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