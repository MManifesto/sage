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
					'name' => 'General Options',
					'size' => '6',
					'fields' => array(
						array('id' => 'brand_logo',
							'label' => 'Navbar / Brand Logo',
							'type' => 'image'),
						array('id' => 'title_options',
							  'label' => 'Site Title',
							  'type' => 'select',
							  'options' => array("note" => "Note: This will determine how the site brand  alongside the navigation is displayed", "data" => $titleOptions)
							),
						array('id' => 'search_in_navigation',
							  'label' => 'Search In Navigation',
							  'type' => 'checkbox',
							  'options' => array("note" => "Note: When enabled a searchbar will appear in the navigation")
							),
						array('id' => 'footer_text',
							'label' => 'Footer Text',
							'type' => 'textarea',
							'options' => array("class" => "col-lg-12")),
						array('id' => 'icon_default',
							'label' => 'Default Icon',
							'type' => 'select',
							'options' => array("class" => 'font-awesome', "data" => tools\getFontAwesomeSelectArray()))
					)
				)
			)
		)
	);
?>