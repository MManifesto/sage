<?php
	global $taxonomies;

	/*
		Optional "options" variables
		note - Text displayed below the field
		data - typically a key value array for selects but could be anything
		class - classes to apply to the field
		placeholder - placeholder text
		rows - text area only rows attribute
	*/

	$jumbotronTemplates = array(1 => "Text Centered");
	$headerTemplates = array(1 => "Wide", 2 => "Narrow");
	$contentWidth = array(2 => "75%", 1 => "50%", 3 => "100%");

	$taxonomies = array(
		array('slug' => 'post',
			  'options' => array(
				array('name' => 'Post Options',
					'id' => 'post',
					'icon' => 'cog',
					'sections' => array(
						array(
							'name' => 'General Options',
							'size' => '12',
							'fields' => array(
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'jumbotron-template',
									'label' => 'Jumbotron Templates',
									'type' => 'select',
									'options' => array("data" => $jumbotronTemplates)),
								array('id' => 'property-link',
									'label' => 'Property Link',
									'type' => 'text')
							)
						)
					)
				),
			)
		),
		array('slug' => 'page',
			  'options' => array(
				array('name' => 'Page Options',
					'id' => 'page',
					'icon' => 'cog',
					'sections' => array(
						array(
							'name' => 'General Options',
							'size' => '6',
							'fields' => array(
								array('id' => 'tagline-title',
									'label' => 'Tagline-title',
									'type' => 'html',
									'options' => array('data' => "<strong>Header Content</strong>")),
								array('id' => 'tagline',
									'label' => 'Tagline',
									'type' => 'editor'),
								array('id' => 'header-template',
									'label' => 'Header Style',
									'type' => 'select',
									'options' => array("data" => $headerTemplates)),
								array('id' => 'section-height',
									'label' => 'Header Height',
									'type' => 'text',
									'options' => array("note" => "e.g. 300px")),
								array('id' => 'body-margin',
									'label' => 'Header Text Top Margin',
									'type' => 'text',
									'options' => array("note" => "e.g. 250px")),
								array('id' => 'image',
									'label' => 'Header Background Image',
									'type' => 'image'),
								array('id' => 'background-position',
									'label' => 'Header Background Position',
									'type' => 'text',
									'options' => array("note" => "e.g. 0 100px or top or bottom")),
								array('id' => 'content-width',
									'label' => 'Page Content Width',
									'type' => 'select',
									'options' => array("data" => $contentWidth)),
							)
						)
					)
				)
			)
		)
	);
?>