<?php
/**
 * Slider hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'corponotch_pro_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        corponotch_pro_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input slider section details.
    */
    function corponotch_pro_get_slider_section_details( $input ) {

        // Content type.
        $slider_content_type  = corponotch_pro_theme_option( 'slider_content_type' );
        $slider_count  = corponotch_pro_theme_option( 'slider_count', 3 );
        $content = array();
        switch ( $slider_content_type ) {

            case 'custom':
                for ( $i = 1; $i <= $slider_count; $i++ ) :
                    $custom['title']        =  corponotch_pro_theme_option( 'slider_custom_title_' . $i );
                    $custom['url']          =  corponotch_pro_theme_option( 'slider_custom_link_' . $i );
                    $custom['image']        =  corponotch_pro_theme_option( 'slider_custom_image_' . $i );
                    $custom['sub_title']    =  corponotch_pro_theme_option( 'slider_sub_title_' . $i );

                    array_push( $content, $custom );
                endfor;
            break;

            case 'page':
                $page_ids = array();
                $subtitle = array();

                for ( $i = 1; $i <= $slider_count; $i++ )  :
                    $page_id = corponotch_pro_theme_option( 'slider_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $subtitle[] = corponotch_pro_theme_option( 'slider_sub_title_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $slider_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();
                $subtitle = array();

                for ( $i = 1; $i <= $slider_count; $i++ )  :
                    $post_id = corponotch_pro_theme_option( 'slider_content_post_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $subtitle[] = corponotch_pro_theme_option( 'slider_sub_title_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $slider_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'category':
                $subtitle = array();
                $cat_id = corponotch_pro_theme_option( 'slider_content_category' );

                for ( $i = 1; $i <= $slider_count; $i++ )  :
                    $subtitle[] = corponotch_pro_theme_option( 'slider_sub_title_' . $i );
                endfor;
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $slider_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts' => true,
                    ); 
            break;

            default:
            break;
        }

        if ( 'custom' !== $slider_content_type ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['sub_title'] = ! empty( $subtitle[ $i ] ) ? $subtitle[ $i ] : '';;
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();
        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'corponotch_pro_filter_slider_section_details', 'corponotch_pro_get_slider_section_details' );


if ( ! function_exists( 'corponotch_pro_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_control = corponotch_pro_theme_option( 'slider_arrow' );
        $slider_autoplay = corponotch_pro_theme_option( 'slider_autoplay' );
        $slider_btn_label = corponotch_pro_theme_option( 'slider_btn_label', '' );
        $slider_alt_btn_link = corponotch_pro_theme_option( 'slider_alt_btn_link', '' );
        $slider_alt_btn_label = corponotch_pro_theme_option( 'slider_alt_btn_label', '' );
        $slider_opacity = corponotch_pro_theme_option( 'slider_opacity', 0 );
        $slider_align = corponotch_pro_theme_option( 'slider_align', 'center-align' );
        $slider_text = corponotch_pro_theme_option( 'slider_text', 'light-text' );
        $slider_alt_btn_color = corponotch_pro_theme_option( 'slider_alt_btn_color' );

        $query = new WP_Query(
            array(
                'post_type'              => 'page',
                'title'                  => 'Start Your Case',
                'post_status'            => 'all',
                'posts_per_page'         => 1,
                'no_found_rows'          => true,
                'ignore_sticky_posts'    => true,
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
                'orderby'                => 'post_date ID',
                'order'                  => 'ASC',
            )
        );
        
        if ( ! empty( $query->post ) ) {
            $page_got_by_title = $query->post;
        } else {
            $page_got_by_title = null;
        }
        $page_id = $page_got_by_title->ID;
        $permalink = get_permalink( $page_id );
        ?>
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
    	<div id="custom-header">
            <div class="section-content banner-slider <?php echo esc_attr( $slider_align ); ?> <?php echo esc_attr( $slider_text ); ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_autoplay ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>
                        <div class="overlay" style="opacity: 0.<?php echo absint( $slider_opacity ); ?>"></div>
                        <div class="wrapper">
                            <div class="custom-header-content">
                                 <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                                    <p class="sub-title"><?php echo esc_html( $content['sub_title'] ); ?></p>
                                <?php endif; 

                                if ( ! empty( $content['title'] ) ) : ?>
                                    <h2 class="landing-title" style="text-align: start;"><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; 

                                if ( ! empty( $slider_btn_label ) ) : ?>
                                    <!-- <div id="syc-button">
                                        <a href="<?php echo esc_url( $permalink ); ?>">
                                            <h2 class="start-your-case-label">Start Your Case</h2>
                                            <p class="start-your-case-info">(In Under 30 Seconds)</p>
                                        </a>
                                        
                                    </div>  -->

                                <?php endif;

                                if ( ! empty( $slider_alt_btn_label ) && ! empty( $slider_alt_btn_link ) ) : ?>
                                    <div class="read-more alt-btn <?php echo $slider_alt_btn_color ? 'alt-btn-primary' : ''; ?>">
                                        <a href="<?php echo esc_url( $slider_alt_btn_link ); ?>"><?php echo esc_html( $slider_alt_btn_label ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .custom-header-content -->
                        </div>
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .wrapper -->

            <?php if ( corponotch_pro_theme_option( 'enable_slider_wave', false ) ) : ?>
                <div class="wave-saperator">
                    <?php echo corponotch_pro_get_svg( array( 'icon' => 'wave' ) ); ?>
                </div>
            <?php endif; ?>
        </div><!-- #custom-header -->
    <?php 
    }
endif;