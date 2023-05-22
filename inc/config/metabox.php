<?php
add_filter('rwmb_meta_boxes', 'kp_register_meta_boxes');


function kp_register_meta_boxes(){
    $prefix = 'kp_';
    $meta_boxes = array();


    $meta_boxes[] = array(
        'title' => 'Services',
        'post_types' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => 'Service',
                'id' => $prefix . 'services',
                'type' => 'text',
                'placeholder' => 'Service',
                'clone' => true,
            ),
        ),
        'only_on' => array(
            'template' => 'tmpl_homepage.php',
        ),
    );

     // CONTACT
    $meta_boxes[] = array(
        'title' => 'CONTACT PAGE OPTIONS',
        'post_types' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => 'Contact Form',
                'id' => $prefix . 'contact_form',
                'type' => 'post',
                'field_type' => 'select_advanced',
                'post_type' => 'wpcf7_contact_form',
            ),
        ),
        'only_on' => array(
            'template' => 'tmpl_contact.php',
        ),
    );


    foreach ($meta_boxes as $k => $meta_box) {
        if (isset($meta_box['only_on']) && !rw_maybe_include($meta_box['only_on'])) {
            unset($meta_boxes[$k]);
        }
    }
    return $meta_boxes;
}


/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include($conditions) {
    // Always include in the frontend to make helper function work
    if (!is_admin()) {
        return true;
    }
    // Always include for ajax
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return true;
    }
    if (isset($_GET['post'])) {
        $post_id = intval($_GET['post']);
    } elseif (isset($_POST['post_ID'])) {
        $post_id = intval($_POST['post_ID']);
    } else {
        $post_id = false;
    }
    $post_id = (int) $post_id;
    $post = get_post($post_id);
    foreach ($conditions as $cond => $v) {
        // Catch non-arrays too
        if (!is_array($v)) {
            $v = array($v);
        }
        switch ($cond) {
            case 'id':
                if (in_array($post_id, $v)) {
                    return true;
                }
                break;
            case 'parent':
                $post_parent = $post->post_parent;
                if (in_array($post_parent, $v)) {
                    return true;
                }
                break;
            case 'slug':
                $post_slug = $post->post_name;
                if (in_array($post_slug, $v)) {
                    return true;
                }
                break;
            case 'category': //post must be saved or published first
                $categories = get_the_category($post->ID);
                $catslugs = array();
                foreach ($categories as $category) {
                    array_push($catslugs, $category->slug);
                }
                if (array_intersect($catslugs, $v)) {
                    return true;
                }
                break;
            case 'template':
                $template = get_post_meta($post_id, '_wp_page_template', true);
                if (in_array($template, $v)) {
                    return true;
                }
                break;
            case 'not_template':
                $template = get_post_meta($post_id, '_wp_page_template', true);
                if (in_array($template, $v)) {
                    return false;
                } else {
                    return true;
                }
                break;
        }
    }
    // If no condition matched
    return false;
}