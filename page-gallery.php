<?php 
/*
Template Name: Gallery Home
*/
?>

<?php get_header(); ?>
	<div class="content-area">
		<main>
		<?php include 'template-parts/flex-slider.php' ?>
			<section class="services">
				<div class="container">
					<h2><?php _e( 'Our Services', 'wpwordpress' ); ?></h2>
					<div class="row">
							<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-1' )){
									dynamic_sidebar( 'services-1' );
								}
 								?>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-2' )){
									dynamic_sidebar( 'services-2' );
								}
 								?>
							</div>
						</div>
 						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-3' )){
									dynamic_sidebar( 'services-3' );
								}
 								?>
							</div>
						</div>
					</div>
				</div>				
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<div class="news col-md-8">
						<div class="container">
							<!--<h2><?php _e( 'Latest News', 'wpwordpress' ); ?></h2>-->
								<div class="row">
									<?php 
									// Segundo Loop
	
									$args = array(
										'post_type' => 'post',
										'posts_per_page' => $per_page,
										'category__not_in' => $loop2_cat_exclude,
										'category__in' => $loop2_cat_include,
										'offset' => 0
									);
 									$secondary = new WP_Query( $args );
 									if( $secondary->have_posts() ):
										while( $secondary->have_posts() ): $secondary->the_post();

									?>

									<!-- Teremos 6 colunas para cada post, desde os dispostivos pequenos até os grandes -->
									<div class="col-sm-12">
										<?php get_template_part( 'template-parts/content', 'small' ); ?>
									</div>
 									<?php
										endwhile;
										wp_reset_postdata();
									endif;									
									?>
								</div>
							</div>
 						</div>	
 						<?php get_sidebar( 'home' ); ?>					
					</div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?> 