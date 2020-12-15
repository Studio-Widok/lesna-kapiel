<?php
  $maskColor = $maskColor ?? '1e352a';
  $isOverlap = $isOverlap ?? false;
  $mask      = $isOverlap ? rand(1, 2) : rand(1, 7);
?>
<object class="cake-frame"
  data="<?=get_template_directory_uri()?>/media/scratch-2.php?color=<?=$maskColor?>&mask=<?=$mask?>"></object>
