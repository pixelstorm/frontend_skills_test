<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>
 
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php _e( 'Search results for:' ); ?>
				</h1>
				<div class="page-description"><?php echo get_search_query(); ?></div>
			</header><!-- .page-header -->

			<?php
			 
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
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
