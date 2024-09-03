<?php
// Function to remove unnecessary items from head
function clean_up_wp_head() {
    // Remove unnecessary links and meta tags from head
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('wp_head', 'wp_oembed_add_host_js', 10);
    
    // Remove emoji scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remove admin bar styles
    remove_action('wp_head', 'wp_admin_bar_header');
    remove_action('wp_head', 'wp_admin_bar_css');
}

// Function to dequeue unnecessary styles
function dequeue_unnecessary_styles() {
    // Dequeue Dashicons
    wp_dequeue_style('dashicons');
    
    // Remove Classic Theme Styles
    remove_action('wp_head', 'classic_theme_styles_inline_css');
}

// Hook to wp_head to clean up head section
add_action('wp_head', 'clean_up_wp_head');

// Hook to wp_enqueue_scripts to dequeue unnecessary styles
add_action('wp_enqueue_scripts', 'dequeue_unnecessary_styles', 100);

?>
