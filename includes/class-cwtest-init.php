<?php
class CWTestimonials_Plugin {

    function __construct() {
        add_action( 'init', array( $this, 'register_testimonial_post_type' ) );
        add_shortcode( 'display_testimonials', array( $this, 'display_testimonials_shortcode' ) );

    }

    function register_testimonial_post_type() {
        $labels = array(
            'name' => __( 'Testimonials' ),
            'singular_name' => __( 'Testimonial' ),
            'add_new' => __( 'Add New Testimonial' ),
            'add_new_item' => __( 'Add New Testimonial' ),
            'edit_item' => __( 'Edit Testimonial' ),
            'new_item' => __( 'New Testimonial' ),
            'view_item' => __( 'View Testimonial' ),
            'search_items' => __( 'Search Testimonials' ),
            'not_found' => __( 'No testimonials found' ),
            'not_found_in_trash' => __( 'No testimonials found in trash' )
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' )
        );

        register_post_type( 'testimonial', $args );
    }

    public function display_testimonials_shortcode( $atts ) {
        // Set default attributes
        $atts = shortcode_atts( array(
            'count' => 5,
            'show_avatar' => "true" 
        ), $atts );

        // Query the testimonial posts
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => $atts['count'],
        );
        $testimonials = new WP_Query( $args );
        include CWTEST_PATH. 'template-parts/testimonial.php';


        // Output the testimonials
        ob_start();
        if ( $testimonials->have_posts() ) :

            
        else :
            echo 'No testimonials found.';
        endif;
        wp_reset_postdata();
        $output = ob_get_clean();

        return $output;
    }
}

$testimonials_plugin = new CWTestimonials_Plugin();