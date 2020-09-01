<?php get_header();
  get_part('nav');
?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php
    $slider = get_field('slider');
    get_part('slider-gallery', [
      'title'   => get_the_title(),
      'text'    => $slider['text'],
      'gallery' => $slider['gallery'],
  ]);?>
  <div class="rsep"></div>
  <?php
    $facilities = get_field('facilities');
    get_part('facilities', [
      'title'      => $facilities['title'],
      'facilities' => $facilities['facilities'],
      'meals'      => $facilities['meals'],
      'image'      => $facilities['image']['sizes']['medium'],
      'link'       => $facilities['link'],
  ]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>
<?php get_footer();?>
