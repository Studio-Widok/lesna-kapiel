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
          $img = get_field('image', $collections[$i]);
        ?>
      <div class="single-slide">
        <div class="flex flex-align-end">
          <div class="col2 column collection-image-column">
            <div class="cake cake-3-4"
              style="background-image: url('<?=$img['sizes']['large']?>');">
              <?php get_component('cake-frame');?>
            </div>
          </div>
          <div class="col2 column collection-description-column">
            <div class="collection-number">kolekcja #<?=($i + 1)?></div>
            <div class="r"></div>
            <div class="collection-title handwrite"><?=$collections[$i]->name?>
            </div>
            <div class="r"></div>
            <div class="collection-description">
              <?=$collections[$i]->description?></div>
            <div class="r"></div>
            <a href="<?=get_tag_link($collections[$i])?>">
              <button>zobacz więcej</button>
            </a>
          </div>
        </div>
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
