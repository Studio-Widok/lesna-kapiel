<?php /*Template Name: kontakt*/
  get_header();
  get_part('nav');
  get_part('top', [
    'show_title'        => true,
    'bg'                => get_field('top_image'),
    'isShowReservation' => true,
  ]);
?>

<div class="green-wrapper">
  <div class="fixed-link-container">
    <?php get_component('fixed-link', ['text' => get_the_title(pll_get_post(100)), 'link' => get_the_permalink(pll_get_post(100))]);?>
    <div class="rsep"></div>
    <?php get_part('contact-form');?>
    <div class="rsep"></div>
    <?php get_part('contact-info');?>
  </div>
  <div class="rsep"></div>
  <?php get_part('contact-images');?>
  <?php get_part('map-block');?>
</div>

<?php get_footer();
?>
