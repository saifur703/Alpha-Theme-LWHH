<?php   

if( file_exists( dirname(__FILE__) . '/inc/tgm.php') ) {
    require_once dirname(__FILE__) . '/inc/tgm.php';
}
if ( class_exists( 'Attachments' ) ){
    require_once("lib/attachments.php");
}

// Bootstrap
function alpha_bootstrap(){
    load_theme_textdomain( "alpha", get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support("post-thumbnails");

    add_theme_support("html5", array(
        "search-form",
        "gallery",
        "caption",
        "comment-form",
        "comment-list"
    ));

    add_theme_support("post-formats", array( 
        "audio",
        "video",
        "gallery",
        "chat",
        "link",
        "status",
        "aside",
        "image",
        "quote"
    ));
    $alpha_custom_header_details = array(
        'header-text'           =>  true,
        'default-text-color'    =>  '#222',
        'width'                 =>  1200,
        'height'                =>  600,
        'flex-height'           =>  true,
        'flex-width'            =>  true
    );
    add_theme_support("custom-header", $alpha_custom_header_details);

    $alpha_custom_logo_defaults = array(
        'width'     =>  '120',
        'height'    =>  '120'
     );
     // Custom Logo
     add_theme_support("custom-logo", $alpha_custom_logo_defaults);

     
    add_theme_support("custom-background");

    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'alpha' ),
        'footer_menu'  => __( 'Footer Menu', 'alpha' ),
    ) );

}
add_action("after_setup_theme", "alpha_bootstrap");


// Cache Busting
// die(site_url());
if(site_url() == "http://localhost/lwhh"){
    define("VERSION", time());
}else {
    define("VERSION", wp_get_theme()->get("Version"));
}

//echo VERSION;
//die();
// Assets
function alpha_assets(){
    wp_enqueue_style("bootstrap-css", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", array(), "4.0.0", "all");

    wp_enqueue_style("feathercss", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css", array(), "1.0", "all");
    wp_enqueue_style("tinyslider-css", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css", array(), "1.0", "all");
    wp_enqueue_style("alpha-style", get_stylesheet_uri(), VERSION, "1.0.0", "all");

    wp_enqueue_script("featherjs", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "1.0", true);
    wp_enqueue_script("tinyslider-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", array(), "1.0", true);
    wp_enqueue_script("alphamain-js", get_template_directory_uri() . "/assets/js/main.js", array(), "1.0", true);
}
add_action("wp_enqueue_scripts", "alpha_assets");

// widgets 
function alpha_widget_init(){
    register_sidebar(array(
        "name"          =>  esc_html__("Single Sidebar", "alpha"),
        "id"            =>  "sidebar1",
        "description"   =>  esc_html__("Add Widget here...", "alpha"),
        "before_widget" =>  '<div id="%1$s" class="single-sidebar %2$s">',
        "after_widget"  =>  "</div>",
        "before_title"  =>  "<h2 class='single-sidebar-title'>",
        "after_title"   =>  "</h2>",
    ));

    register_sidebar(array(
        "name"          =>  esc_html__("Copyright Text", "alpha"),
        "id"            =>  "copyright",
        "description"   =>  esc_html__("Add Copyright Text here...", "alpha"),
        "before_widget" =>  '<div id="%1$s" class="copyright %2$s">',
        "after_widget"  =>  "</div>",
        "before_title"  =>  "<h2 class='copyright-title'>",
        "after_title"   =>  "</h2>",
    ));

    register_sidebar(array(
        "name"          =>  esc_html__("Footer Right", "alpha"),
        "id"            =>  "footer_right",
        "description"   =>  esc_html__("Add Text to footer right area", "alpha"),
        "before_widget" =>  '<div id="%1$s" class="footer-right text-center %2$s">',
        "after_widget"  =>  "</div>",
        "before_title"  =>  "",
        "after_title"   =>  "",
    ));
}
add_action("widgets_init", "alpha_widget_init");


// Protected Post
function alpha_the_excerpt($excerpt) {

    if( !post_password_required() ) {
        echo $excerpt;
    }else {
        echo get_the_password_form( );
    }

}
add_filter("the_excerpt", "alpha_the_excerpt");

// Protected Post Title Change
function alpha_protected_post_title(){
    return "Locked: %2s";
}
add_filter("protected_title_format", "alpha_protected_post_title");


// nav menu li class
function nav_menu_li_class($classes, $item){
    $classes[] = 'list-inline-item';
    return $classes;
}
add_filter("nav_menu_css_class", "nav_menu_li_class", 10, 2);


// Inline style
function alpha_inline_style(){
    if(is_page()): 
        $alpha_featured = get_the_post_thumbnail_url( null, "large" );
    ?>

        <style type="text/css">
            .page-header {
                background-image: url(<?php echo $alpha_featured; ?>)
            }
        </style>
    <?php 
    endif;

    if(is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
                <style>
                .header {
                    background: url(<?php echo header_image(); ?>)
                } 
                h1.heading, h1.heading a {
                    color: #<?php echo get_header_textcolor(); ?>;
                    <?php if(! display_header_text()){
                        echo "display: none";
                    }?>
                }
                </style>
            <?php 
        }
    }
}

add_action("wp_head", "alpha_inline_style");


// image srcset
// function alpha_img_srcset(){
//     return null;
// }
// add_filter("wp_calculate_image_srcset", "alpha_img_srcset");

// add_filter("wp_calculate_image_srcset", "__return_null");

function alpha_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'alpha_highlight_search_results');
add_filter('the_excerpt', 'alpha_highlight_search_results');
add_filter('the_title', 'alpha_highlight_search_results');



function _textdomain_modify_main_query($wpq) {
    if(is_home() && $wpq->is_main_query()){
      $wpq->set("post__not_in", array("post-id"));
    }
  }
add_action("pre_get_posts", "_textdomain_modify_main_query");


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}