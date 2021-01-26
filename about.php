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


		<?php
	$lowerSection = get_field('last_section');
	if ( $lowerSection ) : ?>
	<section class="section-lower">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			<?php if ( $lowerSection['img'] ) : ?>
				<img src="<?= $lowerSection['img']['url'] ?>" alt="<?= $lowerSection['img']['alt'] ?>" class="img-radius w-100">
			<?php endif; ?>
			</div>
			<div class="col-sm-9">
			<?php if( $lowerSection['title'] ) : ?>
					<h3><?php echo $lowerSection['title']; ?></h3>
			<?php endif; ?>
			<?php if( $lowerSection['text'] ) : ?>
				<p><?php echo $lowerSection['text']; ?></p>
			<?php endif; ?>
			<?php if ( $lowerSection['link'] ) :
				$url = $lowerSection['link']['url'];
				$title = $lowerSection['link']['title'];
				$target = $lowerSection['link']['target'] ? $lowerSection['link']['target'] : '_self';
				?>
				<a href="<?php echo $url; ?>"
				target="<?php echo $target;?>">
				<?php echo $title; ?>
			</a>
			<?php endif; ?>

			</div>
		</div>
	</div>
	</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>