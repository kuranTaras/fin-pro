<?php
$casino_id = get_sub_field('reviews_for_casino');
?>

<section class="add" id="reviews">
    <div class="container">
        <div class="add-title">
            <span>
                <?php the_sub_field('title'); ?>
            </span>
        </div>
        <div class="add-text">
            <?php the_sub_field('text'); ?>
        </div>
        <div class="reviews__comments">
            <?php

            $args = array(

            );

            comment_form($args, $casino_id);

            ?>

        </div>
    </div>
</section>