<?php
  $nav_img = get_field('nav_image', 2);
?>
<nav id="nav">
  <div id="nav-links">
    <div class="nav-link">
      <span>villa</span>
    </div>
    <div class="nav-link">
      <span>domki nad stawem</span>
    </div>
    <div class="nav-link">
      <span>spa</span>
    </div>
    <a class="nav-link" href="<?=get_the_permalink(25)?>">
      <span><?=get_the_title(25)?></span>
    </a>
  </div>
  <div id="burger">
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div id="nav-overlay"
    style="background-image: url('<?=$nav_img['sizes']['large']?>');">
    <div class=""></div>
    <div class=""></div>
    <div id="nav-o-links">
      <div class="nav-link"><span>nasza idea</span></div>
      <div class="nav-link"><span>villa</span></div>
      <div class="nav-link"><span>domki nad stawem</span></div>
      <div class="nav-link"><span>relaks i spa</span></div>
      <div class="nav-link"><span>restauracja</span></div>
      <div class="nav-link"><span>atrakcje</span></div>
      <div class="nav-link"><span>kontakt</span></div>
    </div>
    <div id="nav-book"><span>rezerwuj</span></div>
    <div id="nav-foot">
      <div class="nav-foot-col">+48 897 978 857</div>
      <div class="nav-foot-col">kontakt@lesnakapiel.com</div>
      <div class="nav-foot-col empty"></div>
      <div class="nav-foot-col">ul. Karpacka 1, Karpaty</div>
      <div class="nav-foot-col social">Ea, eaque</div>
    </div>
  </div>
</nav>
