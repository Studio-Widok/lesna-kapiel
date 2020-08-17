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
</div>
