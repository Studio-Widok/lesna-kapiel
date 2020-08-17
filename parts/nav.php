<?php
  $nav_img = get_field('nav_image', 2);
?>

<nav id="nav">
  <div id="nav-links">
    <?php if (!is_page(2)) {?>
    <a class="nav-link" href="<?=get_the_permalink(2)?>">
      <div class="nav-link-icon"><?php include __DIR__ . '/../media/logo.svg';?>
      </div>
    </a>
    <?php }?>
    <div class="nav-link">
      <span class="uppercase">villa</span>
    </div>
    <div class="nav-link">
      <span class="uppercase">domki nad stawem</span>
    </div>
    <?php
      get_component('nav-link', array('page' => 48));
      get_component('nav-link', array('page' => 25));
    ?>
  </div>
  <div id="burger">
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div id="nav-overlay"
    style="background-image: url('<?=$nav_img['sizes']['large']?>');">
    <div class=""></div>
    <div id="nav-o-links">
      <?php
        if (!is_page(2)) {
          get_component('nav-link', array('page' => 2));
        }
      ?>
      <div class="nav-link"><span class="uppercase">nasza idea</span></div>
      <div class="nav-link"><span class="uppercase">villa</span></div>
      <div class="nav-link">
        <span class="uppercase">domki nad stawem</span>
      </div>
      <?php
        get_component('nav-link', array('page' => 48));
      ?>
      <div class="nav-link"><span class="uppercase">restauracja</span></div>
      <?php
        get_component('nav-link', array('page' => 111));
        get_component('nav-link', array('page' => 25));
      ?>
    </div>
    <div id="nav-book"><span>rezerwuj</span></div>
    <div id="nav-foot">
      <div class="nav-foot-col">+48 897 978 857</div>
      <div class="nav-foot-col">kontakt@lesnakapiel.com</div>
      <div class="nav-foot-col empty"></div>
      <div class="nav-foot-col">ul. Karpacka 1, Karpaty</div>
      <div class="nav-foot-col">
        <?php get_component('social-links');?>
      </div>
    </div>
  </div>
</nav>
