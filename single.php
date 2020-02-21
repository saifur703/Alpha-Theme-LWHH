<?php get_header(); 

get_template_part( 'template-parts/hero' );
?>

<?php 

$col = "col-md-12";
$text_center = "text-center";
if(is_active_sidebar("sidebar1")){
    $col = "col-md-8";
    $text_center = " ";
}
?>

<div class="posts">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div <?php post_class(array("post")); ?>>

        <div class="container">
            <div class="row">
                <div class="<?php echo $col;?> <?php echo $text_center;?>">
                    <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </div>

                        <div class="col-md-12">
                        <p><strong><?php the_author_posts_link(); ?></strong><br/>
                            <?php echo get_the_date(); ?></p>
                        <h4><a href="<?php echo site_url(); ?>">Go Home</a></h4>
                    
                        </div>

                        <div class="col-md-12">
                            <?php if(has_post_thumbnail()): 
                            $thumbnail_url = get_the_post_thumbnail_url( null, "large" );   
                            ?>
                                <a href="<?php echo $thumbnail_url; ?>" data-featherlight="image">
                            <p>
                                <?php the_post_thumbnail("large", array("class"=>"img-fluid")); ?>
                            </p>
                            </a>
                            <?php endif; ?>

                            <?php the_content(); 
                            
                            wp_link_pages();
                            ?>
                        </div>


                        <?php 
                        
                        if(class_exists("ACF") && get_post_format()=="image"): ?>
                            <div class="col-md-12">
                                <div class="photography-section">
                                    <?php if(get_field("camera_model")){
                                        ?>
                                        <strong>Camera Model: </strong>
                                        <?php echo the_field("camera_model"); 
                                    } 
                                    
                                    if(get_field("location")){
                                        ?>
                                        <br><strong>Location: </strong>
                                        <?php echo the_field("location");
                                    }
                                    if(get_field("date")){
                                        ?>
                                        <br><strong>Date: </strong>
                                        <?php echo the_field("date");
                                    } 
                                    
                                    if(get_field("licensed")){
                                        ?>
                                        <br><strong>License Information: </strong>
                                        <?php 

                                        apply_filters("the_content", the_field("license_information"));
                                    }

                                    // if(get_field("image")){
                                    // $alpha_img_id = get_field("image");
                                    // $alpha_img = wp_get_attachment_image_src( $alpha_img_id, "large");?>
                                    <!-- <img src="<?php echo esc_url($alpha_img[0]); ?>" alt="image"> -->
                                    // <?php 
                                    // }
                                    ?>

                                    <?php
                                    $image = get_field("image");
                                    if($image): ?>
                                    <?php echo wp_get_attachment_image( $image, "medium" ); ?>
                                    <?php endif; ?>

                                    
                                </div>
                            </div>
                        <br>

                        <?php endif;
                        ?>

        <?php  if(class_exists("ACF")): ?>
<div class="col-md-12">
                    <?php 
                    $file = get_field("file");
                    if($file){
                        $file_url = wp_get_attachment_url($file);
                        $file_img = get_field("fileimage", $file);
                        if($file_img){
                            
                           ?>
                           
                            <a href="<?php echo $file_url; ?>" target="_blank"><img src="<?php echo esc_url($file_img["sizes"]["thumbnail"]); ?>" alt="<?php echo $file_img["alt"]; ?>"></a> <br/>
                           <?php 
                        }else { ?>
                            <a href="<?php echo $file_url; ?>" target="_blank"><?php echo $file_url; ?></a>
                        <?php }
                    }
                    ?>
</div>
                <?php endif; ?>

                        <div class="row author-section">
                            <div class="col-md-4">
                                <div class="author">
                                    <?php echo get_avatar(get_the_author_meta("ID")); ?>
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-1">
                                <div class="author-desc">
                                    <h2>
                                        <?php echo get_the_author_meta("display_name"); ?>
                                    </h2>
                                    <p><?php echo get_the_author_meta("description"); ?></p>
                                </div>

                                
                            </div>
                        </div>

                        <div class="col-md-12" style="background-color: #777;">
                        <?php 
                        if(class_exists("ACF")){
                            _e("<h2>Related Posts</h2>", "alpha");
                            $related_posts = get_field("related_posts");
                            $loop = new WP_Query(array( 
                                "post__in"=>    $related_posts,
                                "orderby"   =>  "post__in",
                            ));

                            while($loop->have_posts()): $loop->the_post();
                            ?>
                            <h4><a href=""><?php the_title(); ?></a></h4>
                        <?php endwhile; wp_reset_query();
                        }
                        ?>
                        </div>

                        <div class="col-md-12">
                        <?php 
                        if(class_exists("ACF")): ?> 
                        <div class="author-social">
                            <?php 
                            $user = "user_".get_the_author_meta("ID");
                            $facebook = get_field("facebook", $user);
                            $twitter = get_field("twitter", $user);
                            $linkedin = get_field("linkedin", $user);
                            
                            if($facebook){
                                echo "<a href='" . $facebook ."'>Facebook</a><br/>";
                            }
                            if($twitter){
                                echo "<a href='" . $twitter ."'>Twitter</a><br/>";
                            }
                            if($linkedin){
                                echo "<a href='" . $linkedin ."'>LinkedIn</a>";
                            }
                            ?>
                        </div>
                        <?php endif;
                        ?>
                        </div>

                        <div class="col-md-12">
                            <?php /* if(! post_password_required() && comments_open()){
                                comments_template( );
                            }  */?>


                            <?php  

                            if ( ( is_single() || is_page() ) && 
                            ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
                                ?>

                                <div class="comments-wrapper section-inner">

                                    <?php comments_template(); ?>

                                </div><!-- .comments-wrapper -->

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <?php if(is_active_sidebar("sidebar1")): ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar("sidebar1"); ?>
                    </div>
                <?php endif; ?>

            </div>


            <div class="row">
                <div class="col-md-6">
                    <?php previous_post_link(); 
                    ?>
                </div>
                <div class="col-md-6 text-right">
                    <?php next_post_link(); ?>
                </div>
            </div>

            

        </div>
    </div>
    <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>