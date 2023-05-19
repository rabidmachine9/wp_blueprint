<?php get_header();?>
<div id="primary" class="content-area">
    <?php do_action('before_site_main'); ?>
    <main id="content" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()): the_post();
                get_template_part('template-parts/default/content');
            endwhile;
        endif;
        ?>
    </main><!-- .site-main -->
    <?php do_action('after_site_main'); ?>
</div><!-- .content-area -->
<div class="base-text">
    <?php echo "Index page is used as a showcase for basic functionalities, here is how you load an svg to the code"; ?>
</div>

<?php echo display_svg_icon('star'); ?>

<?php get_footer(); ?>