<?php

  // TODO: template to be deleted, redirect to archive page

  get_header();

  $isDark         = false;
  $archive        = get_queried_object();
  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);

  $tags = [
    get_term_by('term_taxonomy_id', get_term_id('deluxe')),
    get_term_by('term_taxonomy_id', get_term_id('premium')),
    get_term_by('term_taxonomy_id', get_term_id('standard')),
    get_term_by('term_taxonomy_id', get_term_id('budget')),
  ];

  $deluxeApartments   = [];
  $premiumApartments  = [];
  $standardApartments = [];
  $budgetApartments   = [];
  $isVilla            = is_tax('tags') && get_queried_object()->slug === 'villa';
  while (have_posts()) {
    the_post();
    $tagSlugs = array_map(
      function ($e) {return $e->slug;},
      get_the_terms($post, 'tags')
    );
    if ($isVilla && in_array('premium', $tagSlugs)) {
      $premiumApartments[] = $post;
    } elseif ($isVilla && in_array('budget', $tagSlugs)) {
      $budgetApartments[] = $post;
    } elseif ($isVilla && in_array('deluxe', $tagSlugs)) {
      $deluxeApartments[] = $post;
    } else {
      $standardApartments[] = $post;
    }
  }

  get_part('nav', ['isDark' => $isDark]);

  $title = get_field('alt_title', $archive);
  if (empty($title)) {
    $title = $archive->name;
  }
?>

<div class="archive-top">
  <div class="archive-top-bg"
    style="background-image: url('<?=get_field('top_image', $archive)['sizes']['large']?>')">
  </div>
</div>

<?php if (false) {?>
<div class="<?=get_field("colors", $archive)?>-wrapper">
  <div class="rsep"></div>
  <div class="column content title-container">
    <div class="big-title handwrite fade"><?=$title?>
    </div>
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
</div>
<?php }?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>

  <div class="content column text-center">
    <?php get_component('heading-logo');?>
    <h2 class="header uppercase">apartamenty leśnej kąpieli</h2>

    <div class="r"></div>
    <div class="text limited-width">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
        aperiam a voluptas ipsam numquam quidem totam, sequi nesciunt nam, amet
        voluptatem maiores modi. Harum voluptate excepturi soluta, delectus
        similique obcaecati.</p>
    </div>
    <div class="rsep"></div>

    <div class="uppercase small">rodzaje apartamentów</div>

    <div class="r"></div>

    <div id="apartment-tags" class="limited-width">
      <?php
        foreach ($tags as $tag) {
          $icon = get_field('icon', $tag);
        ?>
      <div class="apartment-tag-icon">
        <img src="<?=$icon['sizes']['medium']?>" alt="">
        <div class="uppercase"><?=$tag->name?></div>
      </div>
      <?php }?>
    </div>

  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <div class="text-center">deluxe</div>
  <pre>
    <?php
      print_r($deluxeApartments);
    ?>
  </pre>
  <div class="text-center">premium</div>
  <pre>
    <?php
      print_r($premiumApartments);
    ?>
  </pre>
  <div class="text-center">standard</div>
  <pre>
    <?php
      print_r($standardApartments);
    ?>
  </pre>
  <div class="text-center">budget</div>
  <pre>
    <?php
      print_r($budgetApartments);
    ?>
  </pre>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="green-wrapper">
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

  <div class="r"></div>
  <?php get_part('contact-info', ['isOverlap' => true]);?>
  <div class="r"></div>
</div>

<?php get_footer();?>
