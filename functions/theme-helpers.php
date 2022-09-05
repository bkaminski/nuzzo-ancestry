<?php

// ALLOW POSTS AND PAGES FEATURED IMAGE
add_theme_support('post-thumbnails');

// REMOVES SCRIPT AND STYLE TYPE ATTR
add_theme_support( 'html5', [ 'script', 'style' ] );

//TITLE TAG SUPPORT
add_theme_support( 'title-tag' );

// REMOVE LINKS TO JSON API UNLESS BUILD HAS A USE FOR THIS
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// REMOVE COMMENTS FEED RSS
add_filter( 'feed_links_show_comments_feed', '__return_false' );

// DISABLE EMOJI BLOAT
		function disable_wp_emoji() {
		
		// REMOVE ALL ACTIONS USING EMOJI
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		
		// REMOVE EDITOR EMOJIS
		add_filter( 'tiny_mce_plugins', 'disable_emoji_tinymce' );
		  
		// REMOVE DNS PREFETCH
		add_filter( 'emoji_svg_url', '__return_false' );
		}
		add_action( 'init', 'disable_wp_emoji' );
		function disable_emoji_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}}

// REMOVE WP VERSION FROM CODE
function dmi_remove_version() {
return '';
}
add_filter('the_generator', 'dmi_remove_version');

// DISABLE GUTENBERG CSS
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

// REMOVE VERSION FROM JS AND CSS
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

//Wordpress Fluid Images Bootstrap 5
function bootstrap_fluid_images( $html ){
  $classes = 'img-fluid'; // Bootstrap 5
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_fluid_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_fluid_images', 10 );