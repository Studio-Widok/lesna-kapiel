<div class="language-dropdown">
  <div class="lang-title uppercase"><?=pll_current_language()?></div>
  <div class="lang-list">
    <?php
      $langs = pll_the_languages([
        'raw'          => true,
        'hide_current' => true,
      ]);
      foreach ($langs as $lang) {
      ?>
    <a href="<?=$lang['url']?>" class="lang-link nav-link uppercase">
      <span><?=$lang['slug']?></span>
    </a>
    <?php }?>
  </div>
</div>
