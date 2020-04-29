<?php

/**Para consultas reutilizables**/
require get_template_directory() . '/inc/queries.php';

/**Para shortcodes**/
require get_template_directory() . '/inc/shortcodes.php';

/*Cuando el tema es habilitado*/
function gymfitnees_setup(){
  //habilitar la imagen Principal
  add_theme_support('post-thumbnails');

  //Titulo seo
  add_theme_support('title-tag');

  //Tama;os personalizados
  add_image_size( 'square', 350, 350, $crop = true );
  add_image_size( 'portrait', 350, 724, $crop = true );
  add_image_size( 'cajas', 400, 375, $crop = true );
  add_image_size( 'mediano', 700, 400, $crop = true );
  add_image_size( 'blog', 966, 644, $crop = true );
}
add_action('after_setup_theme', 'gymfitnees_setup');

/*Funcion para mostrar o agregar menu*/
function gym_menus(){
  register_nav_menus( array(
    /*El primero es el nombre a nivel de variable, los guiones es para decir
    que puede ser traducido y por ultimo es el nombre para mostrar en la interfaz,
    ademas del domain name*/
    'menu-principal' => __( 'Menu Principal', 'gymfitness' )
  ));
}

/*hook para agregar en la pag. El init es para decir que es cuando se cargue
la pag. Y el otro pararmetro llama a la funcion */
add_action( 'init', 'gym_menus' );

/*Funcion para enlazar hoja de estilo*/
function gym_scripts_styles(){
  //agregando el normalize
  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

  //Agregando google font
  wp_enqueue_style( 'googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Raleway|Staatliches&display=swap', array(), '1.0.0');
  wp_enqueue_style( 'slickNavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

  /*Estilos de Lightbox*/
  /*Si esta en pagina en galeria va cargar este archivo*/
  if(is_page('galeria')):
    wp_enqueue_style( 'lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.0');
  endif;

  /*Slider*/
  if(is_page('inicio')):
    wp_enqueue_style( 'bxSliderCSS', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css", array(), '4.2.12');
  endif;
  /*Estilos de Mapa en contacto*/
  /*Si esta en pagina en contacto va cargar este archivo*/
  if(is_page('contacto')):
    wp_enqueue_style( 'leaftletCSS', "https://unpkg.com/leaflet@1.6.0/dist/leaflet.css", array(), '1.6.0');
  endif;
  //Scripts y gym_scripts_styles
  wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');//Se agrega normalize en el array para mencionar que debe cargar primero ese antes de la hoja personalizada de stilos.
  wp_enqueue_script( 'slickNavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script( 'scriptsCustom', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);
  /*Solo si esta en galeria carga el script del Lightbox*/
  if(is_page('galeria')):
    wp_enqueue_script( 'LightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.0', true);

  endif;
  /*Solo si esta en contacto carga el script del Lightbox*/
  if(is_page('contacto')):
    wp_enqueue_script( 'leafletJS', "https://unpkg.com/leaflet@1.6.0/dist/leaflet.js", array('jquery'), '1.6.0', true);
    
  endif;

  /*Script Slider*/
  if(is_page('inicio')):
    wp_enqueue_script( 'bxSliderJS', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js", array(), '4.2.12', true);

  endif;

}
add_action( 'wp_enqueue_scripts', 'gym_scripts_styles' );


function gym_widgets(){
  register_sidebar( array(
      'name'=>'Sidebar 1',
      'id'=>'sidebar_1',
      'before_widget'=>'<div class="widget sidebar">',
      'after_widget'=>'</div>',
      'before_title'=>'<h3 class="txt_center txt_primary">',
      'after_title'=>'</h3>'
  ));
  register_sidebar( array(
      'name'=>'Sidebar 2',
      'id'=>'sidebar_2',
      'before_widget'=>'<div class="widget sidebar">',
      'after_widget'=>'</div>',
      'before_title'=>'<h3 class="txt_center txt_primary">',
      'after_title'=>'</h3>'
  ));
}
add_action('widgets_init', 'gym_widgets');

//Contar cuantos posts existen
function count_posts(){
  global $wp_query;
  return $wp_query -> post_count;
  wp_reset_postdata();
}

/*hook para agregar en la pag. El init es para decir que es cuando se cargue
la pag. Y el otro pararmetro llama a la funcion */
add_action( 'init', 'count_posts' );

//Inyectar por PHP estilos de css
function gymfitness_hero_image(){
  //Obtener de manera dinamica el id de la pagina de inicio
  $front_page_id= get_option('page_on_front');
  //Obtener id de la image
  $imagen_id= get_field('imagen_hero', $front_page_id);
  //Obtener imagen
  $imagen = wp_get_attachment_image_src( $imagen_id, 'full')[0];

  /*Style CSS en el cual se "crea" una pagina de estilo ficticia el cual inyectara
   en el codigo CSS, el false hace que no requiera una hoja de estilo aparte*/
   wp_register_style( 'custom', false);
   wp_enqueue_style( 'custom');

   //Inyectar el estilo
   $imagen_destacada_css = "
    body.home .site-header{
      background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url($imagen);
    }
   ";

   /*Funcion para inyectar en linea el codigo, donde te dice de donde proviene
    y de donde obtiene las lineas de estilo  estilo*/
   wp_add_inline_style( 'custom', $imagen_destacada_css );
}
add_action( 'init', 'gymfitness_hero_image');
