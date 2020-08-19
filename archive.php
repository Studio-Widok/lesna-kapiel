<?php
  get_header();

  while (have_posts()): the_post();
  ?>
<div><?=get_the_title()?></div>
<?php
    endwhile;
    if (is_tax('apartment_categories')) {
      echo "Category";
    } else if (is_tax('apartment_tags', 'sauna')) {
      echo "sauna";
    } else if (is_tax('apartment_tags')) {
      echo "tag";
    } else {
      echo "nic";
    }
    ?>
  <?php
    get_part('top', array(
      'show_title' => true,
    ));
  ?>


<?php get_footer();?>
