<?php /*Template Name: nasza idea*/
  get_header();
  $video = get_field('video');
  $top   = get_field('top')['top'];
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'title'      => $top['title'],
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
  ));
?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => $top['text']));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>
<div class="green-wrapper">
  <?php
    get_part('footer-video', array(
      'source' => $video['video'],
      'text'   => $video['text']));
  ?>
  <div class="rsep"></div>
  <?php $section = get_field('section');
    get_part('2-col-with-pic', [
      'image'      => $section['image'],
      'text'       => $section['text'],
      'alt_layout' => true,
  ]);?>
  <div class="rsep"></div>
</div>
<?php get_part('full-width-image', [
    'image'         => $footer['image_with_overlay'],
    'isContactInfo' => true,
]);?>
<?php get_part('map-block')?>
<div class="green-wrapper green-wrapper-footer">
  <div class="rmin"></div>
</div>

<?php get_footer();?>
