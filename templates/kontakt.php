<?php /*Template Name: kontakt*/
  get_header();

  get_part('nav');
  get_part('top', [
    'show_title'        => true,
    'bg'                => get_field('top_image'),
    'isShowReservation' => true,
  ]);
?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>

  <div class="flex flex-align-end flex-600 content column-outer-growing">
    <div class="col5-3 column-inner-growing">
      <?php get_part('contact-form');?>
    </div>
    <div class="col5-2 column-inner-growing">
      <div class="rsep"></div>
      <?php get_part('contact-info');?>
      <div class="rsep"></div>
    </div>
  </div>

  <div class="rsep"></div>
  <div class="rsep"></div>

  <?php // get_part('contact-images');?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
