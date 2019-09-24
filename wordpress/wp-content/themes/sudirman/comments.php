<?php

if ( post_password_required() ) {
	return;
}

$discussion = ideafortune_get_discussion_data();
?>
<section id="comments"  class="<?php echo comments_open() ? 'blog-comments-list comments-area' : 'comments-area comments-closed'; ?> blog-comments">
<div class="container">
	<div class="blog-comments-form">
		<h4 id="reply-title" class="comment-reply-title"><span class="wrap">Leave a Reply</span></h4>
		<?php ideafortune_comment_form( true ); ?>
	</div>

	<div class="blog-comments-list">

		<h4 class="comments-title">
		<?php
		if ( comments_open() ) {
			if ( have_comments() ) {
				_e( 'Join the Conversation', 'ideafortune' );
			} else {
				_e( 'Leave a comment', 'ideafortune' );
			}
		} else {
			if ( '1' == $discussion->responses ) {
				/* translators: %s: post title */
				printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'ideafortune' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s reply on &ldquo;%2$s&rdquo;',
						'%1$s replies on &ldquo;%2$s&rdquo;',
						$discussion->responses,
						'comments title',
						'ideafortune'
					),
					number_format_i18n( $discussion->responses ),
					get_the_title()
				);
			}
		}
		?>
		</h4><!-- .comments-title -->
 
		
	<?php
		if ( have_comments() ) :
			?>
			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'walker'      => new ideafortune_Walker_Comment(),
						'avatar_size' => ideafortune_get_avatar_size(),
						'short_ping'  => true,
						'style'       => 'ol',
					)
				);
				?>
			</ol><!-- .comment-list -->
			<?php

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments">
					<?php _e( 'Comments are closed.', 'ideafortune' ); ?>
				</p>
				<?php
			endif;
		endif; // if have_comments();
		?>
	</div>
 
</div>
</section>
 