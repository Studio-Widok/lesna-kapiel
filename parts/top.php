<?php
  $img        = get_field('top_image');
  $show_logo  = $show_logo ?? false;
  $show_title = $show_title ?? false;
?>

<div id="top">
  <div id="top-bg" style="background-image: url('<?=$img['sizes']['large']?>')">
  </div>
  <?php if ($show_logo) {?>
  <div id="top-logo-wrap">
    <img src="<?=get_template_directory_uri()?>/media/logo.svg" alt="logo"
      id="top-logo-img">
    <div id="top-logo-text">leśna kąpiel</div>
    <div id="top-logo-subtitle">slow life apartments</div>
  </div>
  <?php }if ($show_title) {?>
  <div id="top-title">
    <span><?=get_the_title()?></span>
  </div>
  <?php }?>

  <div class="arrow"> 
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 27">
  <path d="M5 0L5 17" stroke-width="1.5" stroke="#fff" />
  <path d="M5 27L1.5 17L8.5 17z" stroke-width="0" fill="#fff" />
</svg>

  </div>
</div>