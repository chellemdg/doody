<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doody
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'doody'); ?></a>

        <header id="masthead" class="site-header fixed-top shadow-sm navbar-dark bg-primary">
            <div class="container">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
            </div>
        </header><!-- #masthead -->


    <?php if (is_home() && is_front_page()) : ?>

        <?php get_template_part('template-parts/header/site', 'branding'); ?>

    <?php

    /*
	 * If a regular post or page, and not the front page, show the featured image.
	 */

    elseif ((is_single() || ( is_page() && !is_page_template('featured-image.php') && !is_page_template('fullwidth2.php'))) && has_post_thumbnail()):
        get_template_part('template-parts/header/featured-image', 'header');
    endif; ?>

    <div id="content" class="site-content">
        <div class="container">
            <div class="row">

