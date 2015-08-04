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
	$contentWidth = array(2 => "60%", 1 => "50%", 3 => "100%", 4 => "75%");
	$staffType = array(2 => "Director", 1 => "Staff");

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
								array('id' => 'mobile-image',
									'label' => 'Mobile Image',
									'type' => 'image'),
								array('id' => 'background-position',
									'label' => 'Image Position',
									'type' => 'text',
									'options' => array("note" => "e.g. 0 100px or top or bottom")),
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
								array('id' => 'mobile-image',
									'label' => 'Mobile Image',
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
		),
		array('slug' => 'jumbotron',
			  'registration-args' => array(
				'label' => 'jumbotron',
				'description'         => 'Jumbotrons',
				'labels'              => array(
											'name'                => 'Jumbotrons',
											'singular_name'       => 'Jumbotron',
											'menu_name'           => 'Jumbotron',
											'parent_item_colon'   => 'Parent Jumbotron:',
											'all_items'           => 'All Jumbotrons',
											'view_item'           => 'View Jumbotron',
											'add_new_item'        => 'Add New Jumbotron',
											'add_new'             => 'New Jumbotron',
											'edit_item'           => 'Edit Jumbotron',
											'update_item'         => 'Update Jumbotron',
											'search_items'        => 'Search jumbotrons',
											'not_found'           => 'No jumbotrons found',
											'not_found_in_trash'  => 'No jumbotrons found in Trash',
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
			'options' => array(	array('name' => 'Jumbotron Options',
						'id' => 'jumbotron',
						'icon' => 'cog',
						'sections' => array(
							array(
							'name' => 'General Options',
							'size' => '12',
							'fields' => array(
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'mobile-image',
									'label' => 'Mobile Image',
									'type' => 'image'),
								array('id' => 'background-position',
									'label' => 'Image Position',
									'type' => 'text',
									'options' => array("note" => "e.g. 0 100px or top or bottom")),
								array('id' => 'jumbotron-template',
									'label' => 'Jumbotron Templates',
									'type' => 'select',
									'options' => array("data" => $jumbotronTemplates))
							)
						)
					)
				)
			)
		),
		array('slug' => 'property',
			  'registration-args' => array(
				'label' => 'property',
				'description'         => 'Properties',
				'labels'              => array(
											'name'                => 'Properties',
											'singular_name'       => 'Property',
											'menu_name'           => 'Property',
											'parent_item_colon'   => 'Parent Property:',
											'all_items'           => 'All Properties',
											'view_item'           => 'View Property',
											'add_new_item'        => 'Add New Property',
											'add_new'             => 'New Property',
											'edit_item'           => 'Edit Property',
											'update_item'         => 'Update Property',
											'search_items'        => 'Search properties',
											'not_found'           => 'No properties found',
											'not_found_in_trash'  => 'No properties found in Trash',
										),
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				// 'taxonomies'          => array( 'category' ),
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
			'options' => array(	array('name' => 'Property Options',
						'id' => 'property',
						'icon' => 'cog',
						'sections' => array(
							array(
							'name' => 'General Options',
							'size' => '12',
							'fields' => array(
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'mobile-image',
									'label' => 'Mobile Image',
									'type' => 'image'),
								array('id' => 'background-position',
									'label' => 'Image Position',
									'type' => 'text',
									'options' => array("note" => "e.g. 0 100px or top or bottom")),
								array('id' => 'property-link',
									'label' => 'Property Link',
									'type' => 'text')
							)
						)
					)
				)
			)
		),
		array('slug' => 'staff',
			  'registration-args' => array(
				'label' => 'staff',
				'description'         => 'Employees',
				'labels'              => array(
											'name'                => 'Employees',
											'singular_name'       => 'Employee',
											'menu_name'           => 'Employee',
											'parent_item_colon'   => 'Parent Employee:',
											'all_items'           => 'All Employees',
											'view_item'           => 'View Employee',
											'add_new_item'        => 'Add New Employee',
											'add_new'             => 'New Employee',
											'edit_item'           => 'Edit Employee',
											'update_item'         => 'Update Employee',
											'search_items'        => 'Search employees',
											'not_found'           => 'No employees found',
											'not_found_in_trash'  => 'No employees found in Trash',
										),
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				// 'taxonomies'          => array( 'category' ),
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
			'options' => array(	array('name' => 'Employee Options',
						'id' => 'staff',
						'icon' => 'cog',
						'sections' => array(
							array(
							'name' => 'General Options',
							'size' => '12',
							'fields' => array(
								array('id' => 'image',
									'label' => 'Image',
									'type' => 'image'),
								array('id' => 'mobile-image',
									'label' => 'Mobile Image',
									'type' => 'image'),
								array('id' => 'background-position',
									'label' => 'Image Position',
									'type' => 'text',
									'options' => array("note" => "e.g. 0 100px or top or bottom")),
								array('id' => 'staff-type',
									'label' => 'Staff Type',
									'type' => 'select',
									'options' => array("data" => $staffType))
							)
						)
					)
				)
			)
		)
	);
?>