<?php 

get_header();

echo "<h2> Category Name: ";
single_cat_title();
echo "</h2>";
?>


<?php 
if(class_exists("ACF")){
    $alpha_term = get_queried_object();
    /* echo "<pre>";
    print_r($alpha_term);
    echo "</pre>"; */

    $alpha_term_id = get_field("image", $alpha_term);
    if($alpha_term_id){
        $alpha_img = wp_get_attachment_image_src($alpha_term_id);

        echo "<img src='" . $alpha_img[0] . "'/>";
    }
}
?>


<?php 
get_footer();