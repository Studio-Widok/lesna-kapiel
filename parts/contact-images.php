<?php
  $images    = get_field('images');
  $instagram = do_shortcode('[instagram-feed]'); // Smash Balloon Instagram Feed - By Smash Balloon
?>

<div class="content-wide fade">
  <div class="instagram-container column-outer flex flex-wrap">
    <?=$instagram?>
  </div>
</div>
