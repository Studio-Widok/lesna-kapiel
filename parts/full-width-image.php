<?php
  $image = $image ?? [];

  if (empty($image)) {
    return;
  }
?>

<div class="full-width-image cake cake-16-9"
  style="background-image: url('<?=$image['sizes']['large']?>');"></div>
