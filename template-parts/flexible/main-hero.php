<section class="hero">
    <div class="container">
        <h1>
            <?php the_sub_field('title'); ?>
        </h1>
        <p>
            <?php the_sub_field('text'); ?>
        </p>
        <img class="hero-img" src="<?php the_sub_field('image'); ?>" alt="">
    </div>
</section>