<?php
  $address   = get_field('address', pll_get_post(25));
  $phone     = get_field('contact_phone', pll_get_post(25));
  $phone_raw = str_replace(' ', '', $phone);
  $mail      = get_field('contact_mail', pll_get_post(25));
?>

<div class="content fade">
  <div class="flex flex-align-end">
    <div class="col2 column">
      <div class="uppercase"><?php pll_e('leśna kąpiel')?></div>
      <div class="rmin"></div>
      <?=$address?>
      <div class="rmin"></div>
      <p>
        <a href="tel:<?=$phone_raw?>"><?=$phone?></a><br>
        <a href="mailto:<?=$mail?>"><?=$mail?></a>
      </p>
    </div>
    <div class="col2 column-outer flex flex-justify-end flex-align-center">
      <div class="column-inner"><?=get_field('social_tag', pll_get_post(25))?>
      </div>
      <div class="column-inner">
        <?php get_component('social-links');?>
      </div>
    </div>
  </div>
</div>
