<?php
  $popup = get_field('bike_popup');
  if (!isset($_GET['t'])) {
    return;
  }

?>

<div id="bike-popup-container">
  <div id="bike-popup">
    <div class="flex flex-768 flex-align-end column-outer">
      <svg id="bike-popup-close" viewBox="0 0 100 100">
        <path d="M5 5L95 95M95 5L5 95" />
      </svg>
      <div id="bike-popup-form" class="col3-2">
        <?php
          $form = do_shortcode('[contact-form-7 id="1378" title="Bike Rental"]');
          $form = str_replace([
            '*name*',
            '*email*',
            '*2_hours*',
            '*6_hours*',
            '*message*',
            '*submit*',
          ], [
            'imię i nazwisko',
            'e-mail',
            '2 godziny',
            '6 godzin',
            'uwagi',
            'wyślij',
          ], $form);
          $pattern = '/(<span class="wpcf7-form-control-wrap" data-name="bike-models">[^<]*?<span[^>]*?>)'
        .
        "(<" . "\\" . "/span>[^<]*?<" . "\\" . "/span>)/" ;
          $form=preg_replace($pattern, "$1" .
          get_the_component('bike-rental-models', ['popup'=> $popup]) . "$2",
          $form);
          $pattern = '/(<span class="wpcf7-form-control-wrap"' .
            ' data-name="accessories">[^<]*?<span[^>]*?>)'
              .
              "(<" . "\\" . "/span>[^<]*?<" . "\\" . "/span>)/" ;
                $form=preg_replace($pattern, "$1" .
                get_the_component('bike-rental-accessories', ['popup'=> $popup])
                .
                "$2",
                $form);
                echo $form;?>
      </div>
      <div id="bike-popup-description" class="col3 column-inner">
        <?=$popup['description']?>
      </div>
    </div>
  </div>
</div>
