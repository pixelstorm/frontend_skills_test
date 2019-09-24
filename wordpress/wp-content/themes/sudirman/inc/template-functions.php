<?php
function site_wp_head() {
	if (function_exists('get_field')):
		if ($footer_embed_codes = get_field('embed_codes_header','options')):
			foreach ($footer_embed_codes as $embed_codes):
			?>
			<!-- <?php echo $embed_codes['label'];?> -->
			<?php echo $embed_codes['codes'];?>
			<?php
			endforeach;
		endif;
	endif; 
}
add_action( 'wp_head', 'site_wp_head' );



function site_wp_footer() {
	if (function_exists('get_field')):
		if ($footer_embed_codes = get_field('embed_codes_footer','options')):
			foreach ($footer_embed_codes as $embed_codes):
			?>
			<!-- <?php echo $embed_codes['label'];?> -->
			<?php echo $embed_codes['codes'];?>
			<?php
			endforeach;
		endif;
	endif; 
}
add_action( 'wp_footer', 'site_wp_footer' );



function site_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'singular';
	} else {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'site_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 */
function site_post_classes( $classes, $class, $post_id ) {
	$classes[] = 'entry';

	return $classes;
}
add_filter( 'post_class', 'site_post_classes', 10, 3 );

 
/**
 * Filters the default archive titles.
 */
function site_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'site' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'site' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'site' ) . '<span class="page-description">' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'site' ) . '<span class="page-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'site' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'site' ) . '<span class="page-description">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'site' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'site' ) . '<span class="page-description">' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = __( 'Post Type Archives: ', 'site' ) . '<span class="page-description">' . post_type_archive_title( '', false ) . '</span>';
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: %s: Taxonomy singular name */
		$title = sprintf( esc_html__( '%s Archives:', 'site' ), $tax->labels->singular_name );
	} else {
		$title = __( 'Archives:', 'site' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'site_get_the_archive_title' );
 

 
if ( ! function_exists( 'site_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function site_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<div class="posted-on"><span class="ic"><i class="far fa-calendar"></i></span>%1$s</div>',
			$time_string
		);
	}	
endif;

if ( ! function_exists( 'site_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function site_posted_by() {
		printf(
			'<div class="post-author"><a href="%1$s">%2$s</a></div>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'site_post_meta' ) ) :
 
	function site_post_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		if (is_singular()) {
			$author_id = get_queried_object()->post_author;
			$author_name = get_the_author_meta('display_name', $author_id);

			printf(
				'<span class="meta">Posted by <a href="%1$s">%2$s</a> on %3$s</span>',
				esc_url( get_author_posts_url( $author_id ) ),
				esc_html( $author_name ),
				$time_string
			);
		} else {
			printf(
				'<p class="post-meta">Posted by <a href="%1$s">%2$s</a> on %3$s</p>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() ),
				$time_string
			);
		}		
	}
endif;