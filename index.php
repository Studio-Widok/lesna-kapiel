<?php
  get_header();
  $footer = get_field('footer', 2);
  get_part('nav');
?>

<div class="pale-green-wrapper">
  <div class="content column">
    <div class="rsep"></div>
    <div class="rsep"></div>
    <?php get_component('heading-logo');?>
    <h2 class="uppercase heading"><?=get_the_title()?></h2>
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

<div class="footer-wrapper">
  <?php
    get_part('full-width-image', [
      'image'          => $footer['image'],
      'useQuote'       => true,
      'useContactInfo' => true,
    ]);
  ?>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
