<?php
  $langs = pll_the_languages([
    'raw' => true,
  ]);
?>
<div class="language-dropdown">
  <div class="lang-title uppercase">
    <?=pll_current_language()?><svg viewBox="0 0 100 100">
      <path d="M10 40 L50 80 L90 40" />
    </svg>
  </div>
  <div class="lang-list">
    <?php
      foreach ($langs as $slug => $lang) {
        if ($lang['current_lang']) {
          continue;
        }
      ?>
    <a href="<?=$lang['url']?>" class="lang-link nav-link uppercase">
      <?=$slug?>
    </a>
    <?php }?>
  </div>
</div>
