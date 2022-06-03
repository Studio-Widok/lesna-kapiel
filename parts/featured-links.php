<?php
  $links = $links ?? [];
?>

<div class="content column-outer flex flex-1050-50 flex-768 flex-wrap fade">
  <?php
    for ($i = 0; $i < count($links); $i++) {
      get_component('vertical-image-text', [
        'content'   => $links[$i],
        'iterator'  => $i,
        'maskColor' => $maskColor,
      ]);
    }
  ?>
</div>
