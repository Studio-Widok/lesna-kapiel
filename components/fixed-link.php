<?php
  $text = $text ?? '';
  $link = $link ?? '';
?>

<div class="fixed-link flex flex-column flex-align-center">
  <a href="<?=$link?>">
    <span class="uppercase small"><?=$text?></span>
  </a>
</div>
