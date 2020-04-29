<?php  if(count_posts()==1 && !is_page('inicio')): ?>
  <li class="card only gradient">
  <?php endif;?>
  <?php  if(count_posts()>1 || is_page('inicio')): ?>
  <li class="card gradient">
  <?php endif;?>
    <?php the_post_thumbnail('mediano'); ?>
    <?php the_category(); ?>
    <div class="contenido">
      <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
      </a>
    </div>
  </li>
