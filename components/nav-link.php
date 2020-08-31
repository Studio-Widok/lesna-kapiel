<?php
  if (!isset($tag) && !isset($page) || get_post_status($page) !== 'publish') {
    return;
  }


?>

<?php if(isset($page)) { ?>
<a class="nav-link <?=is_page($page) ? 'current' : ''?>"
  href="<?=get_the_permalink($page)?>">
  <span class="uppercase"><?=get_the_title($page)?></span>
</a>
<?php } ?>


<?php 
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));

if($current_url === get_tag_link($tag)) {
  $sectionClass = 'current';
} else {
  $sectionClass = '';
}

if(isset($tag)) { ?>
<a class="nav-link <?=$sectionClass?>"
  href="<?=get_tag_link($tag)?>">
  <span class="uppercase"><?=$tag->name?></span>
</a>
<?php } ?>
