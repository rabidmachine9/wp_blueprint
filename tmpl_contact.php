<?php
/*
 * Template Name: Contact
 */

get_header();
?>
<div id="primary" class="content-area">
    <?php do_action('before_site_main'); ?>
    <main id="content" class="site-main">
    <?php
    if (have_posts()):
        do_action('contact');
    endif;
    ?>
    </main><!-- .site-main -->
    <?php do_action('after_site_main'); ?>
</div><!-- .content-area -->
<?php
get_footer();