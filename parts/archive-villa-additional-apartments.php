<?php
  if (empty($apartments) || empty($term)) {
    return;
  }

  $termObject = get_term($term);
  $name       = $name ?? '';
  $color      = get_field('colors', $termObject);
?>

<div class="<?=$color?>-wrapper">
  <div class="title-container column content fade">
    <div class="rsep"></div>
    <div class="big-title handwrite text-right">
      <?=$name?></div>
    <div class="r less-768"></div>
    <div class="premium-text">
      <?=get_field('top_text', $termObject)?>
    </div>
  </div>
  <div class="rsep"></div>
  <div class="content flex flex-768 flex-wrap">
    <?php
      foreach ($apartments as $apartment) {
        $images = get_field('slider', $apartment->ID)['gallery'];
        get_component('single-apartment', [
          'image'     => isset($images[0]) ? $images[0]['sizes']['large'] : null,
          'link'      => get_permalink($apartment->ID),
          'title'     => get_the_title($apartment->ID),
          'price'     => get_field('price', $apartment->ID),
          'occupancy' => get_field('occupancy', $apartment->ID),
        ]);
      }
    ?>
  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>
