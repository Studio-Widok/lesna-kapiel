<span class="language-switcher">
  <?php
    $langs = pll_the_languages([
      'raw'          => true,
      'hide_current' => true,
    ]);
    foreach ($langs as $lang) {
      // TEMP disable german language for now
      if (!is_user_logged_in() && $lang['slug'] === 'de') {
        continue;
      }
    ?>
  <a href="<?=$lang['url']?>" class="lang-link nav-link uppercase">
    <span><?=$lang['slug']?></span>
  </a>
  <?php }?>
</span>
