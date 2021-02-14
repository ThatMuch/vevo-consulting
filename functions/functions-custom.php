<?php
/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* BUTTON
/––––––––––––––––––––––––*/
// Usage: [button link="https://twitter.com" text="Twitter"]
function shortcode_button($atts) {
  $link = $atts['link'];
  $text = $atts['text'];
  return '<a href="'.$link.'" class="button">'.$text.'</a>';
}
add_shortcode('button', 'shortcode_button');

// Logo du site
add_theme_support(
  'custom-logo', array(
      'flex-height' => true,
  )
);

// Page d'options
if(function_exists('acf_add_options_page') ) {
   // acf_add_options_page();
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Mars Settings'),
            'menu_title'  => __('Mars Settings'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Coordonées Settings'),
            'menu_title'  => __('Coordonées'),
            'parent_slug' => $parent['menu_slug'],
        ));
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Support'),
            'menu_title'  => __('Support'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}
}


/**
 * Change Video Background "Tap to unmute" text
 *
 * @since 2.7.0
 * @author Push Labs
 * @param String $text The button text
 * @return String $text
 */
function themeprefix_vidbg_tap_to_unmute_text( $use_old ) {
  $text = 'Activer le son';

  return $text;
}
add_filter( 'vidbg_tap_to_unmute_text', 'themeprefix_vidbg_tap_to_unmute_text' );

/* 2.12 LOAD MORE
/––––––––––––––––––––––––––––––––––––––*/
wp_enqueue_script('load-more', get_template_directory_uri() . '/inc/assets/js/myloadmore.js', array(), '1.0.0', true);

function load_more_posts() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'load_more_nonce')) {
        exit;
    }

    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $post_type = $args['post_type'];

    query_posts( $args );

    if (have_posts()):
        while (have_posts()) : the_post();
                get_template_part('templates/wp', 'post');
        endwhile;

    endif;

    die;
}

add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');
