<?php
/**
 * Doody Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Doody
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function doody_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {

        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'doody_customize_partial_blogname',
        ));
    }


    // Banner title
    $wp_customize->add_setting('header_banner_title_setting', array(
        'default' => __('Doody', 'doody'),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __('Banner Title', 'doody'),
        'section' => 'header_image',
        'settings' => 'header_banner_title_setting',
        'type' => 'text'
    )));

    // Banner description
    $wp_customize->add_setting('header_banner_description_setting', array(
        'default' => __('My first theme maked with Wordpress', 'doody'),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_description_setting', array(
        'label' => __('Banner description', 'doody'),
        'section' => 'header_image',
        'settings' => 'header_banner_description_setting',
        'type' => 'text'
    )));

    // Footer
    $wp_customize->add_section('site_footer_section', array(
        'title' => esc_html__('Footer', 'doody'),
        'capability' => 'edit_theme_options',
    ));


    $wp_customize->add_setting('footer_text_setting', array(
        'type' => 'option', // or 'option'
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text_setting', array(
        'label' => __('Replace the footer text', 'doody'),
        'section' => 'site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}

add_action('customize_register', 'doody_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function doody_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function doody_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function doody_customize_preview_js()
{
    wp_enqueue_script('doody-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'doody_customize_preview_js');
