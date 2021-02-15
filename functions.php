<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.min.css', array( 'mars_/styles' ) );
    }
endif;

function my_scripts() {
            wp_enqueue_script( 'read-more', get_stylesheet_directory_uri().'/assets/scripts/readmore.js',true, array(), '', false );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );


// END ENQUEUE PARENT ACTION
/**
 * Post Type: Ateliers.
 */

function cptui_register_my_cpt() {
$labels = array(
    "name" => __( "Ateliers", "" ),
    "singular_name" => __( "Atelier", "" ),
    "menu_name" => __( "Atelier", "" ),
    "all_items" => __( "Tous les Ateliers", "" ),
    "add_new" => __( "Ajouter un atelier", "" ),
    "add_new_item" => __( "Ajouter un nouveau atelier", "" ),
    "edit_item" => __( "Modifier un atelier", "" ),
    "new_item" => __( "Nouveau atelier", "" ),
    "view_item" => __( "Voir le atelier", "" ),
    "view_items" => __( "Voir les Ateliers", "" ),
    "search_items" => __( "Chercher un atelier", "" ),
    "not_found" => __( "Rien trouvé", "" ),
    "not_found_in_trash" => __( "Rien n'a été trouvé dans la corbeille", "" ),
);

$args = array(
    "label" => __( "Ateliers", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "atelier", "with_front" => true ),
    "query_var" => true,
    "menu_icon" => "dashicons-format-gallery",
    "supports" => array( "title", "editor", "thumbnail" ),
);

register_post_type( "atelier", $args );

}
add_action( 'init', 'cptui_register_my_cpt' );

require('functions/functions-sections.php');