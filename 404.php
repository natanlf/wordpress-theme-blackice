<?php get_header(); ?>
 <img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
 	<div class="content-area">
		<main>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						
						<div class="error-404">
						
						<header>
							<h2><?php _e( 'Page not found', 'wpwordpress' ); ?></h2>
							<p><?php _e( 'Unfortunately, the page you tried to reach does not exist on this site!', 'wpwordpress' ); ?></p>
						</header>
						<!-- Como a página não existe então dou a opção do usuário fazer uma busca e também exibimos os 3 posts recentes -->
						<div class="error">
							<p>How about doing a search?</p>
							<?php get_search_form(); ?>
							<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => 'Latest Posts', 'number' => 3 ) ); ?>
						</div>
 						</div>
											
					</div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?> 