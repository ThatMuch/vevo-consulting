<?
/**
 * Template for ACF flexible elements
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 *
 */
?>
<?php /* Template Name: About */ ?>
<?php get_header(); ?>
<main class="mt-0">
	<?php
	$upperSection = get_field('upper_section');
	if ( $upperSection ) : ?>
	<section class="section-upper" style="background-image: url(<?= get_stylesheet_directory_uri();?>/assets/bg.png)">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			<?php if ( $upperSection['img'] ) : ?>
				<img src="<?= $upperSection['img']['url'] ?>" alt="<?= $upperSection['img']['alt'] ?>" class="img-circle img-shadow">
			<?php endif; ?>
			</div>
			<div class="col-sm-9">
			<?php if( $upperSection['title'] ) : ?>
					<h3><?php echo $upperSection['title']; ?></h3>
			<?php endif; ?>
			<?php if( $upperSection['text'] ) : ?>
				<p><?php echo $upperSection['text']; ?></p>
			<?php endif; ?>
			</div>
		</div>
	</div>
	</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>