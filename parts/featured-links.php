<?php
  $links            = $links ?? [];
  $isMobileHide1050 = $isMobileHide1050 ?? true;
  $isMobileHide768  = $isMobileHide768 ?? false;
?>

<div class="content column-outer flex flex-1050-50 flex-768 flex-wrap">
  <?php
    for ($i = 0; $i < count($links); $i++) {
      get_component('vertical-image-text', [
        'content'           => $links[$i],
        'iterator'          => $i,
        'isMobileHide1050 ' => $isMobileHide1050,
        'isMobileHide768'   => $isMobileHide768,
      ]);
    }
  ?>
</div>
