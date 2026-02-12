<?php

/**
 * Services Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>
<?php $fond = get_sub_field('fond'); ?>
<section class="section section-services <?php echo ($fond == "Primary") ? "bg-primary" : (($fond == "Gris") ? "bg-light" : "") ?>">
      <div class="container">
            <!-- Title -->
            <?php if (get_sub_field('title')) : ?>
                  <h2 class="section__title primary text-left"><?php echo  get_sub_field('title'); ?></h2>
            <?php endif; ?>
            <!-- Title -->
            <div class="row mt-5">
                  <!-- Service -->
                  <?php
                  if (have_rows('service')) :  $i = 0; ?>
                        <?php while (have_rows('service')) : the_row(); ?>
                              <div class="<?php echo $i == 0 ? "col-lg-6" : "col-lg-3" ?>  col-md-12 section-services__item">
                                    <a href="<?php if (get_sub_field('link')) : $link = get_sub_field('link');
                                                      echo  $link;
                                                endif; ?> ">
                                          <!-- Image -->
                                          <?php if (get_sub_field('image')) : $img = get_sub_field('image'); ?>
                                                <div class="img-wrapper">
                                                      <img class="section-services__item__image img-fluid img-radius" data-src="<?php echo  $img['sizes']['large'] ?? $img['url'] ?? '' ?>" alt="<?php echo  $img['alt'] ?? ''; ?>">
                                                </div>
                                          <?php endif; ?>
                                          <!-- Image -->
                                          <!-- Icon title -->
                                          <?php if (get_sub_field('title')) : ?>
                                                <div class="section-services__item__title-wrapper">
                                                      <h3 class="section-services__item__title">

                                                            <?php echo  get_sub_field('title'); ?>

                                                      </h3>
                                                </div>
                                          <?php endif; ?>
                                          <!-- Icon title -->
                                          <!-- Texte -->
                                          <!--     <?php //if (get_sub_field('text')) : 
                                                      ?>
                                                      <p class="section-services__item__text"> <?php // echo  get_sub_field('text'); 
                                                                                                ?></p>
                                                <?php // endif; 
                                                ?> -->
                                          <!-- Texte -->
                                    </a>
                              </div>
                        <?php $i++;
                        endwhile; ?>
                  <?php endif; ?>
                  <!-- Service -->
            </div>
      </div>
</section>
