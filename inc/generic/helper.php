<?php
/**
 * Various helper functions
 */

function embed_svg_icons() {
    include get_stylesheet_directory() . '/assets/icons/icons.svg';
}


function display_svg_icon($id = '') {
    return "<svg class='icon-{$id}'><use xlink:href='#{$id}'></use></svg>";
}

function print_pr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}