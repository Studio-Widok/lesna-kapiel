<?php
  if (!isset($tag) && (!isset($page) || get_post_status($page) !== 'publish')) {
    return;
  }
  $isDisabled = $isDisabled ?? false;
?>

<?php if (isset($page)) {?>
<a class="nav-link <?=is_page($page) ? 'current' : ''?> <?=$isDisabled ? 'disabled' : ''?>"
  href="<?=get_the_permalink($page)?>">
  <span class="uppercase"><?=get_the_title($page)?></span>
</a>
<?php } elseif (isset($tag)) {
  ?>
<a class="nav-link <?=is_tax($tag->taxonomy, $tag->slug) ? 'current' : ''?> <?=$isDisabled ? 'disabled' : ''?>"
  href="<?=get_tag_link($tag)?>">
  <span class="uppercase"><?=$tag->name?></span>
</a>
<?php }?>
