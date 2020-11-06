<?php
  $facilities = $facilities ?? [];
  if (empty($facilities)) {
    return;
  }

?>

<div class="facilities-icons-container">
  <?php for ($i = 0; $i < count($facilities); $i++) {?>
  <div class="flex flex-align-center facilities-icon-single">
    <img src="<?=$facilities[$i]['icon']['sizes']['medium']?>" />
    <?=$facilities[$i]['text']?>
  </div>
  <?php }?>
</div>
