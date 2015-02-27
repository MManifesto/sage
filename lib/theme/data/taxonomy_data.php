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

	$jumbotronTemplates = array(1 => "Text on Right", 2 => "Text on Left");

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
		),
		array('slug' => 'page-section',
			  'registration-args' => array(
				'label' => 'page-section',
				'description'         => 'Sections of content to display on the homepage',
				'labels'              => array(
											'name'                => 'Page Sections',
											'singular_name'       => 'Page Section',
											'menu_name'           => 'Page Section',
											'parent_item_colon'   => 'Parent Section:',
											'all_items'           => 'All Sections',
											'view_item'           => 'View Section',
											'add_new_item'        => 'Add New Section',
											'add_new'             => 'New Section',
											'edit_item'           => 'Edit Section',
											'update_item'         => 'Update Section',
											'search_items'        => 'Search sections',
											'not_found'           => 'No sections found',
											'not_found_in_trash'  => 'No sections found in Trash',
										),
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				//'taxonomies'          => array( 'category', 'post_tag' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'menu_icon'           => '',
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',),
			'options' => array(	array('name' => 'Page Section Options',
						'id' => 'page-section',
						'icon' => 'cog',
						'sections' => array(
							array(
								'name' => 'Page Section Options',
								'size' => '10',
								'fields' => array(
									array('id' => 'tagline',
										'label' => 'Tagline',
										'type' => 'text',
										'options' => array('note' => 'Note: This is display after / alongside the title of the section')),
									array('id' => 'sectionID',
										'label' => 'Section ID',
										'type' => 'text',
										'options' => array('note' => 'Note: This is the ID to use in conjunction with the navigation hashtag #SectionID')),
									array('id' => 'inline-styles',
										'label' => 'Inline Styles',
										'type' => 'textarea',
										'options' => array('note' => 'Note: This allows you to directly modify the inline css styles on the page section for a background or anything',
											'class' => 'span6')),
									)
						)
					)
				)
			)
		)
	);
?>