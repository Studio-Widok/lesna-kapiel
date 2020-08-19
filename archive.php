<?php
  get_header();

  if (is_tax('collections')) {
    echo "Category";
  } else if (is_tax('tags', 'sauna')) {
    echo "sauna";
  } else if (is_tax('tags')) {
    echo "tag";
  } else {
    echo "nic";
  }
?>
<div>Tutaj tytuł</div>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas dolore
  fuga a iure, debitis sint magnam harum, nihil illum unde enim eveniet velit
  ipsa vel aliquid! Qui natus iusto odit?</p>
<div class="rsep"></div>
<div class="content flex flex-wrap column">
  <?php
    while (have_posts()): the_post();
    ?>
  <div class="col2 column">
    <div class="cake cake-9-16"
      style="background-image: url('<?=get_field('gallery')[0]['sizes']['medium']?>'); width:500px">
    </div>
    <div><?=get_the_title()?></div>
  </div>
  <?php endwhile?>
</div>
<div class="rsep"></div>
<?php if (is_tax('tags')):
    $premiumApartments = get_posts(array(
      'numberposts' => -1,
      'post_type'   => 'apartment',
      'order'       => 'DSC',
      'tax_query'   => [
        [
          'taxonomy' => 'tags',
          'field'    => 'slug',
          'terms'    => 'premium',
        ],
      ],
    ));
  ?>
<div>premium rooms</div>
<?php foreach ($premiumApartments as $apartment): ?>
<div><?=get_the_title($apartment->ID)?></div>
<?php endforeach?>
<?php
  endif;
  if (is_tax('collections')):
    $categories = get_categories(['taxonomy' => 'collections']);
    $catSlug    = get_queried_object()->slug;
    foreach ($categories as $category):
      if ($category->slug != $catSlug):

        $posts = get_posts(array(
          'order'       => 'DSC',
          'post_type'   => 'apartment',
          'numberposts' => 1,
          'tax_query'   => [
            [
              'taxonomy' => 'collections',
              'field'    => 'term_id',
              'terms'    => $category->term_id,
            ],
          ],

        ));
        foreach ($posts as $post):
      ?>
<div><?=get_the_title($post->ID)?></div>
<?php
            endforeach;
          endif;
        endforeach;
      ?>
<div>inne kolekjce</div>
<?php endif;?>


<?php get_footer();?>
