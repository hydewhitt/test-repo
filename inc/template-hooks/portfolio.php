<?php
/**
 * Portfolio hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_portfolio_section' ) ) :
    /**
    * Add portfolio section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_portfolio_section() {

        // Check if portfolio is enabled on frontpage
        $portfolio_enable = apply_filters( 'corponotch_pro_section_status', 'enable_portfolio', '' );

        if ( ! $portfolio_enable )
            return false;

        // Get portfolio section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_portfolio_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render portfolio section now.
        corponotch_pro_render_portfolio_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_portfolio_section_details' ) ) :
    /**
    * portfolio section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input portfolio section details.
    */
    function corponotch_pro_get_portfolio_section_details( $input ) {

        // Content type.
        $portfolio_content_type  = corponotch_pro_theme_option( 'portfolio_content_type' );
        $portfolio_count  = corponotch_pro_theme_option( 'portfolio_count', 3 );
        $content = array();
        switch ( $portfolio_content_type ) {

            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $portfolio_count; $i++ )  :
                    $page_id = corponotch_pro_theme_option( 'portfolio_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                    endif;

                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $portfolio_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $portfolio_count; $i++ )  :
                    $post_id = corponotch_pro_theme_option( 'portfolio_content_post_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $portfolio_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            case 'category':
                $cat_id = corponotch_pro_theme_option( 'portfolio_content_category', '' );
                
                $args = array(
                    'post_type'         => 'post',
                    'cat'               =>  $cat_id,
                    'posts_per_page'    => absint( $portfolio_count ),
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
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : '';

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
// portfolio section content details.
add_filter( 'corponotch_pro_filter_portfolio_section_details', 'corponotch_pro_get_portfolio_section_details' );


if ( ! function_exists( 'corponotch_pro_render_portfolio_section' ) ) :
  /**
   * Start portfolio section
   *
   * @return string portfolio content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_portfolio_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column = corponotch_pro_theme_option( 'portfolio_column', 'column-3' );
        $title = corponotch_pro_theme_option( 'portfolio_title', '' );
        $sub_title = corponotch_pro_theme_option( 'portfolio_sub_title', '' );
        $read_more = corponotch_pro_theme_option( 'portfolio_btn_label', esc_html__( 'Read More', 'corponotch-pro' ) );

        ?>
    	<div id="portfolio" class="page-section relative">
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
                                <div class="gallery">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                            </a>
                                            <div class="overlay"></div>
                                                
                                            <a class="more-btn" href="<?php echo esc_url( $content['url'] ); ?>">
                                                <?php echo esc_html( $read_more ); ?>
                                            </a>
                                        </div>
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
                                    </div>
                                </div><!-- .gallery -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #gallery -->
    <?php 
    }
endif;