

<div class="content col-2-with-pic">
    <div class="flex">
    <?php
      <div class="big-title handwrite"> <?=$content['title']?></div>
         <div class="rmin"></div>
         <p class="text">
             <?=$content['text'] ?>
         </p>
         <div class="rmin"></div>
         <div class="rmin"></div>
 
         <button>
             Zobacz Apartamenty
         </button>
         </div>
       
  <?php

} elseif ('pic_right' == $value_1 ) { ?>
    <div class="col2 column pic-right">
        <div class="big-title">  <?=$content['title'] ?></div>
         <div class="rmin"></div>
         <p class="text">
         <?=$content['text'] ?>
         </p>
         <div class="rmin"></div>
         <div class="rmin"></div>
 
         <button>
             Zobacz Domki
         </button>
         </div>
         <div class="col2 column"> <div class="image-wrapper"><div class="cake" style="background-image: url(<?=$content['image']['sizes']['large'] ?>)"></div></div></div>
   <?php
 } ?>
       
        
    </div>
</div>