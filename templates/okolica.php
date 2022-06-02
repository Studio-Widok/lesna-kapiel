<?php // Template Name: okolica
  get_header();

  $top    = get_field('top')['top'];
  $footer = get_field('footer', 2);

  get_part('nav');
  get_part('top', [
    'show_title'   => true,
    'bg'           => $top['top_image'],
    'text_align'   => $top['align'],
    'title'        => $top['title'],
    'isFullHeight' => true,
  ]);
?>

<div class="pale-green-wrapper">

  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => $top['text']]);?>
  <div class="rsep"></div>

</div>

<div class="pale-wrapper">
  <?php
    get_part('full-width-image', [
      'image'    => $footer['image'],
      'useQuote' => true,

    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
