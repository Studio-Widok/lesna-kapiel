<?php
  $button = $button ?? false;
  $links  = $links ?? false;
?>

<div class="col3 column flex flex-column flex-align-center">
  <div class="image-wrapper-full-width">
    <div class="cake cake-3-4"
      style="background-image: url(<?=$content['image']['sizes']['large']?>)">
    </div>
  </div>
  <div class="r"></div>
  <div class="small-title"><?=$content['title']?>
    <div class='border-below'></div>
  </div>
  <div class="r"></div>
  <div class="text">
    <p>
      <?=$content['text']?></p>
  </div>
  <div class="r"></div>

  <?php if ($links) {?>
  <div class="additional-links flex flex-justify-space-evenly"
    style="width: 100%;">
    <?php for ($x = 0; $x < count($content['links']); $x++) {?>
    <div class="flex">
      <div class="circle"> </div>
      <a href=<?=$content['links'][$x]['link']?>>
        <?=$content['links'][$x]['link-name']?> </a>
    </div>
    <?php }?>
  </div>
  <div class="r"></div>
  <?php }?>

  <?php if ($button) {?>
  <button>
    <a href=<?=$content['button_link']?>> Więcej </a>
  </button>
  <?php }?>

</div>
