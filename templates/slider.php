<?php  

/* 
* Template Name: Slider
*/
get_header();
get_template_part( 'template-parts/hero' ); 
?>

<?php if ( class_exists( 'Attachments' ) ): 

$sliders = new Attachments("slider");

if($sliders->exist()) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Sliders</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="slider">
                <?php   
                    while($slider = $sliders->get()):
                ?>
                <div class="single-slider">
                    <?php echo $sliders->image("large") ?>
                    <h3><?php echo $sliders->field("title"); ?></h3>
                    <p><?php echo $sliders->field("description"); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; endif;

get_footer();