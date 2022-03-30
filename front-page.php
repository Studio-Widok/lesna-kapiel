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
    <div class="large-icon col3 column-inner">
      <img src="<?=$icons[$i]['icon']['sizes']['medium']?>" alt=""
        class="large-icon-img">
      <div class="large-icon-text uppercase"><?=$icons[$i]['text']?></div>
    </div>
    <?php }?>
  </div>

  <div class="rsep"></div>
</div>

<?php $recommended = get_field('recommended');?>
<div class="white-wrapper">
  <div class="rsep"></div>

  <div class="content column">
    <?php get_component('heading-logo');?>
    <h2 class="uppercase heading"><?=$recommended['title']?></h2>
    <div class="text limited-width text-center"><?=$recommended['text']?></div>
    <div class="r"></div>
  </div>

  <div class="content column-outer flex flex-1050-50 flex-768 flex-wrap fade">
    <?php
      for ($i = 0; $i < count($recommended['apartments']); $i++) {
        get_component('apartment-link', ['apartment' => $recommended['apartments'][$i]]);
      }
    ?>
  </div>

  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="pale-green-wrapper wrapper--no-mask-before">
  <div class="content-wide">

    <div class="chessboard">
      <?php
        for ($i = 0; $i < count($sections); $i++) {
          $section = $sections[$i];
        ?>
      <div class="chessboard-row">
        <div class="square-img"
          style="background-image: url(<?=$section['image']['sizes']['medium']?>)">
        </div>
        <div class="square column">
          <div class="big-title handwrite"><?=$section['title']?></div>
          <div class="text"><?=$section['text']?></div>
          <div class="r"></div>
          <div class="button-container">
            <a href="<?=get_link_url($section['link'])?>">
              <button><?=$section['link']['text']?></button>
            </a>
          </div>
        </div>
      </div>
      <?php }?>
    </div>

    <?php
      $fixed_image = get_field('fixed_image');
    ?>
  </div>
</div>

<div class="fixed-image"
  style="background-image:url(<?=$fixed_image['sizes']['large']?>);"></div>

<div class="pale-wrapper">
  <div class="rsep"></div>

  <div class="content column">
    <?php
      $featured_links_title = get_field('featured_links_title');
      get_component('heading-logo');
    ?>
    <h2 class="uppercase heading"><?=$featured_links_title?></h2>
  </div>

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
    'image'          => $footer['image'], 'ratio' => 16 / 9,
    'useContactInfo' => true,
  ]);
?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
