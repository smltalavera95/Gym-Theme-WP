<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <header class="site-header">
    <div class="contenedor header-grid">
      <div class="barra-navegadora">
        <div class="logo">
          <a href="<?php echo esc_url(site_url('/'));?>">
            <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="">
          </a>
        </div>

        <?php
        /*En donde va mostrarlo, y si esta seleccionado va mostrarlo en
        el header. Container, es para generar la etiqueta html.
        Container class es la clase css que va llevar*/
          $args= array(
            'theme_location' => 'menu-principal',
            'container' => 'nav',
            'container_class' => 'main-menu'
          );
          /*Pasa los argumentos para crear el menu*/
          wp_nav_menu( $args );
        ?>

      </div><!--Cierre de menu de navegacion-->
      <div class="tagline txt_center">
        <!--The field va llamar la variable que este adentro-->
        <h1><?php the_field('titulo_hero'); ?></h1>
        <p><?php the_field('contenido_hero');?></p>
      </div>
    </div>
  </header>
