<?php  

/* 
Template Name: About Page
*/

 get_header(); 
 get_template_part( 'template-parts/hero-page' ); 



?>
<div class="posts">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div <?php post_class(array("post")); ?>>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>

                    <?php if(has_post_thumbnail()): ?>
                    <p>
                        <?php the_post_thumbnail("large", array("class"=>"img-fluid")); ?>
                    </p>

                    
                    <?php endif; 
                    
                    the_content();
                    
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php endwhile; endif; ?>
</div>


<?php get_footer(); ?>