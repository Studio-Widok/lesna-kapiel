<div class="green-wrapper">

  <?php
    if (!is_page_template('templates/t-kontakt.php')) {
      $footer = get_field('footer', 2);
      get_part('footer-video', array(
        'source' => $footer['video'],
        'text'   => $footer['text']));
    ?>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>

  <?php get_part('map-block');?>

</div>
<?php }?>

<?php wp_footer();?>

</body>

</html>
