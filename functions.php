<?php
// cSpell:ignore wpcf autop iworks

include __DIR__ . '/include/cleanup.php';
include __DIR__ . '/include/enqueue.php';
include __DIR__ . '/include/post-types.php';
include __DIR__ . '/include/partials.php';

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
    case 'media':
      return empty($field['media']) ? '' : $field['media']['url'];
  }
}

function get_link_attributes($field) {
  $attribs         = [];
  $attribs['href'] = get_link_url($field);

  if ($field['target'] === 'out') {
    $attribs['target'] = '_blank';
    $attribs['rel']    = 'noopener noreferrer';
  }

  return array_reduce(array_keys($attribs), function ($previous, $key) use ($attribs) {
    return $previous . $key . '="' . $attribs[$key] . '" ';
  }, '');
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
    /* cSpell:disable */
    'green' => '23382c',
    'beige' => 'cabaaa',
    'pale'  => '8a9992',
    'gray'  => 'c3c2c8',
    /* cSpell:enable */
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

// orphans
add_filter('acf/format_value/type=wysiwyg', function ($value, $post_id, $field) {
  if (empty($value)) {
    return '';
  }
  $value = '<div class="wysiwyg">' . $value . '</div>';
  return iworks_orphan(lowercaseScharfesS($value));
}, 11, 3);
add_filter('acf/format_value/type=text', function ($value, $post_id, $field) {
  return iworks_orphan(lowercaseScharfesS($value));
}, 10, 3);
add_filter('acf/format_value/type=textarea', function ($value, $post_id, $field) {
  return iworks_orphan(lowercaseScharfesS($value));
}, 10, 3);

function iworks_orphan($content) {
  if (!class_exists('iWorks_Orphan')) {
    return $content;
  }

  $orphan = new iWorks_Orphan();
  return $orphan->replace($content);
}

// scharfes
function lowercaseScharfesS($text) {
  if (is_admin()) {
    return $text;
  }

  return str_replace('ß', '<span class="no-uppercase">ß</span>', $text);
}
add_filter('the_title', function ($title, $id) {
  return lowercaseScharfesS($title);
}, 11, 2);

//
function return_only_title($title) {
  return "%s";
}
add_filter('private_title_format', 'return_only_title');
add_filter('protected_title_format', 'return_only_title');

// amenities
pll__('balkon-lub-taras');
pll__('deska-i-zelazko');
pll__('kawa-i-herbata');
pll__('kosmetyki');
pll__('parking');
pll__('sauna');
pll__('sniadanie');
pll__('suszarka');
pll__('telewizor');
pll__('wanna-z-hydromasazem');
pll__('wi-fi');
