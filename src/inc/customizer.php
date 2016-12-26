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

	// Adds contact info to the footer
	function footer_contact_info( $wp_customize ) {
		$wp_customize -> add_setting( 'footer_contact_info' );
		$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'footer_contact_info',
			array(
				'label' => 'Contact Info',
				'description' => 'Indtast kontaktinfo der vises i bunden af siden',
				'section' => 'title_tagline',
				'settings' => 'footer_contact_info',
				'type' => 'textarea'
			)
		));
	};

	add_action( 'customize_register', 'footer_contact_info' );

	// Adds a Social Media section to the customizer
	function add_social_media_section( $wp_customize ) {
		$wp_customize -> add_section( 'social_media',
			array(
				'title' => 'Social Media'
			)
		);
	};

	add_action( 'customize_register', 'add_social_media_section' );

	// Adds the SoMe CTA
	function social_media_cta( $wp_customize ) {
		$wp_customize -> add_setting( 'social_media_cta' );
		$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'social_media_cta',
			array(
				'label' => 'Social Media CTA',
				'description' => 'Indsæt et Call To Action for Social Media',
				'section' => 'social_media',
				'settings' => 'social_media_cta',
				'type' => 'text'
			)
		));
	};

	add_action( 'customize_register', 'social_media_cta' );

	// Adds Facebook link to the footer
	function social_media_facebook( $wp_customize ) {
		$wp_customize -> add_setting( 'social_media_facebook' );
		$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'social_media_facebook',
			array(
				'label' => 'Facebook link',
				'description' => 'Indsæt link til jeres Facebook side',
				'section' => 'social_media',
				'settings' => 'social_media_facebook',
				'type' => 'url'
			)
		));
	};

	add_action( 'customize_register', 'social_media_facebook' );

	// Adds Facebook icon
	function social_media_facebook_icon( $wp_customize ) {
		$wp_customize -> add_setting( 'social_media_facebook_icon' );
		$wp_customize -> add_control( new WP_Customize_Image_Control( $wp_customize, 'social_media_facebook_icon',
			array(
				'label' => 'Facebook ikon',
				'description' => 'Upload et Facebook ikon',
				'section' => 'social_media',
				'settings' => 'social_media_facebook_icon'
			)
		));
	};

	add_action( 'customize_register', 'social_media_facebook_icon' );

	// Adds Instagram link to the footer
	function social_media_instagram( $wp_customize ) {
		$wp_customize -> add_setting( 'social_media_instagram' );
		$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'social_media_instagram',
			array(
				'label' => 'Instagram link',
				'description' => 'Indsæt link til jeres Instagram profil',
				'section' => 'social_media',
				'settings' => 'social_media_instagram',
				'type' => 'url'
			)
		));
	};

	add_action( 'customize_register', 'social_media_instagram' );

	// Adds Instagram icon
	function social_media_instagram_icon( $wp_customize ) {
		$wp_customize -> add_setting( 'social_media_instagram_icon' );
		$wp_customize -> add_control( new WP_Customize_Image_Control( $wp_customize, 'social_media_instagram_icon',
			array(
				'label' => 'Instagram ikon',
				'description' => 'Upload et Instagram ikon',
				'section' => 'social_media',
				'settings' => 'social_media_instagram_icon'
			)
		));
	};

	add_action( 'customize_register', 'social_media_instagram_icon' );
?>