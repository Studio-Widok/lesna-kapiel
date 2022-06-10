<?php
  $address   = get_field('address', pll_get_post(25));
  $phone     = get_field('contact_phone', pll_get_post(25));
  $phone_raw = str_replace(' ', '', $phone);
  $mail      = get_field('contact_mail', pll_get_post(25));
?>

<div class="contact-info content fade">
  <div>
    <div class="uppercase"><?php pll_e('leśna kąpiel')?></div>
    <div class="rmin"></div>
    <?=$address?>
    <div class="rmin"></div>
    <p>
      <a href="tel:<?=$phone_raw?>"><?=$phone?></a><br>
      <a href="mailto:<?=$mail?>"><?=$mail?></a>
    </p>
  </div>

  <div>
    <div class="r"></div>
    <div class="contact-social-tag">
      <?=get_field('social_tag', pll_get_post(25))?></div>
    <div class="r"></div>
    <div class=""><?php get_component('social-links');?></div>
  </div>
</div>
