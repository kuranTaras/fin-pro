<?php
// add casino post type

function create_casino_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Казино',
            'singular_name' => 'Казино',
        ),
        'public' => true,
        'has_archive' => true,
        'supports'     => array( 'comments', 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies' => array('casino_category'), // Замінюємо 'category' на нову таксономію 'casino_category'
        'rewrite' => array('slug' => 'casino'),
    );
    register_post_type('casino', $args);
}
add_action('init', 'create_casino_post_type');



// change url for casino post type
function stackoverflow_remove_cpt_slug( $post_link, $post ) {
    if ( 'casino' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
    return $post_link;
}
add_filter( 'post_type_link', 'stackoverflow_remove_cpt_slug', 10, 2 );


function stackoverflow_add_cpt_post_names_to_main_query( $query ) {
    // Return if this is not the main query.
    if ( ! $query->is_main_query() ) {
        return;
    }
    // Return if this query doesn't match our very specific rewrite rule.
    if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
        return;
    }
    // Return if we're not querying based on the post name.
    if ( empty( $query->query['name'] ) ) {
        return;
    }
    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set( 'post_type', array( 'post', 'page', 'casino' ) );
}
add_action( 'pre_get_posts', 'stackoverflow_add_cpt_post_names_to_main_query' );


// Додаємо нову таксономію 'casino_category' для типу записів 'casino'
function create_casino_taxonomy() {
    $labels = array(
        'name' => 'Категорії казино',
        'singular_name' => 'Категорія казино',
        'search_items' => 'Шукати категорію казино',
        'all_items' => 'Усі категорії казино',
        'parent_item' => 'Батьківська категорія казино',
        'edit_item' => 'Редагувати категорію казино',
        'update_item' => 'Оновити категорію казино',
        'add_new_item' => 'Додати нову категорію казино',
        'new_item_name' => 'Нова назва категорії казино',
        'menu_name' => 'Категорії казино',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'casino-category'), // Створення URL зі слагом casino-category
    );

    register_taxonomy('casino_category', 'casino', $args);
}
add_action('init', 'create_casino_taxonomy');