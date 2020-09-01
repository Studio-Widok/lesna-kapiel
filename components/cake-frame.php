<?php
  $direction = rand(0, 3);
?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="cake-frame"
  preserveAspectRatio="none">
  <mask id="scratch-<?=$__index?>">
    <image href="<?=get_template_directory_uri()?>/media/mask-1.png"
      height="100" width="100" x="0" y="0" preserveAspectRatio="xMinYMid meet"
      transform="rotate(<?=$direction * 90?>, 50, 50)" />
  </mask>
  <g mask="url(#scratch-<?=$__index?>)" class="drawing">
    <rect x="0" y="0" width="100" height="100" fill="none" />
    <?php switch ($direction) {case 0: ?>
    <path d="M0 -50L0 100" />
    <?php break;case 1: ?>
    <path d="M-50 0L100 0" />
    <?php break;case 2: ?>
    <path d="M100 -50L100 100" />
    <?php break;case 3: ?>
    <path d="M-50 100L100 100" />
    <?php }?>
  </g>
</svg>
