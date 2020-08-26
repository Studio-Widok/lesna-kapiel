<?php /*Template Name: kontakt*/
  get_header();

  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'bg'         => get_field('top_image'),
  ));
?>

<div class="green-wrapper fixed-link-container">
  <?php get_component('fixed-link', array('text' => 'nasza idea', 'link' => get_the_permalink(100)));?>
  <div class="rsep"></div>
  <?php get_part('contact-form');?>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
</div>
<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('contact-images');?>
</div>
<div class="fixed-link-container">
  <?php get_component('fixed-link', array('text' => 'nasze apartamenty', 'link' => get_the_permalink()));?>
  <div id="map-wrapper">
    <div class="overlay abs"></div>
    <div id="gmap"></div>
  </div>
</div>

<?php get_footer();?>
