<?php
  $form = do_shortcode('[contact-form-7 id="31" title="Contact form 1"]');
?>

<div class="content fade" id="form">
  <?php get_component('title', ['title' => pll__('have_question')]);?>
  <div class="rmin"></div>
  <div class="column"><?=$form?></div>
</div>
