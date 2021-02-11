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
									<div class="service" data-toggle="modal" data-target="#modal-<?=$post->ID ?>">

									<?php if($image) :?>
										<div class="img-shadow img-radius img-wrapper">
											<img src="<?php echo $image[0]?>" class="card-blog_img service__img"
											alt="<?php the_title(); ?>"
											 />
										</div>
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri() ; ?>/assets/images/default_image.png" class="card-blog_img img-shadow atelier__img" alt="<?php the_title(); ?>"/>
									<?php endif; ?>
									<p class="service__title"><?php the_title(); ?></p>
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
								<div class="row">
				    <div class="col-md-6 col-sm-12 section-text-image__image">
						<?php  if (get_sub_field('img')) : $img = get_sub_field('img'); ?>
								<img data-src="<?php  echo  $img['url']?>" class="img-fluid img-radius " />
						<?php endif; ?>
            		</div>
					  <div class="col-md-6 col-sm-12 section-text-image__text">
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

<!-- Modal -->
<?php
	$args = array(
		'post_type' => 'atelier',
		'posts_per_page' => 4
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			?>
<div class="modal fade" id="modal-<?=$post->ID ?>" tabindex="-1" aria-labelledby="modal-<?=$post->ID ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
       <button type="button" class="close btn-icon" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<?php $bg = get_field('default_bg_primary', 'option');?>
		<div class="modal-header" style="background-image: url('<?= $bg?>')">
		</div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-3">
				<img src="<?= $image[0] ?>" alt="" class="img-shadow img-radius img-fluid mb-5">
				<div class="services_list">
					<ul>
						<?php $details = get_field('details');?>
						<li class="services_list_item"><?= $details['people'] ?></li>
						<li class="services_list_item"><?= $details['time']?></li>
						<li class="services_list_item"><?= $details['type']?></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9 pl-5">
				<h2 class="title"><?php the_title(); ?></h2>
				<?php if ( get_field('desc') ) : ?>
					<p class="desc"><?php echo get_field('desc'); ?></p>
				<?php endif; ?>
				<a href="" class="btn btn-primary">Je m'inscris</a>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<?php get_footer(); ?>