<div class="content col-2-with-pic">
  <div class="flex <?=$value_1 === 'pic_right' ? 'pic-right' : ''?>">

    <?php
      if (in_array($value_1, array('pic_left', 'pic_right'))) {
      ?>
    <div class="col2 column">
      <div class="image-wrapper">
        <div class="cake cake-3-4"
          style="background-image: url(<?=$content['image']['sizes']['large']?>)">
        </div>
      </div>
    </div>
    <div class="col2 column">
      <div class="big-title handwrite"> <?=$content['title']?></div>
      <div class="rmin"></div>
      <div class="text">
        <p><?=$content['text']?></p>
      </div>
      <div class="rmin"></div>
      <div class="rmin"></div>

      <button>
        Zobacz Apartamenty
      </button>
    </div>
    <?php }?>

  </div>
</div>
