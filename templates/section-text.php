<?php

/**
 * Text Block
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
<section class="section section-text <?php echo $fond == "Couleur" ? "bg-primary" : ($fond == "Gris" ? "bg-light" : "") ?>">
    <div class="container">
        <!-- Title -->
        <?php if (get_sub_field('title')) : ?>
            <h2 class="section__title primary"><?php echo  get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <!-- Texte -->
        <?php if (get_sub_field('text')) : ?>
            <?php echo  get_sub_field('text'); ?>
        <?php endif; ?>
        <!-- Texte -->
    </div>
</section>
