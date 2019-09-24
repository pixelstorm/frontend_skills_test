<div id="post-<?php the_ID(); ?>" class="post-preview">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<h2 class="post-title">
 			<?php the_title(); ?>
		</h2>
		<?php 
			if (!empty(get_the_excerpt())) :
				printf('<h3 class="post-subtitle">%s</h3>', get_the_excerpt());
			endif; 
		?>
	</a>
	<p><?php site_post_meta(); ?></p> 
</div>
<!-- #post-<?php the_ID(); ?> -->