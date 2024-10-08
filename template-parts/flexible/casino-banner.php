<?php
$post_type = get_post_type();

// Завантажуємо шаблон для типу "casino", якщо це запис типу "casino"
if ($post_type === 'casino') {
    ?>
    <section class="casino">
        <div class="container">
            <div class="casino__top">
                <div class="casino-title">
                    <span class="casino-title-top">
                        <?php the_title() ?>
                    </span>
                    <div class="casino-title-bot">
                        <span>
                            <?php echo get_sub_field('welcome_bonus_label') ?>
                        </span>
                         <span><?php the_field('welcome_bonus_number');?></span>
                    </div>
                </div>
                <div class="casino__right">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.57895 27.7737L7.24737 22.1053H25.2632C26.1007 22.1053 26.9039 21.7726 27.4961 21.1803C28.0883 20.5881 28.4211 19.7849 28.4211 18.9474V4.73684C28.4211 3.89932 28.0883 3.09609 27.4961 2.50387C26.9039 1.91165 26.1007 1.57895 25.2632 1.57895H4.73684C3.89932 1.57895 3.09609 1.91165 2.50387 2.50387C1.91165 3.09609 1.57895 3.89932 1.57895 4.73684V27.7737ZM1.57895 30H0V4.73684C0 3.48055 0.499059 2.27572 1.38739 1.38739C2.27572 0.499059 3.48055 0 4.73684 0H25.2632C26.5194 0 27.7243 0.499059 28.6126 1.38739C29.5009 2.27572 30 3.48055 30 4.73684V18.9474C30 20.2037 29.5009 21.4085 28.6126 22.2968C27.7243 23.1852 26.5194 23.6842 25.2632 23.6842H7.89474L1.57895 30Z" fill="white"/>
                    </svg>
                    <div class="casino__right-number">
                        0
                    </div>
                    <a href="<?php echo substr(get_permalink(), 0, -1)?>-reviews/#reviews" class="casino__right-text">
                        <?php echo get_sub_field('add_review_button')['text'] ?>
                    </a>
                </div>
            </div>
            <div class="casino__img">
                <div class="casino__img-logo">
                    <img src="<?php the_field('image_big'); ?>" alt="">
                </div>
                <div class="casino__img-title">
                    <span>
                        <?php the_sub_field('title'); ?>
                    </span>
                </div>
                <div class="casino__img-bg">
                    <img src="<?php the_sub_field('background_image'); ?>" alt="">
                </div>
            </div>
            <div class="casino__buttons">
                <a href="<?php echo get_sub_field('to_site_button')['link']?>" class="casino-btn btn-blue">
                    <span>
                        <?php echo get_sub_field('to_site_button')['text']?>
                    </span>
                </a>
                <a href="<?php echo get_sub_field('registration_button')['link']?>" class="casino-btn btn-blue">
                    <span>
                        <?php echo get_sub_field('registration_button')['text']?>
                    </span>
                </a>
            </div>
        </div>

    </section>
    <?php
}

?>

