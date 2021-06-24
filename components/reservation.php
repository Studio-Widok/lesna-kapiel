<?php
  $title = $title ?? '';
  $text  = $text ?? '';
?>

<?php if (!empty($title)) {?>
<div class="text-center fade">
  <div class="big-title handwrite"><?=$title?></div>
  <div class="r"></div>
  <div class="r"></div>
</div>
<?php }?>

<script src="https://panel.hotres.pl/public/api/hotres_v3popup.js"></script>
<script src="https://panel.hotres.pl/public/api/hotres_chooser2.js"></script>
<form action="/" class="hotresChooser" method="get">
  <div><input type="date" name="arrival" id="hotresArrival" /></div>
  <div><input type="date" name="departure" id="hotresDeparture" /></div>
  <div><button>Szukaj</button></div>
</form>
<script>
window.addEventListener('load', (event) => {
  createHotresChooser({
    'mode': 'popup',
    'lang': 'pl',
    'auth': '91798cedd41744caa6e76f8476c427e7'
  });
});
</script>

<?php if (!empty($text)) {?>
<div class="text-center fade">
  <div class="rmin"></div>
  <div class="uppercase"><?=$text?></div>
</div>
<?php }?>
