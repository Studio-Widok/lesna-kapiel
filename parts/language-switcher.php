<?php
  // TEMP: disable the language switcher
  if (!is_user_logged_in()) {
    return;
  }
?>
<div class="language-switcher">
  <?php
    $langs = pll_the_languages([
      'raw'          => true,
      'hide_current' => true,
    ]);
    foreach ($langs as $lang) {
    ?>
  <a href="<?=$lang['url']?>" class="lang-link"><?=$lang['slug']?></a>
  <?php }?>
</div>
