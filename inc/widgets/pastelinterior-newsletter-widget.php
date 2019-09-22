<?php
/**
 * @version  1.0
 * @package  Repair
 *
 */
 
 
/**************************************
*Creating Newsletter Widget
***************************************/
 
class Pastelinterior_newsletter_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'pastelinterior_newsletter',


        // Widget name will appear in UI
        esc_html__( '[ Pastelinterior ] Newsletter Form', 'pastel-interior' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'pastel-interior' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
    $style   	= apply_filters( 'widget_style', $instance['style'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );

    // mc validation
    wp_enqueue_script( 'mc-validate');

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


	    if( $desc ){
		    echo '<p>'.esc_html( $desc ).'</p>';
	    } ?>
        <div class="form-wrap" id="mc_embed_signup">
            <?php
            if( $style == 'newslettersidebar' ){ ?>
                <form action="<?php echo esc_url( $actionurl ); ?>" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="EMAIL" placeholder="Enter email" required>
                    </div>
                    <button class="button rounded-0 primary-bg text-white w-100" type="submit">Subscribe</button>
                </form>
                <?php
            }elseif( $style == 'newsletterfooter' ){ ?>
                <form target="_blank" action="<?php echo esc_url( $actionurl ); ?>" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control" name="EMAIL" placeholder="<?php echo esc_html__( 'Your Email Address', 'pastel-interior' ) ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                        <div class="input-group-append">
                            <button class="btn click-btn" type="submit">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-2.png" alt="">
                            </button>
                        </div>
                    </div>
                    <div class="info"></div>
                </form>
                <?php
            }
            ?>
        </div>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {

        $title      = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Newsletter', 'pastel-interior' );
	    $actionurl  = isset( $instance[ 'actionurl' ] ) ? $instance[ 'actionurl' ] : '';
	    $style      = isset( $instance[ 'style' ] ) ? $instance[ 'style' ] : 'newslettersidebar';

	    $desc       = isset( $instance[ 'desc' ] ) ? $instance[ 'desc' ] : '';

	    $select_array = [ 'Newsletter Sidebar', 'Newsletter Footer' ];


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'pastel-interior'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Select Style:' ,'pastel-interior'); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>">
                <?php
                if( is_array( $select_array ) ){
                    foreach ( $select_array as $option ){
                        $val = strtolower( str_replace( ' ', '', $option ) );

	                    $selected = $style == $val ? 'selected' : '';
                        echo '<option value="'. $val .'" '. $selected .'>'. $option .'</option>';
                    }
                }
                ?>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'pastel-interior'); ?></label>
            <p class="description"><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'pastel-interior'); ?> </p>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'pastel-interior'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['actionurl']  = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
        $instance['style']      = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
        $instance['desc']       = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;

    }

} // Class pastelinterior_newsletter_widget ends here


// Register and load the widget
function pastelinterior_newsletter_load_widget() {
	register_widget( 'Pastelinterior_newsletter_widget' );
}
add_action( 'widgets_init', 'pastelinterior_newsletter_load_widget' );