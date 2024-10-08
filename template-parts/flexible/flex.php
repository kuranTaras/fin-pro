<?php
if( have_rows('flexible') ):

    // перебираем данные
    while ( have_rows('flexible') ) : the_row();

        if( get_row_layout() == 'main_hero' ):

            get_template_part( 'template-parts/flexible/main-hero' );

        elseif ( get_row_layout() == 'rating_casino' ):

            get_template_part( 'template-parts/flexible/rating-casino' );

        elseif ( get_row_layout() == 'text_block' ):

            get_template_part( 'template-parts/flexible/text-block' );

        elseif ( get_row_layout() == 'top_casino' ):

            get_template_part( 'template-parts/flexible/top-casino' );

        elseif ( get_row_layout() == 'best_bonuses' ):

            get_template_part( 'template-parts/flexible/best-bonuses' );

        elseif ( get_row_layout() == 'rating_casino' ):

            get_template_part( 'template-parts/flexible/news' );

        elseif ( get_row_layout() == 'all_interesting_articles' ):

            get_template_part( 'template-parts/flexible/all-interesting-articles' );

        elseif ( get_row_layout() == 'news' ):

            get_template_part( 'template-parts/flexible/news' );

        elseif ( get_row_layout() == 'casino_banner' ):

            get_template_part( 'template-parts/flexible/casino-banner' );

        elseif ( get_row_layout() == 'casino_login' ):

            get_template_part( 'template-parts/flexible/casino-login' );

        elseif ( get_row_layout() == 'casino_table' ):

            get_template_part( 'template-parts/flexible/casino-table' );

        elseif ( get_row_layout() == 'casino_reviews_small' ):

            get_template_part( 'template-parts/flexible/casino-reviews-small' );

        elseif ( get_row_layout() == 'reviews_banner' ):

            get_template_part( 'template-parts/flexible/reviews-banner' );

        elseif ( get_row_layout() == 'big_reviews' ):

            get_template_part( 'template-parts/flexible/big-reviews' );

        elseif ( get_row_layout() == 'add_reviews' ):

            get_template_part( 'template-parts/flexible/add-reviews' );

        endif;


    endwhile;


    // макетов не найдено

endif;
?>