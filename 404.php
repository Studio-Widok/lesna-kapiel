<?php
  get_header();

  $fields = get_field('404', 2);

  get_part('nav');
?>

<div id="top">
  <div id="top-bg"
    style="background-image: url('<?=$fields['image']['sizes']['large']?>')">
  </div>
  <div id="top-title" class="content column-double text-center title-404">
    <span>404</span>
    <div class="big"><?=$fields['text']?></div>
  </div>
</div>

<?php get_footer();?>
