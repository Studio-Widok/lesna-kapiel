<?php
  $image     = $image ?? '';
  $link      = $link ?? '';
  $title     = $title ?? '';
  $price     = $price ?? '';
  $occupancy = $occupancy ?? '';
?>

<div class="col2 column fade">
  <a href="<?=$link?>" class="flex flex-column flex-align-center">
    <div class="single-apartment-container image-wrapper-full-width">
      <div class="cake cake-3-4" style="background-image: url(<?=$image?>)">
      </div>
    </div>
    <div class="col2">
      <div class="rmin"></div>
      <div class="uppercase text-center text-bold"><?=$title?></div>
      <hr />
      <?php
        if (!empty($price)) {
        ?>
      <div class="text-center"><?=pll__('od')?> <?=$price?>,-</div>
      <?php }?>
<?php
  if (!empty($occupancy)) {
  ?>
      <div class="text-center"><?=pll__('ilość osób')?>: <?=$occupancy?></div>
      <?php }?>
    </div>
  </a>
  <div class="rsep"></div>
</div>
