<?php  

/* 
* Template Name: Custom Query
*/

get_header();
get_template_part( "template-parts/hero" );
?>

<?php 
$args = array( 
    "posts_per_page"    =>  2,
    "post__in"          =>  array(60, 55),
    "orderby"          =>  "post__in",
);
$_p = get_posts($args);

// Loop for the output
foreach ($_p as $post) : setup_postdata($post); ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php endforeach;
wp_reset_postdata();
?> 


<?php 
get_footer();