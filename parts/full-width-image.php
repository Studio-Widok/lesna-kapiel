<?php
  // ImageArray
  if (!isset($image) || empty($image)) {
    return;
  }

  // string - if set, `ratio` and `useQuote` will be ignored
  $content = $content ?? '';

  // number
  $ratio = $ratio ?? $image['width'] / $image['height'];

  // bool
  $useContactInfo = $useContactInfo ?? false;

  // bool
  $useQuote = $useQuote ?? $useContactInfo;

  // bool
  $useNegativeMargin = $useNegativeMargin ?? false;

  $styles = empty($content) ? ('padding-bottom: ' . 100 / $ratio . '%;') : '';
?>

<div
  class="full-width-image cake <?=$useNegativeMargin ? 'full-width-image-negative' : ''?> <?=empty($content) ? '' : 'full-width-image--with-content'?>"
  style="
    background-image: url('<?=$image['sizes']['large']?>');
    <?=$styles?>
  ">

  <?php if (!empty($content)) {?>
  <div class="full-width-image-content"><?=$content?></div>
  <?php } elseif ($useQuote) {?>
  <div class='full-width-image-contact'>
    <div class="image-quote handwrite">disconnect<br>to reconnect</div>
    <?php
      if ($useContactInfo) {
        get_part('contact-info');
      }
      ?>
  </div>
  <div class="rsep"></div>
  <?php }?>
</div>
