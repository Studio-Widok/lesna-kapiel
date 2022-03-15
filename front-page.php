<?php
  get_header();

  $firstSection   = get_field('first_section');
  $sections       = get_field('sections');
  $featured_links = get_field('featured_links');
  $slider         = get_field('slider');
  $footer         = get_field('footer');

  get_part('nav');
  get_part('top', [
    'show_logo'         => true,
    'bg'                => get_field('top_image'),
    'isShowReservation' => true,
    'isFullHeight'      => true,
  ]);
?>

<div class="pale-green-wrapper">

  <div class="fixed-link-container">
    <?php
      get_component('fixed-link', [
        'text' => get_the_title(pll_get_post(100)),
        'link' => get_the_permalink(pll_get_post(100)),
      ]);
    ?>
    <div class="rsep"></div>
    <div class="rsep more-1200"></div>

    <div class="content fade column" id="front-intro">
      <?php get_component('heading-logo');?>
      <h2 class="uppercase heading"><?=$firstSection['title']?></h2>
      <div class="text limited-width"><?=$firstSection['text']?></div>
      <div class="r"></div>
      <div class="button-container text-center">
        <a href="<?=get_link_url($firstSection['link'])?>">
          <button>
            <?=$firstSection['link']['text']?>
          </button>
        </a>
      </div>
    </div>

    <div class="rsep"></div>

    <div class="content icons-full-width column-outer flex flex-768-50">
      <?php
        $icons = get_field('icons');
        for ($i = 0; $i < count($icons); $i++) {
        ?>
      <div class="icon col3 column-inner">
        <img src="<?=$icons[$i]['icon']['sizes']['medium']?>" alt=""
          class="icon-img">
        <div class="icon-text uppercase"><?=$icons[$i]['text']?></div>
      </div>
      <?php }?>
    </div>

    <div class="r"></div>
  </div>
</div>

<div class="white-wrapper">
  <div class="fixed-link-container">
    <?php $recommended = get_field('recommended');?>
    <div class="rsep"></div>
    <div class="content column">
      <?php get_component('heading-logo');?>
      <h2 class="uppercase heading"><?=$recommended['title']?></h2>
      <div class="text limited-width"><?=$recommended['text']?></div>
    </div>
    <div class="rsep"></div>
  </div>
</div>

<div class="pale-green-wrapper">
  <div class="fixed-link-container">
    <?php
      $termId = get_term_by('term_taxonomy_id', pll_get_term(get_term_id('villa')));
      get_component('fixed-link', ['text' => pll__('see_apartments'), 'link' => get_tag_link($termId)]);
    ?>
    <div class="rsep"></div>
    <?php
      for ($i = 0; $i < count($sections); $i++) {
        get_part('2-col-with-pic', [
          'image'         => $sections[$i]['image'],
          'title'         => $sections[$i]['title'],
          'text'          => $sections[$i]['text'],
          'button'        => [
            'text' => $sections[$i]['link']['text'],
            'link' => get_link_url($sections[$i]['link']),
          ],
          'alt_layout'    => true,
          'pic_right'     => $i % 2,
          'isTextOverlap' => $i === 1,
          'maskColor'     => get_mask_color('green'),
        ]);
      ?>
    <div class="rsep less-768"></div>
    <?php }?>
  </div>

  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep less-768"></div>
  <div class="rsep less-768"></div>
</div>

<?php get_part('collections-slider');?>
<div class="pale-wrapper">
  <div class="rsep"></div>
  <?php
    get_part('featured-links', [
      'links'     => $featured_links,
      'maskColor' => get_mask_color("pale"),
    ]);
  ?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php
    get_component('reservation', [
      'title' => 'wybierz termin',
    ]);
  ?>
  <?php
  get_part('full-width-image', [
    'image'             => $footer['image'], 'ratio' => 16 / 9,
    'useNegativeMargin' => true,
  ]);
?>
</div>
<div class="green-wrapper">
  <?php
    $footer = get_field('footer', 2);
    get_part('contact-info');
  ?>
  <div class="rsep"></div>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
