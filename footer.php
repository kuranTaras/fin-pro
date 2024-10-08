<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fin-pro
 */

?>



</main>


<footer class="footer">
	<div class="container">
		<div class="footer__top">
			<?php the_custom_logo(); ?>
			<div class="footer__socials">
				<?php if (have_rows('social', 'options')) {
					while (have_rows('social', 'options')): the_row();
					?>
						<a aria-label="social-network" href="<?php the_sub_field('link'); ?>">
							<img src="<?php the_sub_field('icon'); ?>" alt="">
						</a>

				<?php

					endwhile;
				} ?>
			</div>
		</div>
		<div class="footer__links">
			<div class="footer__col">
				<div class="footer__col-item">
					<div class="footer__col-title">
						Обзоры
					</div>
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>
			</div>
			<div class="footer__col">
				<div class="footer__col-item">
					<div class="footer__col-title">
						Бонусы
					</div>
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
				<div class="footer__col-item">
					<div class="footer__col-title">
						Бонусы
					</div>
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
			</div>
			<div class="footer__col">
				<div class="footer__col-item">
					<div class="footer__col-title">
						Онлайн казино
					</div>
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			</div>
			<div class="footer__col">
				<div class="footer__col-item">
					<div class="footer__col-title">
						Игровые автоматы
					</div>
					<?php dynamic_sidebar( 'footer-widget-5' ); ?>
				</div>
			</div>
		</div>
		<div class="footer__center">
			<div class="footer__form">
				<?php echo do_shortcode('[contact-form-7 id="136" title="Footer Contact Form"]') ?>
			</div>
			<div class="footer__right">
				<p>
					<?php
					// Отримати значення з textarea "Footer"
					$footer_text1 = get_theme_mod( 'footer_textarea1', '' );
					?>

					<!-- Вивести значення з textarea у футері -->
					<?php if ( ! empty( $footer_text1 ) ) : ?>
						<?php echo wp_kses_post( $footer_text1 ); ?>
					<?php endif; ?>
				</p>
				<div class="footer__logos">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/footer-1.png'?>" alt="">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/footer-2.png'?>" alt="">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/footer-3.png'?>" alt="">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/footer-4.png'?>" alt="">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/footer-5.png'?>" alt="">
				</div>
			</div>
		</div>
		<div class="footer__bot">
			<div class="footer-copyright">
				<?php
				// Отримати значення з textarea "Footer"

				$footer_text2 = get_theme_mod( 'footer_textarea2', '' );
				?>
				<!-- Вивести значення з textarea у футері -->

				<?php if ( ! empty( $footer_text2 ) ) : ?>
					<?php echo wp_kses_post( $footer_text2 ); ?>
				<?php endif; ?>

			</div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_class' => 'footer__bot-links', // Класс для <ul> списка меню
			) );
			?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
