<?php   while ( have_posts() ): the_post();//Tiene posts? ?>

 <h1 class="txt_center txt_primary"><?php the_title(); ?></h1>
 <?php if(has_post_thumbnail()):
        the_post_thumbnail('blog', array('class'=> 'featured-img')); //el Array es para agregar en este caso parametro de clases.
      endif;
 ?>

 <?php
    //Si el post type es clases
    if(get_post_type() === 'gymfitness_clases'){

      //Cuando es get se debe almacenar para mostrarlo con un echo
        $hora_inicio = get_field('hora_inicio');
        $hora_fin = get_field('hora_fin');?>
      <p class="information_class"><?php the_field('dias_clase');//Cuando son custom fields se puede llamar con the_field?> - <?php echo $hora_inicio . " a " . $hora_fin;  ?></p>
  <?php } ?>

 <?php the_content();//Imprima el contenido ?>

<?php endwhile; //Cierre del loop?>
