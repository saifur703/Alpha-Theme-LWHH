<?php get_header(); 
    get_template_part( 'template-parts/hero' );
?>

<div class="posts">
<?php 

if(! have_posts()){
    echo "<h2 class='text-center'>No Post Found</h2>";
} 

?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div <?php post_class(array("post")); ?>>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
</div>

<div class="container post_pagination">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <?php the_posts_pagination(array(
                "screen_reader_text"    => " ",
                "prev_text"             => __("Back", "alpha"),
                "next_text"             =>  __("Next", "alpha"),
            )); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>