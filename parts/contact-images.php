<?php
  $images = get_field('images');
?>

<div class="content-wide fade">
  <div class="instagram-container column-outer flex flex-wrap">
    <?php
      $instagram = do_shortcode('[instagram-feed]');
    ?>
    <?=$instagram?>
  </div>
</div>
