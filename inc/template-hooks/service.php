<?php
/**
 * Service hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_service_section() {

        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'corponotch_pro_section_status', 'enable_service', '' );

        if ( ! $service_enable )
            return false;

        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render service section now.
        corponotch_pro_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input service section details.
    */
    function corponotch_pro_get_service_section_details( $input ) {

        // Content type.
        $service_content_type  = corponotch_pro_theme_option( 'service_content_type' );
        $service_count  = corponotch_pro_theme_option( 'service_count', 3 );
        $content = array();
        switch ( $service_content_type ) {

            case 'page':
                $page_ids = array();
                $icons = array();

                for ( $i = 1; $i <= $service_count; $i++ )  :
                    $page_id = corponotch_pro_theme_option( 'service_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $icons[] = corponotch_pro_theme_option( 'service_icon_' . $i );
                    endif;

                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $service_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();
                $icons = array();

                for ( $i = 1; $i <= $service_count; $i++ )  :
                    $post_id = corponotch_pro_theme_option( 'service_content_post_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $icons[] = corponotch_pro_theme_option( 'service_icon_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $service_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            case 'category':
                $icons = array();
                $cat_id = corponotch_pro_theme_option( 'service_content_category', '' );
                for ( $i = 1; $i <= $service_count; $i++ )  :
                    $icons[] = corponotch_pro_theme_option( 'service_icon_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'cat'               =>  $cat_id,
                    'posts_per_page'    => absint( $service_count ),
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = corponotch_pro_trim_content( 15 );
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-laptop';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// service section content details.
add_filter( 'corponotch_pro_filter_service_section_details', 'corponotch_pro_get_service_section_details' );


if ( ! function_exists( 'corponotch_pro_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_service_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column = corponotch_pro_theme_option( 'service_column', 'column-3' );
        $align = corponotch_pro_theme_option( 'service_align', 'left-align' );
        $title = corponotch_pro_theme_option( 'service_title', '' );
        $sub_title = corponotch_pro_theme_option( 'service_sub_title', '' );

        ?>
    	<div class="our-services page-section relative <?php echo esc_attr( $align ); ?>">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $sub_title ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif;

                        if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content <?php echo esc_attr( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['icon'] ) ) : ?>
                                    <div class="service">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                        </a>
                                    </div><!-- .service -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;