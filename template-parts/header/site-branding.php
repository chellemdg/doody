<?php
/**
 * Displays header site branding
 *
 * @package Doody
 */
?>

<div class="custom-header">
	<?php if ( has_header_image() ) { ?>
        <img class="vh-100" src=<?php header_image(); ?>>
	<?php } ?>
    <div class="bg-gradient">
        <div class="site-branding centered">
            <h1>
                <?php
                if (get_theme_mod('header_banner_title_setting')) {
                    echo get_theme_mod('header_banner_title_setting');
                } else {
                    echo 'Doody';
                }
                ?>
            </h1>
            <?php
            if ( get_theme_mod( 'header_banner_description_setting' ) ) {
	            echo get_theme_mod( 'header_banner_description_setting' );
            } else {
                echo esc_html__('My first theme maked with WordPress', 'doody');
            }
            ?>
        </div><!-- .site-branding -->
    </div>
</div>
<!-- .custom-header -->