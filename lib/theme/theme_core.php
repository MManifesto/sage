<?php

/**
 * Core Theme Object
 * Core Version: @core_version@
 */

include_once('functions.php');

class MMM_Roots
{
	var $_settings;
    var $_options_pagename = 'mmm_roots';
    var $_settings_key = 'mmm_roots';
    var $_meta_key = 'mmm_roots_meta';
    //var $_setting_prefix = 'mm_roots_';
    var $_save_key = '';
    var $_versionnum = "@core_version@";
	var $menu_page;

	var $shortcode_includes = ["row", "column"];

	function MMM_Roots()
	{
        $this->_settings = get_option($this->_settings_key) ? get_option($this->_settings_key) : array();

        add_action( 'admin_menu', array(&$this, 'create_menu_link') );
		
		//Ajax Posts
		add_action('wp_ajax_nopriv_do_ajax', array(&$this, '_save') );
		add_action('wp_ajax_do_ajax', array(&$this, '_save') );

		//Custom Taxonomies
		add_action( 'init', array(&$this, 'custom_taxonomies'));

		//Page / Post Meta
		add_post_type_support( 'page', 'excerpt' ); //Pages should have this - it's silly not to!
		
		//Custom Meta
		add_action( 'admin_init', array(&$this, 'custom_metabox'));
		add_action( 'save_post', array(&$this, '_save_post_meta'), 10, 2 );

		//Custom CSS for taxonomy icons
		add_action('admin_head', array(&$this, 'custom_dashboard_css'));

		$this->load_shortcodes();
    }

    static function MMM_Roots_install() {
    	global $wpdb;
    	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    	
    	//Get default values from the theme data file if there are none
		//$this->_set_standart_values($themeSettings);
		
		add_option($_settings_key . "_versionnum", $_versionnum);
	}

	function load_shortcodes()
	{
		foreach ($this->shortcode_includes as $shortcode) {
			add_shortcode( $shortcode, 'MmmToolsNamespace\\' . $shortcode );
		}
	}

	function custom_dashboard_css()
	{
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/fontawesome.css', false, null);
		wp_enqueue_style('mmm_roots_dashboard', get_template_directory_uri() . '/assets/css/dashboard.css', false, null);
	}

	function custom_metabox(){
		global $taxonomies;

		foreach ($taxonomies as $taxonomy)
		{
			add_meta_box("mm_post_meta", "Meta", array(&$this, "taxonomy_meta"), $taxonomy["slug"], "normal", "low", $taxonomy["options"]);
		}	
	}

	function custom_taxonomies()
	{
		global $taxonomies;

		foreach ($taxonomies as $taxonomy) 
		{
			if (isset($taxonomy["registration-args"]))
			{
				register_post_type( $taxonomy["slug"], $taxonomy["registration-args"] );
			}
		}
	}

	function taxonomy_meta($post, $data)
	{
		$options = $data["args"];

		$values = get_post_meta($post->ID, $this->_meta_key, true);

        \MmmToolsNamespace\load_admin_assets();

		include_once('ui/meta_post_ui.php');
	}

	function create_menu_link()
    {
        $this->menu_page = add_options_page('Theme Options', 'Theme Options',
        'manage_options',$this->_options_pagename, array(&$this, 'build_settings_page'));
    }
    
    function build_settings_page()
    {
        if (!$this->check_user_capability()) {
            wp_die( __('You do not have sufficient permissions to access this page.') );
        }
        
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/plugins.js', false, null);
        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-1.7.1.min.js', false, null);
        
        \MmmToolsNamespace\load_admin_assets();

		include_once('ui/admin_ui.php');
    }

    function check_user_capability()
    {
        if ( is_super_admin() || current_user_can('manage_options') ) return true;

        return false;
    }
    
    
    function _save()
	{
		if ($this->check_user_capability())
		{
			switch($_REQUEST['fn']){
				case 'settings':
					$data_back = $_REQUEST['settings'];
					
					$values = array();
					$i = 0;
					foreach ($data_back as $data)
					{
						if (array_key_exists($data['name'], $values))
						{
							$values[$data['name']] .= "," . $data['value'];	
						}
						else
						{
							$values[$data['name']] = $data['value'];
						}
					}
					
					$this->_save_settings_todb($values);
				break;
			}
		}

		switch($_REQUEST['fn']){
		// case 'contact':
			
		// 	$data_back = $_REQUEST['contact'];
					
		// 	$data = array();
		// 	$i = 0;
		// 	foreach ($data_back as $field)
		// 	{
		// 		$data[$field['name']] = $field['value'];
		// 	}

		// 	if ($data['honey'] == '1' && $data['terms'] == '')
		// 	{
		// 		$emailTemplate = "%s says:<br /> %s<br /><br />- %s";

		// 		$name = $data['name'];
		// 		$contact = $data['contact'];
		// 		$message = $data['message'];

		// 		$emailBody = sprintf($emailTemplate, $name, $message, $contact);

		// 		$toEmail = $this->get_setting('business_email');
		// 		$subject = "Website Message";


		// 		SendMail($toEmail, $subject, $toEmail, $emailBody);
		// 	}
		// break;
		}
	}
    
