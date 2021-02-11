<?php
/**
 * functions to output ACFs flexible content
 *
 * @author     ThatMuch
 * @version    0.1.0
 * @since      mars_1.0.0
 *
 *
 */


/*==================================================================================
  SETTINGS/SETUP
==================================================================================*/


/* ADD TITLES BLOCKS
/––––––––––––––––––––––––––––––––––––*/
// adds the title sub-field to the ACF-row. Edit `name` at `add_filter` to match your ACF-value.
// » https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
function vevo_sections_backendtitle( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {
  	$title = get_sub_field('title')." ($title)";
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=sections', 'vevo_sections_backendtitle', 10, 4);


/* GATHER SECTIONS
/––––––––––––––––––––––––*/
function vevo_sections() {
  ob_start('sanitize_output');
  if (have_rows('sections')):
    while (have_rows('sections')): the_row();
      if (get_row_layout() == 'articles') : vevo_section_articles(); endif;
      if (get_row_layout() == 'carousel') : vevo_section_carousel(); endif;
      if (get_row_layout() == 'contact') : vevo_section_contact(); endif;
      if (get_row_layout() == 'faq') : vevo_section_faq(); endif;
      if (get_row_layout() == 'gallery') : vevo_section_gallery(); endif;
      if (get_row_layout() == 'header') : vevo_section_header(); endif;
      if (get_row_layout() == 'link') : vevo_section_link(); endif;
      if (get_row_layout() == 'logos') : vevo_section_logos(); endif;
      if (get_row_layout() == 'portfolio') : vevo_section_portfolio(); endif;
      if (get_row_layout() == 'price') : vevo_section_price(); endif;
      if (get_row_layout() == 'services') : vevo_section_services(); endif;
      if (get_row_layout() == 'stats') : vevo_section_stats(); endif;
      if (get_row_layout() == 'team') : vevo_section_team(); endif;
      if (get_row_layout() == 'testimonials') : vevo_section_testimonials(); endif;
      if (get_row_layout() == 'text_image') : vevo_section_text_img(); endif;
      if (get_row_layout() == 'text') : vevo_section_text(); endif;
      if (get_row_layout() == 'benefits') : vevo_section_benefits(); endif;
    endwhile;
  endif;
  return ob_get_flush();
}


/*==================================================================================
  BLOCKS
==================================================================================*/
// add your custom sections here...

/* TEXT
/––––––––––––––––––––––––*/
function vevo_section_text() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-text.php');
  return ob_get_flush();
}
/* TEXT + IMAGE
/––––––––––––––––––––––––*/
function vevo_section_text_img() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-text-image.php');
  return ob_get_flush();
}

/* LINK
/––––––––––––––––––––––––*/
function vevo_section_link() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-link.php');
  return ob_get_flush();
}

/* SERVICES
/––––––––––––––––––––––––*/
function vevo_section_services() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-services.php');
  return ob_get_flush();
}

/* TEAM
/––––––––––––––––––––––––*/
function vevo_section_team() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-team.php');
  return ob_get_flush();
}

/* PORTFOLIO
/––––––––––––––––––––––––*/
function vevo_section_portfolio() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-portfolio.php');
  return ob_get_flush();
}

/* TESTIMONIALS
/––––––––––––––––––––––––*/
function vevo_section_testimonials() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-testimonials.php');
  return ob_get_flush();
}

/* PRICE
/––––––––––––––––––––––––*/
function vevo_section_price() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-price.php');
  return ob_get_flush();
}

/* LOGOS
/––––––––––––––––––––––––*/
function vevo_section_logos() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-logos.php');
  return ob_get_flush();
}

/* CAROUSEL
/––––––––––––––––––––––––*/
function vevo_section_carousel() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-carousel.php');
  return ob_get_flush();
}

/* GALLERY
/––––––––––––––––––––––––*/
function vevo_section_gallery() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-gallery.php');
  return ob_get_flush();
}

/* CONTACT
/––––––––––––––––––––––––*/
function vevo_section_contact() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-contact.php');
  return ob_get_flush();
}

/* STATS
/––––––––––––––––––––––––*/
function vevo_section_stats() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-stats.php');
  return ob_get_flush();
}

/* FAQ
/––––––––––––––––––––––––*/
function vevo_section_faq() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-faq.php');
  return ob_get_flush();
}
/* Header
/––––––––––––––––––––––––*/
function vevo_section_header() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-header.php');
  return ob_get_flush();
}
/* Articles
/––––––––––––––––––––––––*/
function vevo_section_articles() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-articles.php');
  return ob_get_flush();
}
/* benefits
/––––––––––––––––––––––––*/
function vevo_section_benefits() {
  ob_start('sanitize_output');
    include (get_theme_root().'/vevo-consulting/templates/section-benefits.php');
  return ob_get_flush();
}

?>