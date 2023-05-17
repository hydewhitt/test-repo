<?php

if ( ! function_exists( 'corponotch_pro_add_results_matter_section' ) ) :
    /**
    * Add counter section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_results_matter_section() {
        corponotch_pro_render_counter_section();
    }
endif;
if ( ! function_exists( 'corponotch_pro_render_results_matter_section' ) ) :
  /**
   * Start results matter section
   *
   * @return string counter content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_counter_section() {
        $image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/uploads/results-matter.jpg';
        $counter_opacity = corponotch_pro_theme_option( 'counter_opacity', 0 );
        $content_details = array();
        ?>
    	<div class="page-section counter-widget relative"
            <?php if ( ! empty( $image ) ) : ?> 
                style="background-image: url('<?php echo esc_url( $image ); ?>');"
            <?php endif; ?>>
            <div class="overlay" style="opacity: 0.<?php echo absint( $counter_opacity ); ?>"></div>
            <div class="wrapper">
                <div class="section-content column-<?php echo absint( count( $content_details ) ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="counter">
                                <i class="fa <?php echo esc_attr( $content['icon'] ); ?>"></i>
                                <div class="counter-value"><?php echo esc_html( $content['value'] ); ?></div>
                                <h5 class="counter-label"><?php echo esc_html( $content['label'] ); ?></h5>
                            </div><!-- .counter -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #counter -->
    <?php 
    }
endif;