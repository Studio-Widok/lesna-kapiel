<?php
  get_header();
  $color = get_field('colors');

  get_part('nav', [
    'isDark' => in_array($color, ['beige', 'pale']),
  ]);
?>

<div class="<?=$color?>-wrapper">
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

<?php
  get_part('map-block');
  get_footer();
?>
