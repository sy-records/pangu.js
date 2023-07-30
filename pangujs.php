<?php
/**
 * Plugin Name: Pangu JS
 * Plugin URI: https://github.com/sy-records/pangu.js
 * Description: Paranoid text spacing in WordPress
 * Version: 1.0.0
 * Author: 沈唁
 * Author URI: https://qq52o.me
 * License: MIT
 */

if (!defined('ABSPATH')) {
    exit;
}

define('PANGUJS_VERSION', '1.0.0');

function pangujs_enqueue_scripts()
{
    wp_enqueue_script('pangujs', plugins_url('js/pangu.min.js', __FILE__), array(), PANGUJS_VERSION, true);
    $autoJS = <<<EOF
document.addEventListener('DOMContentLoaded', () => {
    pangu.autoSpacingPage();
});
EOF;

    wp_add_inline_script('pangujs', $autoJS);
}

if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'pangujs_enqueue_scripts');
}
