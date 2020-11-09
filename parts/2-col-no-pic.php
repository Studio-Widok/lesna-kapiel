<?php
  $title  = $title ?? '';
  $text   = $text ?? '';
  $button = $button ?? false;
?>

<div class="content col-2-no-pic fade">
  <div class="flex flex-768 flex-column-reverse-768">
    <div class="col2 column">
      <div class="text">
        <?=$text?>
      </div>
      <div class="rmin"></div>
      <div class="rmin"></div>
      <div class="button-container">
        <a href="<?=$button['link']?>">
          <button>
            <?=$button['text']?>
          </button>
        </a>
      </div>
    </div>
    <div class="col2 column">
      <div class="big-title handwrite">
        <?=$title?>
      </div>
      <div class="rmin less-768"></div>
    </div>

  </div>
</div>
