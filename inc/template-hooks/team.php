<?php
/**
 * Team hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_team_section() {

        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'corponotch_pro_section_status', 'enable_team', '' );

        if ( ! $team_enable )
            return false;

        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render team section now.
        corponotch_pro_render_team_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input team section details.
    */
    function corponotch_pro_get_team_section_details( $input ) {

        // Content type.
        $team_content_type  = corponotch_pro_theme_option( 'team_content_type' );
        $team_count  = corponotch_pro_theme_option( 'team_count', 4 );
        $content = array();
        switch ( $team_content_type ) {

            case 'page':
                $page_ids = array();
                $position = array();
                $social = array();

                for ( $i = 1; $i <= $team_count; $i++ )  :
                    $page_id = corponotch_pro_theme_option( 'team_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $position[] = corponotch_pro_theme_option( 'team_position_' . $i );
                        $social[] = corponotch_pro_theme_option( 'team_social_' . $i );
                    endif;

                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $team_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();
                $position = array();
                $social = array();

                for ( $i = 1; $i <= $team_count; $i++ )  :
                    $post_id = corponotch_pro_theme_option( 'team_content_post_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $position[] = corponotch_pro_theme_option( 'team_position_' . $i );
                        $social[] = corponotch_pro_theme_option( 'team_social_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $team_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            case 'category':
                $position = array();
                $social = array();

                $cat_id = corponotch_pro_theme_option( 'team_content_category', '' );
                for ( $i = 1; $i <= $team_count; $i++ )  :
                    $position[] = corponotch_pro_theme_option( 'team_position_' . $i );
                    $social[] = corponotch_pro_theme_option( 'team_social_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'cat'               =>  $cat_id,
                    'posts_per_page'    => absint( $team_count ),
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
                $page_post['position']  = ! empty( $position[ $i ] ) ? $position[ $i ] : '';
                $page_post['social']    = ! empty( $social[ $i ] ) ? $social[ $i ] : '';
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'corponotch-pro-medium' ) : '';

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
// team section content details.
add_filter( 'corponotch_pro_filter_team_section_details', 'corponotch_pro_get_team_section_details' );


if ( ! function_exists( 'corponotch_pro_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_team_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column = corponotch_pro_theme_option( 'team_column', 'column-4' );
        $title = corponotch_pro_theme_option( 'team_title', '' );
        $sub_title = corponotch_pro_theme_option( 'team_sub_title', '' );

        ?>
    	<div class="page-section team-section relative">
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
                        <article class="hentry <?php echo ! empty( $content['image'] ) ? '' : 'no-featured-image'; ?>">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="team-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                        </a>
                                        <div class="overlay">
                                            <?php if ( ! empty( $content['social'] ) ) : 
                                                $social_links = explode( '|', $content['social'] ); ?>
                                                <div class="share-message">
                                                    <ul class="social-icons">
                                                        <?php foreach ( $social_links as $social ) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url( $social ); ?>" target="_blank"><?php echo corponotch_pro_return_social_icon( $social ); ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div><!-- .share-message -->
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- .team-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $content['position'] ) ) : ?>
                                        <h6 class="position"><?php echo esc_html( $content['position'] ); ?></h6>
                                    <?php endif; ?>

                                </div><!-- .entry-container -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #team-posts -->
    <?php 
    }
endif;