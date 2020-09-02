<?php
  $image         = $image ?? [];
  $isContactInfo = $isContactInfo ?? false;

  if (empty($image)) {
    return;
  }
?>

<div class="full-width-image cake cake-16-9"
  style="background-image: url('<?=$image['sizes']['large']?>')">
  <?php if ($isContactInfo): ?>
  <div class='full-width-image-contact'>
    <?php get_part('contact-info');?>
  </div>
  <div class="rsep"></div>
  <?php endif?>
</div>
