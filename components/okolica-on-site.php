<?php
  $on_site = $on_site ?? get_field('on_site');
?>

<div class="content">

  <div class="column">
    <div class="rsep"></div>
    <div class="handwrite image-quote"><?=$on_site['title']?></div>
    <div class="r"></div>
    <div class="text-full text"><?=$on_site['text']?></div>
    <div class="r"></div>
  </div>

  <div class="icons-full-width column-outer flex">
    <?php
      for ($i = 0; $i < count($on_site['icons']); $i++) {
      ?>
    <div class="large-icon col3 column-inner">
      <img src="<?=$on_site['icons'][$i]['icon']['sizes']['medium']?>" alt=""
        class="large-icon-img">
      <div class="large-icon-text uppercase"><?=$on_site['icons'][$i]['title']?>
      </div>
    </div>
    <?php }?>
  </div>

  <?php if (!empty($on_site['link']['text'])) {?>
  <div class="column button-container text-center">
    <a <?=get_link_attributes($on_site['link'])?>>
      <button><?=$on_site['link']['text']?></button>
    </a>
  </div>
  <?php }?>

  <div class="r"></div>

</div>
