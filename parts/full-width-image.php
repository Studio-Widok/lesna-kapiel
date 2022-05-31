<?php
  $image = $image ?? [];
  if (empty($image)) {
    return;
  }

  $ratio             = $ratio ?? $image['width'] / $image['height'];
  $useContactInfo    = $useContactInfo ?? false;
  $useQuote          = $useQuote ?? $useContactInfo;
  $useNegativeMargin = $useNegativeMargin ?? false;
?>

<div
  class="full-width-image cake <?=$useNegativeMargin ? 'full-width-image-negative' : ''?>"
  style="
    background-image: url('<?=$image['sizes']['large']?>');
    padding-bottom: <?=100 / $ratio?>%;
  ">
  <?php if ($useQuote) {?>
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
