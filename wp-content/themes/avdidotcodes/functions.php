<?php
function avdidotcodes_theme_enqueue_styles() {

    $parent_style = 'checkout-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'avdidotcodes-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'avdidotcodes_theme_enqueue_styles' );