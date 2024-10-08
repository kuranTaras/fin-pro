<section class="table">
    <div class="container">
        <div class="table__labels">
            <div class="table__label">
                <?php the_sub_field('label_1'); ?>
            </div>
            <div class="table__label">
                <?php the_sub_field('label_2'); ?>
            </div>
            <div class="table__label">
                <?php the_sub_field('label_3'); ?>
            </div>
            <div class="table__label">
                <?php the_sub_field('label_4'); ?>
            </div>
            <div class="table__label">
                <?php the_sub_field('label_5'); ?>
            </div>
        </div>
        <div class="table__items">
            <?php
            $accordions = get_sub_field('item');
            foreach ($accordions as $accordion) : ?>
                <div class="table__item">
                    <div class="table__item-text">
                        <?= $accordion['name'] ?>
                    </div>
                    <div class="table__item-text">
                        <?= $accordion['type_of_money'] ?>
                    </div>
                    <div class="table__item-text">
                        <?= $accordion['slots'] ?>
                    </div>
                    <div class="table__item-text">
                        <?= $accordion['label_4'] ?>
                    </div>
                    <div class="table__item-text">
                        <?php
                            for ($i = 0; $i < $accordion['rating']; $i++) {
                                ?>
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" fill="#6926D7"/>
                                </svg>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>