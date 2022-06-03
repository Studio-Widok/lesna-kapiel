<?php
  // ApartmentArray
  if (!isset($apart)) {
    return;
  }

  // int | string
  $index = $index ?? 0;

  /**
   * array[
   *   'text' => string
   *   'gallery' => array[ImageArray]
   * ]
   */
  $slider = $slider ?? get_field('slider', $apart);

  $occupancy = get_field('occupancy', $apart);
  $size      = get_field('size', $apart);
  $icons     = get_field('icons', $apart);
  $price     = preg_replace('/[^0-9.]/', '', get_field('price', $apart));

?>

<div>
  <?php if (!empty($occupancy)) {?>
  <div class="icon icon--person"></div>
  <?=$occupancy?>
  <?php }
  if (!empty($occupancy) && !empty($size)) {
    echo ' | ';
  }
  if (!empty($size)) {
  ?>
  <?=$size?> m<sup>2</sup>
  <?php }?>
</div>

<div class="rmin"></div>

<div><?=$slider['text']?></div>

<?php if (!empty($icons)) {?>
<div class="rmin"></div>
<div class="uppercase"><?=pll__('udogodnienia')?></div>
<div class="apartment-icons">
  <?php for ($j = 0; $j < count($icons); $j++) {?>
  <div class="apartment-icon"
    style="background-image: url(<?=$icons[$j]['sizes']['medium']?>);">
    <div class="tooltip"><?=$icons[$j]['title'];?></div>
  </div>
  <?php }?>
</div>
<?php }?>

<?php if (!empty($price)) {?>
<div class="rmin"></div>
<div class="uppercase"><?=pll__('cena od')?></div>
<div class="apartment-price">
  <?=$price?>,-
</div>
<?php }?>

<div class="rmin"></div>

<div class="button-container">
  <a href="https://panel.hotres.pl/v4_adjust?oid=2447&lang=pl&tid=<?=get_field('hotres_id', $apart)?>&template=standalone&tid_ontop=<?=get_field('hotres_id', $apart)?>"
    target="_blank" rel="noopener noreferrer"><button>
      <div class="icon icon--bell"></div>
      <?=pll__('rezerwuj')?>
    </button></a>
  <?php for ($j = 1; $j < count($slider['gallery']); $j++) {?>
  <?php if ($j === 1) {?>
  <button class="source-<?=$index?>"
    data-full-src="<?=$slider['gallery'][$j]['sizes']['large']?>"><?=pll__('galeria')?></button>
  <?php } else {?>
  <div class="source-<?=$index?>"
    data-full-src="<?=$slider['gallery'][$j]['sizes']['large']?>">
  </div>
  <?php }}?>
</div>
