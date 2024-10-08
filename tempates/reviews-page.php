<?php
// Template Name: Casino Reviews Page
get_header();
    // Вхідний URL
    $url = get_permalink();
    // Розбираємо URL для отримання частини шляху
    // Отримуємо частину з URL, яка відповідає за шлях посту (після базової адреси WordPress)
    $path = parse_url($url, PHP_URL_PATH);
    // Видаляємо слеші з початку і кінця рядка
    $path = trim($path, '/');
    // Замінюємо "-reviews" на порожній рядок
    $path = str_replace('-reviews', '', $path);
    // Отримуємо пост за кастомним пост-типом "casino" і з вказаним мета-ключем 'slug' (URL-частиною)
    $casino_post = get_page_by_path($path, OBJECT, 'casino');
    if ($casino_post) {
        get_template_part( 'template-parts/flexible/flex' );
    }
    get_footer();
?>
