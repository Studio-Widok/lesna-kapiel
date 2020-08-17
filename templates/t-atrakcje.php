<?php /*Template Name: atrakcje*/
  get_header();
  $tripple_section = get_field('tripple_section')
?>
<div class="rsep"></div>
<?php get_part('3-col-with-pic', array('links' => 'yes', 'content' => $tripple_section)); ?>




<?php get_footer();?>
