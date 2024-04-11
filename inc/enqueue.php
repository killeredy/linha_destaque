<?php

add_action('wp_enqueue_scripts', 'lg_destaque_layout');
function lg_destaque_layout()
{
    $style = plugin_dir_url(__DIR__) . 'linha_destaque/css/style.css';
    wp_enqueue_style('lg_style_lg', $style, array(), '1.0.0', 'all');
}