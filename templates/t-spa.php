<?php /*Template Name: spa*/
  get_header();

  $sections = get_field('sections');

  get_part('nav');
  get_part('top', array(
    'show_title' => true,
  ));
?>

<div class="green-wrapper">
  <div class="rsep"></div>
  <?php get_part('text-full', array('text' => get_field('text')));?>

  <?php for ($i = 0; $i < count($sections); $i++) {?>

  <div class="rsep"></div>

  <?php
    get_part('2-col-with-pic', array(
      'title'     => $sections[$i]['title'],
      'text'      => $sections[$i]['text'],
      'image'     => $sections[$i]['image'],
      'button'    => array(
        'text' => 'apartamenty z prywatną sauną',
        'link' => '',
      ),
      'pic_right' => $i % 2,
    ));
  }?>


  <div class="rsep"></div>
</div>

<?php get_footer();?>
