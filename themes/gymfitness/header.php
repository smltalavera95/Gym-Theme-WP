<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
  </head>
  <body>
  <header class="site-header">
    <div class="contenedor">
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

      </div>
    </div>
  </header>
