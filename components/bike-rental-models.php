<?php
  if (!isset($popup)) {
    return;
  }

?>
<div class="checkbox-title"><?=pll__('modele')?></div>

<?php
    for ($i = 0; $i < count($popup['bikes']); $i++) {
    ?>
<label class="checkbox-label">
  <input type="checkbox" name="bike-models[]"
    value="<?=$popup['bikes'][$i]['name']?>">
  <div class="flex flex-justify-space-between flex-wrap">
    <div><?=$popup['bikes'][$i]['name']?></div>
    <div><?=$popup['bikes'][$i]['price']?></div>
  </div>
</label>
<?php
  }
?>
