<?php /*Template Name: atrakcje*/
  get_header();
  get_part('nav');
  get_part('top', array(
    'show_title' => true,
    'bg'         => get_field('top_image'),
  ));
  $nearby = get_field('nearby');
  $footer = get_field('footer', 2);
?>

<div class="green-wrapper">
  <div class="rsep"></div>

  <div class="content flex">
    <?php
      get_part('featured-links', [
        'links' => $nearby,
      ]);
    ?>
  </div>

  <div class="rsep"></div>
</div>

<div class="grey-wrapper">

  <div class="rsep"></div>
  <div class="content">
    <?php get_component('title', ['title' => 'a co na miejscu?']);?>
  </div>
  <div class="rsep"></div>
  <?php
    $on_the_spot = get_field('on_the_spot');
    for ($i = 0; $i < count($on_the_spot); $i++) {
      get_part('slider-with-bullets', [
        'slides' => $on_the_spot[$i]['slides'],
        'title'  => $on_the_spot[$i]['title'],
      ]);
    ?>
  <div class="rsep"></div>
  <?php
    }
  ?>

  <div class="rsep"></div>
  <div class="rsep"></div>
</div>
<?php get_part('full-width-image', ['image' => $footer['image']]);?>
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
