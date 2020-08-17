
<div class="slider content">

<div class="next">
    kolejna kolekcja
</div>

<div class="collection-number flex flex-column flex-align-center flex-justify-space-evenly  column">    
    <?php for ($i = 0; $i < count($slider); $i++){ ?>
    <div> <?= $i ?></div>
    <?php } ?>
</div> 


<?php for ($i = 0; $i < count($slider); $i++){ ?>
    <div class="collection-overlay <?=$i ?> <?=$i === 0 ? 'active' : ''?>">
    <div class="collection-title">Kolekcja <?= $i ?></div>
    <?php get_part('2-col-with-pic', array('value_1' => 'pic_left', 'content' => $slider[$i]));?>
    </div>
<?php } ?>

</div>
