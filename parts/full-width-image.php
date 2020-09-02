<?php
  $image = $image ?? [];
  if (empty($image)) {
    return;
  }

  $isContactInfo = $isContactInfo ?? false;
  $ratio         = $ratio ?? $image['width'] / $image['height'];

  if (empty($image)) {
    return;
  }
?>

<div class="full-width-image cake" style="
    background-image: url('<?=$image['sizes']['large']?>');
    padding-bottom: <?=100 / $ratio?>%;
  ">
  <?php if ($isContactInfo): ?>
  <div class='full-width-image-contact'>
    <?php get_part('contact-info');?>
  </div>
  <div class="rsep"></div>
  <?php endif?>
</div>
