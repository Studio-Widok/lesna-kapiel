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
  <?php get_part('slider', array('value_1' => 'pic_left', 'slider' => $slider));?>
  <div class="rsep"></div>

  <div class="rsep"></div>
  <div class="content flex">

    <?php get_component('vertical-pic-text', array('links' => 'no', 'button' => "yes", 'content' => $tripple_section[0]));?>
<?php get_component('vertical-pic-text', array('links' => 'yes', 'button' => "yes", 'content' => $tripple_section[1]));?>
<?php get_component('vertical-pic-text', array('links' => 'no', 'button' => "yes", 'content' => $tripple_section[2]));?>

  </div>
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

<div id="map-wrapper">
  <div class="overlay abs"></div>
  <div id="gmap"></div>
</div>

<?php get_footer();
