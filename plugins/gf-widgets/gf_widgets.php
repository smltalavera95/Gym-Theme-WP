<?php
/*
 Plugin Name:Gym Fitness Widget Clases
 Plugin URI:
 Description: Añade las clases a tu sidebar
 Tags: sidebar, widget
 Author: Talavera Samuel
 Author URI: https://twitter.com/smltalavera95
 Version: 1.0
 Text Domain: gymfitness
*/

if(!defined('ABSPATH')) die();
class GymFitness_Clases_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'gymfitness_widget', // Base ID
            'Gym Fitness Clases Widget', // Name
            array( 'description' => __( 'Texto ejemplo', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        $cantidad = $instace['cantidad'];
        /*Para mostrar un limite de cantidad como default*/
        if($cantidad == ''){
          $cantidad = 3;
        }
        ?>
        <ul>
          <?php
          /*Crear para hacer la consulta a la BD*/
            $args = array (
              'post_type' => 'gymfitness_clases',
              'post_per_page' => $cantidad

            );
            /*Consulta por WP QUERY*/
            $clases= new WP_QUERY($args);

            /*Navegar por el array de resultado. Con the post vamos a tener acceso a todos
            los valores que tiene el resultado */
            while($clases->have_posts()): $clases->the_post();
          ?>
          <!--Aspecto del elemento siebar-->
          <li class="clase-sidebar">
            <div class="imagen">
              <?php the_post_thumbnail('thumbnail');?>
            </div>
            <div class="contenido-clase">
              <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              <?php
              //Cuando es get se debe almacenar para mostrarlo con un echo
                $hora_inicio = get_field('hora_inicio');
                $hora_fin = get_field('hora_fin');
               ?>
              <p><?php the_field('dias_clase');//Cuando son custom fields se puede llamar con the_field?> - <?php echo $hora_inicio . " a " . $hora_fin;  ?></p>
            </div>
          </li>

        <?php endwhile;
        /*Reset the WP_QUERY*/
        wp_reset_postdata();
        ?>
        </ul>

        <?php
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
      /*Validar si hay un numero en el input*/
      $cantidad =! empty($instance['cantidad']) ? $instance['cantidad'] : esc_html__('¿Cuantas clases deseas mostrar?', 'gymfitness'); ?>

      <p>
        <!--Etiqueta para mostrar la leyenda en el formulario-->
        <label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>">
          <?php esc_attr_e( '¿Cuantas clases deseas mostrar?', 'gymfitness' ); ?>
        </label>

        <!--el name es con el que se guarda la variable-->
        <input
          class="widefat"
          id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>"
          name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>"
          type="number"
          value="<?php echo esc_attr ( $cantidad );?>">
      </p>
      <p>
        <label>
          <em>Si se deja en blanco se mostrará solamente 3 clases</em>
        </label>
      </p>

    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['cantidad'] = ( !empty( $new_instance['cantidad'] ) ) ? strip_tags( $new_instance['cantidad'] ) : '';

        return $instance;
    }

} // class Foo_Widget

// Register GymFitness_Clases_Widget
add_action( 'widgets_init', 'register_gf_clases_widget' );

function register_gf_clases_widget() {
   register_widget( 'GymFitness_Clases_Widget' );
}
?>
