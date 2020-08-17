<div class="col3 column flex flex-column flex-align-center">
    <div class="image-wrapper-full-width">
        <div class="cake cake-3-4"
          style="background-image: url(<?=$content['image']['sizes']['large']?>)">
        </div>
      </div>
      <div class="r"></div>
    <div class="small-title"><?= $content['title']?></div>
    <div class="r"></div>
    <div class="text">
    <p>
    <?= $content['text']?></p> </div>
    <div class="r"></div>

    <?php if($links === 'yes'){ ?>
        
    <div class="additional-links flex flex-justify-space-evenly" style="width: 100%;">
    <a href=<?=$content['links'][0] ?>> Sauna </a>
    <a href=<?=$content['links'][1] ?>> Basen </a>
    </div>
    <div class="r"></div>
    <?php } ?>

    <button>
    <a href=<?=$content['button_link'] ?>> Więcej </a>
    </button>

</div>