<span class="language-switcher nav-link">
  <?php
    $langs = pll_the_languages([
      'raw'          => true,
      'hide_current' => true,
    ]);
    foreach ($langs as $lang) {
    ?>
  <a href="<?=$lang['url']?>" class="lang-link uppercase">
    <span><?=$lang['slug']?></span>
  </a>
  <?php }?>
</span>
