<?php 

// register ctasidebar widget
function register_ctasidebar_widget() {
    register_widget( 'ctasidebar_widget' );
}
add_action( 'widgets_init', 'register_ctasidebar_widget' );


/**
 * Adds ctasidebar_Widget widget.
 */
class ctasidebar_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'ctasidebar_widget', // Base ID
      __( 'Sidebar Feature', 'do-good' ), // Name
      array( 'description' => __( 'Featured content with a button for the sidebar', 'do-good' ), ) // Args
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
    echo ( '<div class="cta-sidebar">');

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    // if the button text field is set
    $text = sanitize_text_field( $instance['text'] );
    $link = esc_url( $instance['link'] );
    $linetext = sanitize_text_field( $instance['linetext'] );    

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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Call to Action Title', 'do-good' );
    $text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Button Text', 'do-good' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Button Link', 'do-good' );
    $linetext = ! empty( $instance['linetext'] ) ? $instance['linetext'] : __( 'A Line of Text', 'do-good' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'do-good' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linetext_field'); ?>"><?php _e('Enter a line of text', 'do-good'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linetext_field'); ?>" name="<?php echo $this->get_field_name('linetext_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linetext ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('text_field'); ?>"><?php _e('Enter the text for the button', 'do-good'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text_field'); ?>" name="<?php echo $this->get_field_name('text_field'); ?>" type="text" 
    value="<?php echo esc_attr( $text ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('link_field'); ?>"><?php _e('Enter the URL for the button', 'do-good'); ?></label>
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

} // class ctasidebar_Widget
