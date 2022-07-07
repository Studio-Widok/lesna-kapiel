<?php
  get_header();

  $footer = get_field('footer', 2);
  $fields = get_field('404', 2);

  get_part('nav');
?>


<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="content column-double text-center title-404">
    <span>404</span>
    <div class="big"><?=$fields['text']?></div>
  </div>
  <div class="rsep"></div>
  <div class="rsep"></div>
</div>

<div class="footer-wrapper wrapper--no-mask-before">
  <?php
    get_part('full-width-image', [
      'image'          => $footer['image'],
      'useQuote'       => true,
      'useContactInfo' => true,
    ]);
  ?>
</div>

<?php get_footer();?>
