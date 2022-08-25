<?php

add_action('wp_enqueue_scripts', function () {
  $url = get_template_directory_uri() . '/dist/';
  wp_enqueue_style('base', $url . 'main.css', [], '1.18');
  wp_enqueue_script('bundle', $url . 'main.js', [], '1.4', true);
});
