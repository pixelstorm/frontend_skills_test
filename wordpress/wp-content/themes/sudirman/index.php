<?php
get_header();

if ( have_posts() ) {
	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/content' ,'excerpt' );
	}

	// Previous/next page navigation.
	the_posts_pagination( array(
		'type' 		=> 'array',
		'mid_size' => 1,
		'screen_reader_text' => ' ',
		'prev_text' => __( 'Previous Page' ),
		'next_text' => __( 'Next Page'  )
	));
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content', 'none' );

}
get_footer();
