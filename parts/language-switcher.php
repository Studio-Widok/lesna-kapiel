<?php
  $langs = pll_the_languages([
    'raw' => true,
  ]);
?>
<div class="language-dropdown">
  <div class="lang-title uppercase">
    <img
      src="<?=get_template_directory_uri() . '/media/icons/' . pll_current_language() . '.svg'?>"
      alt="" class="lang-flag">
  </div>
  <div class="lang-list">
    <?php
      foreach ($langs as $slug => $lang) {
        if ($lang['current_lang']) {
          continue;
        }
      ?>
    <a href="<?=$lang['url']?>" class="lang-link nav-link uppercase">
      <img
        src="<?=get_template_directory_uri() . '/media/icons/' . $slug . '.svg'?>"
        alt="" class="lang-flag">
    </a>
    <?php }?>
  </div>
</div>
