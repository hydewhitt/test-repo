<?php
/**
 * Pricing hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_pricing_section' ) ) :
    /**
    * Add pricing section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_pricing_section() {

        // Check if pricing is enabled on frontpage
        $pricing_enable = apply_filters( 'corponotch_pro_section_status', 'enable_pricing', '' );

        if ( ! $pricing_enable )
            return false;

        // Get pricing section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_pricing_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render pricing section now.
        corponotch_pro_render_pricing_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_pricing_section_details' ) ) :
    /**
    * pricing section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input pricing section details.
    */
    function corponotch_pro_get_pricing_section_details( $input ) {

        // Content type.
        $pricing_count  = corponotch_pro_theme_option('pricing_count', 3 );
        $content = array();

            for ( $i = 1; $i <= $pricing_count; $i++ ) :
                $details['highlight']       = corponotch_pro_theme_option( 'pricing_highlight_' . $i );
                $details['label']       = corponotch_pro_theme_option( 'pricing_label_' . $i );
                $details['value']       = corponotch_pro_theme_option( 'pricing_value_' . $i );
                $details['sub_label']   = corponotch_pro_theme_option( 'pricing_sub_label_' . $i );
                $details['list']        = corponotch_pro_theme_option( 'pricing_list_' . $i );
                $details['btn_label']   = corponotch_pro_theme_option( 'pricing_btn_label_' . $i );
                $details['btn_url']     = corponotch_pro_theme_option( 'pricing_btn_url_' . $i );

                // Push to the main array.
                array_push( $content, $details );
            endfor;

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// pricing section content details.
add_filter( 'corponotch_pro_filter_pricing_section_details', 'corponotch_pro_get_pricing_section_details' );


if ( ! function_exists( 'corponotch_pro_render_pricing_section' ) ) :
  /**
   * Start pricing section
   *
   * @return string pricing content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_pricing_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $pricing_count  = corponotch_pro_theme_option('pricing_count', 3 );
        $title = corponotch_pro_theme_option( 'pricing_title', '' );
        $sub_title = corponotch_pro_theme_option( 'pricing_sub_title', '' );
        ?>
    	<div id="pricing" class="page-section relative">
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

                <div class="section-content column-<?php echo esc_attr( $pricing_count ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                            <article class="hentry <?php echo $content['highlight'] ? 'highlight' : ''; ?>">
                                <div class="post-wrapper">
                                    <div class="entry-container">
                                        <?php if ( ! empty( $content['label'] ) || ! empty( $content['value'] ) ) : ?>
                                            <header class="entry-header">
                                                <?php if ( ! empty( $content['label'] ) ) : ?>
                                                    <h3 class="entry-title"><?php echo esc_html( $content['label'] ); ?></h3>
                                                <?php endif; 

                                                if ( ! empty( $content['value'] ) ) : ?>
                                                    <h2 class="entry-value"><?php echo esc_html( $content['value'] ); ?></h2>
                                                <?php endif; 

                                                if ( ! empty( $content['sub_label'] ) ) : ?>
                                                    <p class="sub-label"><?php echo esc_html( $content['sub_label'] ); ?></p>
                                                <?php endif; ?>
                                            </header>
                                        <?php endif; 

                                        if ( ! empty( $content['list'] ) ) : 
                                            $pricing_list = explode( '|', $content['list'] ); ?>
                                            <div class="entry-content">
                                                <ul class="pricing-list">
                                                    <?php foreach ( $pricing_list as $list ) : ?>
                                                        <li>
                                                            <?php echo esc_html( $list ); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div><!-- .entry-content -->
                                        <?php endif;

                                        if ( ! empty( $content['btn_label'] ) && ! empty( $content['btn_url'] ) ) : ?>
                                            <div class="read-more">
                                                <a class="btn" href="<?php echo esc_url( $content['btn_url'] ); ?>"><?php echo esc_html( $content['btn_label'] ); ?></a>
                                            </div>
                                        <?php endif; ?>

                                    </div><!-- .entry-container -->
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #popular-posts -->
    <?php 
    }
endif;