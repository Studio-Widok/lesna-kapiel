<?php /*Template Name: nasza idea*/
  get_header();

  $top    = get_field('top')['top'];
  $footer = get_field('footer', 2);

  get_part('nav');
  get_part('top', [
    'show_title' => true,
    'title'      => $top['title'],
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
  ]);
?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => $top['text']]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="pale-wrapper">
  <div class="rsep"></div>
  <?php
    $section = get_field('section');
    get_part('2-col-with-pic', [
      'image'      => $section['image'],
      'text'       => $section['text'],
      'alt_layout' => true,
      'maskColor'  => get_mask_color('green'),
    ]);
  ?>

  <?php
    get_part('full-width-image', [
      'image'             => $footer['image'],
      'useContactInfo'    => true,
      'useNegativeMargin' => false,
    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
