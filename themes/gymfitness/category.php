<?php get_header(); ?>

  <main class="pagina seccion no-sidebar contenedor">
    <?php
      $categoria = get_queried_object();
     ?>
   <div class="max-100">
     <h2 class="txt_center txt_primary"><?php echo $categoria->name; ?></h2>
   </div>
    <ul class="listado-blog">
      <?php get_template_part('template-parts/loop', 'blog'); ?>
    </ul>
  </main>

  <?php get_footer();?>
