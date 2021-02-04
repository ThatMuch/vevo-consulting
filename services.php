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
<?php /* Template Name: Services */ ?>
<?php get_header(); ?>
<main class="m-0 services">
	<?php
	$ateliers = get_field('ateliers');
	if ($ateliers) :
		?>
		<section class="section-ateliers" style="background-image: url('<?= $ateliers["background"] ?>')">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<?php if ( $ateliers['title'] ) : ?>
							<h2 class="section-ateliers__title"><?= $ateliers['title']; ?></h2>
						<?php endif; ?>
						<?php if ( $ateliers['text'] ) : ?>
							<p><?= $ateliers['text']; ?></p>
						<?php endif; ?>
					</div>
					<div class="col-sm-6">
						<div class="grid">
							<?php
							$args = array(
							'post_type' => 'atelier',
							'posts_per_page' => 4
							);
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) :

								while ( $query->have_posts() ) :
									$query->the_post();

									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<div>

									<?php if($image) :?>
										<img src="<?php echo $image[0]?>" class="card-blog_img img-shadow atelier__img" alt="<?php the_title(); ?>"/>
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri() ; ?>/assets/images/default_image.png" class="card-blog_img img-shadow atelier__img" alt="<?php the_title(); ?>"/>
									<?php endif; ?>
									<p class="atelier__title"><?php the_title(); ?></p>
									</div>
							<?php  endwhile;	wp_reset_postdata();  endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php
	if (have_rows('services_section')) :
	?>
	<section class="section-text-image">
		<div class="container">
				<?php while( have_rows('services_section') ) : the_row(); ?>
								<div class="row mb-5">
				    <div class="col-md-4 col-sm-12 section-text-image__image">
						<?php  if (get_sub_field('img')) : $img = get_sub_field('img'); ?>
								<img data-src="<?php  echo  $img['url']?>" class="img-fluid img-radius " />
						<?php endif; ?>
            		</div>
					  <div class="col-md-8 col-sm-12 section-text-image__text">
                <div class="section-text-image__text__inner">

                        <?php if (get_sub_field('title')) : ?>
                            <h2 class=" section__title"><?php echo get_sub_field('title'); ?></h2>
                        <?php endif; ?>

                    <!-- Text -->
                    <?php if (get_sub_field('text')) : ?>
                        <?php echo  get_sub_field('text'); ?>
                    <?php endif; ?>
                    <!-- Text -->
                </div>
            </div>
				</div>
				<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>