<?php /*Template Name: spa*/
  get_header();

  get_part('nav');
  get_part('top', array(
    'show_title' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => get_field('text')));?>
  <div class="rsep"></div>
</div>

<?php get_footer();?>
