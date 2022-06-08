<?php
  $content  = $content ?? [];
  $iterator = $iterator ?? '';
?>

<div class="col3 column-inner vertical-image-text">
  <div class="image-wrapper-full-width">
    <div class="cake cake-3-4"
      style="background-image: url(<?=$content['image']['sizes']['medium']?>)">
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
  <div class="additional-links">
    <?php
      for ($i = 0; $i < count($content['links']); $i++) {
        $is_link = !empty(get_link_url($content['links'][$i]['link']));
        $classes = 'text-link';
      ?>

    <?php if ($is_link) {?>
    <a <?=get_link_attributes($content['links'][$i]['link'])?>"
      class="<?=$classes?>">
      <?php } else {?>
      <div class="<?=$classes?>">
        <?php }?>
        <?php if (!empty($content['links'][$i]['icon'])) {?>
        <img src="<?=$content['links'][$i]['icon']['sizes']['medium']?>"
          class="additional-link-icon">
        <?php }?>
        <span><?=$content['links'][$i]['link']['text']?></span>
        <?php if ($is_link) {?>
    </a>
    <?php } else {?>
  </div>
  <?php }?>

  <?php }?>
</div>
<div class="rmin"></div>
<?php }?>

<?php
  if (
    isset($content['button_link']) &&
    !empty($content['button_link']['text'])
  ) {
    $link       = get_link_url($content['button_link']);
    $isDisabled = empty($link);
  ?>
<div class="flex flex-justify-center">
  <div class="button-container rel">
    <a href="<?=$link?>">
      <button <?=$isDisabled ? 'disabled' : ''?>>
        <?=$content['button_link']['text']?>
      </button>
      <?php if ($isDisabled) {?>
      <div class="tooltip"><?=pll__("page_in_construction")?></div>
      <?php }?>
    </a>
  </div>
</div>
<?php }?>
<div class="r less-768"></div>
</div>
