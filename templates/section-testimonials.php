<?
/**
 * Testimonials Block
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
  <section class="section section-testimonials <?php echo $fond == "Couleur" ? "bg-primary": $fond == "Gris" ? "bg-light" : "" ?>">
    <!-- Section background: image -->
      <?php if(get_sub_field('fond') == "Image"):?>
      <div class="section__background-image"  style="
            <?php if(get_sub_field('image')):?>
            background-image:url(<?php echo the_sub_field('image') ?>);
            <?php endif;?>"></div>
      <?php endif;?>
    <!-- Section background: image -->
        <div class="container">
              <?php
              $args = array(
              'post_type' => 'testimonials'
              );
               $the_query = new WP_Query($args);
              if ($the_query->have_posts() ): $i = 0; $y = 0; ?>
                    <div id="carouselTestimonials" class="section-testimonials__carousel carousel slide" data-ride="carousel">
                        <!-- Title -->
                        <?php if(get_sub_field('title') ) : ?>
                              <h2 class="section__title mb-5 primary"><?php echo  get_sub_field('title'); ?></h2>
                        <?php endif; ?>
                        <!-- Title -->
                          <div class="carousel-inner">
                                <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <div class="carousel-item section-testimonials__carousel_item <?php if($y == 0) {echo 'active';} ?>">
                                <div class="row d-flex align-items-center">
                                      <div class="col-sm-4">
                                            <!-- Image -->
                                                <?php if (get_the_post_thumbnail()) : ?>
                                                      <img data-src="<?php the_post_thumbnail_url('thumbnail')?>" alt="<?php echo  get_sub_field('title'); ?>" class="section-testimonials__carousel_item-image">
                                                <?php else : ?>
                                                      <div class="section-testimonials__carousel_item-image"></div>
                                                <?php endif;?>
                                                <!-- Image -->
                                      </div>
                                      <div class="col-sm-8">
                                            <!-- Job -->
                                            <?php if (get_field('quote') ) : ?>
                                                  <blockquote cite="<?php echo  get_sub_field('title'); ?>" class="animate__animated animate__fadeIn"> <?php echo  get_field('quote'); ?></blockquote>
                                            <?php endif; ?>
                                            <!-- Job -->
                                            <!-- Auteur -->
                                                  <h5 class="animate__animated animate__fadeIn section-testimonials__carousel_item-author"><?php the_title()?></h5>
                                            <!-- Auteur -->
                                      </div>
                                      </div>
                                </div>
                                <?php $y++ ; endwhile;?>
                              </div>
                              <?php if($y > 1) : ?>
                                      <ol class="carousel-indicators">
                                <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                      <li data-target="#carouselTestimonials" data-slide-to="<?php echo  $i?>" class="<?php if($i == 0) {echo 'active';
                                      } ?>"></li>
                                <?php $i++; endwhile;?>
                              </ol>
                              <?php endif; ?>
                    </div>
                <?php endif; wp_reset_query(); ?>
        </div>
 </section>