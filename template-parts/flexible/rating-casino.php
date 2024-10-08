<section class="rating">
    <div class="container">
        <div class="rating-title">
            <?php the_sub_field('title'); ?>
        </div>
        <div class="rating__filters">
            <div class="rating__filters-wrapper">
                <?php
                // Основний запит до бази даних для отримання категорій типу "казино"
                $args = array(
                    'taxonomy' => 'casino_category', // Подати 'category' для категорій, або використовуйте назву своєї таксономії, якщо ви створили власну
                    'object_type' => 'casino', // Замініть 'casino' на назву вашого типу запису
                    'hide_empty' => false, // Виводимо порожні категорії
                );

                $categories = get_categories($args);

                // Перевірка, чи є категорії
                if ($categories) {
                    foreach ($categories as $category) {
                        ?>
                        <div class="rating__filter " data-sort="sort-<?php echo $category->slug ?>">
                            <?php echo $category->name ?>
                        </div>
                <?php
                    }
                } else {
                    echo 'Категорії не знайдені.';
                }
                ?>
            </div>
            <div class="rating__filters-about">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0C6.41775 0 4.87103 0.469192 3.55544 1.34824C2.23985 2.22729 1.21447 3.47672 0.608967 4.93853C0.00346628 6.40034 -0.15496 8.00887 0.153721 9.56072C0.462403 11.1126 1.22433 12.538 2.34315 13.6569C3.46197 14.7757 4.88743 15.5376 6.43928 15.8463C7.99113 16.155 9.59966 15.9965 11.0615 15.391C12.5233 14.7855 13.7727 13.7602 14.6518 12.4446C15.5308 11.129 16 9.58225 16 8C15.9978 5.87895 15.1542 3.84542 13.6544 2.34562C12.1546 0.845814 10.121 0.00223986 8 0ZM8 14.7692C6.66117 14.7692 5.35241 14.3722 4.23922 13.6284C3.12603 12.8846 2.2584 11.8274 1.74605 10.5905C1.2337 9.35356 1.09965 7.99249 1.36084 6.67939C1.62203 5.36629 2.26674 4.16012 3.21343 3.21343C4.16013 2.26674 5.36629 1.62203 6.67939 1.36084C7.99249 1.09965 9.35356 1.2337 10.5905 1.74605C11.8274 2.25839 12.8846 3.12602 13.6284 4.23922C14.3722 5.35241 14.7692 6.66117 14.7692 8C14.7672 9.79468 14.0534 11.5153 12.7843 12.7843C11.5153 14.0534 9.79469 14.7672 8 14.7692ZM9.23077 11.6923C9.23077 11.8555 9.16594 12.012 9.05053 12.1274C8.93512 12.2429 8.7786 12.3077 8.61539 12.3077C8.28897 12.3077 7.97591 12.178 7.7451 11.9472C7.51429 11.7164 7.38462 11.4033 7.38462 11.0769V8C7.22141 8 7.06488 7.93516 6.94947 7.81976C6.83407 7.70435 6.76923 7.54782 6.76923 7.38461C6.76923 7.2214 6.83407 7.06488 6.94947 6.94947C7.06488 6.83406 7.22141 6.76923 7.38462 6.76923C7.71104 6.76923 8.02409 6.8989 8.2549 7.12971C8.48572 7.36053 8.61539 7.67358 8.61539 8V11.0769C8.7786 11.0769 8.93512 11.1418 9.05053 11.2572C9.16594 11.3726 9.23077 11.5291 9.23077 11.6923ZM6.76923 4.61538C6.76923 4.43282 6.82337 4.25435 6.9248 4.10255C7.02623 3.95075 7.17039 3.83244 7.33906 3.76257C7.50773 3.69271 7.69333 3.67443 7.87239 3.71004C8.05145 3.74566 8.21593 3.83358 8.34502 3.96267C8.47412 4.09176 8.56203 4.25624 8.59765 4.4353C8.63327 4.61436 8.61499 4.79996 8.54512 4.96863C8.47526 5.1373 8.35694 5.28147 8.20514 5.38289C8.05334 5.48432 7.87488 5.53846 7.69231 5.53846C7.44749 5.53846 7.21271 5.44121 7.0396 5.2681C6.86649 5.09499 6.76923 4.8602 6.76923 4.61538Z" fill="#00D1FF"/>
                </svg>
                <span>
                    <?php the_sub_field('about_rating'); ?>
                </span>
            </div>
        </div>
        <div class="rating__casinos">
            <div class="rating__casinos-labels">
                <div class="rating__casinos-label"></div>

                <div class="rating__casinos-label">
                    <?php echo get_sub_field('labels')['name'];?>
                </div>
                <div class="rating__casinos-label">
                    <?php echo get_sub_field('labels')['rating'];?>
                </div>
                <div class="rating__casinos-label">
                    <?php echo get_sub_field('labels')['welcome_bonus'];?>
                </div>
                <div class="rating__casinos-label">
                    <?php echo get_sub_field('labels')['reviews'];?>
                </div>
                <div class="rating__casinos-label"></div>
            </div>
            <div class="rating__casinos-wrapper">
                <?php
                // Визначаємо новий запит на пости типу "Казино"
                $args = array(
                    'post_type' => 'casino',
                    'post_status' => 'publish',
                    'posts_per_page' => -1, // -1 означає показати всі пости
                    'meta_key' => 'rating',           // Вказуємо мета-поле для сортування
                    'orderby' => 'meta_value_num',
                );

                // Виконуємо запит
                $casino_query = new WP_Query( $args );

                // Виводимо пости типу "Казино"
                if ( $casino_query->have_posts() ) :
                    while ( $casino_query->have_posts() ) : $casino_query->the_post();

                        $categories = get_the_terms(get_the_ID(), 'casino_category');
                        $category_slugs = array();
                        $post_id = get_the_ID();

                        if ($categories) {
                            foreach ($categories as $category) {
                                $category_slugs[] = $category->slug;
                            }
                        }
                        ?>
                        <div class="rating__casino <?php
                            foreach ($category_slugs as $sort) {
                                echo 'sort-' .$sort . ' ';
                                if ($sort == 'rating') {
                                    echo ' active ';
                                }
                            }
                        ?>">
                            <div class="rating__casino-num rating__casino-el">

                            </div>
                            <div class="rating__casino-name rating__casino-el">
                                <img src="<?php the_field('image_small'); ?>" alt="">
                            </div>
                            <div class="rating__casino-rating rating__casino-el">
                                <span>
                                    <?php the_field('rating'); ?>
                                </span>
                                <div class="rating__casino-rating-stars">
                                    <?php
                                        for ($i = 0; $i < 5; $i++) {
                                            ?>
                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.52953 0.781088C7.83714 -0.122598 9.11524 -0.122601 9.42285 0.781085L10.5975 4.23207C10.7355 4.63733 11.1161 4.90983 11.5442 4.90983H15.243C16.2229 4.90983 16.6181 6.1731 15.8128 6.73156L12.9017 8.75046C12.5348 9.00491 12.3811 9.47175 12.525 9.89443L13.6556 13.2159C13.9664 14.1291 12.9317 14.9096 12.139 14.3599L9.04607 12.2149C8.70333 11.9772 8.24905 11.9772 7.90631 12.2149L4.81335 14.3599C4.02067 14.9096 2.98596 14.1291 3.2968 13.2159L4.42742 9.89443C4.5713 9.47175 4.41754 9.00491 4.05064 8.75046L1.13953 6.73156C0.334283 6.1731 0.729464 4.90983 1.70941 4.90983H5.40819C5.83628 4.90983 6.2169 4.63733 6.35484 4.23207L7.52953 0.781088Z" fill="url(#paint0_linear_67_393<?php echo $i . $casino_query->current_post + 1;?>)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_67_393<?php echo $i . $casino_query->current_post + 1; ?>" x1="8.47619" y1="-2" x2="8.47619" y2="18" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#EEECB7"/>
                                                        <stop offset="1" stop-color="#9B7106"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="rating__casino-bonus rating__casino-el">
                                <div class="rating__casino-bonus-text">
                                    <?php the_field('welcome_bonus_text'); ?>
                                </div>
                                <div class="rating__casino-bonus-numbers">
                                    <?php the_field('welcome_bonus_number'); ?>
                                </div>
                            </div>
                            <a href="<?php echo substr(get_permalink(), 0, -1)?>-reviews/" class="rating__casino-reviews rating__casino-el">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.15789 20.3674L5.31474 16.2105H18.5263C19.1405 16.2105 19.7295 15.9665 20.1638 15.5322C20.5981 15.098 20.8421 14.5089 20.8421 13.8947V3.47368C20.8421 2.8595 20.5981 2.27047 20.1638 1.83617C19.7295 1.40188 19.1405 1.15789 18.5263 1.15789H3.47368C2.8595 1.15789 2.27047 1.40188 1.83617 1.83617C1.40188 2.27047 1.15789 2.8595 1.15789 3.47368V20.3674ZM1.15789 22H0V3.47368C0 2.55241 0.365977 1.66886 1.01742 1.01742C1.66886 0.365977 2.55241 0 3.47368 0H18.5263C19.4476 0 20.3311 0.365977 20.9826 1.01742C21.634 1.66886 22 2.55241 22 3.47368V13.8947C22 14.816 21.634 15.6996 20.9826 16.351C20.3311 17.0024 19.4476 17.3684 18.5263 17.3684H5.78947L1.15789 22Z" fill="white"/>
                                </svg>
                                <span>
                                    <?php echo get_comments_number( $post_id ); ?>
                                </span>
                            </a>
                            <div class="rating__casino-btns rating__casino-el">
                                <a href="<?php echo get_field('go_to_site_btn')['link']; ?>" class="rating__casino-site btn-blue">
                                    <span>
                                        <?php echo get_field('go_to_site_btn')['text']; ?>
                                    </span>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="rating__casino-see">
                                    <?php echo get_field('see_btn')['text']; ?>
                                </a>
                            </div>
                        </div>
                    <?php
                        // Додатковий код або HTML для відображення додаткової інформації про казино
                    endwhile;
                    wp_reset_postdata(); // Скидаємо запит, щоб не конфліктував з іншими запитами на сторінці
                endif;
                ?>
            </div>
        </div>
    </div>
</section>