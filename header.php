<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( 'parts/page', 'header-tracking' ); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="alternate" hreflang="x-default" href="<?php echo get_home_url(); ?>"/>
<link rel="alternate" hreflang="en-us" href="<?php echo get_home_url(); ?>"/>
<?php get_template_part( 'parts/page', 'favicons' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part( 'parts/page', 'main-nav' ); ?>
