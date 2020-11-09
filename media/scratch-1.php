<?php header('Content-type: image/svg+xml');?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10">
<defs>
 <mask id="scratch">
  <image href="https://widok.studio/lesnakapiel/wp-content/themes/lesnakapiel/media/lesna-bg_1_mask
  .png" x="0" y="0" width="100" height="10" />
 </mask>
</defs>
  <path fill="#<?=$_GET['color']?>" d="M0 0L100 0L100 10L0 10z" mask="url(#scratch)" />
</svg>
