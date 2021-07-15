<?php
  get_header();

  $isDark         = is_tax('collections', pll_get_term(get_collection_id('polna')));
  $archive        = get_queried_object();
  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);

  $premiumApartments  = [];
  $deluxeApartments   = [];
  $standardApartments = [];
  $isVilla            = is_tax('tags') && get_queried_object()->slug === 'villa';
  while (have_posts()) {
    the_post();
    $tagSlugs = array_map(
      function ($e) {return $e->slug;},
      get_the_terms($post, 'tags')
    );
    if ($isVilla && in_array('premium', $tagSlugs)) {
      $premiumApartments[] = $post;
    } elseif ($isVilla && in_array('deluxe', $tagSlugs)) {
      $deluxeApartments[] = $post;
    } else {
      $standardApartments[] = $post;
    }
  }

  get_part('nav', ['isDark' => $isDark]);
?>

<div class="archive-top">
  <div class="archive-top-bg"
    style="background-image: url('<?=get_field('top_image', $archive)['sizes']['large']?>')">
  </div>
</div>

<div class="<?=get_field("colors", $archive)?>-wrapper">
  <div class="rsep"></div>
  <div class="column content title-container">
    <div class="big-title handwrite fade"><?=$archive->name?></div>
  </div>
  <div class="r"></div>
  <?php get_component('reservation')?>
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => get_field('top_text', $archive)]);?>

  <?php
    if ($isVilla) {
      get_part(
        'archive-villa-additional-apartments',
        [
          'apartments'  => $deluxeApartments,
          'term'        => pll_get_term(54),
          'name'        => pll__('deluxe rooms'),
          'skipWrapper' => true,
        ]
      );
    } else {
      get_part(
        'archive-villa-additional-apartments',
        [
          'apartments'  => $standardApartments,
          'term'        => pll_get_term(60),
          'name'        => pll__('standard rooms'),
          'skipWrapper' => true,
          'skipTitle'   => true,
        ]
      );
    }
  ?>
</div>

<?php
  if ($isVilla) {
    get_part(
      'archive-villa-additional-apartments',
      [
        'apartments' => $premiumApartments,
        'term'       => pll_get_term(11),
        'name'       => pll__('premium rooms'),
      ]
    );
  }

  if (is_tax('collections')) {
    get_part('collections-slider', [
      'exclude'       => $archive->term_id,
      'isOthersTitle' => true,
    ]);
  }
?>

<div class="pale-wrapper">
  <?php
    if ($isVilla) {
      get_part(
        'archive-villa-additional-apartments',
        [
          'apartments'  => $standardApartments,
          'term'        => pll_get_term(60),
          'name'        => pll__('standard rooms'),
          'skipWrapper' => true,
        ]
      );
    } else {
    ?>
  <div class="rsep"></div>
  <?php
        }
      ?>

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
