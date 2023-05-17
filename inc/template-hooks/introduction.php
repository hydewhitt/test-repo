<?php
/**
 * Introduction hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_introduction_section' ) ) :
    /**
    * Add introduction section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_introduction_section() {

        // Check if introduction is enabled on frontpage
        $introduction_enable = apply_filters( 'corponotch_pro_section_status', 'enable_introduction', '' );

        if ( ! $introduction_enable )
            return false;

        // Get introduction section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_introduction_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render introduction section now.
        corponotch_pro_render_introduction_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_introduction_section_details' ) ) :
    /**
    * introduction section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input introduction section details.
    */
    function corponotch_pro_get_introduction_section_details( $input ) {

        // Content type.
        $introduction_content_type  = corponotch_pro_theme_option( 'introduction_content_type' );
        $content = array();
        switch ( $introduction_content_type ) {

            case 'custom':
                $custom['title']        =  corponotch_pro_theme_option( 'introduction_custom_title', '' );
                $custom['url']          =  corponotch_pro_theme_option( 'introduction_custom_link', '#' );
                $custom['image']        =  corponotch_pro_theme_option( 'introduction_custom_image', '' );
                $custom['excerpt']      =  corponotch_pro_theme_option( 'introduction_custom_description', '' );

                array_push( $content, $custom );
            break;

            case 'page':
                $page_id = corponotch_pro_theme_option( 'introduction_content_page', '' );
                
                $args = array(
                    'post_type' => 'page',
                    'page_id' => absint( $page_id ),
                    'posts_per_page' => 1,
                    );                    
            break;

            case 'post':
                $post_id = corponotch_pro_theme_option( 'introduction_content_post', '' );
                
                $args = array(
                    'post_type' => 'post',
                    'p' => absint( $post_id ),
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 1,
                    );                    
            break;

            default:
            break;
        }

        if ( 'custom' !== $introduction_content_type ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = corponotch_pro_trim_content( 35 );
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// introduction section content details.
add_filter( 'corponotch_pro_filter_introduction_section_details', 'corponotch_pro_get_introduction_section_details' );


if ( ! function_exists( 'corponotch_pro_render_introduction_section' ) ) :
  /**
   * Start introduction section
   *
   * @return string introduction content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_introduction_section( $content_details = array() ) {
        $image_align = corponotch_pro_theme_option( 'introduction_align', 'left-align' );
        $read_more = corponotch_pro_theme_option( 'introduction_btn_label', esc_html__( 'Explore Us', 'corponotch-pro' ) );
        $sub_title = corponotch_pro_theme_option( 'introduction_sub_title', '' );
        $introduction_excerpt = corponotch_pro_theme_option( 'introduction_excerpt', 'excerpt' );

        if ( empty( $content_details ) )
            return;

        ?>
    	<div id="introduction" class="page-section relative <?php echo esc_attr( $image_align ); ?>">
            <div class="wrapper">
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) || ! empty( $sub_title )  ) : ?>
                                    <header class="entry-header">
                                        <?php if ( ! empty( $sub_title ) ) : ?>
                                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                        <?php endif;
                                        
                                        if ( ! empty( $content['title'] ) ) : ?>
                                            <h2 class="entry-title">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a>
                                            </h2>
                                        <?php endif; ?>
                                    </header>
                                <?php endif; 

                                if ( 'excerpt' == $introduction_excerpt ) :
                                    if ( ! empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                    <a class="more-btn" href="<?php echo esc_url( $content['url'] ); ?>">
                                        <?php echo esc_html( $read_more ); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="entry-content">
                                        <?php 
                                            $full_content = apply_filters('the_content', get_post_field( 'post_content', $content['id'] ) ); 
                                            $full_content = str_replace(']]>', ']]&gt;', $full_content);
                                            echo $full_content;
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ) ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                        </div><!-- .post-wrapper -->
                    </article>
                <?php endforeach; ?>
            </div><!-- .wrapper -->
        </div><!-- #introduction -->
    <?php 
    }
endif;