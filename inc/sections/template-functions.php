<?php

function kp_burger_menu() {
?>
    <div class="burger-container">
        <button class="burger-menu" aria-label="<?php _e('Open Menu Button');?>">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
<?php
}


function kp_display_logo() {
?>
    <div class="logo-container">
        <a href="<?php echo get_home_url();?>" aria-label="<?php _e('Website logo, link to homepage');?>">
            <?php echo display_svg_icon("logo");?>
        </a>
    </div>
<?php
}


function kp_contact_form(){
    $form_id = rwmb_meta('kp_contact_form');
?>
    <section class="contact-form-section">
        <div class="section-container">
            <h2 class="section-title">Contact Form</h2>
            <?php
                if ($form_id):
                    echo do_shortcode("[contact-form-7 id='{$form_id}']");
                endif;
            ?>
        </div>
    </section>
<?php
}

function kp_get_map(){
    $map_coords = of_get_option('map_coords');
?>
    <section class="map-section">
        <?php if (!empty($map_coords)): ?>
            <div class="location-map-container">
                <div class="gmap-container" data-coords="<?php echo $map_coords; ?>">
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php
}