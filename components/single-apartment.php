<?php
  $image = $image ?? '';
  $link  = $link ?? '';
  $title = $title ?? '';
  $price = $price ?? '';
?>

<div class="col2 column">
  <a href="<?=$link?>" class="flex flex-column flex-align-center">
    <div class="single-apartment-container image-wrapper-full-width">
      <div class="cake cake-3-4" style="background-image: url(<?=$image?>)">
      </div>
    </div>
    <div class="col2">
      <div class="rmin"></div>
      <div class="uppercase text-center text-bold"><?=$title?></div>
      <hr />
      <div class="text-center">from <?=$price?>,-</div>
    </div>
  </a>
  <div class="r less-768"></div>
</div>
