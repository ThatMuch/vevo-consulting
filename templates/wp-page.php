<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>

<?php get_header(); ?>
<main id="page">
<?php if (has_post_thumbnail()) : ?>
    <section class="page__header">
    <h1 class="page__header__title text-center"><?php the_title(); ?></h1>
        <?php the_post_thumbnail('large'); ?>
    </section>
  <?php endif?>

      <section class="container pt-5 pb-5">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
      </section>


</main>



<?php get_footer(); ?>
