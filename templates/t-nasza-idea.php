<?php /*Template Name: nasza idea*/
  get_header();
  $footer = get_field('footer', 2);
  get_part('nav');
?>
<div class="green-wrapper">
  <?php
    get_part('footer-video', array(
      'source' => $footer['video'],
      'text'   => $footer['text']));
  ?>
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
