<?php // Template Name: atrakcje
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
