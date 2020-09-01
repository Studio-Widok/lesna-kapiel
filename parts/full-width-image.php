<?php
  $image = $image ?? [];
  $isOverlay = $isOverlay ?? false;
  $isContactInfo = $isContactInfo ?? true;

  if (empty($image)) {
    return;
  }
?>

<div class="full-width-image cake cake-16-9"
  style="background-image: <?php if($isOverlay) echo 'linear-gradient(rgba(0, 0, 0, 0.6),'?> url('<?=$image['sizes']['large']?>');">
  <?php if($isContactInfo): ?>
  <div>
    <?php get_part('contact-info'); ?>
  </div>
  <?php endif ?>
</div>
