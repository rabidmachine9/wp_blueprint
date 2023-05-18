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
    <?php do_action('before_site_header');?>
    <header class="site-header">
        <?php do_action('site_header'); ?>
    </header>
    <div class="site-content">