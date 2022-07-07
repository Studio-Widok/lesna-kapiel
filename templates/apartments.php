<?php // Template Name: apartamenty
  // cSpell:ignore ontop
  get_header();

  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);
  $type           = get_field('type');

  $apartments = get_posts([
    'numberposts' => -1,
    'post_type'   => 'apartment',
    'tax_query'   => [
      [
        'taxonomy' => 'tags',
        'field'    => 'slug',
        'terms'    => $type,
      ],
    ],
  ]);

  if ($type === 'villa') {
    $tags = [
      get_term_by('term_taxonomy_id', get_term_id('deluxe')),
      get_term_by('term_taxonomy_id', get_term_id('premium')),
      get_term_by('term_taxonomy_id', get_term_id('standard')),
      get_term_by('term_taxonomy_id', get_term_id('budget')),
    ];

    for ($j = 0; $j < count($tags); $j++) {
      $tags[$j]->apartments = [];
    }

    for ($i = 0; $i < count($apartments); $i++) {
      $tagSlugs = array_map(
        function ($e) {return $e->slug;},
        get_the_terms($apartments[$i], 'tags')
      );
      for ($j = 0; $j < count($tags); $j++) {
        if (in_array($tags[$j]->slug, $tagSlugs)) {
          $tags[$j]->apartments[] = $apartments[$i];
        }
      }
    }
  } else {
    $tags = [
      get_term_by('term_taxonomy_id', get_term_id('house')),
    ];
    $tags[0]->apartments = $apartments;
  }

  get_part('nav', ['isDark' => false]);
?>

<div class="archive-top">
  <div id="archive-top-bg">
    <?php
      $top_slider = get_field('top_image');
      foreach ($top_slider as $image) {
      ?>
    <div class="single-slide"
      style="background-image:url(<?=$image['sizes']['large']?>);"></div>
    <?php }?>
  </div>

  <div class="arrow more-768">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 27">
      <path d="M5 0L5 17" stroke-width="1.5" stroke="#fff" />
      <path d="M5 27L1.5 17L8.5 17z" stroke-width="0" fill="#fff" />
    </svg>
  </div>
</div>

<div class="pale-green-wrapper">
  <div class="content column text-center">
    <div class="rmin"></div>
    <div class="uppercase"><?=get_field('top_text')?></div>

    <div class="rsep"></div>

    <?php get_component('heading-logo');?>
    <h2 class="heading uppercase"><?=get_field('title')?></h2>

    <div class="r"></div>
    <div class="text limited-width">
      <?=get_field('text')?>
    </div>

    <?php if ($type === 'villa') {?>
    <div class="rsep"></div>

    <div class="uppercase"><?=get_field('apartment_types')?></div>

    <div class="r"></div>

    <div id="apartment-tags" class="limited-width">
      <?php
        foreach ($tags as $tag) {
          if (count($tag->apartments) === 0) {
            continue;
          }

          $icon = get_field('icon', $tag);
        ?>
      <div class="apartment-tag-icon" data-tag="<?=$tag->slug?>">
        <img src="<?=$icon['sizes']['medium']?>" alt="">
        <div class="uppercase"><?=$tag->name?></div>
      </div>
      <?php }?>
    </div>

    <div class="r"></div>

    <?=get_field('info')?>
    <?php }?>
  </div>

  <div class="rsep"></div>
</div>

<div class="white-wrapper wrapper--no-mask-before">
  <div class="content-wide">
    <div class="chessboard">
      <?php
        $index = 0;
        for ($k = 0; $k < count($tags); $k++) {
          $tag = $tags[$k];
          for ($i = 0; $i < count($tag->apartments); $i++) {
            $apart  = $tag->apartments[$i];
            $slider = get_field('slider', $apart);
          ?>
      <?php
  get_part('chessboard-row', [
        'handwrite' => ($i === 0 && $type === 'villa') ? $tag : null,
        'index'     => $index,
        'id'        => 'apart-tag-title-' . $tag->slug,
        'image'     => $slider['gallery'][0],
        'category'  => $type === 'villa' ? 'apartamenty typu ' . $tag->name : null,
        'title'     => get_the_title($apart),
        'content'   => get_the_component('chessboard-row-apartment', [
          'apart'  => $apart,
          'slider' => $slider,
          'index'  => $index,
        ]),
      ]);
    ?>
      <?php
  $index++;
    }
  }
?>
    </div>
  </div>
</div>

<?php
  $index = 0;
  for ($k = 0; $k < count($tags); $k++) {
    $tag = $tags[$k];
    for ($i = 0; $i < count($tag->apartments); $i++) {
    ?>
<div id="lightbox-<?=$index++?>" class="lightbox">
  <svg class="lightbox-close" viewBox="0 0 100 100">
    <path d="M10 10L90 90" />
    <path d="M90 10L10 90" />
  </svg>
  <svg class="lightbox-prev" viewBox="0 0 100 100">
    <path d="M70 10L30 50L70 90" />
  </svg>
  <svg class="lightbox-next" viewBox="0 0 100 100">
    <path d="M30 10L70 50L30 90" />
  </svg>
  <svg class="lightbox-loading" viewBox="0 0 100 100">
    <circle cx="50" cy="50" r="40" />
  </svg>
</div>
<?php }}?>

<div class="pale-green-wrapper wrapper--mask-after wrapper--no-mask-before">
  <div class="rsep"></div>
  <?php get_component('heading-logo');?>
  <h2 class="heading uppercase">wybierz termin</h2>
  <?php get_component('reservation', ['classes' => 'light-bg']);?>
  <div class="rsep"></div>
</div>

<div class="pale-wrapper wrapper--no-mask-before">
  <?php
    $opinions = get_field('opinions');
    if (!empty($opinions)) {
    ?>
  <div class="content column">
    <div class="rsep more-768"></div>
    <div class="rsep"></div>
    <?php get_component('heading-logo');?>
    <h2 class="heading uppercase">wasze opinie</h2>
    <div class="rel" id="opinion-slider-wrap">
      <div id="opinion-slider">
        <?php
          for ($i = 0; $i < count($opinions); $i++) {
            ?>
        <div class="slide">
          <div class="apartments-opinion"><?=$opinions[$i]['text']?></div>
        </div>
        <?php }?>
      </div>
      <svg id="opinion-prev" viewBox="0 0 100 20"
        preserveAspectRatio="xMinYMid slice">
        <path d="M0 10L100 10" />
        <path d="M10 0A10 10 0 0 1 0 10A10 10 0 0 1 10 20" />
      </svg>
      <svg id="opinion-next" viewBox="0 0 100 20"
        preserveAspectRatio="xMaxYMid slice">
        <path d="M0 10L100 10" />
        <path d="M90 0A10 10 0 0 0 100 10A10 10 0 0 0 90 20" />
      </svg>
    </div>
    <div class="rsep more-768"></div>
  </div>
  <?php }?>

  <div class="rsep"></div>
  <?php get_component('heading-logo');?>
  <h2 class="heading uppercase">dowiedz się więcej</h2>

  <?php
    get_part('featured-links', [
      'links'     => $featured_links,
      'maskColor' => get_mask_color("pale"),
    ]);
  ?>
  <div class="rsep"></div>
</div>

<div class="footer-wrapper wrapper--no-mask-before">
  <?php
    get_part('full-width-image', [
      'image'          => $footer['image'],
      'useQuote'       => true,
      'useContactInfo' => true,
    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
