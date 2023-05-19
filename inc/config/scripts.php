<?php
// CF7 Remove Scripts and Styles
add_filter('wpcf7_load_js', '__return_false'); // Disable CF7 JavaScript, will only load it on contact page
add_filter('wpcf7_load_css', '__return_false'); // Disable CF7 CSS


function theme_enqueue_scripts() {
    // remove Gutenberg CSS as we are not using it
    wp_dequeue_style( 'wp-block-library' );

    wp_enqueue_style('theme-styles', get_template_directory_uri() . '/bundle/styles.bundle.css', '1.0');
    wp_enqueue_script('bundle-script', get_template_directory_uri() . '/bundle/app.bundle.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');