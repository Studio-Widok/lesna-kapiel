<?php
  get_header();

  $isDark         = is_tax('collections', pll_get_term(get_collection_id('polna')));
  $archive        = get_queried_object();
  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);

  get_part('nav', ['isDark' => $isDark]);
?>

<div class="archive-top">
  <div class="archive-top-bg"
    style="background-image: url('<?=get_field('top_image', $archive)['sizes']['large']?>')">
  </div>
</div>

<div class="<?=get_field("colors", $archive)?>-wrapper">

  <div class="column content title-container">
    <div class="big-title handwrite fade"><?=$archive->name?></div>
  </div>
  <?php get_component('reservation')?>
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => get_field('top_text', $archive)]);?>
  <div class="rsep"></div>

  <div class="content flex flex-768 flex-wrap">
    <?php
      $premiumApartments = [];
      $deluxeApartments  = [];
      $isVilla           = is_tax('tags') && get_queried_object()->slug === 'villa';
      while (have_posts()) {
        the_post();
        $tagSlugs = array_map(
          function ($e) {return $e->slug;},
          get_the_terms($post, 'tags')
        );
        if ($isVilla && in_array('premium', $tagSlugs)) {
          $premiumApartments[] = $post;
          continue;
        }
        if ($isVilla && in_array('deluxe', $tagSlugs)) {
          $deluxeApartments[] = $post;
          continue;
        }

        $slider = get_field('slider');
        $images = isset($slider['gallery']) ? $slider['gallery'] : null;
        get_component('single-apartment', [
          'image'     => isset($images[0]) ? $images[0]['sizes']['large'] : null,
          'link'      => get_permalink(),
          'title'     => get_the_title(),
          'price'     => get_field('price'),
          'occupancy' => get_field('occupancy'),
        ]);
      }
    ?>
  </div>

  <div class="rsep"></div>
  <div class="rsep"></div>

  <?php
    if ($isVilla) {
      get_part(
        'archive-villa-additional-apartments',
        [
          'apartments' => $deluxeApartments,
          'term'       => pll_get_term(54),
          'name'       => pll__('rooms') . '<br />' . pll__('deluxe'),
        ]
      );
      get_part(
        'archive-villa-additional-apartments',
        [
          'apartments' => $premiumApartments,
          'term'       => pll_get_term(11),
          'name'       => pll__('premium') . '<br />' . pll__('rooms'),
        ]
      );
    }

    if (is_tax('collections')) {
    ?>
  <div class="rsep"></div>
  <div class="rsep less-768"></div>
  <div class="rsep less-768"></div>
  <?php }?>

</div>

<?php
  if (is_tax('collections')) {
    get_part('collections-slider', [
      'exclude'       => $archive->term_id,
      'isOthersTitle' => true,
    ]);
  }
?>

<div class="pale-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>

  <div class="content">
    <?php get_component('title', ['title' => pll__('what_in_villa')]);?>
  </div>
  <div class="rsep"></div>
  <?php
    get_part('featured-links', [
      'links'     => $featured_links,
      'maskColor' => get_mask_color("pale"),
    ]);
  ?>
  <div class="rsep"></div>
  <?php
    get_component('reservation', [
      'title' => 'wybierz termin',
    ]);
  ?>
  <div class="rsep"></div>
  <?php
    get_part('full-width-image', [
      'image' => $footer['image'], 'ratio' => 16 / 9,
    ]);
  ?>
</div>

<div class="green-wrapper">
  <div class="r"></div>
  <?php get_part('contact-info', ['isOverlap' => true]);?>
  <div class="r"></div>
</div>

<?php get_footer();?>
