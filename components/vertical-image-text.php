<?php
  $content   = $content ?? [];
  $iterator  = $iterator ?? '';
  $maskColor = $maskColor ?? '1e352a';
?>

<div class="col3 column-inner vertical-image-text
<?php
  if ($iterator > 1) {
    if ($isMobileHide1050) {
      echo ' more-1050';
    }
    if ($isMobileHide768) {
      echo ' vertical-image-more-768';
  }
}?>">
  <div class="image-wrapper-full-width">
    <div class="cake cake-3-4"
      style="background-image: url(<?=$content['image']['sizes']['large']?>)">
      <?php get_component('cake-frame', ['maskColor' => $maskColor]);?>
    </div>
  </div>
  <div class="r"></div>
  <div class="text-center">
    <div class="small-title"><?=$content['title']?></div>
  </div>
  <div class="rmin"></div>
  <div class="text">
    <?=$content['text']?>
  </div>
  <div class="rmin"></div>

  <?php if (!empty($content['links'])) {?>
  <div class="additional-links flex flex-wrap">
    <?php for ($i = 0; $i < count($content['links']); $i++) {?>

    <a href="<?=get_link_url($content['links'][$i]['link'])?>"
      class="col2 flex flex-align-center text-link">
      <?php if (!empty($content['links'][$i]['icon'])) {?>
      <img src="<?=$content['links'][$i]['icon']['sizes']['medium']?>"
        class="additional-link-icon">
      <?php }?>
      <span><?=$content['links'][$i]['link']['text']?></span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="-53 0 80 10">
        <path d="M-53 5L17 5" stroke-width="1.5" stroke="#fff" />
        <path d="M27 5L17 1.5L17 8.5z" stroke-width="0" fill="#fff" />
      </svg>
    </a>

    <?php }?>
  </div>
  <div class="rmin"></div>
  <?php }?>

  <?php
    if (
      isset($content['button_link']) &&
      !empty($content['button_link']['text'])
    ) {
      $link = get_link_url($content['button_link']);
      if (!empty($link)) {
      ?>
  <div class="text-center">
    <a href="<?=$link?>">
      <button><?=$content['button_link']['text']?></button>
    </a>
  </div>
  <?php }}?>
  <div class="r less-768"></div>
</div>
