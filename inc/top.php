<?php
  $img = get_field('top_image');
?>

<div id="top">
  <div id="top-bg" style="background-image: url('<?=$img['sizes']['large']?>')">
  </div>
  <div id="top-logo-wrap">
    <img src="<?=get_template_directory_uri()?>/media/logo.svg" alt="logo" id="top-logo-img">
    <div id="top-logo-text">leśna kąpiel</div>
    <div id="top-logo-subtitle">slow life apartments</div>
  </div>
</div>
