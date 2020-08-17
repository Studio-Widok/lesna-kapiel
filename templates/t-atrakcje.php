<?php /*Template Name: atrakcje*/
  get_header();

  get_part('nav');
  get_part('top', array(
    'show_title' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => 'a co na miejscu?']);?>
  </div>
  <div class="rsep"></div>
  <?php
    $on_the_spot = get_field('on_the_spot');
    for ($i = 0; $i < count($on_the_spot); $i++) {
      get_part('slider-with-bullets', ['slides' => $on_the_spot[$i]['slides']]);
    }
  ?>
  <div class="rsep"></div>
</div>

<?php get_footer();?>
