<?php

function create_bonus_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Бонуси',
            'singular_name' => 'Бонуси',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'), // Вкажіть підтримувані поля
        'taxonomies' => array('bonus_category'), // Замінюємо 'category' на нову таксономію 'casino_category'
    );
    register_post_type('bonus', $args);
}
add_action('init', 'create_bonus_post_type');

// Додаємо нову таксономію 'bonus_category' для типу записів 'casino'
function create_bonus_taxonomy() {
    $labels = array(
        'name' => 'Категорії бонусів',
        'singular_name' => 'Категорія бонуса',
        'search_items' => 'Шукати категорію бонуса',
        'all_items' => 'Усі категорії бонуса',
        'parent_item' => 'Батьківська категорія бонуса',
        'edit_item' => 'Редагувати категорію бонуса',
        'update_item' => 'Оновити категорію бонуса',
        'add_new_item' => 'Додати нову категорію бонуса',
        'new_item_name' => 'Нова назва категорії бонуса',
        'menu_name' => 'Категорії бонуса',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'bonus-category'), // Створення URL зі слагом casino-category
    );

    register_taxonomy('bonus_category', 'bonus', $args);
}
add_action('init', 'create_bonus_taxonomy');