	function _save_post_meta( $post_id, $post ){
		global $pagenow;
		global $taxonomies;

		if ( 'post.php' != $pagenow ) return $post_id;
		
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;

		if ( ! isset( $_POST['mm_nonce'] ) || ! wp_verify_nonce( $_POST['mm_nonce'], 'mm_nonce' ) )
	        return $post_id;

	    $metafields = array();

	    $taxonomySlugs = array();

		foreach ($taxonomies as $taxonomy) {
			$taxonomySlugs[] = $taxonomy["slug"];
		}

	    if (in_array($post->post_type, $taxonomySlugs))
	    {
	   		$taxonomyKey = array_search($post->post_type, $taxonomySlugs);
	   		$metafields = \MmmToolsNamespace\GetThemeDataFields($taxonomies[$taxonomyKey]["options"]);

			$metadata = array();

			foreach ($metafields as $field) {

				$fieldID = $field["id"];

				/*if ($metadata[$fieldID] != null)
				{
					$metadata[$fieldID] .= "," . $fieldID;
				}
				else
				{
					$metadata[$fieldID] = $fieldID;
				}*/

				$metadata[$fieldID] = $fieldID;
			}

			update_post_meta( $post_id, $this->_meta_key, $_REQUEST );

			//TODO account for array data like multi select meta
			//update_post_meta( $post_id, $this->_meta_key, array_map( 'strip_tags', $_REQUEST ) );
	    }
	}

    function get_option($setting)
    {
        return $this->_settings[$setting];
    }
    
    function _save_settings_todb($form_settings = '')
	{
		if ( $form_settings <> '' ) {
			unset($form_settings[$this->_settings_key . '_saved']);

			$this->_settings = $form_settings;

			#set standart values in case we have empty fields
			$this->_set_standart_values($form_settings);
		}
		
		update_option($this->_settings_key, $this->_settings);
	}

	function _set_standart_values($standart_values)
	{
		global $shortname;

		foreach ($standart_values as $key => $value){
			if ( !array_key_exists( $key, $this->_settings ) )
				$this->_settings[$key] = '';
		}

		foreach ($this->_settings as $key => $value) {
			if ( $value == '' ) $this->_settings[$key] = $standart_values[$key];
		}
	}
	
	function get_setting($name, $defaultValue = "")
	{
		$output = $defaultValue;

		if (isset($this->_settings[$name]))
		{
			$output = stripslashes($this->_settings[$name]);
		}

		return $output;
	}

	/*****
	*	get_post_meta($id, $key)
	*	$id - the post to get the theme meta from
	*	$key (optional) - the optional key if this is the only value you want or need
	*	$single (optional) - if the key is a single value or an array
	*	$ouput - returns either the single value key or the whole meta array
	*/
	function get_post_meta($id, $key=null, $single = true)
	{
		$output = "";
		$post_meta = get_post_meta($id, $this->_meta_key, $single);

		if ($key != null && isset($post_meta[$key]))
		{
			$output = $post_meta[$key];
		}
		
		return $output;
	}

	function get_post_variables($post)
    {
        $post_variables = array('{url}' => get_permalink($post),
					'{title}' => $post->post_title,
					'{image}' => getPostThumbnailUrl($post),
					'{content}' => do_shortcode($post->post_content),
					'{slug}' => $post->post_name);

        return $post_variables;
    }
}

register_activation_hook(__FILE__,array('MMM_Roots', 'MMM_Roots_install'));

add_action( 'init', 'MMM_Roots_Init', 5 );
function MMM_Roots_Init()
{
    global $MMM_Roots;
    $MMM_Roots = new MMM_Roots();

    global $MMM_Data_Library;
	if ($MMM_Data_Library == null)
	{
		$MMM_Data_Library = array();
	}
	array_push($MMM_Data_Library, $MMM_Roots);
}