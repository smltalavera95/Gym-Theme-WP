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

<?php get_footer();?>
