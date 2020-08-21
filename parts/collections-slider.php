<?php
  $collections = get_categories(['taxonomy' => 'collections']);
?>

<pre>
  <?php
    var_dump($collections);
  ?>
</pre>

<div class="collections-slider">
  <div class="content">
    <div class="slider">

      <?php for ($i = 0; $i < count($collections); $i++) {?>
      <div class="single-slide">
        <div class="flex flex-align-end">
          <div class="col2 column collection-image-column">
            <div class="cake cake-3-4"
              style="background-image: url('<?=get_home_url()?>/wp-content/uploads/2020/07/wallhaven-lmdvxr-1920x850.jpg');">
            </div>
          </div>
          <div class="col2 column collection-description-column">
            <div class="collection-number">kolekcja #<?=($i + 1)?></div>
            <div class="r"></div>
            <div class="collection-title handwrite"><?=$collections[$i]->name?>
            </div>
            <div class="r"></div>
            <div class="collection-description">Lorem ipsum dolor, sit amet
              consectetur adipisicing elit. Illum quam maiores placeat labore
              aperiam, deserunt minus reiciendis harum laborum, quasi mollitia
              repellendus ut quos et nostrum fugiat in itaque doloribus!</div>
            <div class="r"></div>
          </div>
        </div>
      </div>
      <?php }?>

    </div>
  </div>
</div>
