<?php

require_once get_theme_file_path() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'alpha_register_required_plugins' );

function alpha_register_required_plugins() {
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Advanced Custom Field',
			'slug'      => 'advanced-custom-fields',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'alpha',                
		'default_path' => '', 
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,   
		'dismissable'  => true,         
		'dismiss_msg'  => '', 
		'is_automatic' => false,  
		'message'      => '',        

	);

	tgmpa( $plugins, $config );
}
