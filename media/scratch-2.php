<?php
  header('Content-type: image/svg+xml');

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
  } else {
    $url = "http://";
  }
  $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $url_array = explode('/', $url);
  array_pop($url_array);
  $url = implode('/', $url_array);
?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
  preserveAspectRatio="none">
  <defs>
    <mask id="scratch">
      <image href="<?=$url?>/maska<?=$_GET['mask']?>.jpg" width="100"
        height="100" preserveAspectRatio="none" />
    </mask>
  </defs>
  <path fill="#<?=$_GET['color']?>" d="M0 0L100 0L100 100L0 100z"
    mask="url(#scratch)" />
</svg>
