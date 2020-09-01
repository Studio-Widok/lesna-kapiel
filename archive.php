<?php
  get_header();
  get_part('nav');
  $archive         = get_queried_object();
  $tripple_section = get_field('tripple_section', 2);
?>
<div class="<?=get_field("colors", $archive)?>-set">
  <div class="column-double content title-container">
    <div class="rsep"></div>
    <div class="big-title handwrite"><?=$archive->name?></div>
  </div>
  <div>Tutaj Pasek z rezerwacją</div>
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas dolore
  fuga a iure, debitis sint magnam harum, nihil illum unde enim eveniet velit
  ipsa vel aliquid! Qui natus iusto odit?'));?>
  <div class="rsep"></div>
  <div class="content flex column">
    <?php
      while (have_posts()):
        the_post();
        $slider = get_field('slider');
        $images = isset($slider['gallery']) ? $slider['gallery'] : null;
        get_component('single-apartment', [
          'image' => isset($images[0]) ? $images[0]['sizes']['large'] : null,
          'link'  => get_permalink(),
          'title' => get_the_title(),
          'price' => get_field('price'),
        ]);
      endwhile;
    ?>
  </div>
  <div class="rsep"></div>
  <?php if (is_tax('tags')): ?>
  <div class="premium-container">
    <?php
      $premiumApartments = get_posts(array(
        'numberposts' => -1,
        'post_type'   => 'apartment',
        'order'       => 'DSC',
        'tax_query'   => [
          [
            'taxonomy' => 'tags',
            'field'    => 'slug',
            'terms'    => 'premium',
          ],
        ],
      ));
    ?>
    <div class="column-double content title-container">
      <div class="rsep"></div>
      <div class="big-title handwrite text-right">premium<br />rooms</div>
      <div class="col3">Lorem, ipsum dolor sit amet consectetur adipisicing
        elit. Voluptas dolore
        fuga a iure, debitis sint magnam harum, nihil illum unde enim eveniet
        velit
        ipsa vel aliquid! Qui natus iusto odit?</div>
    </div>
    <div class="rsep"></div>
    <?php foreach ($premiumApartments as $apartment):
        $images = get_field('slider', $apartment->ID)['gallery'];
        get_component('single-apartment', [
          'image' => isset($images[0]) ? $images[0]['sizes']['large'] : null,
          'link'  => get_permalink($apartment->ID),
          'title' => get_the_title($apartment->ID),
          'price' => get_field('price', $apartment->ID),
        ]);
    endforeach?>
    <div class="rsep"></div>
  </div>
  <?php
    endif;
    if (is_tax('collections')):
      get_part('collections-slider', [
        'exclude' => get_queried_object()->term_id,
      ]);
    ?>
  <?php endif;?>


  <div class="rsep"></div>
  <div class="content flex">

    <?php get_component('vertical-image-text', array('links' => 'no', 'button' => "yes", 'content' => $tripple_section[0]));?>
    <?php get_component('vertical-image-text', array('links' => 'yes', 'button' => "yes", 'content' => $tripple_section[1]));?>
    <?php get_component('vertical-image-text', array('links' => 'no', 'button' => "yes", 'content' => $tripple_section[2]));?>

  </div>
  <div class="rsep"></div>
</div>


<?php get_footer();?>
