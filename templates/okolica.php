<?php // Template Name: okolica
  get_header();

  $top    = get_field('top')['top'];
  $footer = get_field('footer', 2);
  $nearby = get_field('nearby');

  get_part('nav');
  get_part('top', [
    'show_title'   => true,
    'bg'           => $top['top_image'],
    'text_align'   => $top['align'],
    'title'        => $top['title'],
    'isFullHeight' => true,
  ]);
  get_part('bike-popup');
?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => $top['text']]);?>
  <div class="rsep"></div>

  <div class="content">
    <?php
      get_part('featured-links', [
        'links'     => $nearby,
        'maskColor' => get_mask_color('green'),
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

<div class="pale-wrapper wrapper--mask-after">
  <div class="rsep"></div>
  <?php get_part('routes');?>
  <div class="rsep"></div>
</div>

<?php
  $on_site = get_field('on_site');
  get_part('full-width-image', [
    'image'   => $on_site['image'],
    'content' => get_the_component('okolica-on-site', ['on-site' => $on_site]),
  ]);
?>

<div class="pale-green-wrapper">
  <?php get_part('recommended');?>
  <div class="rsep"></div>
</div>

<div class="footer-wrapper">
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
