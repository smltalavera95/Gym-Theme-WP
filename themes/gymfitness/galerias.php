<?php

/*
* Template Name: Template para Galerias
*/
get_header(); ?>

  <main class="contenedor pagina seccion">
    <div class="main-content">
      <?php   while ( have_posts() ): the_post();//Tiene posts? ?>

       <h1 class="txt_center txt_primary"><?php the_title(); ?></h1>


       <?php
        //Obtener la galeria de la pagina actual
        $galeria = get_post_gallery(get_the_ID(), false);

        //Obtener los id separados, el explode va definir cual es el separador
        //$galeria_imagenes_ID = explode(',', $galeria['ids']);
        $galeria_imagenes_ID= explode(',', $galeria['ids']);
       ?>

       <ul class="galeria-imagenes">
         <?php
            $i=1; //Contador
            //Para recorrer un arreglo es bueno hacerlo con for each
            foreach($galeria_imagenes_ID as $id):
              /*el get Attachment src agarrra la url y busca desde el id del arreglo
              Se debe pasar el tamanno, para que solo muestre el url  se pasa el espacio
              0*/
              $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
              $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
              $imagen= wp_get_attachment_image_src($id, 'large')[0];
          ?>
            <li>
              <a href="<?php echo $imagen ?>" data-lightbox="galeria">
                <img src="<?php echo $imagenThumb ?>" alt="">
              </a>
            </li>
            <?php
              $i++;
              endforeach;
            ?>
       </ul>


      <?php endwhile; //Cierre del loop?>

    </div>

  </main>

<?php get_footer();?>
