<?php /*Template Name: Hotres*/
  get_header();
  $footer = get_field('footer', 2);

  get_part('nav');

  $lang = pll_current_language();
?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>



  <div id="hotresContainer"></div>
</div>

<div class="footer-wrapper wrapper--no-mask-before">
  <?php
    get_part('full-width-image', [
      'image'    => $footer['image_alt'],
      'useQuote' => true,
    ]);
  ?>
</div>
<script>
$.urlParam = function(name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location
    .href);
  if (results == null) {
    return null;
  }
  return decodeURI(results[1]) || 0;
}


var arrival = $.urlParam('arrival');
var departure = $.urlParam('departure');
var adults = $.urlParam('adults');
var child1 = $.urlParam('child1');
var child2 = $.urlParam('child2');
var child3 = $.urlParam('child3');



window.addEventListener('load', (event) => {
  createHotres({
    "oid": 2447,
    "lang": "<?=$lang;?>",
    "arrival": arrival,
    "departure": departure,
    "adults": adults,
    "child1": child1,
    "child2": child2,
    "child3": child3
  });
});
</script>
<?php
  get_part('map-block');
  get_footer();
?>
