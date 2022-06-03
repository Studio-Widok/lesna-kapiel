<?php
add_action('init', function () {
  register_post_type('apartment', [
    'public'      => true,
    'label'       => 'Apartamenty',
    'has_archive' => true,
    'supports'    => ['title'],
  ]);

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

// admin columns
add_filter('manage_apartment_posts_columns', function ($column) {
  $column['hotres_id'] = 'Hotres ID';
  return $column;
});

add_action('manage_apartment_posts_custom_column', function ($column_name) {
  if ($column_name === 'hotres_id') {
    $id = get_field('hotres_id');
    echo '<a href="https://panel.hotres.pl/roomstypes/edit/id/' . $id . '" target="_blank" rel="noreferrer noopener">' . $id . '</a>';
  }
}, 10, 2);
