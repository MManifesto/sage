<?php
use \MmmToolsNamespace as tools;

	/*
		Tabs
		Sections
		Fields
	*/

	global $theme_options;

	$titleOptions = array(1 => "Logo", 2 => "Site Title", 3 => "Logo & Site Title");

	$theme_options = array(
		array('name' => 'Theme Options',
			'id' => 'theme',
			'icon' => 'cog',
			'sections' => array(
				array(
					'name' => 'Brand Options',
					'size' => '6',
					'fields' => array(
						array('id' => 'brand_logo',
							'label' => 'Navbar / Brand Logo',
							'type' => 'image'),
						array('id' => 'footer_logo',
							'label' => 'Footer / Brand Logo',
							'type' => 'image')
					)
				),
				array(
					'name' => 'Contact Information',
					'size' => '6',
					'fields' => array(
						array('id' => 'email',
							'label' => 'Email',
							'type' => 'text'),
						array('id' => 'phone',
							'label' => 'Phone',
							'type' => 'text'),
						array('id' => 'address',
							'label' => 'Address',
							'type' => 'textarea',
							'options' => array("class" => "col-lg-10")
						)
					)
				),
				array(
					'name' => 'Jumbotron Options',
					'size' => '6',
					'fields' => array(
						array('id' => 'transition_speed',
							'label' => 'Transition Speed',
							'type' => 'text')
					)
				)
			)
		)
	);
?>