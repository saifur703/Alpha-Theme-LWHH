<?php   
// disable the Settings screen
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); 

// disable the default instance
add_filter( 'attachments_default_instance', '__return_false' ); 

function alpha_attachments($attachments){
    $fields             =       array( 
        array( 
            "name"      =>  "title",
            "type"      =>  "text",
            "label"     =>  __("Title", "alpha"),
        ),
        array( 
            "name"      =>  "description",
            "type"      =>  "textarea",
            "label"     =>  __("Description", "alpha")
        )
    );

    $args               =       array( 
        "label"         =>  __("Slilder Page Info", "alpha"),
        'post_type'     => array( 'page' ),
        "position"      =>  "normal",
        "file_type"     =>  null,
        "button_text"   =>  __("Attach the File", "alpha"),
        'modal_text'    => __( 'Attach', 'alpha' ),
        "fields"        =>  $fields
    );

    $attachments->register("slider", $args);
}
add_action("attachments_register", "alpha_attachments");