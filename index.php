<?php get_header(); 

get_template_part( 'template-parts/hero' );
?>
<div class="posts">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div <?php post_class(array("post")); ?>>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date(); ?>
                    </p>
                    <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>"); ?>
                   
                </div>
                <div class="col-md-8">
                    <?php if(has_post_thumbnail()): ?>
                    <p>
                        <?php the_post_thumbnail("large", array("class"=>"img-fluid")); ?>
                    </p>
                    <?php endif; ?>

                    <?php 
                    /* if(post_password_required()){
                        echo get_the_password_form();
                    }else{
                    the_excerpt(); 
                    } */

                    /* if(! post_password_required()){
                        the_excerpt();
                    }else{
                        echo get_the_password_form();
                    } */

                    the_excerpt();
                    ?>
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