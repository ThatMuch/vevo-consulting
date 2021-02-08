<?
/**
 * Header Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      Marconte
 * @version     0.1.0
 * @since       myPrestige_1.0.0
 *
 */
 ?>
      <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'medium' ); ?>
<?php $fond = get_sub_field('fond'); ?>
  <section class="section section-header <?php echo $fond == "Couleur" ? "bg-primary": "bg-light" ?>">
    <!-- Section background: image -->
    <?php if(get_sub_field('fond') == "Image"):?>
        <div class="section-background-image"  style="<?php if(get_sub_field('image')):?>background-image:url(<?php echo the_sub_field('image') ?>);
        <?php endif;?>"></div>
    <?php endif;?>
    <!-- Section background: image -->
    <div class="container">
    <div class="section-header__content">
        <!-- Title -->
        <?php if(get_sub_field('lead') ) : ?>
            <h1 class="section__title animate__animated animate__slideInDown"> <?php echo  get_sub_field('title'); ?></h1>
        <?php endif; ?>
        <!-- Title -->
        <!-- Lead -->
        <?php if(get_sub_field('lead') ) : ?>
            <h2 class="section__lead animate__animated animate__slideInDown"> <?php echo  get_sub_field('lead'); ?></h2>
        <?php endif; ?>
        <!-- Lead -->
        <!-- Button -->
        <?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
                    <a class="btn btn-light animate__animated animate__fadeIn" href="<?php echo  $link['url']; ?>">
                        <?php echo  $link['title']; ?>
                    </a>
                <?php endif; ?>
                <!-- Button -->
    </div>
      </div>
 </section>