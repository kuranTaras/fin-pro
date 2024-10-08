<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fin-pro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
	<div class="container">
		<div class="header__burger">
			<svg width="40" height="26" viewBox="0 0 40 26" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M40 1.69565C40 2.14537 39.8194 2.57666 39.4979 2.89466C39.1764 3.21266 38.7404 3.3913 38.2857 3.3913H1.71429C1.25963 3.3913 0.823593 3.21266 0.502102 2.89466C0.180612 2.57666 0 2.14537 0 1.69565C0 1.24594 0.180612 0.814641 0.502102 0.496645C0.823593 0.178648 1.25963 0 1.71429 0H38.2857C38.7404 0 39.1764 0.178648 39.4979 0.496645C39.8194 0.814641 40 1.24594 40 1.69565ZM40 13C40 13.4497 39.8194 13.881 39.4979 14.199C39.1764 14.517 38.7404 14.6957 38.2857 14.6957H1.71429C1.25963 14.6957 0.823593 14.517 0.502102 14.199C0.180612 13.881 0 13.4497 0 13C0 12.5503 0.180612 12.119 0.502102 11.801C0.823593 11.483 1.25963 11.3043 1.71429 11.3043H38.2857C38.7404 11.3043 39.1764 11.483 39.4979 11.801C39.8194 12.119 40 12.5503 40 13ZM40 24.3043C40 24.7541 39.8194 25.1854 39.4979 25.5034C39.1764 25.8214 38.7404 26 38.2857 26H1.71429C1.25963 26 0.823593 25.8214 0.502102 25.5034C0.180612 25.1854 0 24.7541 0 24.3043C0 23.8546 0.180612 23.4233 0.502102 23.1053C0.823593 22.7873 1.25963 22.6087 1.71429 22.6087H38.2857C38.7404 22.6087 39.1764 22.7873 39.4979 23.1053C39.8194 23.4233 40 23.8546 40 24.3043Z" fill="#61FFEC"/>
			</svg>
		</div>
		<?php the_custom_logo(); ?>
		<form class="header__search">
			<?php get_search_form(); ?>
		</form>

		<div class="header__socials">
			<?php if (have_rows('social', 'options')) {
				while (have_rows('social', 'options')): the_row();
					?>
					<a aria-label="social-network" class="header__social" href="<?php the_sub_field('link'); ?>">
						<img src="<?php the_sub_field('icon'); ?>" alt="">
					</a>

				<?php

				endwhile;
			} ?>
		</div>
		<?php
		// Отримати значення текстових полів "Header"
		$header_text1 = get_theme_mod( 'header_text_field1', '' );
		$header_text2 = get_theme_mod( 'header_text_field2', '' );
		?>

		<!-- Вивести значення текстових полів у заголовку -->




		<a aria-label="login" href="<?php if ( ! empty( $header_text1 ) ) : ?><?php echo esc_html( $header_text1 ); ?><?php endif; ?>" class="header__login">
			<span>
				<?php if ( ! empty( $header_text2 ) ) : ?>
					<?php echo esc_html( $header_text2 ); ?>
				<?php endif; ?>
			</span>
			<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M28 4H12C11.4696 4 10.9609 4.21071 10.5858 4.58579C10.2107 4.96086 10 5.46957 10 6H28V30H12V20.2H10V30C10 30.5304 10.2107 31.0391 10.5858 31.4142C10.9609 31.7893 11.4696 32 12 32H28C28.5304 32 29.0391 31.7893 29.4142 31.4142C29.7893 31.0391 30 30.5304 30 30V6C30 5.46957 29.7893 4.96086 29.4142 4.58579C29.0391 4.21071 28.5304 4 28 4Z" fill="white"/>
				<path d="M15.12 18.46C15.0153 18.5496 14.9303 18.66 14.8703 18.784C14.8103 18.9081 14.7765 19.0432 14.7712 19.1809C14.7659 19.3187 14.7891 19.456 14.8394 19.5843C14.8896 19.7127 14.9659 19.8292 15.0633 19.9267C15.1608 20.0241 15.2774 20.1004 15.4057 20.1506C15.534 20.2009 15.6713 20.2241 15.8091 20.2188C15.9468 20.2135 16.0819 20.1798 16.206 20.1197C16.33 20.0597 16.4404 19.9747 16.53 19.87L22.32 14.08L16.54 8.29C16.3487 8.12618 16.1026 8.04057 15.8509 8.05029C15.5993 8.06001 15.3605 8.16434 15.1824 8.34244C15.0043 8.52053 14.9 8.75927 14.8903 9.01095C14.8806 9.26262 14.9662 9.5087 15.13 9.7L18.5 13H4C3.73478 13 3.48043 13.1054 3.29289 13.2929C3.10536 13.4804 3 13.7348 3 14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H18.5L15.12 18.46Z" fill="white"/>
			</svg>
		</a>

	</div>
</header>
<div class="menu">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-1', // Указываем местоположение меню, которое соответствует зарегистрированному вами идентификатору 'menu-1'
		'container' => 'nav', // Оборачиваем меню в элемент <nav>
		'container_class' => 'menu__container', // Класс для обертки <nav>
		'menu_class' => 'menu__ul', // Класс для <ul> списка меню
	) );
	?>
</div>
<main>