<?php
$sections = get_field('sections');

  get_header();

  get_part('nav');
  get_part('top', array(
    'show_logo' => true,
  ));
?>

<div class="green-wrapper">
<div class="rsep"></div>
<div class="rsep"></div>
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
<div class="rsep"></div>
<?php get_part('2-col-with-pic', array('value_1' => 'pic_left', 'content' => $sections[2]));?>
</div>


</div>
<?php get_footer();
