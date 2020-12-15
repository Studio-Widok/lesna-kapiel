<?php get_header();
  get_part('nav');
  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);
?>
<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php
    $slider = get_field('slider');
    get_part('slider-gallery', [
      'title'   => get_the_title(),
      'text'    => $slider['text'],
      'gallery' => $slider['gallery'],
  ]);?>
  <div class="rsep"></div>
  <?php
    $facilities = get_field('facilities');
    get_part('facilities', [
      'title'      => $facilities['title'],
      'facilities' => $facilities['facilities'],
      'meals'      => $facilities['meals'],
      'image'      => $facilities['image']['sizes']['medium'],
      'link'       => $facilities['link'],
      'maskColor'  => get_mask_color("green"),
    ]);
  ?>
  <?php
  $collections = get_the_terms($post, 'collections');
  if (!empty($collections)) {
    $color = get_field("colors", $collections[0]);
  ?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="<?=$color?>-wrapper">
  <div class="r"></div>
  <div class="overlap"></div>
  <div class="content">
    <?php
      get_component('single-collection', [
          'collection' => $collections[0],
          'is_current' => true,
          'maskColor'  => get_mask_color($color),
        ]);
      ?>
  </div>
  <?php }?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => pll__('what_in_villa')]);?>
  </div>

  <div class="rsep"></div>

  <?php get_part('featured-links', [
      'links'     => $featured_links,
      'maskColor' => get_mask_color($color),
  ]);?>

  <div class="rsep"></div>
  <div class="rsep"></div>
</div>
<?php get_part('full-width-image', ['image' => $footer['image'], 'ratio' => 16 / 9]);?>
<div class="green-wrapper">
  <?php
    $footer = get_field('footer', 2);
    get_part('full-width-handwrite', array(
      'text' => $footer['text']));
  ?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
</div>
<?php get_part('map-block');?>
<div class="green-wrapper green-wrapper-footer">
  <div class="rmin"></div>
</div>
<?php get_footer();?>
