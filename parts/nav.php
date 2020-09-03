<?php
  $nav_img = get_field('nav_image', 2);
?>

<nav id="nav">

  <div id="nav-links">
    <?php if (!is_page(2)) {?>
    <a class="nav-link" href="<?=get_the_permalink(pll_get_post(2))?>">
      <div class="nav-link-icon"><?php include __DIR__ . '/../media/logo.svg';?>
      </div>
    </a>
    <?php
      }
      get_component('nav-link', array(
        'tag' => get_term_by('term_taxonomy_id', pll_get_term(get_term_id('villa'))),
      ));
      get_component('nav-link', [
        'tag' => get_term_by('term_taxonomy_id', pll_get_term(get_term_id('house'))),
      ]);
      get_component('nav-link', array('page' => pll_get_post(48)));
      get_component('nav-link', array('page' => pll_get_post(25)));
    ?>
  </div>
  <div id="burger">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <div id="nav-overlay"
    style="background-image: url('<?=$nav_img['sizes']['large']?>');">

    <div class="language-switcher">
      <?php
        $langs = pll_the_languages([
          'raw'          => true,
          'hide_current' => true,
        ]);
        foreach ($langs as $lang) {
        ?>
      <a href="<?=$lang['url']?>" class="lang-link"><?=$lang['slug']?></a>
      <?php
        }
      ?>
    </div>

    <div class=""></div>
    <div id="nav-o-links">
      <?php
        if (!is_page(2)) {
          get_component('nav-link', array('page' => pll_get_post(2)));
        }
        get_component('nav-link', array('page' => pll_get_post(100)));
        get_component('nav-link', array(
          'tag' => get_term_by('term_taxonomy_id', pll_get_term(get_term_id('villa'))),
        ));
        get_component('nav-link', [
          'tag' => get_term_by('term_taxonomy_id', pll_get_term(get_term_id('house'))),
        ]);
        get_component('nav-link', array('page' => pll_get_post(48)));
        get_component('nav-link', array('page' => pll_get_post(109)));
        get_component('nav-link', array('page' => pll_get_post(111)));
        get_component('nav-link', array('page' => pll_get_post(25)));
      ?>
      <div class="rmin"></div>
    </div>
    <div id="nav-book"><span><?php pll_e('rezerwuj')?></span></div>
    <div id="nav-foot-mobile"
      class="flex flex-column flex-justify-center less-768">
      <div>
        <?php get_component('social-links');?>
      </div>
      <div class="rmin"></div>
      <div>+48 897 978 857</div>
      <div>kontakt@lesnakapiel.com</div>
      <div class="text-right">ul. Karpacka 1, Karpaty</div>
    </div>
    <div id="nav-foot" class="flex more-768">
      <div class="nav-foot-col flex flex-wrap flex-align-center">
        <div>+48 897 978 857</div>
        <div class="rmin less-1050"></div>
        <div>kontakt@lesnakapiel.com</div>
      </div>
      <div class="nav-foot-col empty"></div>
      <div class="nav-foot-col flex flex-wrap flex-align-center">
        <div class="text-right">ul. Karpacka 1, Karpaty</div>
        <div class="rmik less-1050"></div>
        <div>
          <?php get_component('social-links');?>
        </div>
      </div>
    </div>
  </div>
</nav>
