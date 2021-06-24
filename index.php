<?php
  get_header();
  get_part('nav');
?>

<div class="green-wrapper">
  <div class="content column">
    <div class="rsep"></div>
    <div class="r"></div>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;?>
    <?php endif;?>
    <div class="rsep"></div>
  </div>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
