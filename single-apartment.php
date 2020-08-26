<?php get_header();
  get_part('nav');
?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('slider-gallery', [
      'title'   => get_the_title(),
      'text'    => get_field('text'),
      'gallery' => get_field('gallery'),
  ]);?>
  <div class="rsep"></div>
</div>
<?php get_footer();?>
