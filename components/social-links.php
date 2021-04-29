<?php
  $social_links = get_field('social-links', 25)
?>

<div class="social">
  <div class="social-icon">
    <a href="<?=$social_links['instagram']?>" target="_blank">
      <?php include __DIR__ . '/../media/instagram.svg';?>
    </a>
  </div>
  <div class="social-icon">
    <a href="<?=$social_links['facebook']?>" target="_blank">
      <?php include __DIR__ . '/../media/facebook.svg';?>
    </a>
  </div>
</div>
