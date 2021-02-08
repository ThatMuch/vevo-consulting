<?

/**
 * Link Block
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
<section class="section section-link text-center <?php echo $fond == "Couleur" ? "bg-primary" : "" ?>">
    <!-- Section background: image -->
    <?php if (get_sub_field('fond') == "Image") : ?>
        <div class="section__background-image" style="
        <?php if (get_sub_field('image')) : ?>
        background-image:url(<?php echo the_sub_field('image') ?>);
        <?php endif; ?>"></div>
    <?php endif; ?>
    <!-- Section background: image -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0">
                <!-- Title -->
                <?php if (get_sub_field('title')) : ?>
            <h3 class="section__title no-br"><?php echo  get_sub_field('title'); ?></h3>
        <?php endif; ?>
                <!-- Title -->

                <!-- Text -->
                <?php if (get_sub_field('text')) : ?>
                    <p class="mb-4"> <?php echo  get_sub_field('text'); ?></p>
                <?php endif; ?>
                <!-- Text -->
                <div class="d-flex justify-content-center">
  <!-- Button -->
  <?php if ( get_sub_field('button') ) : $link = get_sub_field('button');?>
                <div class="section-text-image__btn">
                    <a class="btn <?php echo  $fond == "Couleur" ? "btn-outline-light" : "btn-primary" ?>" href="<?php echo  $link['url']; ?>" target="<?php echo $link['target'];?>">
                        <?php echo  $link['title']; ?>
                    </a>
                </div>
                <?php endif; ?>
                <!-- Button -->
  <!-- Button -->
  <?php if ( get_sub_field('button_secondary') ) : $link = get_sub_field('button_secondary'); ?>
                <div class="section-text-image__btn">
                    <a class="btn btn-outline-light ml-2" href="<?php echo  $link['url']; ?>" target="<?php echo $link['target'];?>">
                        <?php echo  $link['title']; ?>
                    </a>
                </div>
                <?php endif; ?>
                <!-- Button -->

                </div>
            </div>
        </div>
    </div>
</section>