<?php

/**
 * CorpoNotch Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corponotch_pro
 */

if ( !function_exists( 'cp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function cp_fs()
    {
        global  $cp_fs ;
        
        if ( !isset( $cp_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $cp_fs = fs_dynamic_init( array(
                'id'              => '9062',
                'slug'            => 'corponotch-pro',
                'type'            => 'theme',
                'public_key'      => 'pk_1e9b196ff7334e4da23e1995a56ee',
                'is_premium'      => true,
                'is_premium_only' => true,
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'menu'            => array(
                'contact' => false,
                'support' => false,
            ),
                'is_live'         => true,
            ) );
        }
        
        return $cp_fs;
    }
    
    // Init Freemius.
    cp_fs();
    // Signal that SDK was initiated.
    do_action( 'cp_fs_loaded' );
}

if ( !function_exists( 'corponotch_pro_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function corponotch_pro_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on CorpoNotch Pro, use a find and replace
         * to change 'corponotch-pro' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'corponotch-pro', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 600, 450, true );
        add_image_size(
            'corponotch-pro-medium',
            500,
            500,
            true
        );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'corponotch-pro' ),
            'social'  => esc_html__( 'Social Menu', 'corponotch-pro' ),
            'footer'  => esc_html__( 'Footer Menu', 'corponotch-pro' ),
        ) );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'corponotch_pro_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        // Add theme support for page excerpt.
        add_post_type_support( 'page', 'excerpt' );
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 400,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        // Enable support for footer widgets.
        add_theme_support( 'footer-widgets', 4 );
        // Load Footer Widget Support.
        require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widget.php' );
        // Gutenberg support
        add_theme_support( 'editor-color-palette', array( array(
            'name'  => esc_html__( 'Dark Blue', 'corponotch-pro' ),
            'slug'  => 'dark-blue',
            'color' => '#171a1f',
        ), array(
            'name'  => esc_html__( 'Orange', 'corponotch-pro' ),
            'slug'  => 'orange',
            'color' => '#ed6510',
        ), array(
            'name'  => esc_html__( 'Gray', 'corponotch-pro' ),
            'slug'  => 'gray',
            'color' => '#484848',
        ) ) );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-font-sizes', array(
            array(
            'name'      => esc_html__( 'small', 'corponotch-pro' ),
            'shortName' => esc_html__( 'S', 'corponotch-pro' ),
            'size'      => 12,
            'slug'      => 'small',
        ),
            array(
            'name'      => esc_html__( 'regular', 'corponotch-pro' ),
            'shortName' => esc_html__( 'M', 'corponotch-pro' ),
            'size'      => 16,
            'slug'      => 'regular',
        ),
            array(
            'name'      => esc_html__( 'large', 'corponotch-pro' ),
            'shortName' => esc_html__( 'L', 'corponotch-pro' ),
            'size'      => 36,
            'slug'      => 'larger',
        ),
            array(
            'name'      => esc_html__( 'extra large', 'corponotch-pro' ),
            'shortName' => esc_html__( 'XL', 'corponotch-pro' ),
            'size'      => 48,
            'slug'      => 'huge',
        )
        ) );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'wp-block-styles' );
    }

}
add_action( 'after_setup_theme', 'corponotch_pro_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corponotch_pro_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'corponotch_pro_content_width', 819 );
}

add_action( 'after_setup_theme', 'corponotch_pro_content_width', 0 );
if ( !function_exists( 'corponotch_pro_fonts_url' ) ) {
    /**
     * Register Google fonts
     *
     * @return string Google fonts URL for the theme.
     */
    function corponotch_pro_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
        /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Poppins:200,300,400,500,600,700';
        }
        /* header font */
        /* translators: If there are characters in your language that are not supported by Rajdhani, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Rajdhani font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Rajdhani: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Roboto: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Philosopher, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Philosopher font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Philosopher: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Slabo 27px, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Slabo 27px font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Slabo 27px: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Dosis: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Montserrat: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Tangerine, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Tangerine font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Tangerine: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Playfair Display: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Amatic SC, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Amatic SC font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Amatic SC: 200,300,400,500,600,700';
        }
        /* translators: If there are characters in your language that are not supported by Jost, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Jost font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Jost: 200,300,400,500,600,700';
        }
        /* Body Font */
        /* translators: If there are characters in your language that are not supported by News Cycle, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'News Cycle font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'News Cycle: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Pontano Sans, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Pontano Sans font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Pontano Sans: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Gudea, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Gudea font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Gudea: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Quattrocento, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Quattrocento font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Quattrocento: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Khand, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Khand font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Khand: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Oxygen: 300,400,500';
        }
        /* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Lora font: on or off', 'corponotch-pro' ) ) {
            $fonts[] = 'Lora: 300,400,500';
        }
        $query_args = array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        );
        if ( $fonts ) {
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }

}
/**
 * Add preconnect for Google Fonts.
 *
 * @since CorpoNotch Pro 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function corponotch_pro_resource_hints( $urls, $relation_type )
{
    if ( wp_style_is( 'corponotch-pro-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}

add_filter(
    'wp_resource_hints',
    'corponotch_pro_resource_hints',
    10,
    2
);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corponotch_pro_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'corponotch-pro' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'corponotch-pro' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebars( 4, array(
        'name'          => esc_html__( 'Optional Sidebar %d', 'corponotch-pro' ),
        'id'            => 'optional-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'corponotch-pro' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'WooCommerce Sidebar', 'corponotch-pro' ),
        'id'            => 'woocommerce-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'corponotch-pro' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'corponotch_pro_widgets_init' );
/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function corponotch_pro_min()
{
    return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min' );
}

/**
 * Enqueue scripts and styles.
 */
