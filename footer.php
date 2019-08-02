<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doody
 */

?>
</div><!-- .row -->
</div><!-- .container -->
</div><!-- #content -->

<footer id="colophon" class="site-footer border-top">
    <div class="container py-3">

		<?php if ( has_nav_menu( 'footer' ) ): ?>
            <nav class="navbar footer-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => 'div',
					'container_id'   => 'main-nav',
					'menu_id'        => false,
//					'menu_class'     => 'navbar-nav',
					'depth'          => 1,
				) );
				?>
            </nav><!-- #site-navigation -->
		<?php endif ?>

        <div class="site-info">

            <div class="footer-menu-left">
				<?php if ( ! get_option( 'footer_text_setting' ) ): ?>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'doody' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'doody' ), 'WordPress' );
						?>
                    </a>
                    <span class="sep mr-1"> | </span>
                    <span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'doody' ), 'Doody', 'Chelle' );
                    ?>
                    </span>

				<?php else: ?>
					<?php echo get_option( 'footer_text_setting' ) ?>
				<?php endif ?>
            </div>

			<?php if ( has_nav_menu( 'social' ) ): ?>
                <nav class="navbar footer-menu-right social-menu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
						'container'      => 'div',
						'container_id'   => 'main-nav',
						'menu_id'        => false,
//						'menu_class'     => 'navbar-nav',
						'depth'          => 1,
					) );
					?>
                </nav><!-- #site-navigation -->
			<?php endif ?>

        </div>

    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
