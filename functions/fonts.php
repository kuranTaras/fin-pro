<?php
function fonts_Montserrat_url() {
    $fonts_url = '';
    $fonts = [];
    $subsets = 'latin-ext';
    $display = 'swap';
    $fonts[] = 'Roboto:200,300,400,500,600,700,800&display=swap';

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => urlencode($subsets),
            'display' => urlencode( $display ),
        ), 'https://fonts.googleapis.com/css?family=');
    }

    return $fonts_url;
}

// Enqueue Montserrat font
function enqueue_google_fonts() {
    wp_enqueue_style( 'online-fonts', fonts_Montserrat_url() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts' );