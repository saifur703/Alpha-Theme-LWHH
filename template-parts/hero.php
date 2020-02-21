<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h3 class="tagline"><?php bloginfo("description"); ?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                <?php 
                    if(current_theme_supports('custom-logo')){
                    if(has_custom_logo()){
                        the_custom_logo();
                    }else { ?>
                        <a href="<?php echo site_url(); ?>"><?php bloginfo("name"); ?></a>
                   <?php  }
                    }
                ?>
                    
            </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="site-navigation">
                    <?php 
                    wp_nav_menu(array(
                        'theme_location'    => 'primary_menu',
                        'container'         =>  'div',
                        'menu_class'        =>  'list-inline text-center'
                    ))
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <?php

                if(is_search()){ 
                     _e("You Search For: ", "alpha");
                     
                    the_search_query();
                }
                ?>
                <?php echo get_search_form( ); ?>
            </div>
        </div>
    </div>
</div>