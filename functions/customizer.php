<?php

// footer widgets

function custom_footer_widgets_init() {
    // Реєстрація чотирьох віджетів для футеру
    register_sidebar( array(
        'name'          => 'Футер Меню Обзори',
        'id'            => 'footer-widget-1',
        'description'   => 'Перший віджет для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Футер Меню Бонуси 1',
        'id'            => 'footer-widget-2',
        'description'   => 'Другий віджет для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );


    register_sidebar( array(
        'name'          => 'Футер Меню Бонуси 2',
        'id'            => 'footer-widget-3',
        'description'   => 'Третій віджет для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Футер Меню Онлайн казино',
        'id'            => 'footer-widget-4',
        'description'   => 'Четвертий віджет для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Футер Меню Ігрові автомати',
        'id'            => 'footer-widget-5',
        'description'   => 'Пятий віджет для футера',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'custom_footer_widgets_init' );


// socials media
if( function_exists('acf_add_options_page') ) {

    $option_page = acf_add_options_page(array(
        'page_title'    => __('Socials Media'),
    ));

}


// header
function custom_theme_customizer_register( $wp_customize ) {
    // Додати новий розділ "Header"
    $wp_customize->add_section( 'custom_header_section', array(
        'title'    => __( 'Header', 'your-text-domain' ),
        'priority' => 120,
    ) );

    // Додати текстові поля для власного тексту у заголовку
    $wp_customize->add_setting( 'header_text_field1', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_text_field1', array(
        'label'    => __( 'Login link', 'your-text-domain' ),
        'section'  => 'custom_header_section',
        'type'     => 'text',
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'header_text_field2', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_text_field2', array(
        'label'    => __( 'Login text', 'your-text-domain' ),
        'section'  => 'custom_header_section',
        'type'     => 'text',
        'priority' => 20,
    ) );
}
add_action( 'customize_register', 'custom_theme_customizer_register' );

// footer
function custom_theme_customizer_footer_register( $wp_customize ) {
    // Додати новий розділ "Footer"
    $wp_customize->add_section( 'custom_footer_section', array(
        'title'    => __( 'Footer', 'your-text-domain' ),
        'priority' => 130,
    ) );

    // Додати textarea для тексту у футері
    $wp_customize->add_setting( 'footer_textarea1', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post', // Дозволяємо HTML-розмітку
    ) );

    $wp_customize->add_control( 'footer_textarea1', array(
        'label'    => __( 'Текстове поле 1 у футері', 'your-text-domain' ),
        'section'  => 'custom_footer_section',
        'type'     => 'textarea',
        'priority' => 10,
    ) );

    // Додати другий textarea для тексту у футері
    $wp_customize->add_setting( 'footer_textarea2', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post', // Дозволяємо HTML-розмітку
    ) );

    $wp_customize->add_control( 'footer_textarea2', array(
        'label'    => __( 'Текстове поле 2 у футері', 'your-text-domain' ),
        'section'  => 'custom_footer_section',
        'type'     => 'textarea',
        'priority' => 20,
    ) );

    // Додати textarea для збереження масиву фото у футері
    $wp_customize->add_setting( 'footer_photos', array(
        'default'           => '',
        'sanitize_callback' => 'custom_sanitize_photos', // Санітизація для збереження масиву фото
    ) );

    $wp_customize->add_control( 'footer_photos', array(
        'label'    => __( 'Фото у футері', 'your-text-domain' ),
        'section'  => 'custom_footer_section',
        'type'     => 'textarea',
        'priority' => 10,
    ) );
}
add_action( 'customize_register', 'custom_theme_customizer_footer_register' );


function custom_sanitize_photos( $input ) {
    $photos = array_map( 'esc_url_raw', explode( PHP_EOL, $input ) );
    return serialize( $photos );
}

