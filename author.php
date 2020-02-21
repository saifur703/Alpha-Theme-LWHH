<?php get_header(); 
    get_template_part( 'template-parts/hero' );
?>

<div class="posts">
    <div <?php post_class(array("post")); ?>>

        <div class="container">
        <div class="row author-section">
            <div class="col-md-2">
                <div class="author">
                    <?php echo get_avatar(get_the_author_meta("ID")); ?>
                </div>
            </div>
            <div class="col-md-10">
                <div class="author-desc">
                    <h2>
                        <?php echo get_the_author_meta("display_name"); ?>
                    </h2>
                    <p><?php echo get_the_author_meta("nicename"); ?></p>
                    <p><?php echo get_the_author_meta("description"); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            
            <?php if(have_posts()): ?>
                <h2>Posts Under <strong><?php single_tag_title();?></strong> </h2>
            <?php while(have_posts()): the_post(); ?>

                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php endwhile; endif; ?>
            </div>
        </div>
        </div>
    </div>
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