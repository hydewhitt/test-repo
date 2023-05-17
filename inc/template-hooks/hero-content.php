<?php
/**
 * Hero Content hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_hero_content_section' ) ) :
    /**
    * Add hero_content section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_hero_content_section() {

        // Check if hero_content is enabled on frontpage
        $hero_content_enable = apply_filters( 'corponotch_pro_section_status', 'enable_hero_content', '' );

        if ( ! $hero_content_enable )
            return false;

        // Get hero_content section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_hero_content_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render hero_content section now.
        corponotch_pro_render_hero_content_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_hero_content_section_details' ) ) :
    /**
    * hero_content section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input hero_content section details.
    */
    function corponotch_pro_get_hero_content_section_details( $input ) {

        // Content type.
        $hero_content_content_type  = corponotch_pro_theme_option( 'hero_content_content_type' );
        $content = array();
        switch ( $hero_content_content_type ) {

            case 'custom':
                $custom['title']        =  corponotch_pro_theme_option( 'hero_content_custom_title', '' );
                $custom['url']          =  corponotch_pro_theme_option( 'hero_content_custom_link', '#' );
                $custom['excerpt']      =  corponotch_pro_theme_option( 'hero_content_custom_description', '' );

                array_push( $content, $custom );
            break;

            case 'page':
                $page_id = corponotch_pro_theme_option( 'hero_content_content_page', '' );
                
                $args = array(
                    'post_type' => 'page',
                    'page_id' => absint( $page_id ),
                    'posts_per_page' => 1,
                    );                    
            break;

            case 'post':
                $post_id = corponotch_pro_theme_option( 'hero_content_content_post', '' );
                
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

        if ( 'custom' !== $hero_content_content_type ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = corponotch_pro_trim_content( 35 );

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
// hero_content section content details.
add_filter( 'corponotch_pro_filter_hero_content_section_details', 'corponotch_pro_get_hero_content_section_details' );


if ( ! function_exists( 'corponotch_pro_render_hero_content_section' ) ) :
  /**
   * Start hero_content section
   *
   * @return string hero_content content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_hero_content_section( $content_details = array() ) {
        $read_more = corponotch_pro_theme_option( 'hero_content_btn_label', esc_html__( 'Learn More', 'corponotch-pro' ) );
        $sub_title = corponotch_pro_theme_option( 'hero_content_sub_title', '' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
        	<div class="page-section hero-section relative">
                <div class="wrapper">
                    <article class="hentry">
                        <div class="post-wrapper">
                            <?php if ( ! empty( $content['title'] ) || ! empty( $sub_title ) ) : ?>
                                <div class="section-header align-center">
                                    <?php if ( ! empty( $sub_title ) ) : ?>
                                        <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                    <?php endif;

                                    if ( ! empty( $content['title'] ) ) : ?>
                                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    <?php endif; ?>
                                </div><!-- .section-header -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>
                                </div>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #hero_content -->
        <?php endforeach;
    }
endif;