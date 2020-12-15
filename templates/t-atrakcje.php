<?php /*Template Name: atrakcje*/
  get_header();
  $top    = get_field('top')['top'];
  $nearby = get_field('nearby');
  $link   = get_field('link')['link'];
  $footer = get_field('footer', 2);
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
    'title'      => $top['title'],
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => $top['text']));?>
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
      <button id='atrraction-more' data-more="<?php pll_e('more')?>"
        data-less="<?php pll_e('less')?>">
        <?php pll_e('more')?>
      </button>
    </div>
    <div class="r less-768"></div>
  </div>

  <div class="rsep"></div>
</div>

<div class="grey-wrapper">

  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => pll__('what_in_spot')]);?>
    <div class="rsep"></div>
    <?php get_part('text-full', array('text' => get_field('on_the_spot_text')));?>
  </div>
  <div class="rsep"></div>
  <?php
    $on_the_spot = get_field('on_the_spot');
    for ($i = 0; $i < count($on_the_spot); $i++) {
      get_part('slider-with-bullets', [
        'slides'    => $on_the_spot[$i]['slides'],
        'title'     => $on_the_spot[$i]['title'],
        'pic_right' => $i % 2,
        'maskColor' => get_mask_color("grey"),
      ]);
    ?>
  <div class="rsep"></div>
  <?php
    }
  ?>
  <div class="text-center">
    <a href="<?=get_link_url($link)?>">
      <button><?=$link['text']?></button>
    </a>
  </div>
  <div class="rsep"></div>
</div>
<?php get_part('full-width-image', ['image' => $footer['image'], 'ratio' => 16 / 9]);?>
<div class="green-wrapper">
  <?php
    get_part('footer-video', array(
      'source' => $footer['video'],
      'text'   => $footer['text']));
  ?>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
</div>
<?php get_part('map-block');?>
<div class="green-wrapper green-wrapper-footer">
  <div class="rmin"></div>
</div>

<?php get_footer();?>
