<?php

/**
 * Disable WP Feeds
 */
function site_disable_feed()
{
    wp_redirect(home_url());
    die;
}

add_action('do_feed', 'site_disable_feed', 1);
add_action('do_feed_rdf', 'site_disable_feed', 1);
add_action('do_feed_rss', 'site_disable_feed', 1);
add_action('do_feed_rss2', 'site_disable_feed', 1);
add_action('do_feed_atom', 'site_disable_feed', 1);
add_action('do_feed_rss2_comments', 'site_disable_feed', 1);
add_action('do_feed_atom_comments', 'site_disable_feed', 1);
// Remove links to feed from the header.
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator');


/**
 * Disable WP EMBEDS
 */
function site_disable_embeds_code_init()
{

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');

    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed iframes communicate JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
    add_filter('tiny_mce_plugins', 'site_disable_embeds_tiny_mce_plugin');

    // Remove all embeds rewrite rules.
    add_filter('rewrite_rules_array', 'site_disable_embeds_rewrites');

    // Remove filter of the oEmbed result before any HTTP requests are made.
    remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);

    // Remove [embed] shortcode parser
    remove_filter('the_content', [$GLOBALS['wp_embed'], 'run_shortcode'], 8);
    remove_filter('widget_text_content', [$GLOBALS['wp_embed'], 'run_shortcode'], 8);

    // Remove embed url parser
    remove_filter('the_content', [$GLOBALS['wp_embed'], 'autoembed'], 8);
    remove_filter('widget_text_content', [$GLOBALS['wp_embed'], 'autoembed'], 8);
}

add_action('init', 'site_disable_embeds_code_init', 9999);

function site_disable_embeds_tiny_mce_plugin($plugins)
{
    return array_diff($plugins, array('wpembed'));
}

function site_disable_embeds_rewrites($rules)
{
    foreach ($rules as $rule => $rewrite) {
        if (false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

add_action('init', 'site_remove_oembed_providers', 99);

function site_remove_oembed_providers()
{

    // existing providers
    // print_r( _wp_oembed_get_object()->providers );

    $remove_formats = [
        // youtube
        '#https?://((m|www)\.)?youtube\.com/watch.*#i',
        '#https?://((m|www)\.)?youtube\.com/playlist.*#i',
        '#https?://youtu\.be/.*#i'
    ];

    foreach ($remove_formats as $format) {
        wp_oembed_remove_provider($format);
    }
}

/**
 * Disable WP Short link
 */
add_filter('after_setup_theme', 'site_remove_redundant_shortlink');

function site_remove_redundant_shortlink()
{
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action('template_redirect', 'wp_shortlink_header', 11);
}

/**
 * Disable WP - Remove wpml meta generator tag
 */
add_action('wp_head', 'site_remove_wpml_generator', 0);
function site_remove_wpml_generator()
{
    if (!empty($GLOBALS['sitepress'])) {
        remove_action(current_filter(), array($GLOBALS['sitepress'], 'meta_generator_tag'));
    }
}

/**
 * Disable WP - Remove API links
 */
function site_remove_api()
{
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
}
add_action('after_setup_theme', 'site_remove_api');

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 */
function site_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'site_remove_wp_block_library_css', 100);

/**
 * Remove WPML Block Styles 
 */
function site_disable_wpml_block_styles() {
    if ( class_exists( 'WPML\BlockEditor\Loader' ) ) {
        wp_deregister_style( WPML\BlockEditor\Loader::SCRIPT_NAME );
    }
}
 
add_action( 'wp_enqueue_scripts', 'site_disable_wpml_block_styles', 11 );
