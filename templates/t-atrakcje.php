<?php /*Template Name: atrakcje*/
  get_header();

  $attraction = $_GET['attraction'];

  $posts = get_posts(array(
    'numberposts' => -1,
    'post_type'   => 'apartment',
    'order'       => 'DSC',
    'tax_query'   => [
      [
        'taxonomy' => 'apartment_tags',
        'field'    => 'slug',
        'terms'    => $attraction,
      ],
    ],
  ));

  foreach ($posts as $post): setup_postdata($post);
  ?>
<div><?=get_the_title()?></div>
<?php
    endforeach
  ?>


<?php get_footer();?>
