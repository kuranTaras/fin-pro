<section class="top">
    <div class="container">
        <div class="top-title">
            <?php the_sub_field('title'); ?>
        </div>
        <div class="top__items">
            <?php
            // Визначаємо новий запит на пости типу "Казино"
            $args = array(
                'post_type' => 'casino',
                'post_status' => 'publish',
                'posts_per_page' => -1, // -1 означає показати всі пости
            );

            // Виконуємо запит
            $casino_query = new WP_Query( $args );

            // Виводимо пости типу "Казино"
            if ( $casino_query->have_posts() ) :
                while ( $casino_query->have_posts() ) : $casino_query->the_post(); ?>
                    <div class="top__item">
                        <div class="top__item-left">
                            <div class="top__item-logo">
                                <img src="<?php the_field('image_big') ?>" alt="">
                            </div>
                            <div class="top__item-num">
                                <?php the_field('welcome_bonus_number') ?>
                            </div>
                            <div class="top__item-rating">
                                <div class="top__item-rating-stars">
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33707 0.852426C7.64061 -0.0600417 8.93128 -0.060042 9.23482 0.852426L10.3569 4.22548C10.4928 4.63412 10.8751 4.90983 11.3058 4.90983H14.8859C15.8603 4.90983 16.2593 6.16143 15.4646 6.72535L12.609 8.7518C12.2503 9.00639 12.1 9.46554 12.2389 9.88297L13.3391 13.1904C13.6442 14.1076 12.5998 14.881 11.8115 14.3216L8.86468 12.2304C8.51806 11.9844 8.05383 11.9844 7.70722 12.2304L4.76038 14.3216C3.97209 14.881 2.92766 14.1076 3.23277 13.1904L4.33301 9.88297C4.47187 9.46554 4.32162 9.00639 3.96286 8.7518L1.10728 6.72535C0.312632 6.16143 0.711601 4.90983 1.68601 4.90983H5.26613C5.69678 4.90983 6.07907 4.63412 6.215 4.22548L7.33707 0.852426Z" fill="url(#paint0_linear_67_632)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_67_632" x1="8.28595" y1="-2" x2="8.28595" y2="18" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EEECB7"/>
                                                <stop offset="1" stop-color="#9B7106"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33707 0.852426C7.64061 -0.0600417 8.93128 -0.060042 9.23482 0.852426L10.3569 4.22548C10.4928 4.63412 10.8751 4.90983 11.3058 4.90983H14.8859C15.8603 4.90983 16.2593 6.16143 15.4646 6.72535L12.609 8.7518C12.2503 9.00639 12.1 9.46554 12.2389 9.88297L13.3391 13.1904C13.6442 14.1076 12.5998 14.881 11.8115 14.3216L8.86468 12.2304C8.51806 11.9844 8.05383 11.9844 7.70722 12.2304L4.76038 14.3216C3.97209 14.881 2.92766 14.1076 3.23277 13.1904L4.33301 9.88297C4.47187 9.46554 4.32162 9.00639 3.96286 8.7518L1.10728 6.72535C0.312632 6.16143 0.711601 4.90983 1.68601 4.90983H5.26613C5.69678 4.90983 6.07907 4.63412 6.215 4.22548L7.33707 0.852426Z" fill="url(#paint0_linear_67_632)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_67_632" x1="8.28595" y1="-2" x2="8.28595" y2="18" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EEECB7"/>
                                                <stop offset="1" stop-color="#9B7106"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33707 0.852426C7.64061 -0.0600417 8.93128 -0.060042 9.23482 0.852426L10.3569 4.22548C10.4928 4.63412 10.8751 4.90983 11.3058 4.90983H14.8859C15.8603 4.90983 16.2593 6.16143 15.4646 6.72535L12.609 8.7518C12.2503 9.00639 12.1 9.46554 12.2389 9.88297L13.3391 13.1904C13.6442 14.1076 12.5998 14.881 11.8115 14.3216L8.86468 12.2304C8.51806 11.9844 8.05383 11.9844 7.70722 12.2304L4.76038 14.3216C3.97209 14.881 2.92766 14.1076 3.23277 13.1904L4.33301 9.88297C4.47187 9.46554 4.32162 9.00639 3.96286 8.7518L1.10728 6.72535C0.312632 6.16143 0.711601 4.90983 1.68601 4.90983H5.26613C5.69678 4.90983 6.07907 4.63412 6.215 4.22548L7.33707 0.852426Z" fill="url(#paint0_linear_67_632)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_67_632" x1="8.28595" y1="-2" x2="8.28595" y2="18" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EEECB7"/>
                                                <stop offset="1" stop-color="#9B7106"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33707 0.852426C7.64061 -0.0600417 8.93128 -0.060042 9.23482 0.852426L10.3569 4.22548C10.4928 4.63412 10.8751 4.90983 11.3058 4.90983H14.8859C15.8603 4.90983 16.2593 6.16143 15.4646 6.72535L12.609 8.7518C12.2503 9.00639 12.1 9.46554 12.2389 9.88297L13.3391 13.1904C13.6442 14.1076 12.5998 14.881 11.8115 14.3216L8.86468 12.2304C8.51806 11.9844 8.05383 11.9844 7.70722 12.2304L4.76038 14.3216C3.97209 14.881 2.92766 14.1076 3.23277 13.1904L4.33301 9.88297C4.47187 9.46554 4.32162 9.00639 3.96286 8.7518L1.10728 6.72535C0.312632 6.16143 0.711601 4.90983 1.68601 4.90983H5.26613C5.69678 4.90983 6.07907 4.63412 6.215 4.22548L7.33707 0.852426Z" fill="url(#paint0_linear_67_632)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_67_632" x1="8.28595" y1="-2" x2="8.28595" y2="18" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EEECB7"/>
                                                <stop offset="1" stop-color="#9B7106"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33707 0.852426C7.64061 -0.0600417 8.93128 -0.060042 9.23482 0.852426L10.3569 4.22548C10.4928 4.63412 10.8751 4.90983 11.3058 4.90983H14.8859C15.8603 4.90983 16.2593 6.16143 15.4646 6.72535L12.609 8.7518C12.2503 9.00639 12.1 9.46554 12.2389 9.88297L13.3391 13.1904C13.6442 14.1076 12.5998 14.881 11.8115 14.3216L8.86468 12.2304C8.51806 11.9844 8.05383 11.9844 7.70722 12.2304L4.76038 14.3216C3.97209 14.881 2.92766 14.1076 3.23277 13.1904L4.33301 9.88297C4.47187 9.46554 4.32162 9.00639 3.96286 8.7518L1.10728 6.72535C0.312632 6.16143 0.711601 4.90983 1.68601 4.90983H5.26613C5.69678 4.90983 6.07907 4.63412 6.215 4.22548L7.33707 0.852426Z" fill="url(#paint0_linear_67_632)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_67_632" x1="8.28595" y1="-2" x2="8.28595" y2="18" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#EEECB7"/>
                                                <stop offset="1" stop-color="#9B7106"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>

                                </div>
                                <div class="top__item-rating-num">
                                    <?php the_field('rating') ?>
                                </div>
                            </div>
                            <?php
                                $btn1 = get_field('go_to_site_btn');
                                $btn2 = get_field('full_see_btn');
                            ?>
                            <a href="<?php echo $btn1['link'] ?>" class="top__item-btn btn-blue">
                                <span>
                                    <?php echo $btn1['text'] ?>
                                </span>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="top__item-see">
                                <?php echo $btn2['text'] ?>
                            </a>
                        </div>
                        <div class="top__item-right">
                            <p>
                                <?php the_field('description') ?>
                            </p>
                        </div>
                    </div>
            <?php
                    // Додатковий код або HTML для відображення додаткової інформації про казино
                endwhile;
                wp_reset_postdata(); // Скидаємо запит, щоб не конфліктував з іншими запитами на сторінці
            else :
                echo '<p>Казино не знайдено.</p>';
            endif;
            ?>
        </div>
    </div>
</section>