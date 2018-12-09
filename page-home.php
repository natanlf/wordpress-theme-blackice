<?php get_header(); ?>
	<button onclick="topFunction()" id="btnTop" title="Voltar ao top">Top</button>
	<div class="content-area">
		<main>
			<section class="slide">
				<!--Uso do plugin que exibe os slides com posts recentes-->
				<!--?php echo do_shortcode('[recent_post_slider design="design-2" limit="4" category="3,6"]'); ?-->
				<?php 
					$design = get_theme_mod('set_slider_option');
					$limit = get_theme_mod('set_slider_limit');
					$category = get_theme_mod('set_slider_categories');
					echo do_shortcode('[recent_post_slider design="design-'.$design.' " limit="'.$limit.'" category='. $category.'"]');
				?>
			</section>
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
							<h2><?php _e( 'Latest News', 'wpwordpress' ); ?></h2>
								<div class="row">
									<?php 
									/* Exitem vários tipos de posts do Wordpress, os posts nativos do wordpress são post e page, vamos usar post mesmo. Queremos um post por página, pois será o nosso post em destaque e colocamos a quais categorias queremos que exiba, usamos o id da categoria que pode ser visto no admin=> posts => categorias, ao passar o mouse em cima da categoria, aparece o id no fim da página */
										//$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat=3,8' );
										/*Tenho todas as categorias que informamos no customizer pa ra poder exibir no primeiro loop*/
										$loop1cats = get_theme_mod( 'set_loop1_categories' );
										$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat='.$loop1cats );
										//Se existem posts então mostramos
										if( $featured->have_posts() ):
										while( $featured->have_posts() ): $featured->the_post();
										?>

										<div class="col-12">
											<?php get_template_part( 'template-parts/content', 'featured' ); ?>
										</div>

 										<?php	
										endwhile;
										/*Para que os parametros dessa consulta acima não infuencia outras consultas nessa mesma página, nós teremos que resetar essa consulta quando chegar no final*/
										wp_reset_postdata();
									endif;

									// Segundo Loop
									/*Usamos array para passar os argumentos, assim conforme o número de argumentos aumenta as chances de nos confundirmos é menor, pois fica tudo mais organizado separando por arrays.
									O post_type é opcional, caso não passarmos o wordpress coloca automaticamente como post.
									posts_per_page é a quantidade de post que vamos trazer.
									category__not_in significa quais categorias vamos excluir da listagem
									category__in significa quais categorias queremos que retornem
									offset assim dizemos quantos itens o wordpress deve ignorar no início da lista
									*/
									/*$args = array(
										'post_type' => 'post',
										'posts_per_page' => 4,
										'category__not_in' => array( 6 ),
										'category__in' => array( 3, 8),
										'offset' => 1
									);*/
									$args = array(
										'post_type' => 'post',
										'posts_per_page' => $per_page,
										'category__not_in' => $loop2_cat_exclude,
										'category__in' => $loop2_cat_include,
										'offset' => 1
									);
 									$secondary = new WP_Query( $args );
 									if( $secondary->have_posts() ):
										while( $secondary->have_posts() ): $secondary->the_post();

									?>

									<!-- Teremos 6 colunas para cada post, desde os dispostivos pequenos até os grandes -->
									<div class="col-sm-6">
										<?php get_template_part( 'template-parts/content', 'secondary' ); ?>
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
			<<section class="map">
				<?php 
					$key = get_theme_mod( 'set_map_apikey' );
					/*o endereço pode estar com a formatação errada, por isso vamos usar urlencode,
					assim se houver espaço vazio, caracteres especiais essa função tira*/
					$address = urlencode(get_theme_mod( 'set_map_address' ));
				?>
				<iframe
				  width="100%"
				  height="350"
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key; ?>
				    &q=<?php echo $address; ?>&zoom=15" allowfullscreen>
				</iframe>		
			</section>
		</main>
	</div>
<?php get_footer(); ?> 