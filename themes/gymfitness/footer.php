  <div class="site-footer contenedor">
    <hr>
    <div class="contenido-footer">
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
      <p class="copyright">&copy;Todos los derechos reservados. <?php echo get_bloginfo('name') ." ".date('Y'); ?></p>
    </div>
  </div>
  <?php  wp_footer(); ?>
  </body>
</html>
