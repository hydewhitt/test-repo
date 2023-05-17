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
        $image = get_template_directory_uri() . '/assets/uploads/results-matter.png';
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

        ?>
        <div class="page-section">
            <img src="<?php echo esc_url( $image ); ?>">
        </div>
    <?php 
    }
endif;