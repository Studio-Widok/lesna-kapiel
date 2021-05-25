<?php get_header();?>
<div class="green-wrapper">
  <div class="content column">
    <div class="rsep"></div>
    <?php if (have_posts()): while (have_posts()): the_post();?>
    <?php the_content();?>
    <?php endwhile;?>
    <?php endif;?>
    <div class="rsep"></div>
  </div>
</div>
<?php get_footer();?>
