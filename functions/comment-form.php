<?php

// comments form settings

function remove_comment_fields($fields) {

    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');

function wpso_verify_policy_check( $commentdata ) {
    if ( 'post' === get_post_type( $_POST['comment_post_ID'] ) ) {
        if ( ! isset( $_POST['wp-comment-cookies-consent'] ) ) {
            wp_die( '<strong>' . __( 'WARNING: ' ) . '</strong>' . __( 'You must accept the Privacy Policy.' ) . '<p><a href="javascript:history.back()">' . __( '&laquo; Back' ) . '</a></p>');
        }
    }
    return $commentdata;
}

add_filter( 'preprocess_comment', 'wpso_verify_policy_check' );



function custom_comment_form_defaults($defaults) {

    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x('Коментар', 'noun') . '</label><br/><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>';

    $defaults['title_reply'] = __('');
    $defaults['label_submit'] = __('відправити');

    return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');




// Додавання поля чекбоксу "Я згоден з правилами коментування" перед кнопкою "Відправити коментар".
function custom_comment_form_fields($fields) {
    $comment_rules = '<p class="comment-form-comment-rules">'.
        '<input type="checkbox" name="wp-comment-rules-agreement" id="wp-comment-rules-agreement" required> '.
        '<label for="wp-comment-rules-agreement">' . __( 'Мне уже исполнилось 18 лет, закон разрешает мне играть в клубах' ) . '</label>'.
        '</p>';
    $fields['comment_rules'] = $comment_rules;
    return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_form_fields');

// Перевірка, чи позначений чекбокс згоди з правилами перед відправкою коментаря.
function validate_comment_rules_field() {
    if (!isset($_POST['wp-comment-rules-agreement'])) {
        wp_die('Підтвердьте, що ви згодні з правилами коментування.');
    }
}
add_action('pre_comment_on_post', 'validate_comment_rules_field');













add_filter( 'comment_form_default_fields', 'crunchify_comment_placeholders' );
function crunchify_comment_placeholders( $crunchify_textfield ) {

    $crunchify_textfield['email'] = str_replace(
        '<input',
        '<input placeholder="e-mail"',
        $crunchify_textfield['email']
    );
    return $crunchify_textfield;
}

add_filter( 'comment_form_default_fields', 'author_comment' );
function author_comment( $crunchify_textfield ) {

    $crunchify_textfield['author'] = str_replace(
        '<input',
        '<input placeholder="Ваше ім\'я"',
        $crunchify_textfield['author']
    );
    return $crunchify_textfield;
}

add_filter( 'comment_form_defaults', 'crunchify_textarea_placeholder' );
function crunchify_textarea_placeholder( $crunchify_textarea ) {
    $crunchify_textarea['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="Введіть текст..."',
        $crunchify_textarea['comment_field']
    );
    return $crunchify_textarea;
}

add_filter( 'gettext', 'theme_change_comment_cookie_label', 20, 3 );
function theme_change_comment_cookie_label( $translated_text, $text, $domain ) {
    if ( is_singular() ) {
        switch ( $translated_text ) {
            case $translated_text == 'Зберегти моє ім\'я, e-mail, та адресу сайту в цьому браузері для моїх подальших коментарів.' :
                $translated_text = __( 'Мне уже исполнилось 18 лет, закон разрешает мне играть в клубах ');
                break;
        }
    }
    return $translated_text;
}
