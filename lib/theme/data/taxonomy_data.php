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
								array('id' => 'tagline',
									'label' => 'Tagline',
									'type' => 'text'),
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'sections',
									'label' => 'Sections',
									'type' => 'select',
									'options' => array("data" => MmmToolsNamespace\getTaxonomySelectArray("page-section"), "isMultiple" => true, "updateRegion" => true))
							)
						),
						array('name' => 'Jumbotron Options',
							'size' => '12',
							'fields' => array(
								array('id' => 'readmoretext',
									'label' => 'Read More Text',
									'type' => 'text',
									'options' => array("note" => 'Leaving this blank will result in the default value of "Read More"')),
								array('id' => 'blurb',
									'label' => 'Blurb',
									'type' => 'textarea',
									'options' => array("note" => 'Leaving this blank will result in the first 25 characters of the post content being used.')),
								array('id' => 'jumbotron-template',
									'label' => 'Jumbotron Templates',
									'type' => 'select',
									'options' => array("data" => $jumbotronTemplates))
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
								array('id' => 'tagline',
									'label' => 'Tagline',
									'type' => 'text'),
								array('id' => 'icon',
									'label' => 'Icon',
									'type' => 'select',
									'options' => array("class" => 'font-awesome', "data" => MmmToolsNamespace\getFontAwesomeSelectArray())),
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'sections',
									'label' => 'Sections',
									'type' => 'select',
									'options' => array("data" => MmmToolsNamespace\getTaxonomySelectArray("page-section"), "isMultiple" => true, "updateRegion" => true))
							)
						)
					)
				)
			)
		)
	);
?>