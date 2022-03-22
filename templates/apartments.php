<?php // Template Name: Apartamenty
  get_header();

  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);

  $tags = [
    get_term_by('term_taxonomy_id', get_term_id('deluxe')),
    get_term_by('term_taxonomy_id', get_term_id('premium')),
    get_term_by('term_taxonomy_id', get_term_id('standard')),
    get_term_by('term_taxonomy_id', get_term_id('budget')),
  ];

  for ($j = 0; $j < count($tags); $j++) {
    $tags[$j]->apartments = [];
  }

  $apartments = get_posts([
    'numberposts' => -1,
    'post_type'   => 'apartment',
    'tax_query'   => [
      [
        'taxonomy' => 'tags',
        'field'    => 'slug',
        'terms'    => 'villa',
      ],
    ],
  ]);

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

  get_part('nav', ['isDark' => false]);
?>

<div class="archive-top">
  <div class="archive-top-bg"
    style="background-image: url('<?=get_field('top_image')['sizes']['large']?>')">
  </div>
</div>

<div class="pale-green-wrapper wrapper--mask-after">
  <div class="content column text-center">
    <div class="uppercase"><?=get_field('top_text')?></div>

    <div class="rsep"></div>

    <?php get_component('heading-logo');?>
    <h2 class="heading uppercase"><?=get_field('title')?></h2>

    <div class="r"></div>
    <div class="text limited-width">
      <?=get_field('text')?>
    </div>
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
  </div>

  <div class="rsep"></div>
</div>

<div class="white-wrapper wrapper--no-mask-before">
  <div class="content-wide">
    <div class="chessboard">
      <?php
        for ($k = 0; $k < count($tags); $k++) {
          $tag = $tags[$k];
          for ($i = 0; $i < count($tag->apartments); $i++) {
            $apart     = $tag->apartments[$i];
            $slider    = get_field('slider', $apart);
            $occupancy = get_field('occupancy', $apart);
            $price     = preg_replace('/[^0-9.]/', '', get_field('price', $apart));
            $size      = get_field('size', $apart);
            $icons     = get_field('icons', $apart);
          ?>
      <div class="chessboard-row">

        <?php if ($i === 0) {?>
        <div class="apart-tag-title handwrite"
          id="apart-tag-title-<?=$tag->slug?>"><?=$tag->name?></div>
        <?php }?>

        <div class="square-img"
          style="background-image: url(<?=$slider['gallery'][0]['sizes']['medium']?>)">
        </div>
        <div class="square column">
          <div class="uppercase">apartamenty typu <?=$tag->name?></div>
          <div class="rmin"></div>
          <h2 class="heading uppercase text-left"><?=get_the_title($apart)?>
          </h2>
          <div>
            <?php if (!empty($occupancy)) {?>
            <div class="icon icon--person"></div>
            <?=$occupancy?>
            <?php }
      if (!empty($occupancy) && !empty($size)) {
        echo ' | ';
      }
      if (!empty($size)) {
      ?>
            <?=$size?> m<sup>2</sup>
            <?php }?>
          </div>
          <div class="rmin"></div>
          <div><?=$slider['text']?></div>

          <?php if (!empty($icons)) {?>
          <div class="rmin"></div>
          <div class="uppercase">udogodnienia</div>
          <div class="apartment-icons">
            <?php for ($j = 0; $j < count($icons); $j++) {?>
            <div class="apartment-icon"
              style="background-image: url(<?=$icons[$j]['sizes']['medium']?>);">
            </div>
            <?php }?>
          </div>
          <?php }?>

          <?php if (!empty($price)) {?>
          <div class="rmin"></div>
          <div class="uppercase">cena od</div>
          <div class="apartment-price">
            <?=$price?>,-
          </div>
          <?php }?>

          <div class="rmin"></div>

          <div class="button-container">
            <a href="https://panel.hotres.pl/v4_adjust?oid=2447&lang=pl&tid=<?=get_field('hotres_id', $apart)?>&template=standalone&tid_ontop=<?=get_field('hotres_id', $apart)?>"
              target="_blank" rel="noopener noreferrer"><button>
                <div class="icon icon--bell"></div>
                rezerwuj
              </button></a>
            <button>galeria</button>
          </div>
        </div>
      </div>
      <?php }?>
      <?php }?>
    </div>
  </div>

  <div class="rsep"></div>
</div>

<div class="pale-wrapper">
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
      'image'          => $footer['image'], 'ratio' => 16 / 9,
      'useContactInfo' => true,
    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
