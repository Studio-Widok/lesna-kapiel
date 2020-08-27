<?php
  get_header();
  $sections        = get_field('sections');
  $tripple_section = get_field('tripple_section');
  $slider          = get_field('slider');

  get_part('nav');
  get_part('top', array(
    'show_logo' => true,
    'bg'        => get_field('top_image'),
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="rsep more-1200"></div>
  <?php get_part('2-col-no-pic')?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', [
      'image'      => $sections[0]['image'],
      'title'      => $sections[0]['title'],
      'text'       => $sections[0]['text'],
      'button'     => array(
        'text' => 'Zobacz Apartamenty',
        'link' => '',
      ),
      'alt_layout' => true,
  ]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', [
      'image'      => $sections[1]['image'],
      'title'      => $sections[1]['title'],
      'text'       => $sections[1]['text'],
      'button'     => [
        'text' => 'Zobacz Apartamenty',
        'link' => '',
      ],
      'pic_right'  => true,
      'alt_layout' => true,
  ]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="grey-wrapper">
  <div class="rsep"></div>
  <?php
    get_part('collections-slider');
  ?>
  <div class="rsep"></div>

  <div class="rsep"></div>

  <div class="content flex">
    <?php
      get_component('vertical-pic-text', [
        'button'  => true,
        'content' => $tripple_section[0],
      ]);
      get_component('vertical-pic-text', [
        'links'   => true,
        'button'  => true,
        'content' => $tripple_section[1],
      ]);
      get_component('vertical-pic-text', [
        'button'  => true,
        'content' => $tripple_section[2],
      ]);
    ?>
  </div>

</div>

<?php get_part('map-block')?>

<?php get_footer();
