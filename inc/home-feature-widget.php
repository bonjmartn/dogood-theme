<?php 

// register homefeature widget
function register_homefeature_widget() {
    register_widget( 'homefeature_widget' );
}
add_action( 'widgets_init', 'register_homefeature_widget' );


/**
 * Adds homefeature_Widget widget.
 */
class homefeature_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'homefeature_widget', // Base ID
      __( 'Homepage Feature', 'do-good-free' ), // Name
      array( 'description' => __( 'Featured content with a button for the homepage', 'do-good-free' ), ) // Args
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
    echo ( '<div class="home-widget">');

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    // if the button text field is set
    $text = $instance['text'];
    $link = $instance['link'];
    $linetext = $instance['linetext'];

    

    if ( ! empty( $instance['linetext'] ) ) {
      echo sprintf( '<p>' . $linetext . '</p>');
    }

    if ( ! empty( $instance['text'] ) ) {
      echo sprintf( '<a href="' . $link . '"><button>' . $text . '</button></a>');
    }

    echo ( '</div>');

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Feature Title', 'do-good-free' );
    $text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Button Text', 'do-good-free' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Button Link', 'do-good-free' );
    $linetext = ! empty( $instance['linetext'] ) ? $instance['linetext'] : __( 'A Line of Text', 'do-good-free' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'do-good-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linetext_field'); ?>"><?php _e('Enter a line of text', 'do-good-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linetext_field'); ?>" name="<?php echo $this->get_field_name('linetext_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linetext ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('text_field'); ?>"><?php _e('Enter the text for the button', 'do-good-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text_field'); ?>" name="<?php echo $this->get_field_name('text_field'); ?>" type="text" 
    value="<?php echo esc_attr( $text ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('link_field'); ?>"><?php _e('Enter the URL for the button', 'do-good-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('link_field'); ?>" name="<?php echo $this->get_field_name('link_field'); ?>" type="text" 
    value="<?php echo esc_attr( $link ); ?>" />
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
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['text'] = strip_tags( $new_instance['text_field'] );
    $instance['link'] = strip_tags( $new_instance['link_field'] );
    $instance['linetext'] = strip_tags( $new_instance['linetext_field'] );
    return $instance;
  }

} // class homefeature_Widget
