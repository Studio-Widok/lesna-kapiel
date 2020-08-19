<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta property="og:image"
    content="<?php echo esc_url(get_template_directory_uri()); ?>/img/ogimg.png" />
  <?php wp_head();?>

  <?php if (is_front_page()): ?>

  <script
    src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDh1cBvGlHA4BwCGsecfiBhgEdi80meJYM">
  </script>
  <script>
  window.onload = function() {
    const myLatLng = {
      lat: 50.8027153,
      lng: 15.6555119,
    }
    var options = {
      center: myLatLng,
      zoom: 15,
      disableDefaultUI: true,
      zoomControl: false,
      gestureHandling: 'cooperative',
      scrollwheel: false,
    };
    var div = document.getElementById('gmap');
    var map = new google.maps.Map(div, options);
  //   var image =
  //     '<?=esc_url(get_template_directory_uri());?>/media/pin.png';
  //   var marker = new google.maps.Marker({
  //     position: myLatLng,
  //     map: map,
  //     icon: {
  //       url: image,
  //       scaledSize: new google.maps.Size(90, 100),
  //       // scaledSize: new google.maps.Size(80, 80),
  //       anchor: new google.maps.Point(35, 105)
  //     }
  //   });
  }
  </script>
  <?php endif;?>

</head>

<body <?php body_class();?>>
