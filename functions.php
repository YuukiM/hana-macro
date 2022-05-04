<?php

function enqueue_scripts(){
    // css
    wp_enqueue_style("style",get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');