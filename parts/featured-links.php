<?php
  $links = $links ?? [];
?>

<div class="content column-outer flex flex-wrap">
  <?php
    for ($i = 0; $i < count($links); $i++) {
      get_component('vertical-image-text', [
        'content' => $links[$i],
      ]);
    }
  ?>
</div>
