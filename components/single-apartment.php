<?php
  $image = $image ?? '';
  $link  = $link ?? '';
  $title = $title ?? '';
  $price = $price ?? '';
?>

<div class="col2 column flex flex-column flex-align-center">
  <div class="image-wrapper-full-width">
    <div class="cake cake-3-4" style="background-image: url(<?=$image?>)">
    </div>
  </div>
  <div class="col2">
    <div class="rmin"></div>
    <div class="uppercase text-center text-bold"><?=$title?></div>
    <hr />
    <div class="text-center">from <?=$price?>,-</div>
  </div>
</div>
