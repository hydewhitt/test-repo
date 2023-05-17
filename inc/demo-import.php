<?php
/**
 * demo import
 *
 * @package corponotch_pro
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function corponotch_pro_ocdi_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__( 'Default', 'corponotch-pro' ),
            'categories'                 => array( 'Business' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/default/corponotch-pro-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/default/corponotch-pro-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/default/corponotch-pro-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/default/corponotch-pro-default.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Consultant', 'corponotch-pro' ),
            'categories'                 => array( 'Business', 'Consultant' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/consultant/corponotch-pro-consultant-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/consultant/corponotch-pro-consultant-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/consultant/corponotch-pro-consultant-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/consultant/corponotch-pro-consultant.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Dark', 'corponotch-pro' ),
            'categories'                 => array( 'Business', 'Dark' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/dark/corponotch-pro-dark-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/dark/corponotch-pro-dark-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/dark/corponotch-pro-dark-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/dark/corponotch-pro-dark.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Medical', 'corponotch-pro' ),
            'categories'                 => array( 'Medical' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/medical/corponotch-pro-medical-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/medical/corponotch-pro-medical-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/medical/corponotch-pro-medical-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/medical/corponotch-pro-medical.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Education', 'corponotch-pro' ),
            'categories'                 => array( 'Education' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/education/corponotch-pro-education-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/education/corponotch-pro-education-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/education/corponotch-pro-education-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/education/corponotch-pro-education.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Construction', 'corponotch-pro' ),
            'categories'                 => array( 'Construction' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/construction/corponotch-pro-construction-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/construction/corponotch-pro-construction-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/construction/corponotch-pro-construction-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/construction/corponotch-pro-construction.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Music', 'corponotch-pro' ),
            'categories'                 => array( 'Music' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/music/corponotch-pro-music-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/music/corponotch-pro-music-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/music/corponotch-pro-music-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/music/corponotch-pro-music.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Pet', 'corponotch-pro' ),
            'categories'                 => array( 'Pet' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/pet/corponotch-pro-pet-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/pet/corponotch-pro-pet-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/pet/corponotch-pro-pet-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/pet/corponotch-pro-pet.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),

        array(
            'import_file_name'           => esc_html__( 'Law', 'corponotch-pro' ),
            'categories'                 => array( 'Law' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/law/corponotch-pro-law-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/law/corponotch-pro-law-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/law/corponotch-pro-law-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/assets/demo/law/corponotch-pro-law.jpg',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'corponotch-pro' ),
        ),


    );
}
add_filter( 'pt-ocdi/import_files', 'corponotch_pro_ocdi_import_files' );

/**
 * 
 * Automatically assign "Front page", "Posts page" and menu locations after the importer is done
 * 
 */
function corponotch_pro_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    $social = get_term_by('name', 'Social', 'nav_menu');
    $footer = get_term_by('name', 'Footer', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'social' => $social->term_id,
            'footer' => $footer->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'corponotch_pro_ocdi_after_import_setup' );

// Disable the ProteusThemes branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
