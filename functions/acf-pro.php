<?php 

//ACF OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global Theme Settings',
        'menu_title'    => 'DMI Theme Settings',
        'menu_slug'     => 'dmi-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}