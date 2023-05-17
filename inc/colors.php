<?php
/**
 * theme color
 *
 * @package corponotch_pro
 */

/**
 * Generate the CSS for the current custom color.
 */
function corponotch_pro_custom_colors_css() {
    $primary_color = corponotch_pro_theme_option('primary_color');
    $secondary_color = corponotch_pro_theme_option('secondary_color');
    
    $css = '
    /*p-color: ' . esc_attr( $primary_color ) . ';*/
    /*s-color: ' . esc_attr( $secondary_color ) . ';*/

    /*Primary Color*/
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more a:hover,
    .main-navigation ul.sub-menu,
    .short-cta-section,
    #skills,
    .menu-toggle,
    .backtotop:hover,
    a.more-btn:hover,
    #respond input[type="submit"]:hover,
    .hero-section .read-more a:hover,
    #pricing .read-more a:hover,
    .widget .tagcloud a:hover,
    .blog-loader-btn .read-more a:hover,
    .cta-section .read-more a:hover,
    .widget_search form.search-form button.search-submit,
    #contact .section-content .entry-container,
    #introduction .wp-playlist.wp-audio-playlist.wp-playlist-light,
    .banner-slider.dark-text .custom-header-content p.sub-title:before,
    .banner-slider.dark-text .custom-header-content p.sub-title:after,
    #pricing article.hentry.highlight .post-wrapper .entry-header,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn.alt-btn-primary a,
    #portfolio .gallery .featured-image .overlay,
    .testimonial-section .overlay,
    .cta-section .overlay,
    .cta-section,
    .inner-header-image .overlay, 
    .counter-widget .overlay,
    .custom-header-content-wrapper .overlay,
    #colophon,
    #top-menu {
        background-color: ' . esc_attr( $primary_color ) . ';
    }

    .banner-slider.dark-text .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn.alt-btn-primary a:hover,
    .banner-slider.dark-text .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn a,
    .banner-slider.dark-text .custom-header-content p.sub-title,
    .banner-slider.dark-text .custom-header-content h2 a,
    article .entry-title a,
    .section-title,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn.alt-btn-primary a:hover,
    .short-cta-section.cta-section .read-more a:hover,
    #contact .wpcf7 input.wpcf7-form-control.wpcf7-submit:hover, 
    #contact .wpcf7 input.wpcf7-form-control.wpcf7-submit:focus,
    #secondary .widget-title, 
    #secondary .widgettitle,
    .widget .tagcloud a,
    .site-title a {
        color: ' . esc_attr( $primary_color ) . ';
    }

    .team-section .team-image .overlay {
        background: linear-gradient(0deg, ' . esc_attr( $primary_color ) . ', transparent);
    }

    #respond input[type="submit"]:hover,
    .widget .tagcloud a {
        border-color: ' . esc_attr( $primary_color ) . ';
    }

    /*Secondary Color*/
    .loader-container svg, 
    .blog-loader svg,
    .navigation.posts-navigation a:hover svg, 
    .navigation.post-navigation a:hover svg,
    #masthead.site-header.sticky-header.nav-shrink .main-navigation ul li.menu-item-has-children a:hover svg, 
    .main-navigation ul li.menu-item-has-children a:hover svg,
    .secondary-menu ul li svg {
        fill: ' . esc_attr( $secondary_color ) . ';
    }

    a:hover, a:focus,
    .entry-meta > span a:hover, 
    .entry-meta > span a:focus,
    span.posted-on a:hover, 
    span.posted-on a:focus, 
    span.posted-on time:hover,
    span.posted-on time:focus,
    .our-services article.hentry .fa,
    article .entry-title a:hover,
    .our-services article .entry-title a:hover,
    .main-navigation a:hover, 
    ul.trail-items li.trail-item.trail-end,
    ul.trail-items li a:hover, 
    ul.trail-items li a:focus,
    #masthead.site-header.sticky-header.nav-shrink .main-navigation .current_page_item > a, 
    #masthead.site-header.sticky-header.nav-shrink .main-navigation .current-menu-item > a, 
    #masthead.site-header.sticky-header.nav-shrink .main-navigation .current_page_ancestor > a, 
    #masthead.site-header.sticky-header.nav-shrink .main-navigation .current-menu-ancestor > a, 
    .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, 
    #masthead.absolute-header .main-navigation .current_page_item > a,
    .main-navigation .current_page_ancestor > a, 
    .main-navigation .current-menu-ancestor > a,
    ul.check-list li:before,
    #portfolio .gallery .featured-image a.more-btn:hover,
    .main-navigation ul.menu li.current-menu-item > a {
        color: ' . esc_attr( $secondary_color ) . ';
    }

    a.more-btn,
    .separator,
    .backtotop,
    #secondary .widget-title:after, 
    #secondary .widgettitle:after,
    #pricing article .post-wrapper .entry-header,
    .hero-section .read-more a,
    .blog-loader-btn .read-more a,
    .blog-loader-btn .read-more a, 
    .read-more a,
    #respond input[type="submit"],
    #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
    #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current:after,
    #introduction .wp-playlist-tracks .wp-playlist-item.wp-playlist-playing,
    #introduction .wp-playlist-tracks .wp-playlist-item:hover,
    #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-time-rail .mejs-time-current,
    #introduction .wp-playlist .mejs-currenttime,
    .widget_search form.search-form button.search-submit,
    .wpcf7 input.wpcf7-form-control.wpcf7-submit,
    #skills .wrapper .section-content .skills-background a.skills-play-btn,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more a,
    .short-cta-section .read-more a,
    #pricing .read-more a,
    .slick-prev:hover, 
    .slick-next:hover, 
    .slick-prev:focus, 
    .slick-next:focus {
        background-color: ' . esc_attr( $secondary_color ) . ';
    }

    #respond input[type="submit"],
    #skills .wrapper .section-content .skills-background a.skills-play-btn:before {
        border-color: ' . esc_attr( $secondary_color ) . ';
    }

    /*general*/
    a.more-btn,
    a.more-btn:hover,
    .blog-loader-btn .read-more a,
    #pricing article .entry-header .entry-value, 
    #pricing article .entry-header .entry-title, 
    #pricing article .entry-header .sub-label,
    #pricing .read-more a,
    #pricing .read-more a:hover,
    .hero-section .read-more a,
    .hero-section .read-more a:hover,
    .cta-section .read-more a:hover,
    .short-cta-section .read-more a,
    .wpcf7 input.wpcf7-form-control.wpcf7-submit,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more a:hover,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more a {
        color: #fff;
    }

    #front-products,
    #pricing article .post-wrapper,
    .client-section,
    .our-services {
        background : #f6f6f7;
    }

    .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn.alt-btn-primary a:hover,
    #contact .wpcf7 input.wpcf7-form-control.wpcf7-submit:hover, 
    #contact .wpcf7 input.wpcf7-form-control.wpcf7-submit:focus,
    .short-cta-section .read-more a:hover {
        background-color: #fff;
    }

    .team-section .social-icons li {
        border: 1px solid #fff;
    }

    .team-section .social-icons li:hover {
        background-color: #fff;
    }

    .team-section .social-icons li,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more.alt-btn a {
        background-color: transparent;
    }
    
    .site-info {
        background-color: rgba(0,0,0,0.5);
    }

    @keyframes preloader {
        0% {height:5px;transform:translateY(0px);background: ' . esc_attr( $secondary_color ) . ';}
        25% {height:30px;transform:translateY(15px);background: ' . esc_attr( $secondary_color ) . ';}
        50% {height:5px;transform:translateY(0px);background: ' . esc_attr( $secondary_color ) . ';}
        100% {height:5px;transform:translateY(0px);background: ' . esc_attr( $secondary_color ) . ';}
    }

    @media screen and (min-width: 1024px) {
        #search.search-open {
            border-color: ' . esc_attr( $primary_color ) . ';
        }
        #masthead .main-navigation ul.nav-menu > li.button a {
            background-color: ' . esc_attr( $secondary_color ) . ';
            color: #fff;
        }
        #masthead .main-navigation ul.nav-menu > li.button:hover a {
            background-color: ' . esc_attr( $primary_color ) . ';
            color: #fff;
        }
        #masthead.site-header.sticky-header.nav-shrink {
             background-color: ' . esc_attr( $primary_color ) . ';
        }
    }

    @media screen and (max-width: 1023px) {
        #masthead.absolute-header.site-header.sticky-header.nav-shrink .site-title a, 
        #masthead.absolute-header .site-title a,
        #masthead.site-header.sticky-header.nav-shrink .site-title a,
        #masthead.site-header.sticky-header .site-title a,
        #masthead.site-header.sticky-header.nav-shrink .site-title a, 
        .site-title a, 
        #masthead.site-header.sticky-header .site-title a {
            color: ' . esc_attr( $primary_color ) . ';
        }
        .main-navigation ul.nav-menu {
            background-color: ' . esc_attr( $primary_color ) . ';
        }
    }

    /* Woocommerce */

    .woocommerce ul.products li.product .woocommerce-loop-category__title, 
    .woocommerce ul.products li.product .woocommerce-loop-product__title, 
    .woocommerce ul.products li.product h3
    {
        color: ' . esc_attr( $primary_color ) . ';
    }

    .woocommerce #respond input#submit, 
    .woocommerce a.button, 
    .woocommerce button.button, 
    .woocommerce input.button,
    .woocommerce #respond input#submit.alt, 
    .woocommerce a.button.alt, 
    .woocommerce button.button.alt, 
    .woocommerce input.button.alt,
    .woocommerce .widget_price_filter .price_slider_amount .button,
    .woocommerce ul.products li.product .button
    {
        color: #fff;
        background-color: ' . esc_attr( $secondary_color ) . ';
    }
    .woocommerce #respond input#submit:hover, 
    .woocommerce a.button:hover, 
    .woocommerce button.button:hover, 
    .woocommerce input.button:hover,
    .woocommerce #respond input#submit.alt:hover, 
    .woocommerce a.button.alt:hover, 
    .woocommerce button.button.alt:hover, 
    .woocommerce input.button.alt:hover,
    .woocommerce .widget_price_filter .price_slider_amount .button:hover,
    .woocommerce ul.products li.product .button:hover 
    {
        background-color: ' . esc_attr( $primary_color ) . ';
        color: #fff;
    }
    .woocommerce ul.products li.product .woocommerce-loop-category__title:hover, 
    .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, 
    .woocommerce ul.products li.product h3:hover 
    {
        color: ' . esc_attr( $secondary_color ) . ';
    }
    .woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range
    {
        background-color: ' . esc_attr( $secondary_color ) . ';
    }
    .woocommerce-pagination svg
    {
        fill: ' . esc_attr( $secondary_color ) . ';
    }
    .woocommerce nav.woocommerce-pagination ul li a:focus svg, 
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li a:hover svg
    {
        border-color: ' . esc_attr( $primary_color ) . ';
        color: ' . esc_attr( $primary_color ) . ';
        fill: ' . esc_attr( $primary_color ) . ';
    }';

    return apply_filters( 'corponotch_pro_custom_colors_css', $css );
}