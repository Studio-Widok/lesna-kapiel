<?php
  $title = $title ?? '';
?>

<div id="date-picker" class="text-center fade content">
  <div class="date-picker-title handwrite"><?=$title?></div>
  <div class="r"></div>
  <div class="date-picker-container">

    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://panel.hotres.pl/public/api/hotres_v3.js"></script>
    <div id="hotresContainer"></div>
    <script>
    createHotres({
      'action': 'roomreservations',
      'id': '33912',
      'auth': '91798cedd41744caa6e76f8476c427e7',
      'lang': 'pl'
    });
    </script>

  </div>
</div>