function corponotch_pro_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style(
        'corponotch-pro-fonts',
        corponotch_pro_fonts_url(),
        array(),
        null
    );
    // slick
    wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick' . corponotch_pro_min() . '.css' );
    // slick theme
    wp_enqueue_style( 'jquery-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . corponotch_pro_min() . '.css' );
    // font awesome
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . corponotch_pro_min() . '.css' );
    // blocks
    wp_enqueue_style( 'corponotch-pro-blocks', get_template_directory_uri() . '/assets/css/blocks' . corponotch_pro_min() . '.css' );
    wp_enqueue_style( 'corponotch-pro-style', get_stylesheet_uri() );
    if ( 'dark' == corponotch_pro_theme_option( 'theme_color_mode', 'light' ) ) {
        wp_enqueue_style(
            'corponotch-pro-color-mode',
            get_template_directory_uri() . '/assets/css/dark' . corponotch_pro_min() . '.css',
            array( 'corponotch-pro-style' ),
            '1.0'
        );
    }
    // Load the html5 shiv.
    wp_enqueue_script(
        'html5',
        get_template_directory_uri() . '/assets/js/html5' . corponotch_pro_min() . '.js',
        array(),
        '3.7.3'
    );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
    wp_enqueue_script(
        'corponotch-pro-navigation',
        get_template_directory_uri() . '/assets/js/navigation' . corponotch_pro_min() . '.js',
        array(),
        '20151215',
        true
    );
    $corponotch_pro_l10n = array(
        'quote'    => corponotch_pro_get_svg( array(
        'icon' => 'quote-right',
    ) ),
        'expand'   => esc_html__( 'Expand child menu', 'corponotch-pro' ),
        'collapse' => esc_html__( 'Collapse child menu', 'corponotch-pro' ),
        'icon'     => corponotch_pro_get_svg( array(
        'icon'     => 'angle-down',
        'fallback' => true,
    ) ),
    );
    wp_localize_script( 'corponotch-pro-navigation', 'corponotch_pro_l10n', $corponotch_pro_l10n );
    wp_enqueue_script(
        'corponotch-pro-skip-link-focus-fix',
        get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . corponotch_pro_min() . '.js',
        array(),
        '20151215',
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script(
        'jquery-slick',
        get_template_directory_uri() . '/assets/js/slick' . corponotch_pro_min() . '.js',
        array( 'jquery' ),
        '',
        true
    );
    wp_enqueue_script(
        'corponotch-pro-custom',
        get_template_directory_uri() . '/assets/js/custom' . corponotch_pro_min() . '.js',
        array( 'jquery' ),
        '20151215',
        true
    );
    if ( 'infinite' == corponotch_pro_theme_option( 'pagination_type' ) ) {
        wp_enqueue_script(
            'corponotch-pro-infinite',
            get_template_directory_uri() . '/assets/js/infinite' . corponotch_pro_min() . '.js',
            array( 'jquery' ),
            '',
            true
        );
    }
    if ( 'click' == corponotch_pro_theme_option( 'pagination_type' ) ) {
        wp_enqueue_script(
            'corponotch-pro-infinite',
            get_template_directory_uri() . '/assets/js/infinite-click' . corponotch_pro_min() . '.js',
            array( 'jquery' ),
            '',
            true
        );
    }
}

add_action( 'wp_enqueue_scripts', 'corponotch_pro_scripts' );
/**
 * Enqueue editor styles for Gutenberg
 */
function corponotch_pro_block_editor_styles()
{
    // Block styles.
    wp_enqueue_style( 'corponotch-pro-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . corponotch_pro_min() . '.css' ) );
    // Add custom fonts.
    wp_enqueue_style(
        'corponotch-pro-fonts',
        corponotch_pro_fonts_url(),
        array(),
        null
    );
}

add_action( 'enqueue_block_editor_assets', 'corponotch_pro_block_editor_styles' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
/**
 * WooCommerce plugin compatibility.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * OCDI plugin demo importer compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/demo-import.php';
}