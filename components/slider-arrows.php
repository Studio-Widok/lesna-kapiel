<?php
  $next_arrow_text = $next_arrow_text ?? '';
?>

<div class="slider-arrows">
  <div class="arrow-left">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-8.5 0 27 27">
      <path d="M5 0L5 17" stroke-width="1.5" stroke="#fff" />
      <path d="M5 27L1.5 17L8.5 17z" stroke-width="0" fill="#fff" />
    </svg>
  </div>
  <div class="arrow-right">
    <?php if ($next_arrow_text) {?>
    <div class="arrow-text">
      <?=$next_arrow_text?>
    </div>
    <?php }?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-8.5 0 27 27">
      <path d="M5 0L5 17" stroke-width="1.5" stroke="#fff" />
      <path d="M5 27L1.5 17L8.5 17z" stroke-width="0" fill="#fff" />
    </svg>
  </div>
</div>
