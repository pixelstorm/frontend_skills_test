<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
			?>
		</header><!-- .page-header -->

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'excerpt' );

		endwhile;

		// Previous/next page navigation.
		the_posts_pagination( array(
			'type' 		=> 'array',
			'mid_size' => 1,
			'screen_reader_text' => ' ',
			'prev_text' => __( 'Previous Page' ),
			'next_text' => __( 'Next Page'  )
		));
	else :
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
get_footer();
