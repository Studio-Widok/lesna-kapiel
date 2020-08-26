<?php /*Template Name: atrakcje*/
  get_header();
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'bg'         => get_field('top_image'),
  ));
  $tripple_section = get_field('tripple_section');
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
      get_part('slider-with-bullets', [
        'slides' => $on_the_spot[$i]['slides'],
        'title'  => $on_the_spot[$i]['title'],
      ]);
    ?>
  <div class="rsep"></div>
  <?php
    }
  ?>
  <div class="rsep"></div>
  <?php get_part('3-col-with-pic', array('links' => 'yes', 'content' => $tripple_section));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<?php get_footer();
get_part('map-block');
?>
