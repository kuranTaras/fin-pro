<?php
// block xmlrpc
add_action('init', 'block_xmlrpc');

function block_xmlrpc() {
    // Перевірка, чи виконується запит до xmlrpc.php
    if (strpos($_SERVER['REQUEST_URI'], '/xmlrpc.php') !== false) {
        // Відмова в доступі та вивід повідомлення
        header('HTTP/1.1 403 Forbidden');
        exit('Доступ заборонено.');
    }
}


// remove "?ver=" in html code
function shapeSpace_remove_version_scripts_styles($src) {

    if (strpos($src, 'ver=')) {

        $src = remove_query_arg('ver', $src);

    }

    return $src;

}

add_filter('style_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999); add_filter('script_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);



remove_action('wp_head', 'rest_output_link_wp_head', 10);

remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

remove_action('template_redirect', 'rest_output_link_header', 11, 0);

remove_action( 'wp_head', 'wp_shortlink_wp_head');

remove_action( 'template_redirect', 'wp_shortlink_header', 11);

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds

remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed

remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link

remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.

remove_action( 'wp_head', 'index_rel_link' ); // index link

remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link

remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link

remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.

remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version




// change login page errors text
add_filter( 'login_errors', function( $error ) {
    global $errors;
    $err_codes = $errors->get_error_codes();

    // Invalid username.
    // Default: '<strong>ERROR</strong>: Invalid username. <a href="%s">Lost your password</a>?'
    if ( in_array( 'invalid_username', $err_codes ) ) {
        $error = 'Wrong information';
    }

    // Incorrect password.
    // Default: '<strong>ERROR</strong>: The password you entered for the username <strong>%1$s</strong> is incorrect. <a href="%2$s">Lost your password</a>?'
    if ( in_array( 'incorrect_password', $err_codes ) ) {
        $error = 'Wrong information';
    }

    return $error;
} );