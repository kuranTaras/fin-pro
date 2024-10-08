<?php

$casino_id = get_sub_field('reviews_for_casino');
?>

<section class="real">
    <div class="container">
        <div class="real__img">
            <img src="<?php the_field('image_big', $casino_id); ?>" alt="">
        </div>
        <div class="real__text">
            <div class="real__text-text">
                <?php the_sub_field('welcome_bonus_text'); ?>
            </div>
            <div class="real__text-number">
                <?php the_field('welcome_bonus_number', $casino_id); ?>
            </div>
        </div>
        <div class="real-title">
            <span>
                <?php the_sub_field('title'); ?>
            </span>
        </div>
        <div class="real__buttons">
            <a href="<?php echo get_sub_field('go_to_site')['link']; ?>" class="read-btn btn-blue">
                <span>
                    <?php echo get_sub_field('go_to_site')['text']; ?>
                </span>
            </a>
            <a href="<?php echo get_sub_field('registration_button')['link']; ?>" class="read-btn btn-blue">
                <span>
                    <?php echo get_sub_field('registration_button')['text']; ?>
                </span>
            </a>
        </div>
    </div>
</section>