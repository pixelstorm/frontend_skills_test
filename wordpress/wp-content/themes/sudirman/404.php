<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?> 
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'sudirman' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sudirman' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .page-content -->
<?php
get_footer();
