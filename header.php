<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <?php
    $url = get_template_directory_uri();
    if (is_front_page()) {
      $ogtitle = get_bloginfo('name');
    } else {
      $ogtitle = get_the_title();
    }
  ?>
  <meta charset="<?php bloginfo('charset');?>">
  <meta property="og:image"
    content="<?=get_template_directory_uri()?>/media/favicon.png" />
  <meta property="og:title" content="<?=$ogtitle?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?=wp_get_canonical_url()?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png"
    href="<?=get_template_directory_uri()?>/media/favicon.png" />
  <link rel="preload" as="font" crossorigin="anonymous"
    href="<?=esc_url(get_template_directory_uri())?>/dist/85bbd9fa6903761409df.otf">
  <link rel="preload" as="font" crossorigin="anonymous"
    href="<?=esc_url(get_template_directory_uri())?>/dist/7122fd45230cb4bd0280.ttf">
  <link rel="preload" as="font" crossorigin="anonymous"
    href="<?=esc_url(get_template_directory_uri())?>/dist/b479bff6b23cfa18129c.ttf">

  <?php wp_head();?>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"
    integrity="sha512-suUtSPkqYmFd5Ls30Nz6bjDX+TCcfEzhFfqjijfdggsaFZoylvTj+2odBzshs0TCwYrYZhQeCgHgJEkncb2YVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
  const $ = jQuery;
  </script>
  <script type="text/javascript"
    src="https://panel.hotres.pl/public/api/hotres_v4.js"></script>

  <!-- Google Tag Manager -->
  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-P4PS862');
  </script>
  <!-- End Google Tag Manager -->

</head>

<body <?php body_class();?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe
      src="https://www.googletagmanager.com/ns.html?id=GTM-P4PS862" height="0"
      width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
