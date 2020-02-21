<?php 

/* 
    Template Name: WP_Query
*/

get_header();
get_template_part("template-parts/hero");
?>

<?php 
$paged = get_query_var('page') ? get_query_var('page') : 1;
$args = array( 
    "posts_per_page"    =>  -1,
    "post_type"         =>  "post",
    "post__in"          =>  array(1, 55, 57, 13, 15, 17, 53, 34, 31, 48, 42),
    "orderby"           =>  "post__in",
    "paged"             =>  $paged,

);

$_p = new WP_Query($args);

while($_p->have_posts()): $_p->the_post(); ?>

    <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php endwhile;
wp_reset_query();
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pagination">
            <?php echo paginate_links( array( 
                "total" =>  $_p->max_num_pages,
                "current"=> $paged,
                "prev_next"=> false
            ) ); ?>
            </div>
        </div>
    </div>
</div>

<?php 
get_footer();