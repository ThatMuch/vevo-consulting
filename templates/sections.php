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
<?php /* Template Name: Sections */ ?>

<?php get_header(); ?>
<main id="sections">
<?php if (has_post_thumbnail()) : ?>
    <section class="page__header">
    <h1 class="page__header__title text-center"><?php the_title(); ?></h1>
        <?php the_post_thumbnail('large'); ?>
    </section>
  <?php endif?>

  <?php if (have_posts()): while (have_posts()): the_post() ?>
  <div class="container">
    <?php the_content(); ?>
  </div>
  <div class="sections">
    <?php vevo_sections() ?>
  </div>
  <?php endwhile; endif ?>

</main>

<?php get_footer() ?>
