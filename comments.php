
<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

$pota_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area comments anchor">
    
    <?php if ( have_comments() ) : ?>

        <div class="comments-header">
            <h5><i class="fa fa-comment-o m-r-5"></i> Comments (<?php echo $pota_comment_count ?>)</h5>
            <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Sorted by Best <span class="caret"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item active" href="#">Best</a>
                    <a class="dropdown-item" href="#">Latest</a>
                    <a class="dropdown-item" href="#">Oldest</a>
                    <a class="dropdown-item" href="#">Random</a>
                </div>
            </div>
        </div>

        <a class="btn btn-primary text-left m-t-15 btn-block" href="#comments" role="button"> Load more 4 comments</a>

        <?php //the_comments_navigation() ?>

        <?php
        /* =======================================================================
         * Comment List
         * 
         * ===================================================================== */
        ?>
        <ul class="comment-list">
            <?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
        </ul><!-- .comment-list -->

        <?php //the_comments_navigation() ?>

        <?php 
        // If comments are closed 
        if ( ! comments_open() ) :
            ?>
            <a class="btn btn-warning text-left m-t-15 btn-block" href="#comments" role="button"> Load more 4 comments</a>
            <?php
        endif;

    endif; // Check for have_comments().

    /* =======================================================================
     * Comment Form template
     * 
     * ===================================================================== */

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required = ( $req ? " required" : '' );

    $fields =  array(
      'author' =>
        '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . $required.'/></p>',

      'email' =>
        '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . $required.' /></p>',

      'url' =>
        '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" /></p>',
    );

    $args = array(
      'id_form'           => 'commentform',
      'class_form'      => 'comment-form',
      'id_submit'         => 'submit',
      'class_submit'      => 'submit',
      'name_submit'       => 'submit',
      'title_reply'       => __( '<h5>Leave a comment</h5>' ),
      'title_reply_to'    => __( 'Leave a Reply to %s' ),
      'cancel_reply_link' => __( 'Cancel Reply' ),
      'label_submit'      => __( 'Post Comment' ),
      'format'            => 'xhtml',

      'comment_field' =>  '<p class="comment-form-comment">
            <div class="form-group">
                <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true" placeholder="Your Comment">' . '</textarea>
            </div>
        </p>',

      'must_log_in' => '<p class="must-log-in">' .
        sprintf(
          __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

      'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
          admin_url( 'profile.php' ),
          $user_identity,
          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',

      'comment_notes_before' => '<p class="comment-notes">' .
        __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
        '</p>',

      'comment_notes_after' => '',
      'label_submit' => 'Submit Comment',
      'class_submit' => 'btn btn-primary',
      'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );

    comment_form( $args, $post->ID ) ?>

</div><!-- #comments -->

<?php
function mytheme_comment($comment, $args, $depth) {
	?>
    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body comment">
	       
	        <div class="comment-author vcard comment-avatar">
	            <a href="#">
	            	<img src="<?php echo get_template_directory_uri() . '/src/img/user/user-1.jpg' ?>" alt="">
	            </a>
	        </div>
	        
	        <div class="comment-post">
		       
		        <div class="comment-meta commentmetadata">
		        	<div class="comment-header">
		        		<div class="comment-author">
		        			<h5><?php echo get_comment_author_link() ?></h5>
		        			<span>Member</span>
		        			<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
		        		</div>
		        	</div>
		        </div>
		        <?php comment_text(); ?>

                <div class="comment-footer">
        			<ul>
        				<li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
        				<li class="reply">
        					<a href="#"><i class="icon-reply"></i> 
        						<?php comment_reply_link( 
        							array_merge( 
        								$args, 
        								array( 
        									'add_below' => $add_below, 
        									'depth'     => $depth, 
        									'max_depth' => $args['max_depth'] 
        								) 
        							) 
        						) ?>
        					</a>
        				</li>
        				<li>
        					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        						<i class="fa fa-clock-o"></i>
        						<?php printf( 
        							__('%1$s %2$s'), 
        							get_comment_date(),  
        							get_comment_time() 
        						); ?>
        					</a>
        				</li>
        			</ul>
        		</div>

	        </div>
    	</div>
    </li>
<?php } ?>