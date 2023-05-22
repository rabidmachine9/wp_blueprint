<?php
/*
 * Template Name: Homepage
 */

get_header();
?>
<div id="primary" class="content-area">
    <?php do_action('before_site_main'); ?>
    <main id="content" class="site-main">
    <?php
        do_action('homepage');
    ?>
    </main><!-- .site-main -->
    <?php do_action('after_site_main'); ?>
</div><!-- .content-area -->
<?php
get_footer();