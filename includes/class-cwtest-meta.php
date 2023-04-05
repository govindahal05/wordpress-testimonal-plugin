<?php
class CWTestimonal_Meta_Box {
    
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'cwtest_add_meta_box' ) );
        add_action( 'save_post', array( $this, 'cwtest_save_country_meta' ) );
    }

    public function cwtest_add_meta_box() {
        add_meta_box(
            'testimonial_meta_box', // ID of the meta box
            'Testimonial Details', // Title of the meta box
            array( $this, 'cwtest_render_meta_box' ), // Callback function to render the meta box
            'testimonial', // Post type
            'normal', // Position
            'default' // Priority
        );
    }


    public function cwtest_render_meta_box( $post ) {
        // Retrieve the current value of the country meta field
        $country = get_post_meta( $post->ID, '_country', true );
        // Display the field and its label
        ?>
        <label for="country"><?php _e( 'Country:' ); ?></label>
        <input type="text" id="country" name="country" value="<?php echo esc_attr( $country ); ?>" />
        <?php
    }

    public function cwtest_save_country_meta( $post_id ) {
        // Check if the user has permission to edit the post
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
        // Check if the country field was sent in the request
        if ( isset( $_POST['country'] ) ) {
            // Sanitize the input and save it as post meta
            update_post_meta( $post_id, '_country', sanitize_text_field( $_POST['country'] ) );
        }
    }
}
        
$cwtestimonal_meta_box = new CWTestimonal_Meta_Box();
    