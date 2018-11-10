<!DOCTYPE html>
<!-- Pega a linguagem usada no admin do wordpress, com está pt-BR então pega portugues mas se mudasse no admin para ingles aqui ficaria em ingles por exemplo -->
<html <?php language_attributes(); ?>>
<head>
	<!-- Pega o charset dinamicamente -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width"> 
	<!-- no wordpress a tag title é incluida no arquivo functions.php -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<header>
		<section class="top-bar">
			<div class="container">
				<div class="row">
					<div class="social-media-icons col-xl-9 col-sm-7 col-6">
						<?php 
							if( is_active_sidebar( 'social-media' ) ){
								dynamic_sidebar( 'social-media' );
							}
						?>
					</div>
					<div class="search col-xl-3 col-sm-5 col-6 text-right"><?php get_search_form(); ?></div>
				</div>
			</div>	
		</section>
		<section class="menu-area">
			<div class="container">
				<!-- https://getbootstrap.com.br/docs/4.1/utilities/flex/ -->
				<div class="row d-flex align-items-center">
						<section class="logo col-md-2 col-12 text-center">
							<?php
								the_custom_logo(); //chama o logo informado no customizer
							?>
						</section>
						<nav class="main-menu col-md-10 text-right">
							<!-- Chamo o menu através do método wp_nav_menu, preciso informar qual menu eu quero pois posso ter vários, é por isso que precisamos do slug e informamos o slug my_main_menu.
							Podemos perceber que no caso de dispositivos extra pequenos a logo terá 12 colunas e o menu não tem colunas nesse caso, pois em casos como esse de dispositivos móveis vamos usar um plugin que deixa o menu responsivo  -->
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'my_main_menu'
									)
								);
							?>
						</nav>
				</div>
			</div>
		</section>
	</header>