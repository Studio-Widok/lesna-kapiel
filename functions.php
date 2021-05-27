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
        $script->deps = array_diff($script->deps, ['jquery-migrate']);
      }
    }
  });
  // cleanup wordpress - end

  // custom post types and taxonomies
  add_action('init', function () {
    register_post_type('apartment', [
      'public'      => true,
      'label'       => 'Apartamenty',
      'has_archive' => true,
      'supports'    => ['title'],
    ]);

    register_taxonomy(
      'collections',
      'apartment',
      [
        'label'             => 'Kolekcje',
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_menu'      => true,
      ]
    );

    register_taxonomy(
      'tags',
      'apartment',
      [
        'label'             => 'Tagi',
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_in_menu'      => true,
      ]
    );
  });

  add_action('wp_enqueue_scripts', function () {
    $url = get_template_directory_uri() . '/dist/';
    wp_enqueue_style('base', $url . 'main.css', [], 1.2);
    wp_enqueue_script('bundle', $url . 'main.js', [], 1.0, true);
  });

  // // dev - start
  // function change_url($value, $option) {
  //   include __DIR__ . '/config.php';
  //   return $url;
  // }
  // add_filter('option_siteurl', 'change_url', 10, 2);
  // add_filter('option_home', 'change_url', 10, 2);
  // add_filter(
  //   'template_directory_uri',
  //   function ($template_dir_uri, $template, $theme_root_uri) {
  //     include __DIR__ . '/config.php';
  //     return $url . '/wp-content/themes/' . $template;
  //   },
  //   10, 3
  // );
  // add_filter('get_attached_file', function ($file) {
  //   return str_replace('/lesnakapiel_2/', '/lesnakapiel/', $file);
  // }, 10, 2);
  // // dev - end

  add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_node('new-content');
  });
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

    $__index = call_user_func(function ($__file) {
      global $displayed_parts;
      if (!isset($displayed_parts)) {
        $displayed_parts = [];
      }

      if (!isset($displayed_parts[$__file])) {
        $displayed_parts[$__file] = 0;
      }

      return $displayed_parts[$__file]++;
    }, $__file);

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

  function get_link_url($field) {
    switch ($field['target']) {
      case 'out':
        return $field['url'];
      case 'in':
        return $field['link_page'];
      case 'collections':
        return get_category_link(pll_get_term($field['link_collections']));
      case 'tags':
        return get_tag_link(pll_get_term($field['link_tags']));
      case 'dla_dzieci':
        return get_the_permalink(pll_get_post(111)) . '#children';
      case 'sauna':
        return get_the_permalink(pll_get_post(48)) . '#sauna';
      case 'basen':
        return get_the_permalink(pll_get_post(48)) . '#pool';
    }
  }

  function get_term_id($termSlug) {
    return get_terms([
      'taxonomy'   => 'tags',
      'hide_empty' => false,
      'slug'       => $termSlug,
      'lang'       => 'pl',
    ])[0]->term_id;
  }

  function get_collection_id($collectionSlug) {
    return get_terms([
      'taxonomy'   => 'collections',
      'hide_empty' => false,
      'slug'       => $collectionSlug,
      'lang'       => 'pl',
    ])[0]->term_id;
  }

  function get_mask_color($maskColor) {
    $colors = [
      'green' => '23382c',
      'beige' => 'cabaaa',
      'pale'  => '8a9992',
      'gray'  => 'c3c2c8',
    ];
    return $colors[$maskColor];
  }

  function hide_description_row() {
    echo "<style> .term-description-wrap { display:none; } </style>";
  }

  add_action("tags_edit_form", 'hide_description_row');
  add_action("tags_add_form", 'hide_description_row');

  // contact form
  add_filter('wpcf7_autop_or_not', '__return_false');

  add_action("wpcf7_before_send_mail", function ($wpcf7_data) {
    if ($wpcf7_data->id() !== 463) {
      return;
    }

    $submission = WPCF7_Submission::get_instance();
    $data       = $submission->get_posted_data();
    $mail       = $wpcf7_data->prop('mail');

    $body = $mail['body'];
    ob_start();
    include __DIR__ . '/parts/mail_template.php';
    $mail['body'] = ob_get_clean();

    $wpcf7_data->set_properties([
      'mail' => $mail,
    ]);

  }, 10, 1);

  add_action("wpcf7_submit", function ($wpcf7_data, $result) {
    if ($wpcf7_data->id() !== 463) {
      return;
    }

    $submission = WPCF7_Submission::get_instance();
    $data       = $submission->get_posted_data();
    $messages   = $wpcf7_data->prop('messages');
    foreach ($messages as $key => $message) {
      $messages[$key] = pll_translate_string($message, $data['page-language']);
    }

    $wpcf7_data->set_properties([
      'messages' => $messages,
    ]);

    return $wpcf7_data;
  }, 10, 2);

  add_action('template_redirect', function () {
    if (!is_user_logged_in()) {
      include ABSPATH . 'landing.php';
      wp_redirect('/landing');
      exit();
    }
});
