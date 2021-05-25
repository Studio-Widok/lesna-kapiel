<?php /*Template Name: spa*/
  get_header();

  $sections = get_field('sections');
  $top      = get_field('top')['top'];
  $link     = get_field('link')['link'];
  $footer   = get_field('footer', 2);

  get_part('nav');
  get_part('top', [
    'show_title' => true,
    'bg'         => $top['top_image'],
    'text_align' => $top['align'],
    'title'      => $top['title'],
  ]);
?>

<div class="beige-brown-wrapper">
  <div class="rsep"></div>
  <?php
    get_part('text-full', ['text' => $top['text']]);
    for ($i = 0; $i < count($sections) - 1; $i++) {
    ?>
  <div class="rsep"></div>
  <?php
    $term = get_term_by('slug', 'sauna', 'tags');
      get_part('2-col-with-pic', [
        'facilities' => $sections[$i]['list'],
        'title'      => $sections[$i]['title'],
        'text'       => $sections[$i]['text'],
        'image'      => $sections[$i]['image'],
        'button'     => [
          'text' => $sections[$i]['link']['text'],
          'link' => get_link_url($sections[$i]['link']),
        ],
        'pic_right'  => $i % 2,
        'maskColor'  => get_mask_color('beige'),
      ]);
    }
  ?>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep"></div>
  <div class="rsep less-768"></div>
  <div class="rsep less-768"></div>
</div>

<div class="pale-wrapper">
  <div class="r"></div>
  <div class="overlap"></div>
  <div class="rel">
    <?php
      $term = get_term_by('slug', 'sauna', 'tags');
      $last = count($sections) - 1;
      get_part('2-col-with-pic', [
        'facilities' => $sections[$last]['list'],
        'title'      => $sections[$last]['title'],
        'text'       => $sections[$last]['text'],
        'image'      => $sections[$last]['image'],
        'button'     => [
          'text' => $sections[$last]['link']['text'],
          'link' => get_link_url($sections[$last]['link']),
        ],
        'pic_right'  => $last % 2,
        'maskColor'  => get_mask_color('pale'),
        'isOverlap'  => true,
      ]);
    ?>
  </div>
  <div class="rsep"></div>
  <div class="text-center">
    <a href="<?=get_link_url($link)?>">
      <button><?=$link['text']?></button>
    </a>
  </div>
  <div class="rmik"></div>
</div>

<?php
  get_part('full-width-image', [
    'image' => $footer['image'], 'ratio' => 16 / 9,
  ]);
?>

<div class="green-wrapper">
  <?php
    $footer = get_field('footer', 2);
    get_part('footer-video', [
      'source' => $footer['video'],
      'text'   => $footer['text']]);
  ?>
  <div class="rsep"></div>
  <?php get_part('contact-info');?>
  <div class="rsep"></div>
</div>

<?php
  get_part('map-block');
  get_footer();
?>
