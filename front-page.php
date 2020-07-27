<?php
  $section_image = get_field('section_image');

  get_header();

  get_part('nav');
  get_part('top', array(
    'show_logo' => true,
  ));
?>

<div class="green-wrapper" <div class="rsep"></div>
<div class="rsep"></div>
<?php get_part('2-col-no-pic')?>
<div class="rsep"></div>
<div class="rsep"></div>
<?php get_part('2-col-with-pic', array('value_1' => 'pic_left', 'value_2' => $section_image['villa']['sizes']['large']));?>
<div class="rsep"></div>
<div class="rsep"></div>
<?php get_part('2-col-with-pic', array('value_1' => 'pic_right', 'value_2' => $section_image['domki']['sizes']['large']));?>
<div class="rsep"></div>
<div class="rsep"></div>
<div class="rsep"></div>
<div class="rsep"></div>
</div>

<div class="grey-wrapper">
  <div class="rsep"></div>

</div>


</div>
<?php get_footer();
