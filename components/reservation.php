<?php
  $title = $title ?? '';
  $text  = $text ?? '';
  if ($__index) {
    return;
  }

?>

<?php if (!empty($title)) {?>
<div class="text-center fade">
  <div class="big-title handwrite"><?=$title?></div>
  <div class="r"></div>
  <div class="r"></div>
</div>
<?php }?>

<?php if (false) {?>
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
<?php }?>

<form action="https://panel.hotres.pl/v4_step1" target="_blank"
  class="hotresChooser" id="hotresChooser" method="get"><input type="hidden"
    name="oid" id="hotresOid" value="2447" /><input type="hidden" name="lang"
    id="hotresLang" value="" /> <input type="hidden" name="arrival"
    id="hotresArrival" /><input type="hidden" name="departure"
    id="hotresDeparture" />
  <div class="hotresRangeChooser" id="hotresRangeChooser">
    <div id="hotresArrivalWrap"></div>
    <div id="hotresDepartureWrap"></div>
  </div>
  <div class="hotresAdultsChooser" id="hotresAdultsChooser"><select
      name="adults" id="hotresAdultsSelect"></select></div>
  <div class="hotresSubmit"><button id="hotresButtonChooser"></button></div>
</form>

<?php if (!$__index) {?>
<script src="https://panel.hotres.pl/public/api/hotres_v4_chooser.js"></script>
<script>
window.addEventListener('load', (event) => {
  new hotresChooser({});
});
</script>
<?php }?>

<?php if (!empty($text)) {?>
<div class="text-center fade">
  <div class="rmin"></div>
  <div class="uppercase"><?=$text?></div>
</div>
<?php }?>
