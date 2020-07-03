<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

function generatepress_child_enqueue_scripts()
{
    if (is_rtl()) {
        wp_enqueue_style('generatepress-rtl', trailingslashit(get_template_directory_uri()) . 'rtl.css');
    }
}
add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100);

/**
 * Required and Recommended Plugins
 */
function prefix_register_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        [
            'name'     => '404 to 301 - Redirect, Log and Notify 404 Errors',
            'slug'     => '404-to-301',
            'required' => true,
        ],
        [
            'name'     => 'Breadcrumb NavXT',
            'slug'     => 'breadcrumb-navxt',
            'required' => true,
        ],
        [
            'name'     => 'GenerateBlocks',
            'slug'     => 'generateblocks',
            'required' => true,
        ],
        [
            'name'     => 'Simple 301 Redirects',
            'slug'     => 'simple-301-redirects',
            'required' => true,
        ],
        [
            'name'     => 'LuckyWP Table of Contents',
            'slug'     => 'luckywp-table-of-contents',
            'required' => true,
        ],
        [
            'name'     => 'WP Post Author',
            'slug'     => 'wp-post-author',
            'required' => true,
        ],
        [
            'name'     => 'Disable Emojis (GDPR friendly)',
            'slug'     => 'disable-emojis',
            'required' => true,
        ],
    );

    tgmpa($plugins);
}
add_action('tgmpa_register', 'prefix_register_plugins');

function showBreadCrumbs()
{
    if (function_exists('bcn_display') && is_single()) {
        echo '<div class="breadcrumbs">';
        echo '<div typeof="BreadcrumbList" vocab="https://schema.org/">';
        bcn_display();
        echo '</div></div>';
    }
}
add_action('generate_before_main_content', 'showBreadCrumbs');

function showAuthorDescription()
{
    if (is_single()) {
        ob_start();
        echo '<div style="margin-top:2rem;">';
        echo do_shortcode('[wp-post-author title="Tentang Penulis"]');
        echo '</div>';
        ob_clean();
    }
}
add_action('generate_after_content', 'showAuthorDescription');

function add_prism()
{
    if (is_single()) {
        wp_enqueue_style('prism-css', get_stylesheet_directory_uri() . '/plugin/prism.css');
        wp_enqueue_script('prism-js', get_stylesheet_directory_uri() . '/plugin/prism.js', [], false, true);
    }
}
add_action('wp_enqueue_scripts', 'add_prism');

function stickySidebar()
{
    if (!is_front_page() && !is_home()) {
        wp_enqueue_script('sticky-sidebar-js', 'https://cdn.jsdelivr.net/npm/sticky-sidebar@3.3.1/dist/jquery.sticky-sidebar.min.js', [], false, true);
    }
}

add_action('generate_after_footer_content', 'stickySidebar');
