<?php get_header('front');?>

<section class="bienvenida seccion txt_center">
  <h2 class="txt_primary"><?php the_field('titulo_de_bienvenida'); ?></h2>
  <p><?php the_field('texto_de_bienvenida');?></p>
</section>

<div class="seccion-areas">
  <ul class="contenedor-areas">

    <li class="area">
      <?php
        $area1 =get_field('area_1');
        $imagen = wp_get_attachment_image_src($area1['imagen_area'], 'mediano') [0];
      ?>
      <img src="<?php echo esc_attr($imagen); ?>" alt="<?php echo esc_html( $area1['texto_area'] );?>">
      <p><?php echo esc_html($area1['texto_area']); ?></p>
    </li>
    <li class="area">
      <?php
        $area2 =get_field('area_2');
        $imagen = wp_get_attachment_image_src($area2['imagen_area'], 'mediano') [0];
      ?>
      <img src="<?php echo esc_attr($imagen); ?>" alt="<?php echo esc_html( $area2['texto_area'] );?>">
      <p><?php echo esc_html($area2['texto_area']); ?></p>
    </li>
    <li class="area">
      <?php
        $area3 =get_field('area_3');
        $imagen = wp_get_attachment_image_src($area3['imagen_area'], 'mediano') [0];
      ?>
      <img src="<?php echo esc_attr($imagen); ?>" alt="<?php echo esc_html( $area3['texto_area'] );?>">
      <p><?php echo esc_html($area3['texto_area']); ?></p>
    </li>
    <li class="area">
      <?php
        $area4 =get_field('area_4');
        $imagen = wp_get_attachment_image_src($area4['imagen_area'], 'mediano') [0];
      ?>
      <img src="<?php echo esc_attr($imagen); ?>" alt="<?php echo esc_html( $area4['texto_area'] );?>">
      <p><?php echo esc_html($area4['texto_area']); ?></p>
    </li>

  </ul>

</div>

<section class="clases">
  <div class="contenedor seccion">
    <h2 class="txt_center txt_primary">Nuestras Clases</h2>

    <?php gymfitness_lista_clases(4); ?>
    <div class="contenedor-boton">
        <a href="<?php echo esc_url(get_permalink(get_page_by_title('Nuestras Clases'))); ?>" class="boton boton-primario">
          Ver Todas las Clases
        </a>
    </div>

  </div>

</section>

<section class="instructores">
  <div class="contenedor seccion">
    <h2 class="txt_center txt_primary"><?php the_field('titulo_instructores');?></h2>
    <p class="txt_center"><?php the_field('texto_instructores');  ?></p>

    <ul class="listado-instructores">
      <?php
        $args = array(
          'post_type' => 'instructores',
          'posts_per_page' => 30
        );
        $instructores = new WP_Query($args);
        while ($instructores->have_posts()): $instructores->the_post();
      ?>

        <li class="instructor">
          <?php the_post_thumbnail( 'mediano' ); ?>
          <div class="contenido txt_center">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>

            <div class="especialidad">
              <?php
                $esp = get_field('especialidad');
                foreach($esp as $e): ?>
                  <span class="etiqueta"><?php echo esc_html($e); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </li>
      <?php  endwhile; wp_reset_postdata();?>
    </ul>
  </div>
</section>

<section class="testimoniales">
  <h2 class="txt_center txt_blanco">Testimoniales</h2>
  <div class="contenedor-testimoniales">
    <ul class="listado-testimoniales">
      <?php
        $args = array(
          'post_type' => 'testimoniales',
          'posts_per_page' => 10
        );
        $testimoniales = new WP_Query($args);
        while($testimoniales->have_posts()):$testimoniales->the_post();
       ?>
        <li class="testimonial txt_center">
          <blockquote>
            <?php the_content();?>
          </blockquote>
          <footer class="testimonial-footer">
            <?php the_post_thumbnail( 'thumbnail');?>
            <p>
              <?php the_title();?>
            </p>
          </footer>
        </li>
     <?php endwhile; wp_reset_postdata(); ?>
    </ul>
  </div>
</section>

<?php get_footer();?>
