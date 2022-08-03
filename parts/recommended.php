<?php
  $recommended = get_field('recommended', pll_get_post(get_option('page_on_front')));
  if (empty($recommended['apartments'])) {
    return;
  }

?>

<div class="rsep"></div>

<div class="content column">
  <?php get_component('heading-logo');?>
  <h2 class="uppercase heading"><?=$recommended['title']?></h2>
  <div class="text limited-width text-center"><?=$recommended['text']?></div>
  <div class="r"></div>
</div>

<div class="content column-outer flex flex-1050-50 flex-768 flex-wrap fade">
  <?php
    for ($i = 0; $i < count($recommended['apartments']); $i++) {
      get_component('apartment-link', [
        'apartment' => $recommended['apartments'][$i],
        'classes'   => $i >= 2 ? 'more-1050' : '',
      ]);
    }
  ?>
</div>

<div class="rsep"></div>
