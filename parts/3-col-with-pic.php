<?php
$tripple_section = $tripple_section ? $tripple_section : [];
$button = $button ? $button : "no";
$links = $links ? $links : "no";
?>
<div class="content-90 flex tripple-section">
    <?php get_part('vertical-pic-text', array('links' => $links, 'button' => $button, 'content' => $content[0]));?>
    <?php get_part('vertical-pic-text', array('links' => $links, 'button' => $button, 'content' => $content[1]));?>
    <?php get_part('vertical-pic-text', array('links' => $links, 'button' => $button, 'content' => $content[2]));?>
  </div>