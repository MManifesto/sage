<?php
	/* References */
	include_once('tools/url-tools.php');
	include_once('tools/data-tools.php');
	include_once('tools/date-tools.php');
	include_once('tools/html-tools.php');
	include_once('tools/string-tools.php');
	include_once('tools/email-tools.php');
	include_once('tools/wp-tools.php');
	include_once('tools/customizer-tools.php');
	include_once('tools/shortcodes.php');
	include_once('tools/admin-tools.php');

	include_once('data/admin_data.php');
	include_once('data/taxonomy_data.php');
	include_once('data/customizer_data.php');


	// Register Navigation Menus
	/* function custom_navigation_menus() {
		$locations = array(
			'header_menu' => __( 'Subpage Menu', 'text_domain' ),
			'social_menu' => __( 'Social Menu', 'text_domain' )
		);

		register_nav_menus( $locations );
	} */

	// Hook into the 'init' action
	//add_action( 'init', 'custom_navigation_menus' );

	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'the_content', 'wpautop' , 12);
?>