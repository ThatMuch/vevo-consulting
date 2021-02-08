<?

/**
 * Logos Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>

<section class="section section-logos">
  <div class="container">
    <!-- Title -->
    <?php if (get_sub_field('title')) : ?>
      <h2 class="section__title primary"><?php echo  get_sub_field('title'); ?></h2>
    <?php endif; ?>
    <!-- Title -->
    <!-- Texte -->
    <?php if (get_sub_field('texte')) : ?>
      <p class="section__texte mt-5 mb-4"><?php echo  get_sub_field('texte'); ?></p>
    <?php endif; ?>
    <!-- Texte -->
    <?php

    $images = get_sub_field('logo_list');
    $size = 'medium';

    if ($images) : ?>
      <div class="section-logos__grid">
        <?php foreach ($images as $image) : ?>
          <div class="logo">
            <img data-src="<?php echo  $image['sizes'][$size]; ?>" alt="<?php echo  $image['alt']; ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>