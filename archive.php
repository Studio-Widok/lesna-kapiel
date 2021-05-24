<?php
  get_header();

  $isDark         = is_tax('collections', pll_get_term(get_collection_id('polna')));
  $archive        = get_queried_object();
  $featured_links = get_field('featured_links', 2);
  $footer         = get_field('footer', 2);

  get_part('nav', ['isDark' => $isDark]);
?>

<div class="archive-top">
  <div class="archive-top-bg"
    style="background-image: url('<?=get_field('top_image', $archive)['sizes']['large']?>')">
  </div>
</div>

<div class="<?=get_field("colors", $archive)?>-wrapper">
  <div class="column content title-container">
    <div class="big-title handwrite fade"><?=$archive->name?></div>
  </div>
  <?php get_component('reservation')?>
  <div class="rsep"></div>
  <?php get_part('text-full', ['text' => get_field('top_text', $archive)]);?>
  <div class="rsep"></div>
  <div class="content flex flex-768 flex-wrap">
    <?php
      $premiumApartments = [];
      $isVilla           = is_tax('tags') && get_queried_object()->slug === 'villa';
      while (have_posts()) {
        the_post();
        $tagSlugs = array_map(
          function ($e) {return $e->slug;},
          get_the_terms($post, 'tags')
        );
        if ($isVilla && in_array('premium', $tagSlugs)) {
          $premiumApartments[] = $post;
          continue;
        }

        $slider = get_field('slider');
        $images = isset($slider['gallery']) ? $slider['gallery'] : null;
        get_component('single-apartment', [
          'image' => isset($images[0]) ? $images[0]['sizes']['large'] : null,
          'link'  => get_permalink(),
          'title' => get_the_title(),
          'price' => get_field('price'),
        ]);
      }
    ?>
  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <?php if ($isVilla) {?>
  <div class="premium-container">
    <div class="title-container column content fade">
      <div class="rsep"></div>
      <div class="big-title handwrite text-right">
        <?=pll__('premium')?><br /><?=pll__('rooms')?></div>
      <div class="r less-768"></div>
      <div class="premium-text"><?php pll_e("premium_text");?></div>
    </div>
    <div class="rsep"></div>
    <div class="content flex flex-768 flex-wrap">
      <?php
        foreach ($premiumApartments as $apartment) {
          $images = get_field('slider', $apartment->ID)['gallery'];
          get_component('single-apartment', [
            'image' => isset($images[0]) ? $images[0]['sizes']['large'] : null,
            'link'  => get_permalink($apartment->ID),
            'title' => get_the_title($apartment->ID),
            'price' => get_field('price', $apartment->ID),
          ]);
        }
        ?>
    </div>
    <div class="rsep"></div>
    <div class="rsep"></div>
  </div>
  <?php }if (is_tax('collections')) {?>
  <div class="rsep"></div>
  <div class="rsep less-768"></div>
  <div class="rsep less-768"></div>
  <?php }?>
</div>

<?php
  if (is_tax('collections')) {
    get_part('collections-slider', [
      'exclude'       => $archive->term_id,
      'isOthersTitle' => true,
    ]);
  }
?>

<div class="gray-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>

  <div class="content">
    <?php get_component('title', ['title' => pll__('what_in_villa')]);?>
  </div>
  <div class="rsep"></div>
  <?php
    get_part('featured-links', [
      'links'     => $featured_links,
      'maskColor' => get_mask_color("gray"),
    ]);
  ?>
  <div class="rsep"></div>
  <?php
    get_component('reservation', [
      'title' => 'wybierz termin',
      'text'  => 'lorem ipsum lorem ipsum, lorem ipsum',
    ]);
  ?>
  <div class="rsep"></div>
  <?php
    get_part('full-width-image', [
      'image' => $footer['image'], 'ratio' => 16 / 9,
    ]);
  ?>
</div>

<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
</div>

<?php get_footer();?>
