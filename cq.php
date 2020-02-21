<?php 

/* 
    Template Name: CQ
*/

get_header();
get_template_part("template-parts/hero");
?>

<?php 
$paged = get_query_var( 'paged') ? get_query_var( 'paged') : 1; 
$posts_per_page = 5;
$posts_id = array(1, 55, 57, 13, 15, 17, 53, 34, 31, 48);
$_p = new WP_Query( array(
	'post__in'			=>	$posts_id, // post id
	'orderby'			=>	'post__in', // order by post id
	//'order'				=>	'ASC', // order by A to Z
	'posts_per_page'	=>	$posts_per_page,
	'paged'				=>	$paged // query pagination
));

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