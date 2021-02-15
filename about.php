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
	$bg = get_field('default_bg_section_light', 'option');
	if ( $upperSection ) : ?>
	<section class="section-upper" style="background-image: url(<?= $bg;?>)">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			<?php if ( $upperSection['img'] ) : ?>
				<img src="<?= $upperSection['img']['url'] ?>" alt="<?= $upperSection['img']['alt'] ?>" class="img-circle img-shadow">
			<?php endif; ?>
			</div>
			<div class="col-sm-9">
			<?php if( $upperSection['title'] ) : ?>
					<h2><?php echo $upperSection['title']; ?></h2>
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
	$middleSection = get_field('middle_section');
	if ($middleSection) :
	?>
	<section class="section-middle">
		<div class="container">
			<div class="splide" data-splide='{"pagination":false, "type": "loop"}'>
				<div class="splide__arrows">
					<button class="splide__arrow splide__arrow--prev">
						<img src="<?= get_stylesheet_directory_uri()."/assets/prev.svg";?>" alt="previous">
					</button>
					<button class="splide__arrow splide__arrow--next">
						<img src="<?= get_stylesheet_directory_uri()."/assets/next.svg";?>" alt="next">
					</button>
				</div>
				<div class="splide__track">
					<div class="row">
						<div class="col-sm-6">
							<h2 class="section-middle__title">Valeurs</h2>
						</div>
					</div>
					<ul class="splide__list">
					<?php while( have_rows('middle_section') ) : the_row(); ?>
						<li class="splide__slide">
							<div class="row">
								<div class="col-sm-6 ">
								<div class="content">
									<h3><?php the_sub_field('title'); ?></h3>
									<p><?php the_sub_field('text'); ?></p>
								</div>
								</div>
								<div class="col-sm-6">
								<?php if ( get_sub_field('img') ) : $image = get_sub_field('img'); ?>
								<div class="img">
									<!-- Thumbnail image -->
									<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-radius w-100"/>
								</div>
								<?php endif; ?>

								</div>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
		<?php
	$lowerSection = get_field('last_section');
	if ( $lowerSection ) : ?>
	<section class="section-lower section-text-image">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			<?php if ( $lowerSection['img'] ) : ?>
				<img data-src="<?= $lowerSection['img']['url'] ?>" alt="<?= $lowerSection['img']['alt'] ?>" class="img-radius w-100">
			<?php endif; ?>
			</div>
			<div class="col-sm-9">
			<?php if( $lowerSection['title'] ) : ?>
					<h3><?php echo $lowerSection['title']; ?></h3>
			<?php endif; ?>
			<?php if( $lowerSection['text'] ) : ?>
				<div class="section-text-image__content">
					<p><?php echo $lowerSection['text']; ?></p>
				</div>
			<?php endif; ?>
			    <div>
                    <button class="link">
                        Lire plus
                    </button>
                </div>
			</div>
		</div>
	</div>
	</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>