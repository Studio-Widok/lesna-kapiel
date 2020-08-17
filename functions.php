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
  add_action('wp_default_scripts', function ($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
      $script = $scripts->registered['jquery'];
      if ($script->deps) {
        $script->deps = array_diff($script->deps, array('jquery-migrate'));
      }
    }
  });
  // cleanup wordpress - end

  // custom post types na taxonomies
  add_action('init', function () {
    register_post_type('apartment', array(
      'public'      => true,
      'label'       => 'Apartamenty',
      'has_archive' => false,
      'supports'    => array('title'),
    ));

    register_taxonomy(
      'apartment_categories',
      'apartment',
      array(
        'label'             => 'Categories',
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_menu'      => true,
      )
    );

    register_taxonomy(
      'apartment_tags',
      'apartment',
      array(
        'label'             => 'Tags',
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_in_menu'      => true,
      )
    );
  });

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
    _get_part('parts', $__file, $__data);
  }

  function get_component($__file, $__data = []) {
    _get_part('components', $__file, $__data);
  }

  function _get_part($__folder, $__file, $__data) {
    $__file = __DIR__ . '/' . $__folder . '/' . $__file . '.php';
    if (!is_file($__file)) {
      return;
    }

    foreach ($__data as $__key => &$__value) {
      $$__key = &$__value;
    }

    include $__file;
    return $__data;
  }

  include __DIR__ . '/../../../wp-admin/includes/media.php';
  function get_video_meta($file) {
    $video_path = get_attached_file($file['id']);
    return wp_read_video_metadata($video_path);
}
