<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<section class="no-results not-found">
	<div class="page-content">
		<?php
		if ( is_search() ) :
			?>
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Nothing Found'); ?></h1>
			</header><!-- .page-header -->

			<div class="text-center">
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
			<?php
			get_search_form();
			?>
			</div>
			<?php
		else :
			?>

			<p class="text-center"><?php _e( 'There is blog posts published yet.'); ?></p>
			<?php
		 

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
