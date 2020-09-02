<?php
  $exclude = $exclude ?? [];

  $collections = get_categories([
    'taxonomy' => 'collections',
    'exclude'  => $exclude,
  ]);
?>

<div class="collections-slider">
  <div class="content">

    <div class="slider">
      <?php
        for ($i = 0; $i < count($collections); $i++) {
        ?>
      <div class="single-slide">
        <?php
          get_component('single-collection', [
              'collection' => $collections[$i],
            ]);
          ?>
      </div>
      <?php }?>
    </div>
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
      'next_arrow_text' => 'kolejna kolekcja',
  ]);?>

</div>
