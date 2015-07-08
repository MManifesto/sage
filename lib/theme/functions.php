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

	// Change login Logo
	// function my_custom_login_logo() {
	//     echo '<style type="text/css">
	//         h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.gif) !important; }
	//     </style>';
	// }

	// add_action('login_head', 'my_custom_login_logo');

	function is_on_mobile()
	{
		$is_on_mobile = false;

		if (function_exists('is_handheld')) {

		    if (is_handheld())
		    {
		    	$is_on_mobile = true;
		    }
		}

		return $is_on_mobile;
	}

?>