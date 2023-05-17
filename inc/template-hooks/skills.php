<?php
/**
 * Skills hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_skills_section' ) ) :
    /**
    * Add skills section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_skills_section() {

        // Check if skills is enabled on frontpage
        $skills_enable = apply_filters( 'corponotch_pro_section_status', 'enable_skills', '' );

        if ( ! $skills_enable )
            return false;

        // Get skills section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_skills_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render skills section now.
        corponotch_pro_render_skills_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_skills_section_details' ) ) :
    /**
    * skills section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input skills section details.
    */
    function corponotch_pro_get_skills_section_details( $input ) {

        // Content type.
        $skills_content_type  = corponotch_pro_theme_option( 'skills_content_type' );
        $skills_count  = corponotch_pro_theme_option( 'skills_count', 3 );
        $content = array();
        switch ( $skills_content_type ) {

            case 'page':
                $page_ids = array();
                $icons = array();

                for ( $i = 1; $i <= $skills_count; $i++ ) :
                    $page_id = corponotch_pro_theme_option( 'skills_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $icons[] = corponotch_pro_theme_option( 'skills_icon_' . $i );
                    endif;

                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $skills_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();
                $icons = array();

                for ( $i = 1; $i <= $skills_count; $i++ )  :
                    $post_id = corponotch_pro_theme_option( 'skills_content_post_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $icons[] = corponotch_pro_theme_option( 'skills_icon_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $skills_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            case 'category':
                $icons = array();
                $cat_id = corponotch_pro_theme_option( 'skills_content_category', '' );
                for ( $i = 1; $i <= $skills_count; $i++ )  :
                    $icons[] = corponotch_pro_theme_option( 'skills_icon_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'cat'               =>  $cat_id,
                    'posts_per_page'    => absint( $skills_count ),
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
                $page_post['excerpt']   = corponotch_pro_trim_content( 12 );
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
// skills section content details.
add_filter( 'corponotch_pro_filter_skills_section_details', 'corponotch_pro_get_skills_section_details' );


if ( ! function_exists( 'corponotch_pro_render_skills_section' ) ) :
  /**
   * Start skills section
   *
   * @return string skills content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_skills_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $image_align = corponotch_pro_theme_option( 'skills_image_align', 'left-align' );
        $skills_image = corponotch_pro_theme_option( 'skills_image', '' );
        $column = corponotch_pro_theme_option( 'skills_column', 'column-3' );
        $align = corponotch_pro_theme_option( 'skills_align', 'left-align' );
        $title = corponotch_pro_theme_option( 'skills_title', '' );
        $sub_title = corponotch_pro_theme_option( 'skills_sub_title', '' );
        $skills_video = corponotch_pro_theme_option( 'skills_video', '' );

        ?>
        <div id="skills" class="page-section relative">
            <div class="wrapper">

                <div class="section-content <?php echo esc_attr( $image_align ); ?> <?php echo empty( $skills_image ) ? 'no-featured-image' : ''; ?>">
                    <?php if ( ! empty( $skills_image ) ) : ?>
                        <div class="skills-background">
                            <img src="<?php echo esc_url( $skills_image ); ?>">
                            <?php if ( ! empty( $skills_video ) ) : ?>
                                <a href="#" class="skills-play-btn">
                                    <?php echo corponotch_pro_get_svg( array( 'icon' => 'play' ) ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="skills-video-model">
                            <div class="skills-video">
                                <a href="#" class="skills-close-btn">
                                    <?php echo corponotch_pro_get_svg( array( 'icon' => 'close' ) ); ?>
                                </a>
                                <?php echo wp_video_shortcode( array( 'src' => esc_url( $skills_video ), 'height' => 450, 'width' => 800 ) , '' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="skills-container">
                        <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                            <div class="section-header">
                                <?php if ( ! empty( $sub_title ) ) : ?>
                                    <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                <?php endif;

                                if ( ! empty( $title ) ) : ?>
                                    <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                                <?php endif; ?>
                            </div><!-- .section-header -->
                        <?php endif; ?>

                        <div class="skills-content <?php echo esc_attr( $column ); ?> <?php echo esc_attr( $align ); ?>">
                            <?php foreach ( $content_details as $content ) : ?>
                                <article class="hentry">
                                    <div class="post-wrapper">
                                        <?php if ( ! empty( $content['icon'] ) ) : ?>
                                            <div class="skills">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                                </a>
                                            </div><!-- .skills -->
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
                    </div><!-- .skills-container -->
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #skills-posts -->

    <?php 
    }
endif;
