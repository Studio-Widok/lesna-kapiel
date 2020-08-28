<div class="dark-wrapper">
  <?php
    $footer = get_field('footer', 2);
    get_part('footer-video', [
      'source' => $footer['video'],
      'text'   => $footer['text'],
    ]);
    get_part('map-block');
  ?>
</div>
<?php wp_footer();?>

</body>

</html>
