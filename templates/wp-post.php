<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>
<div class="col-sm-4">
	<div class="card-blog">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="card-blog_wrapper">
				<?php if(get_post_thumbnail_id( $post->ID )) : ?>
				<img data-src="<?php echo $image[0]?>" class="card-blog_img" alt="<?php the_title(); ?>"/>
				<?php else : ?>
					<img data-src="<?php echo get_template_directory_uri() ; ?>/assets/images/default_image.png" class="card-blog_img" alt="<?php the_title(); ?>"/>
				<?php endif; ?>
			</div>
		<div class="card-blog_title d-none d-md-flex">
			<h3 ><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
		</div>
		<div class="card-blog_title mobile d-flex d-md-none">
			<h3><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
		</div>
		<div class="card-blog_excerpt">
		<?php echo excerpt(15); ?>
		</div>
	</div>
</div>