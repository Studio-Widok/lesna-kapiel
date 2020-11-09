<?php
  $exclude       = $exclude ?? [];
  $isOthersTitle = $isOthersTitle ?? false;

  $collections = get_categories([
    'taxonomy' => 'collections',
    'exclude'  => $exclude,
  ]);
?>

<div class="collections-slider fade">

  <div class="slider">
    <?php
      for ($i = 0; $i < count($collections); $i++) {
        $color = get_field('colors', $collections[$i]);
      ?>
    <div class="single-slide">
      <div class="<?=$color?>-wrapper">
        <div class="r"></div>
        <div class="overlap"></div>
        <div class="content">
          <?php
            get_component('single-collection', [
                'collection'    => $collections[$i],
                'isOthersTitle' => $isOthersTitle,
              ]);
            ?>
        </div>
        <div class="rsep"></div>
        <div class="rsep"></div>
        <div class="rsep"></div>
        <div class="rsep"></div>
        <div class="rsep less-768"></div>
        <div class="rsep less-768"></div>
      </div>
    </div>
    <?php }?>
  </div>

  <div class="bullets-container">
    <?php
      if (count($collections) > 1) {
        for ($i = 0; $i < count($collections); $i++) {
        ?>
    <div class="slider-bullet"><?=($i + 1)?></div>
    <?php
      }
      }
    ?>
  </div>

  <?php get_component('slider-arrows', [
      'next_arrow_text' => pll__('next_collection'),
  ]);?>

</div>
