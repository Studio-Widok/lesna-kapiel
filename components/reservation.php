<?php
  $title   = $title ?? '';
  $text    = $text ?? '';
  $classes = $classes ?? '';
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

<?php if (false) { // custom hotres popup ?>
<form action="https://panel.hotres.pl/v4_step1" target="_blank"
  class="hotresChooser <?=$classes?>" id="hotresChooser" method="get">

  <input type="hidden" name="oid" id="hotresOid" value="2447" />
  <input type="hidden" name="lang" id="hotresLang" value="" />
  <input type="text" name="arrival" id="hotresArrival" value="2022-04-01" />
  <input type="text" name="departure" id="hotresDeparture" value="2022-04-03" />
  <input type="text" name="adults" value="2" />

  <button id="hotresButtonChooser">submit</button>
</form>
<?php }?>

<?php if (true) {?>
<form action="https://panel.hotres.pl/v4_step1" target="_blank"
  class="hotresChooser <?=$classes?>" id="hotresChooser" method="get"><input
    type="hidden" name="oid" id="hotresOid" value="2447" /><input type="hidden"
    name="lang" id="hotresLang" value="" /> <input type="hidden" name="arrival"
    id="hotresArrival" /><input type="hidden" name="departure"
    id="hotresDeparture" />
  <div class="hotresRangeChooser" id="hotresRangeChooser">
    <div id="hotresArrivalWrap" class="calendar-label-wrap"
      data-label="przyjazd">
    </div>
    <div id="hotresDepartureWrap" class="calendar-label-wrap"
      data-label="wyjazd">
    </div>
  </div>
  <div class="hotresAdultsChooser calendar-label-wrap" id="hotresAdultsChooser"
    data-label="liczba gości"><select name="adults"
      id="hotresAdultsSelect"></select></div>
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
<?php }?>

<?php if (!empty($text)) {?>
<div class="text-center fade">
  <div class="rmin"></div>
  <div class="uppercase"><?=$text?></div>
</div>
<?php }?>
