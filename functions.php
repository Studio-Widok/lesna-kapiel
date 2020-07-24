<?php
  add_theme_support("title-tag");
  if (!isset($content_width)) {$content_width = 900;}
  add_filter('show_admin_bar', '__return_false');
function viewport_meta() {?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php }
  add_filter('wp_head', 'viewport_meta');

  // cleanup wordpress - start
  add_filter('intermediate_image_sizes', function ($sizes) {
    return array_filter($sizes, function ($val) {
      return $val !== 'medium_large';
    });
  });
  add_action('init', function () {
    wp_deregister_script('wp-embed');
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  });
  add_action('wp_print_styles', function () {
    wp_dequeue_style('wp-block-library');
  }, 100);
  // cleanup wordpress - end

  add_action('wp_enqueue_scripts', function () {
    $url = get_template_directory_uri() . '/dist/';
    wp_enqueue_style('style', $url . '../style.css', 1.0);
    wp_enqueue_style('base', $url . 'css/base.css', array('style'), 1.0);
    wp_enqueue_script('bundle', $url . 'js/bundle.js', array(), 1.0, true);
  });

  // dev - start
  function change_url($value, $option) {
    include __DIR__ . '/config.php';
    return $url;
  }
  add_filter('option_siteurl', 'change_url', 10, 2);
  add_filter('option_home', 'change_url', 10, 2);
  add_filter(
    'template_directory_uri',
    function ($template_dir_uri, $template, $theme_root_uri) {
      include __DIR__ . '/config.php';
      return $url . '/wp-content/themes/' . $template;
    },
    10, 3
  );
  add_filter('get_attached_file', function ($file) {
    return str_replace('/lesnakapiel_2/', '/lesnakapiel/', $file);
  }, 10, 2);
  // dev - end

  function remove_menus() {
    remove_menu_page('edit.php'); //Posts
    remove_menu_page('edit-comments.php'); //Comments
  }
  add_action('admin_menu', 'remove_menus', 11);

  function get_part($__file, $__data = []) {
    $__file = __DIR__ . '/inc/' . $__file . '.php';
    if (!is_file($__file)) {
      return;
    }

    foreach ($__data as $__key => &$__value) {
      $$__key = &$__value;
    }

    include $__file;
    return $__data;
}
