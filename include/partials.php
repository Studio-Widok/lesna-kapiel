<?php
function get_part($__file, $__data = []) {
  _get_part('parts', $__file, $__data);
}

function get_component($__file, $__data = []) {
  _get_part('components', $__file, $__data);
}

function get_the_part($__file, $__data = []) {
  ob_start();
  _get_part('parts', $__file, $__data);
  return ob_get_clean();
}

function get_the_component($__file, $__data = []) {
  ob_start();
  _get_part('components', $__file, $__data);
  return ob_get_clean();
}

function _get_part($__folder, $__file, $__data) {
  $__file = __DIR__ . '/../' . $__folder . '/' . $__file . '.php';
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
