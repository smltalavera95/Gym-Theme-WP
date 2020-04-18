<?php

function gymfitness_ubicacion_shortcode( $atts ){
	$ubicacion_mapa= get_field('mapa');
  ?>
  <div class="ubicacion">
    <input type="hidden" id="lat" value="<?php echo $ubicacion_mapa['lat']; ?>"/>
    <input type="hidden" id="lng" value="<?php echo $ubicacion_mapa['lng']; ?>"/>
    <input type="hidden" id="direccion" value="<?php echo $ubicacion_mapa['address']; ?>"/>
    <div id="map"></div>
  </div>
  <?php
}
add_shortcode( 'gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode' );
