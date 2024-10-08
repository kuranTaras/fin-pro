<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fin-pro
 */

get_header();
?>
<?php
$post_type = get_post_type();
// Завантажуємо шаблон для типу "casino", якщо це запис типу "casino"
if ($post_type === 'casino') {
	get_template_part( 'template-parts/flexible/flex' );
} else {
	// Якщо тип запису не "casino", завантажуємо звичайний контент
	if (have_posts()) :
		while (have_posts()) : the_post();

	?>
		<section class="article">
			<div class="container">
				<h1 class="article-title">
					<?php the_title() ?>
				</h1>
				<div class="article__image">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php the_content(); ?>
			</div>
		</section>
		<?php


		endwhile;
	endif;
}

?>

<?php
get_footer();
