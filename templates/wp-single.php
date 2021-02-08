<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>

<?php get_header(); ?>
<div class="container container-post">
  <main id="post" class="content-area">
<section>
  <?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
    <article>
      <div class="postinfo mb-5"><?php echo  get_the_date_mars(); ?></div>
      <?php the_content(); ?>
    </article>
  <?php endwhile; endif; ?>
</section>

</main>
<?php // get_sidebar();?>
</div>

<?php get_footer(); ?>
