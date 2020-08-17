<?php /*Template Name: kontakt*/
  get_header();

  get_part('nav');
  get_part('top', array(
    'show_title' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('contact-form');?>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
  <?php get_part('contact-images');?>
</div>

<?php get_footer();?>
