<?php
  if (!defined('ABSPATH')) {
    require './../../../../wp-load.php';
    $body = '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa velit facilis nihil itaque adipisci, aut corporis, sequi cupiditate ab natus minus ad architecto minima dolores laborum ratione molestiae repellat nemo.</p>';
  }
  $logo = get_field('logo', 2);
?>
<div
  style="max-width: 40em; margin: 3em auto; padding: 3em; font-family: sans-serif; background-color: #1e352a; color: #fff;">
  <img src="<?=get_template_directory_uri()?>/media/favicon.png" alt="logo"
    style="max-width: 6em; display: block; margin: 0 auto 2em auto;" />
  <?=$body?>
  <hr
    style="border: none; height: 1px; background-color: #fff; max-width: 10em; margin: 2em auto 1em auto;">
  <div style="text-align: center;">
    <a href="<?=home_url()?>"
      style="font-size: .75em; text-decoration: none; color: #fff;"><?=get_bloginfo('name');?></a>
  </div>
</div>
