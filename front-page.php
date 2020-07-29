<?php
  get_header();
  $sections = get_field('sections');

  get_part('nav');
  get_part('top', array(
    'show_logo' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <div class="rsep more-1200"></div>
  <?php get_part('2-col-no-pic')?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', array(
      'image'      => $sections[0]['image'],
      'title'      => $sections[0]['title'],
      'text'       => $sections[0]['text'],
      'button'     => array(
        'text' => 'Zobacz Apartamenty',
        'link' => '',
      ),
      'alt_layout' => true,
  ));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', array(
      'image'      => $sections[1]['image'],
      'title'      => $sections[1]['title'],
      'text'       => $sections[1]['text'],
      'button'     => array(
        'text' => 'Zobacz Apartamenty',
        'link' => '',
      ),
      'pic_right'  => true,
      'alt_layout' => true,
  ));?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="grey-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php get_part('2-col-with-pic', array(
      'image'      => $sections[2]['image'],
      'title'      => $sections[2]['title'],
      'text'       => $sections[2]['text'],
      'button'     => array(
        'text' => 'Zobacz Apartamenty',
        'link' => '',
      ),
      'alt_layout' => true,
  ));?>
</div>


</div>
<?php get_footer();
