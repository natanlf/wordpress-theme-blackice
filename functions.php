<?php
//Incluindo os arquivos da TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

// Requerendo o arquivo do Customizer
require get_template_directory() . '/inc/customizer.php';

 function load_scripts(){
 	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all' );
	wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
	
	//Flexslider
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider/flexslider.css', array(), null, 'all');
	wp_enqueue_script( 'flexsliderjqmin', get_template_directory_uri(). '/flexslider/jquery.flexslider-min.js', array('jquery'), null, false);  
	wp_enqueue_script( 'flexslider', get_template_directory_uri(). '/flexslider/flexslider.js', array('jquery'), null, false);

	//top button
	wp_enqueue_script( 'top-button', get_template_directory_uri(). '/top-button/top-button.js', array('jquery'), null, false);

	//Google icons
	wp_enqueue_script( 'font-awesome', get_template_directory_uri(). '/fontawesome/fontawesome-free-5.9.0-web/js/all.min.js', array(), '5.0.9', true );
}
	add_action('wp_enqueue_scripts', 'load_scripts'); 

	function wpblackice_config(){
		register_nav_menus(
		array(
			'my_main_menu' => __( 'Main Menu', 'wpwordpress' )
		)
	);
		$args = array(
			'height'	=> 225,
			'width'		=> 1920
		);
		add_theme_support( 'custom-header', $args );
		//Agora podemos definir uma imagem para cada post
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('video', 'image'));
		add_theme_support( 'title-tag'); //adiciona a tag title no wordpress, tag importante no SEO
		//logo qe pose ser alterada pelo customizer
		add_theme_support( 'custom-logo', array( 'height' => 110, 'width' => 200 ) );

		// Habilitando suporte à tradução
		$textdomain = 'wpwordpress';
		load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' ); //tema filho
		load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' ); //tema pai
	}
	add_action( 'after_setup_theme', 'wpblackice_config', 0 );

	// Registrando Sidebars
add_action( 'widgets_init', 'wpblackice_sidebars' );

function wpblackice_sidebars(){
	register_sidebar(
		array(
			'name' =>  __( 'Home Page Sidebar', 'wpwordpress' ),
			'id' => 'sidebar-1',
			'description' => __( 'Sidebar to be used on Home Page', 'wpwordpress'),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Blog Sidebar', 'wpwordpress'),
			'id' => 'sidebar-2',
			'description' =>  __( 'Sidebar to be used on Blog Page', 'wpwordpress'),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	

	//Sidebars dos serviços
	register_sidebar(
		array(
			'name' => __( 'Services 1', 'wpwordpress' ),
			'id' => 'services-1',
			'description' => __( 'First Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	
 	register_sidebar(
		array(
			'name' =>  __( 'Services 2', 'wpwordpress' ),
			'id' => 'services-2',
			'description' => __( 'Second Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	
 		register_sidebar(
		array(
			'name' => __( 'Services 3', 'wpwordpress' ),
			'id' => 'services-3',
			'description' => __( 'Third Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	
	register_sidebar(
		array(
			'name' => __( 'Social Icons', 'wpwordpress' ),
			'id' => 'social-media',
			'description' => __( 'Place your media icons here', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	
}
?>