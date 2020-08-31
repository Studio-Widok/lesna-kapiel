<?php
  get_header();
  $firstSection   = get_field('first_section');
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
  <?php get_part('2-col-no-pic', [
      'title'  => $firstSection['title'],
      'text'   => $firstSection['text'],
      'button' => array(
        'text' => $firstSection['button_text'],
        'link' => $firstSection['button_link'],
      ),
  ])?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php for ($i = 0; $i < count($sections); $i++) {?>
<?php get_part('2-col-with-pic', [
    'image'      => $sections[$i]['image'],
    'title'      => $sections[$i]['title'],
    'text'       => $sections[$i]['text'],
    'button'     => array(
      'text' => 'Zobacz Apartamenty',
      'link' => '',
    ),
    'alt_layout' => true,
    'pic_right'  => $i % 2,
]);?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php }?>
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
