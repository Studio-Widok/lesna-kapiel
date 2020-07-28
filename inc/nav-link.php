<?php
  if (!isset($page) || get_post_status($page) !== 'publish') {
    return;
  }
?>
<a class="nav-link <?=is_page($page) ? 'current' : ''?>"
  href="<?=get_the_permalink($page)?>">
  <span class="uppercase"><?=get_the_title($page)?></span>
</a>
