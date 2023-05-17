<?php
/**
 * Options functions
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function corponotch_pro_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'corponotch-pro' ),
            'off'       => esc_html__( 'No', 'corponotch-pro' )
        );
        return apply_filters( 'corponotch_pro_show_options', $arr );
    }
endif;

if ( ! function_exists( 'corponotch_pro_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function corponotch_pro_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch-pro' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_pro_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function corponotch_pro_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch-pro' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_pro_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function corponotch_pro_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch-pro' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_pro_product_choices' ) ) :
    /**
     * List of products for product choices.
     * @return Array Array of product ids and name.
     */
    function corponotch_pro_product_choices() {
        $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch-pro' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_pro_product_category_choices' ) ) :
    /**
     * List of product categories for product category choices.
     * @return Array Array of product category ids and name.
     */
    function corponotch_pro_product_category_choices() {
        $args = array(
                'type'          => 'product',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'product_cat',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch-pro' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_pro_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function corponotch_pro_site_layout() {
        $corponotch_pro_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'corponotch_pro_site_layout', $corponotch_pro_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_pro_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function corponotch_pro_sidebar_position() {
        $corponotch_pro_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/uploads/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'no-sidebar-content'    => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'corponotch_pro_sidebar_position', $corponotch_pro_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function corponotch_pro_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'corponotch-pro' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'corponotch-pro' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'corponotch-pro' ),
            'spinner-dots'          => esc_html__( 'Dots', 'corponotch-pro' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'corponotch-pro' ),
        );
        return apply_filters( 'corponotch_pro_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'corponotch_pro_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function corponotch_pro_selected_sidebar() {
        $corponotch_pro_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'corponotch-pro' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'corponotch-pro' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'corponotch-pro' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'corponotch-pro' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'corponotch-pro' ),
        );

        $output = apply_filters( 'corponotch_pro_selected_sidebar', $corponotch_pro_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_pro_header_typography' ) ) :
    /**
     * header typography options
     * @return array header typography
     */
    function corponotch_pro_header_typography() {
        $corponotch_pro_header_typography = array(
            'default'              => esc_html__( 'Default', 'corponotch-pro' ),
            'header-font-1'        => esc_html__( 'Rajdhani', 'corponotch-pro' ),
            'header-font-2'        => esc_html__( 'Roboto', 'corponotch-pro' ),
            'header-font-3'        => esc_html__( 'Philosopher', 'corponotch-pro' ),
            'header-font-4'        => esc_html__( 'Slabo 27px', 'corponotch-pro' ),
            'header-font-5'        => esc_html__( 'Dosis', 'corponotch-pro' ),
            'header-font-6'        => esc_html__( 'Montserrat', 'corponotch-pro' ),
            'header-font-7'        => esc_html__( 'Tangerine', 'corponotch-pro' ),
            'header-font-8'        => esc_html__( 'Playfair Display', 'corponotch-pro' ),
            'header-font-9'        => esc_html__( 'Amatic SC', 'corponotch-pro' ),
            'header-font-10'       => esc_html__( 'Jost', 'corponotch-pro' ),
        );

        $output = apply_filters( 'corponotch_pro_header_typography', $corponotch_pro_header_typography );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_pro_body_typography' ) ) :
    /**
     * body typography options
     * @return array body typography
     */
    function corponotch_pro_body_typography() {
        $corponotch_pro_body_typography = array(
            'default'            => esc_html__( 'Default', 'corponotch-pro' ),
            'body-font-1'        => esc_html__( 'News Cycle', 'corponotch-pro' ),
            'body-font-2'        => esc_html__( 'Pontano Sans', 'corponotch-pro' ),
            'body-font-3'        => esc_html__( 'Gudea', 'corponotch-pro' ),
            'body-font-4'        => esc_html__( 'Quattrocento', 'corponotch-pro' ),
            'body-font-5'        => esc_html__( 'Khand', 'corponotch-pro' ),
            'body-font-6'        => esc_html__( 'Oxygen', 'corponotch-pro' ),
            'body-font-7'        => esc_html__( 'Lora', 'corponotch-pro' ),
        );

        $output = apply_filters( 'corponotch_pro_body_typography', $corponotch_pro_body_typography );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_pro_sortable_sections' ) ) :
    /**
     * homepage sections
     * @return array sortable sections
     */
    function corponotch_pro_sortable_sections() {
        $output = array( 
            'slider'        => esc_html__( 'Slider Section', 'corponotch-pro' ),
            'short_cta'     => esc_html__( 'Short Call to Action Section', 'corponotch-pro' ),
            'introduction'  => esc_html__( 'Introduction Section', 'corponotch-pro' ),
            'service'       => esc_html__( 'Service Section', 'corponotch-pro' ),
            'hero_content'  => esc_html__( 'Hero Content Section', 'corponotch-pro' ),
            'counter'       => esc_html__( 'Counter Section', 'corponotch-pro' ),
            'portfolio'     => esc_html__( 'Portfolio Section', 'corponotch-pro' ),
            'product'       => esc_html__( 'Product Section', 'corponotch-pro' ),
            'skills'        => esc_html__( 'Skills Section', 'corponotch-pro' ),
            'team'          => esc_html__( 'Team Section', 'corponotch-pro' ),
            'client'        => esc_html__( 'Client Section', 'corponotch-pro' ),
            'testimonial'   => esc_html__( 'Testimonial Section', 'corponotch-pro' ),
            'pricing'       => esc_html__( 'Pricing Section', 'corponotch-pro' ),
            'contact'       => esc_html__( 'Contact Section', 'corponotch-pro' ),
            'recent'        => esc_html__( 'Recent Section', 'corponotch-pro' ),
            'cta'           => esc_html__( 'Call to Action Section', 'corponotch-pro' ),
        );

        return $output;
    }
endif;
