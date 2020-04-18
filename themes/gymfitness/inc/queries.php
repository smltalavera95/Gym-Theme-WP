<?php

function gymfitness_lista_clases($cantidad = -1){?>
  <ul class="lista-clases">
    <?php
      $args = array ( //Aca va ser los argumentos para consulta
        'post_type' => 'gymfitness_clases',//Especificando que post type queremos consultar
        'posts_per_page' => $cantidad, //Cuantos se desean mostrar, para mostrar todos se puede poner -1 *no recomendable
        'order' => 'DESC'
      );
      $clases = new WP_Query($args); //Almacenar en un objeto los resultados

      //Creacion del Loop
      while ($clases->have_posts()) : $clases->the_post();//Trae post por post?>
        <li class="clase card gradient">
          <?php the_post_thumbnail('mediano');?>
          <div class="contenido">
            <a href="<?php the_permalink();//Trae el enlace de clase ?>">
              <h3><?php the_title();?></h3>
            </a>
            <?php
            //Cuando es get se debe almacenar para mostrarlo con un echos
              $hora_inicio = get_field('hora_inicio');
              $hora_fin = get_field('hora_fin');
             ?>
            <p><?php the_field('dias_clase');//Cuando son custom fields se puede llamar con the_field?> - <?php echo $hora_inicio . " a " . $hora_fin;  ?></p>
          </div>
        </li>

      <?php endwhile; wp_reset_postdata(); //Cuando se utiliza WP Query, buena practica resetear?>
  </ul>

  <?php
}
