<?php
  if (!isset($popup)) {
    return;
  }
?>

<div class="checkbox-title"><?=pll__('dodatkowe akcesoria')?></div>

<?php
  for ($i = 0; $i < count($popup['accessories']); $i++) {
  ?>
<label class="checkbox-label">
  <input type="checkbox" name="bike-models[]"
    value="<?=$popup['accessories'][$i]['name']?>">
  <div class="flex flex-justify-space-between flex-wrap">
    <div><?=$popup['accessories'][$i]['name']?></div>
    <div><?=$popup['accessories'][$i]['price']?></div>
  </div>
</label>
<?php
  }
?>
