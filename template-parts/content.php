<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doody
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>

    <header class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');?>
        <hr>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                doody_posted_on();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->


    <?php doody_post_thumbnail(); ?>

    <div class="entry-summary">
        <?php
        the_excerpt();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'doody'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php doody_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
