<?php
  $images = get_field('images');
?>

<div class="content-wide">
  <div class="column-outer flex flex-wrap">
    <?php foreach ($images as $image) {?>
    <div class="column-inner col4">
      <div class="cake"
        style="background-image: url(<?=$image['image']['sizes']['medium']?>);">
      </div>
    </div>
    <?php }?>
  </div>
</div>
