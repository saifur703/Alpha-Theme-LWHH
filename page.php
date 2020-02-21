<?php get_header(); 

get_template_part( 'template-parts/hero' );
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php the_title(); ?></h2>
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>