<?php get_header(); 

get_template_part( 'template-parts/hero' );
?>
<div class="posts">
    
    <div <?php post_class(array("post")); ?>>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                
                <?php if(have_posts()): ?>
                    <h2>Posts in 

                    <?php 
                    $month = esc_html(get_query_var("monthnum"));
                    $year = esc_html(get_query_var("year"));
                    $date = esc_html(get_query_var("day"));
                    

                    if(is_month()){
                        $obj = DateTime::createFromFormat("!m", $month);
                        echo $obj->format("F");
                    }else if(is_year()){
                        echo $year;
                    }else if(is_day()){
                        printf("%s/%s/%s", $day, $month, $year);
                    }
                    ?>
                    </h2>
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