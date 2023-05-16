<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script>(function(){document.documentElement.className = 'js';})();</script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
<?php wp_body_open(); ?>
<div class="site">
    <?php
    /**
     * Functions hooked into before_site_header action
     *
     * @hooked kp_skip_content_link - 10
     */
    do_action('before_site_header');
    ?>
    <header class="site-header">
        <?php
        /**
         * Functions hooked into site_header action
         * 
         * @hooked kp_header_container_open - 0
         * @hooked kp_primary_navigation - 10
         * @hooked kp_language_switcher - 20
         * @hooked kp_site_branding - 30
         * @hooked kp_header_container_close - 100
         */
        do_action('site_header');
        ?>
    </header>
    <div class="site-content">