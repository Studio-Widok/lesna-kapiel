<?php
  get_header();
  $sections = get_field('sections');
  $tripple_section = get_field('tripple_section');
  $slider = get_field('slider');

  get_part('nav');
  get_part('top', array(
    'show_logo' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="rsep more-1200"></div>
  <?php get_part('2-col-no-pic')?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', array('value_1' => 'pic_left', 'content' => $sections[0]));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', array('value_1' => 'pic_right', 'content' => $sections[1]));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="grey-wrapper">
  <div class="rsep"></div>
  <?php get_part('slider', array('value_1' => 'pic_left', 'slider' => $slider));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="content flex">
    <?php get_part('vertical-pic-text', array('links' => 'no', 'content' => $tripple_section[0]));?>
    <?php get_part('vertical-pic-text', array('links' => 'yes', 'content' => $tripple_section[1]));?>
    <?php get_part('vertical-pic-text', array('links' => 'no', 'content' => $tripple_section[2]));?>
  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  </div>


</div>
<?php get_footer();
