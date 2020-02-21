<div class="footer">
    <div class="container">
        <div class="row">
            <?php if(is_active_sidebar("copyright")): ?>
                <div class="col-md-4">
                    <?php dynamic_sidebar("copyright"); ?>
                </div>
            <?php endif; ?>

            <?php if(is_active_sidebar("footer_right")): ?>
                <div class="col-md-4">
                    <?php dynamic_sidebar("footer_right"); ?>
                </div>
            <?php endif; ?>
            
            
                <div class="col-md-4">
                <?php 
                    wp_nav_menu(array(
                        'theme_location'    =>  'footer_menu',
                        'container'         =>  'div',
                        'menu_class'        =>  'list-inline text-center'
                    ))
                    ?>
                </div>
                
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>