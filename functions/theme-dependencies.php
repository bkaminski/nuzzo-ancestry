<?php 
//LOAD SCRIPTS
function enqueue_bkc_scripts() {
    wp_enqueue_script('Bootstrap-5.2.0', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('font-awesome-5', 'https://kit.fontawesome.com/42219cbebc.js', false, null, null, false);
    wp_enqueue_script('bkc-scripts', get_template_directory_uri() . '/assets/js/bkcScripts.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('Google Maps API', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCtN1uoWQM6pP0PIqEokyf7FRpGPY6kL-U', false, null, null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_bkc_scripts');

//LOAD CSS
function enqueue_bkc_styles() {
    wp_enqueue_style('bootstrap-5.2.0', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('bkc-styles', get_template_directory_uri() . '/assets/styles/bkcStyles.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_bkc_styles');

// Register Custom Navigation Walker
require_once get_template_directory() . '/functions/class-wp-bootstrap-navwalker.php';
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bkc-theme' ),
    'secondary_menu' => __('Secondary Menu', 'bkc-theme'),
    'footer_menu' => __( 'Footer Menu', 'bkc-theme'),  
));

//REGISTER CUSTOM POST TYPE
add_action('init', 'register_nuzzo_fam_cpt');
function register_nuzzo_fam_cpt() {
    register_post_type('nuzzo_fam', [
        'label' => 'Nuzzo Family Members',
        'public' => true, 
        'capability_type' => 'post',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
        'taxonomies'  => array( 'category' ),
    ]);
}

// Add Tag Support
function nuzzo_fam_tag() {
    register_taxonomy_for_object_type('post_tag', 'nuzzo_fam_tag');
}
add_action('init', 'nuzzo_fam_tag');


// GOOGLE MAPS
function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyCtN1uoWQM6pP0PIqEokyf7FRpGPY6kL-U';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api'); 
