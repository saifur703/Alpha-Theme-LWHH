<?php  
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

/* Comment Query */
$args = array( 
    "status"    =>  "approve",
    "post_id"   =>  get_the_ID(),
);
$comments_query = new WP_Comment_Query();
$comments = $comments_query->query($args);


 ?>

    <div id="comments" class="comments">
        <?php $comments_number = get_comments_number(); ?>

        <div class="comments-header">
            <h2 class="comments-reply-title">
                <?php 

                    if ( ! have_comments() ) {
                        _e( 'Leave a comment', 'alpha' );
                    }elseif ( '1' === $comments_number ) {
                        printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'alpha' ), esc_html( get_the_title() ) );
                    } else {
                        echo sprintf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s reply on &ldquo;%2$s&rdquo;',
                                '%1$s replies on &ldquo;%2$s&rdquo;',
                                $comments_number,
                                'comments title',
                                'alpha'
                            ),
                            number_format_i18n( $comments_number ),
                            esc_html( get_the_title() )
                        );
                    }

                ?>
            </h2>
        </div>
        <div class="comments-inner">
            <?php 
            foreach($comments as $comment){ ?>
            
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                        <?php echo get_avatar($comment, null, null, " ", array("class"=> "img img-rounded img-fluid")); ?>
                        
                            
                            <p class="text-secondary text-center"><?php echo get_comment_date(); ?></p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?php echo comment_author($comment); ?></strong></a>

                        </p>
                        <div class="clearfix"></div>
                            <?php comment_text($comment); ?>
                            <p>
                                <a href="" class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> <?php _e("Reply");?></a>
                                
                                
                        </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 
            }

            if ( comments_open() || pings_open() ) {
                if ( $comments ) {
                    echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
                }
                comment_form(
                    array(
                        'class_form'         => 'comment-form',
                        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                        'title_reply_after'  => '</h2>',
                    )
                );
            }elseif ( is_single() ) {

                if ( $comments ) {
                    echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
                }
            
                ?>
            
                <div class="comment-respond" id="respond">
            
                    <p class="comments-closed"><?php _e( 'Comments are closed.', 'alpha' ); ?></p>
            
                </div><!-- #respond -->
            
                <?php
            }
            ?>
        </div>
    </div>

<?php 