<?php
  get_header();
  $footer = get_field('footer', 2);
  get_part('nav');
?>

<div class="pale-green-wrapper">
  <div class="content column">
    <div class="rsep"></div>
    <div class="rsep"></div>
    <div class="r"></div>
    <div class="text-full text">
      <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            the_content();
          }
        }
      ?>
    </div>
    <div class="rsep"></div>
    <div class="rsep"></div>
  </div>
</div>

<div class="pale-wrapper">
  <?php
    get_part('full-width-image', [
      'image'    => $footer['image'],
      'useQuote' => true,

    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
