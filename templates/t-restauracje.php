<?php /*Template Name: restauracje*/
  get_header();

  $top = get_field('restauracja_top');
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
  ));
?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => $top['text']));?>
  <div class="rsep"></div>
  <?php
    $slider = get_field('slider');
    get_part('slider-gallery', [
      'title'   => $slider['title'],
      'text'    => $slider['text'],
      'gallery' => $slider['gallery'],
  ]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>


<?php get_footer();?>
