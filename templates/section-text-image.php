<?

/**
 * Texte-Image Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>

<section id="section-<?php echo  sectionID(get_sub_field('title'));?>" class="section section-text-image">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 section-text-image__image">
                <?php  if (get_sub_field('image')) : $img = get_sub_field('image'); ?>
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
                        <div class="section-text-image__content">
                            <?php echo  get_sub_field('text'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Text -->
                   <!-- Buttons -->
                   <?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
                <div>
                    <a class="link" href="">
                        Lire plus
                    </a>
                </div>
                <?php endif; ?>
                <!-- Button -->
                </div>
            </div>
        </div>
    </div>
</section>