<?php /*Template Name: atrakcje*/
  get_header();
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
  ));
  $tripple_section = get_field('tripple_section')
?>


<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => 'a co na miejscu?']);?>
  </div>
  <div class="rsep"></div>
  <?php get_part('slider-with-bullets');?>
  <div class="rsep"></div>
  <?php get_part('3-col-with-pic', array('links' => 'yes', 'content' => $tripple_section)); ?>
</div>


<?php get_footer();?>
