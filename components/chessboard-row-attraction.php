<?php
  // AttractionArray
  if (!isset($attraction)) {
    return;
  }

  $text      = $attraction['text'];
  $book_link = $attraction['book_link'];
  $link      = $attraction['link'];
?>

<div><?=$text?></div>

<div class="rmin"></div>
<div class="rmik"></div>

<div class="button-container">
  <?php if (!empty($book_link)) {?>
  <a href="<?=$book_link?>" target="_blank" rel="noopener noreferrer">
    <button>
      <div class="icon icon--bell"></div>
      <?=pll__('rezerwuj')?>
    </button>
  </a>
  <?php }?>

  <?php if (!empty($link['text'])) {?>
  <a <?=get_link_attributes($link)?>>
    <button><?=$link['text']?></button>
  </a>
  <?php }?>
</div>
