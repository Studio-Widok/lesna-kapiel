<?php
  get_header();
  $sections       = get_field('sections');
  $featured_links = get_field('featured_links');
  $slider         = get_field('slider');
  $footer         = get_field('footer');

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
</div>

<div class="grey-wrapper">
  <div class="rsep"></div>
  <?php
    get_part('collections-slider');
  ?>
  <div class="rsep"></div>

  <div class="rsep"></div>

  <?php get_part('featured-links', [
      'links' => $featured_links,
  ]);?>

  <div class="rsep"></div>

</div>

<?php
  get_part('full-width-image', ['image' => $footer['image']]);
get_footer();
