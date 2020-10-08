<?php
  get_header();
  $firstSection   = get_field('first_section');
  $sections       = get_field('sections');
  $featured_links = get_field('featured_links');
  $slider         = get_field('slider');
  $footer         = get_field('footer');
  get_part('nav');
  get_part('top', array(
    'show_logo'         => true,
    'bg'                => get_field('top_image'),
    'isShowReservation' => true,
  ));
?>

<div class="green-wrapper">
  <div class="fixed-link-container">
    <?php get_component('fixed-link', array('text' => get_the_title(pll_get_post(100)), 'link' => get_the_permalink(pll_get_post(100))));?>
    <div class="rsep"></div>
    <div class="rsep more-1200"></div>
    <?php get_part('2-col-no-pic', [
        'title'  => $firstSection['title'],
        'text'   => $firstSection['text'],
        'button' => array(
          'text' => $firstSection['link']['text'],
          'link' => get_link_url($firstSection['link']),
        ),
    ])?>
    <div class="rsep"></div>
  </div>
  <div class="fixed-link-container">
    <?php $termId = get_term_by('term_taxonomy_id', pll_get_term(get_term_id('villa')));
    get_component('fixed-link', array('text' => pll__('see_apartments'), 'link' => get_tag_link($termId)));?>
    <div class="rsep"></div>
    <?php for ($i = 0; $i < count($sections); $i++) {?>
<?php get_part('2-col-with-pic', [
    'image'         => $sections[$i]['image'],
    'title'         => $sections[$i]['title'],
    'text'          => $sections[$i]['text'],
    'button'        => array(
      'text' => $sections[$i]['link']['text'],
      'link' => get_link_url($sections[$i]['link']),
    ),
    'alt_layout'    => true,
    'pic_right'     => $i % 2,
    'isTextOverlap' => $i === 1,
]);?>
    <div class="rsep less-768"></div>
    <?php }?>
  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep less-768"></div>
  <div class="rsep less-768"></div>
</div>

<?php
  get_part('collections-slider');
?>
<div class="grey-wrapper">
  <div class="rsep"></div>
  <?php get_part('featured-links', [
      'links' => $featured_links,
  ]);?>
  <div class="rsep"></div>
  <?php get_component('reservation')?>
<?php get_part('full-width-image', ['image' => $footer['image'], 'ratio' => 16 / 9]);?>
</div>
<div class="green-wrapper">
  <?php
    $footer = get_field('footer', 2);
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
