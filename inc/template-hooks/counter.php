<?php
/**
 * Counter hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_counter_section() {

        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'corponotch_pro_section_status', 'enable_counter', 'counter_entire_site' );

        if ( ! $counter_enable )
            return false;

        // Render counter section now.
        corponotch_pro_render_counter_section();
    }
endif;

if ( ! function_exists( 'corponotch_pro_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_counter_section() {
        $image = corponotch_pro_theme_option( 'counter_image', '' );
        $counter_opacity = corponotch_pro_theme_option( 'counter_opacity', 0 );
        $content_details = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            $label = corponotch_pro_theme_option( 'counter_label_' . $i, '' );
            $value = corponotch_pro_theme_option( 'counter_value_' . $i, '' );

            if ( ! empty( $label ) && ! empty( $value )  ) :
                $counter['icon']  = corponotch_pro_theme_option( 'counter_icon_' . $i, 'fa-certificate' );
                $counter['label'] = $label;
                $counter['value'] = $value;

                array_push( $content_details, $counter );
            endif;
        }

        if ( empty( $content_details ) )
            return;
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