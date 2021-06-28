<?php
		
	if ( post_password_required() ) { ?>
		<div class="bottom-post"><h4><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'lebotheme'); ?></h4></div>
	<?php
		return;
	}
        
?>



	
<!-- Article Discusion -->
<div id="comments" class="post-comments">
	
		<div class="article-head">                            
			<ul class="entry-meta">
				<li><?php comments_number(esc_html__('No Comments', 'lebotheme'), esc_html__('One Comment', 'lebotheme'), esc_html__('% Comments', 'lebotheme'));?></li>
			</ul>
		</div>
			
		<?php if ( have_comments() ) { ?>

			<div class="comments-navigation">
				<div class="alignleft"><?php previous_comments_link(); ?></div>
				<div class="alignright"><?php next_comments_link(); ?></div>
			</div>

			<div class="container">
				<?php wp_list_comments('callback=lebotheme_comment&style=div'); ?>
			</div>
					
			<div class="comments-navigation">
				<div class="alignleft"><?php previous_comments_link(); ?></div>
				<div class="alignright"><?php next_comments_link(); ?></div>
			</div>

		<?php } // if have comments ?>

		<?php if ( !comments_open() ) { ?>
		<!-- If comments are closed. -->
		<h5><?php esc_html_e('Comments are closed.', 'lebotheme'); ?></h5>
		<?php } ?>

</div>
<!-- Article Discusion -->




<?php if ( comments_open() ) { ?>

	<!-- Post Comments Formular -->
	<div class="post-form">

<?php  

        $lebotheme_class_message_area = '';
        if( is_user_logged_in() ){

            $lebotheme_class_message_area = 'comment_area_loggedin';
        }

        $lebotheme_comment_id = "comment";
                            
        $lebotheme_commentform_args = array(
                        'id_form'           => 'commentsform',
						'class_form'      	=> 'comment-form',
						'id_submit'         => 'submit',
                        'title_reply'       => '<div class="article-head"><ul class="entry-meta"><li>'. wp_kses_post( esc_html__( 'Leave a comment', 'lebotheme') ) . '</li></ul></div>',
                        'title_reply_to'    => '<div class="article-head"><ul class="entry-meta"><li>'. wp_kses_post( esc_html__( 'Leave a comment to %s ', 'lebotheme') ) . '</li></ul></div>',
                        'cancel_reply_link' => '<span class="cancel-reply">'. wp_kses_post( esc_html__( 'Cancel Reply', 'lebotheme') ) . '</span>',
                        'label_submit'      => wp_kses_post( esc_html__( 'Post Comment', 'lebotheme') ),
						'submit_button'		=> '<div class="button-box"><div class="clapat-button-wrap parallax-wrap hide-ball"><div class="clapat-button parallax-element"><div class="button-border outline rounded parallax-element-second"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div></div></div></div>',
						'submit_field'		=> '<div class="form-submit">%1$s %2$s</div>',

                        'comment_field' =>  '<div class="message-box hide-ball ' . sanitize_html_class( $lebotheme_class_message_area ) . '"><textarea id="' . esc_attr( $lebotheme_comment_id ) . '" name="comment" onfocus="if(this.value == \'' . esc_attr__( 'Comment', 'lebotheme') .'\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'' . esc_attr__( 'Comment', 'lebotheme') .'\'; }" >' . esc_html__( 'Comment', 'lebotheme') .'</textarea><label class="input_label slow"></label></div>',

                        'must_log_in' => '<p class="must-log-in">' .
                                         sprintf(
                                        wp_kses_post( __( '<h4>You must be <a href="%s">logged in</a> to post a comment.</h4>', 'lebotheme') ),
                                        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                                        ) . '</p>',
            
                        'comment_notes_before' => '',

                        'comment_notes_after' => '',
            
                        'fields' => apply_filters( 'comment_form_default_fields', array(

                                                    'author' => '<div class="name-box hide-ball"><input name="author" type="text" id="author" size="30"  onfocus="if(this.value == \'' . esc_attr__( 'Name', 'lebotheme') .'\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'' . esc_attr__( 'Name', 'lebotheme') .'\'; }" value=\'' . esc_attr__( 'Name', 'lebotheme') . '\' ><label class="input_label"></label></div>',

                                                    'email' =>  '<div class="email-box hide-ball"><input name="email" type="text" id="email" size="30"  onfocus="if(this.value == \'' . esc_attr__( 'E-mail', 'lebotheme') .'\') { this.value = \'\'; }" onblur="if(this.value == \'\') { this.value = \'' . esc_attr__( 'E-mail', 'lebotheme') .'\'; }" value=\'' . esc_attr__( 'E-mail', 'lebotheme') . '\' ><label class="input_label"></label></div>',

                                                    'url' => ''
                                                    )
                                                )
                    );
                
        comment_form( $lebotheme_commentform_args );

?>
        </div>
		<!-- /Post Comments Formular -->
<?php

} // if comments are open
?>