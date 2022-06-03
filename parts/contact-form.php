<?php
  $form = do_shortcode('[contact-form-7 id="463" title="Contact form 1"]');
  $form = str_replace([
    '*name_placeholder*',
    '*email_placeholder*',
    '*message_placeholder*',
    '*submit*',
    '</form>',
  ], [
    __("*name_placeholder*"),
    __('*email_placeholder*'),
    __('*message_placeholder*'),
    __('*submit*'),
    '<input type="hidden" name="page-language" value="' . pll_current_language() . '" /></form>',
  ], $form);
?>

<div class="content fade" id="form">
  <?php get_component('title', ['title' => pll__('have_question')]);?>
  <div class="rmin"></div>
  <?=$form?>
</div>
