<?php /*Template Name: atrakcje*/
  get_header();

  $top    = get_field('top')['top'];
  $footer = get_field('footer', 2);

  $plan        = get_field('plan');
  $attractions = get_field('attractions');

  get_part('nav');
  get_part('top', [
    'show_title' => true,
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
    'title'      => $top['title'],
  ]);
?>

<?php // old
  if (false) {
    $nearby = get_field('nearby');
    $link   = get_field('link')['link'];
  ?>
<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => $top['text']]);?>
  <div class="rsep"></div>

  <div class="content">
    <?php
      get_part('featured-links', [
          'links'            => $nearby,
          'isMobileHide1050' => false,
          'isMobileHide768'  => true,
          'maskColor'        => get_mask_color('green'),
        ]);
      ?>
    <div class="text-center less-768">
      <button id='attraction-more' data-more="<?php pll_e('more')?>"
        data-less="<?php pll_e('less')?>">
        <?php pll_e('more')?>
      </button>
    </div>
    <div class="r less-768"></div>
  </div>

  <div class="rsep"></div>
</div>

<div class="pale-wrapper">

  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => pll__('what_in_spot')]);?>
    <div class="rsep"></div>
    <?php get_part('text-full', ['text' => get_field('on_the_spot_text')]);?>
  </div>
  <div class="rsep"></div>
  <?php
    $on_the_spot = get_field('on_the_spot');
      for ($i = 0; $i < count($on_the_spot); $i++) {
        get_part('slider-with-bullets', [
          'slides'    => $on_the_spot[$i]['slides'],
          'title'     => $on_the_spot[$i]['title'],
          'pic_right' => $i % 2,
          'maskColor' => get_mask_color("pale"),
        ]);
      ?>
  <div class="rsep"></div>
  <?php }?>
  <div class="text-center">
    <a href="<?=get_link_url($link)?>">
      <button><?=$link['text']?></button>
    </a>
  </div>
  <div class="rsep"></div>
</div>
<?php
  get_part('full-width-image', [
      'image' => $footer['image'], 'ratio' => 16 / 9,
    ]);
  ?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
</div>

<?php }?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <div class="column">
    <div class="plan-intro text limited-width"><?=$top['text']?></div>
  </div>
  <div id="attractions-plan-wrap">
    <div id="attractions-plan-scroll">
      <div id="attractions-plan" style="
        background-image: url(<?=$plan['background']['sizes']['large']?>);
        padding-bottom: <?=$plan['background']['height'] * 100 / $plan['background']['width']?>%;
        ">
        <?php foreach ($plan['texts'] as $index => $text) {?>
        <div class="plan-text" id="plan-text-<?=$index?>"><?=$text['text']?>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
  <div class="rsep"></div>
</div>

<div class="white-wrapper wrapper--no-mask-before">
  <div class="content-wide">
    <div class="chessboard">
      <?php
        for ($i = 0; $i < count($attractions); $i++) {
          get_part('chessboard-row', [
            'image'   => $attractions[$i]['image'],
            'icon'    => $attractions[$i]['icon'],
            'title'   => $attractions[$i]['title'],
            'content' => get_the_component('chessboard-row-attraction', [
              'attraction' => $attractions[$i],
            ]),
          ]);
        }
      ?>
    </div>
  </div>
</div>

<div class="pale-green-wrapper">
  <?php get_part('recommended');?>
  <div class="rsep"></div>
</div>

<div class="pale-wrapper">
  <?php
    get_part('full-width-image', [
      'image'    => $footer['image'],
      'useQuote' => true,

    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
