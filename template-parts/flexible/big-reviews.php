
<?php
$casino_id = get_sub_field('reviews_for_casino');

?>
<section class="reviews reviews-big">
    <div class="container">
        <div class="reviews__slider swiper blur">
            <div class="reviews__wrapper swiper-wrapper">

                <?php


                foreach ($casino_id as $item) {
                    $comments_args = array(
                        'post_id' => $item, // Отримуємо ID поточного поста
                        'status' => 'approve' // Вибираємо тільки схвалені коментарі
                    );
                    $comments = get_comments($comments_args);

                    // Перевірка наявності коментарів
                    if ($comments) {
                        foreach ($comments as $comment) {
                            $author = $comment->comment_author; // Автор коментаря
                            $content = $comment->comment_content; // Текст коментаря
                            $rating = get_comment_meta($comment->comment_ID, 'rating', true); // Оцінка коментаря (припустимо, що вона зберігається в мета-полі "rating")

                            // Дата коментаря
                            $time_ago = human_time_diff(get_comment_time('U', true), current_time('timestamp')) . ' тому';

                            ?>
                            <div  class="reviews__slide swiper-slide">
                                <div class="reviews__slide-top">
                                    <div class="reviews__slide-name">
                                        <?php echo esc_html($author) ?>
                                    </div>
                                    <div class="reviews__slide-time">
                                        <?php echo esc_html($time_ago) ?>
                                    </div>
                                </div>
                                <div class="reviews__slide-text">
                                    <?php echo esc_html($content) ?>
                                </div>
                                <div class="reviews__slide-stars">
                                    <?php
                                    for ($i = 0; $i < $rating; $i++) {
                                        ?>
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_325_551)">
                                                <path d="M16.8239 6.111H10.3979L8.41191 0L6.44092 8.083L8.41191 12.223L13.6119 16L11.6259 9.889L16.8239 6.111Z" fill="#FF9635"/>
                                                <path d="M6.42698 6.111H0.000976562L5.20098 9.888L3.21398 16L8.41398 12.223V0L6.42698 6.111Z" fill="#FF9635"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_325_551">
                                                    <rect width="16.823" height="16" fill="white" transform="translate(0.000976562)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }



                // Отримання коментарів

                ?>

            </div>
        </div>
    </div>
    <div class="reviews__nav">
        <div class="reviews__prev">
            <svg width="40" height="33" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M39.9469 16.5C39.9469 16.7303 39.8554 16.9512 39.6925 17.1141C39.5297 17.2769 39.3088 17.3684 39.0785 17.3684H2.96626L17.1146 31.5167C17.2775 31.6797 17.3691 31.9007 17.3691 32.1311C17.3691 32.3616 17.2775 32.5826 17.1146 32.7455C16.9516 32.9085 16.7306 33 16.5002 33C16.2698 33 16.0488 32.9085 15.8858 32.7455L0.254689 17.1144C0.173948 17.0337 0.109897 16.938 0.0661954 16.8326C0.022494 16.7271 0 16.6141 0 16.5C0 16.3859 0.022494 16.2729 0.0661954 16.1675C0.109897 16.062 0.173948 15.9663 0.254689 15.8856L15.8858 0.254488C15.9665 0.173805 16.0623 0.109804 16.1677 0.0661391C16.2731 0.0224738 16.3861 0 16.5002 0C16.6143 0 16.7273 0.0224738 16.8327 0.0661391C16.9381 0.109804 17.0339 0.173805 17.1146 0.254488C17.1953 0.335171 17.2593 0.430956 17.3029 0.536373C17.3466 0.64179 17.3691 0.754776 17.3691 0.868879C17.3691 0.982982 17.3466 1.09597 17.3029 1.20138C17.2593 1.3068 17.1953 1.40259 17.1146 1.48327L2.96626 15.6316H39.0785C39.3088 15.6316 39.5297 15.7231 39.6925 15.886C39.8554 16.0488 39.9469 16.2697 39.9469 16.5Z" fill="#00D1FF"/>
            </svg>
        </div>
        <div class="reviews__pagination swiper-pagination"></div>
        <div class="reviews__next">
            <svg width="40" height="33" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.0531044 16.5C0.0531044 16.7303 0.144596 16.9512 0.307453 17.1141C0.47031 17.2769 0.691189 17.3684 0.921501 17.3684H37.0337L22.8854 31.5167C22.7225 31.6797 22.6309 31.9007 22.6309 32.1311C22.6309 32.3616 22.7225 32.5826 22.8854 32.7455C23.0484 32.9085 23.2694 33 23.4998 33C23.7302 33 23.9512 32.9085 24.1142 32.7455L39.7453 17.1144C39.8261 17.0337 39.8901 16.938 39.9338 16.8326C39.9775 16.7271 40 16.6141 40 16.5C40 16.3859 39.9775 16.2729 39.9338 16.1675C39.8901 16.062 39.8261 15.9663 39.7453 15.8856L24.1142 0.254488C24.0335 0.173805 23.9377 0.109804 23.8323 0.0661391C23.7269 0.0224738 23.6139 0 23.4998 0C23.3857 0 23.2727 0.0224738 23.1673 0.0661391C23.0619 0.109804 22.9661 0.173805 22.8854 0.254488C22.8047 0.335171 22.7407 0.430956 22.6971 0.536373C22.6534 0.64179 22.6309 0.754776 22.6309 0.868879C22.6309 0.982982 22.6534 1.09597 22.6971 1.20138C22.7407 1.3068 22.8047 1.40259 22.8854 1.48327L37.0337 15.6316H0.921501C0.691189 15.6316 0.47031 15.7231 0.307453 15.886C0.144596 16.0488 0.0531044 16.2697 0.0531044 16.5Z" fill="#00D1FF"/>
            </svg>
        </div>
    </div>

    </div>
</section>