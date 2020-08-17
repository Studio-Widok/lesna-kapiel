<?php /*Template Name: kolekcje*/
  get_header();

  $collection = $_GET["attraction"];

  $posts = get_posts(array(
    'numberposts' => -1,
    'post_type'   => 'apartment',
    'order'       => 'ASC',
    'tax_query'   => [
      [
        'taxonomy' => 'apartment_categories',
        'field'    => 'slug',
        'terms'    => $collection,
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
