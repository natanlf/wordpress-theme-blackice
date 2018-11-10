<article <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 275, 275 ) ); ?></a>
	<div class="meta-info">
		<p><?php _e( 'Published in', 'wpwordpress' ); ?> <?php echo get_the_date(); ?> <?php _e( 'by', 'wpwordpress' ); ?> <?php the_author_posts_link(); ?></p>
		<p><?php _e( 'Categories:', 'wpwordpress' ); ?> <?php the_category( ' ' ); ?></p>
		<p><?php the_tags( __( 'Tags: ', 'wpwordpress' ), ', ' ); ?></p>
	</div>
	<?php the_content(); ?>
</article> 