<?php
  // cSpell:ignore staticize

  add_theme_support("title-tag");
  if (!isset($content_width)) {$content_width = 900;}
  add_filter('show_admin_bar', '__return_false');

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

  add_action('wp_default_scripts', function ($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
      $script = $scripts->registered['jquery'];
      if ($script->deps) {
        $script->deps = array_diff($script->deps, ['jquery-migrate']);
      }
    }
  });

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

  add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('global-styles');
  }, 10);

  add_filter('site_status_tests', function ($tests) {
    unset($tests['direct']['cookie_compliance_status']);
    return $tests;
  });

  function my_acf_admin_head() {
  ?>
<style type="text/css">
.select2-results__group {
  margin-top: 16px;
  border-top: 1px solid #999;
}

.acf-table,
.acf-fields.-border {
  border-color: #999;
}

.acf-flexible-content .layout .acf-fc-layout-handle {
  background-color: #202428;
  color: #eee;
}

.acf-repeater.-row>table>tbody>tr:nth-child(n+2)>td,
.acf-repeater.-block>table>tbody>tr:nth-child(n+2)>td {
  border-top: 1px solid #999;
}

.acf-repeater .acf-row-handle span {
  font-size: 1em;
  font-weight: bold;
  color: #999;
}

.acf-repeater .acf-row-handle .acf-icon.-collapse {
  margin-top: 5px;
}

.acf-repeater .acf-row-handle .acf-icon.-plus {
  margin-top: -10px;
}

.acf-repeater .acf-row-handle .acf-icon.-minus,
.acf-repeater .acf-row-handle .acf-icon.-collapse {
  display: block;
  opacity: .5;
}

.acf-repeater .acf-row:hover .acf-row-handle .acf-icon.-minus,
.acf-repeater .acf-row:hover .acf-row-handle .acf-icon.-collapse {
  opacity: 1;
}

.select2-container--default .select2-results>.select2-results__options {
  max-height: min(500px, 75vh);
}

</style>
<?php
  }
add_action('acf/input/admin_head', 'my_acf_admin_head');
