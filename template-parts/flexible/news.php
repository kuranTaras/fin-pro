<section class="news">
    <div class="container">
        <div class="news-title">
            <?php the_sub_field('title'); ?>
        </div>
        <div class="news__slider swiper">
            <div class="news__wrapper swiper-wrapper">
                <?php
                $accordions = get_sub_field('news');
                foreach ($accordions as $accordion) : ?>
                    <div class="news__slide swiper-slide">
                        <div class="news__slide-img">
                            <img src="<?= $accordion['image'] ?>" alt="">
                            <div class="news__slide-img-title">
                            <span>
                                <?= $accordion['title'] ?>
                            </span>
                            </div>
                        </div>
                        <div class="news__slide-text">
                            <p>
                                <?= $accordion['text'] ?>
                            </p>
                            <div class="news__slide-btn" data-more="Читати далі" data-less="Читати менше">
                                Читати далі
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="news__pagination swiper-pagination"></div>
    </div>
</section>
