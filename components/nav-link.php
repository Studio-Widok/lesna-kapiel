<?php
  $isDisabled = $isDisabled ?? false;
?>

<?php if (isset($page)) {?>

<<?=$isDisabled ? 'span' : 'a'?>
  class="nav-link <?=is_page($page->ID) ? 'current' : ''?> <?=$isDisabled ? 'disabled' : ''?>"
  href="<?=get_the_permalink($page)?>">
  <span class="uppercase"><?=get_the_title($page)?></span>
  <?php if ($isDisabled) {?>
  <div class="tooltip"><?=pll__("maintenance_page")?></div>
  <?php }?>
</<?=$isDisabled ? 'div' : 'a'?>>

<?php } elseif (isset($tag)) {?>

<<?=$isDisabled ? 'span' : 'a'?>
  class="nav-link <?=is_tax($tag->taxonomy, $tag->slug) ? 'current' : ''?> <?=$isDisabled ? 'disabled' : ''?>"
  href="<?=get_tag_link($tag)?>">
  <span class="uppercase"><?=$tag->name?></span>
  <?php if ($isDisabled) {?>
  <div class="tooltip"><?=pll__("maintenance_page")?></div>
  <?php }?>
</<?=$isDisabled ? 'span' : 'a'?>>

<?php } elseif (isset($scroll) && isset($text)) {?>

<<?=$isDisabled ? 'span' : 'a'?>
  class="nav-link nav-link-scroll <?=$isDisabled ? 'disabled' : ''?>"
  href="<?=$scroll?>">
  <span class="uppercase"><?=$text?></span>
  <?php if ($isDisabled) {?>
  <div class="tooltip"><?=pll__("maintenance_page")?></div>
  <?php }?>
</<?=$isDisabled ? 'span' : 'a'?>>

<?php }?>
