<?php
  add_theme_support("title-tag");
  if (!isset($content_width)) {$content_width = 900;}
  add_filter('show_admin_bar', '__return_false');
function viewport_meta() {?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php }
  add_filter('wp_head', 'viewport_meta');

  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', 1.0);
    wp_enqueue_style('base', get_template_directory_uri() . '/dist/css/base.css', array('style'), 1.0);

    wp_enqueue_script('jquery');
    wp_enqueue_script('f3', get_template_directory_uri() . '/dist/js/f3.js', array('jquery'), 1.0, true);
  });

  function remove_menus() {
    remove_menu_page('edit.php'); //Posts
    remove_menu_page('edit-comments.php'); //Comments
  }
add_action('admin_menu', 'remove_menus', 11);
