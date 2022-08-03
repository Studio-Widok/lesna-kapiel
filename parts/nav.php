<?php
  $address   = get_field('address_short', pll_get_post(25));
  $phone     = get_field('contact_phone', pll_get_post(25));
  $phone_raw = str_replace(' ', '', $phone);
  $mail      = get_field('contact_mail', pll_get_post(25));
  $book_link = get_field('book_link', pll_get_post(25));

  $pages = [884, 914, 100, 25, 111, 1149];
  $pages = array_map(function ($pageId) {
    return get_post(pll_get_post($pageId));
  }, $pages);
  usort($pages, function ($a, $b) {
    return $a->menu_order - $b->menu_order;
  });
?>

<nav id="nav">

  <div id="nav-links">
    <a class="nav-link more-1050"
      href="<?=get_the_permalink(pll_get_post(2))?>">
      <div class="nav-link-icon"><?php include __DIR__ . '/../media/logo.svg';?>
      </div>
    </a>
    <div class="more-1050">
      <?php
        foreach ($pages as $page) {
          get_component('nav-link', ['page' => $page]);
        }
      ?>
      <?php get_part('language-switcher');?>
    </div>
  </div>

  <div class="nav-contact more-1050">
    <a href="<?=$book_link?>" target="_blank" rel="noopener noreferrer">
      <button><?=pll__('rezerwuj')?></button>
    </a>
    <a href="tel:<?=$phone_raw?>"><?=$phone?></a>
  </div>

  <div id="burger">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <div id="nav-overlay">

    <?php get_part('language-switcher');?>

    <div></div>
    <div id="nav-o-links">
      <?php
        if (!is_page(2)) {
          get_component('nav-link', ['page' => pll_get_post(2)]);
        }
        foreach ($pages as $page) {
          get_component('nav-link', ['page' => $page]);
        }
      ?>
      <div class="rmin"></div>
    </div>

    <div id="nav-foot-mobile"
      class="flex flex-column flex-justify-center less-1050">
      <div>
        <?php get_component('social-links');?>
      </div>
      <div class="rmin"></div>

      <div class="text-center">
        <a href="<?=$book_link?>" target="_blank" rel="noopener noreferrer">
          <button><?=pll__('rezerwuj')?></button>
        </a>
      </div>

      <div class="rmin"></div>
      <div><a href="tel:<?=$phone_raw?>"><?=$phone?></a><br></div>
      <div><a href="mailto:<?=$mail?>"><?=$mail?></a></div>
      <div class="text-right"><?=$address?></div>
    </div>

  </div>

</nav>

<div class="less-1050">
  <div id="mobile-nav-contact"
    class="flex flex-align-center flex-justify-center">
    <div class="contact-phone"><?=pll__('zadzwoń')?>: <a
        href="tel:<?=$phone_raw?>"><?=$phone?></a></div>
  </div>
</div>
