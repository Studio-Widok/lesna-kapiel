<?php // Template Name: regulaminy
  get_header();

  $footer = get_field('footer', pll_get_post(2));

  $links = get_field('rules');

  get_part('nav');
?>

<div class="pale-green-wrapper">
  <div class="rsep"></div>
  <div class="rsep"></div>

  <div class="content column">
    <?php get_component('heading-logo');?>
    <h2 class="uppercase heading"><?=get_the_title()?></h2>
    <div class="r"></div>
    <div class="text text-full">
      <ul>
        <?php
          for ($i = 0; $i < count($links); $i++) {
            $link = $links[$i]['link'];
            $text = $link['text'];
            if (empty($text)) {
              if ($link['target'] === 'in') {
                $page_url = $link['link_page'];
                $page     = url_to_postid($page_url);
                if (empty($page)) {
                  continue;
                } else {
                  $text = get_the_title($page);
                }
              } else {
                continue;
              }
            }
          ?>
        <li><a <?=get_link_attributes($link)?>><?=$text?></a></li>
        <?php }?>
      </ul>
    </div>
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

<?php
  get_part('map-block');
  get_footer();
?>
