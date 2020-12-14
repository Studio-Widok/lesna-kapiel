<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta property="og:image"
    content="<?=get_template_directory_uri()?>/media/favicon.png" />
  <link rel="icon" type="image/png"
    href="<?=get_template_directory_uri()?>/media/favicon.png" />
  <?php wp_head();?>

  <?php if (is_front_page()
      || is_page_template('templates/projects.php')
      || is_page_template('templates/t-atrakcje.php')
      || is_page_template('templates/t-nasza-idea.php')
      || is_page_template('templates/t-spa.php')
      || is_page_template('templates/t-kontakt.php')
      || is_singular('apartment')
  ): ?>

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
      zoom: 16,
      disableDefaultUI: true,
      zoomControl: false,
      gestureHandling: 'cooperative',
      scrollwheel: false,
      styles: [{
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [{
              "saturation": 36
            },
            {
              "color": "#4e5c49"
            },
            {
              "lightness": "-43"
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [{
              "visibility": "on"
            },
            {
              "color": "#419d8c"
            },
            {
              "lightness": "-70"
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [{
              "visibility": "on"
            },
            {
              "hue": "#243e1a"
            },
            {
              "saturation": "-63"
            },
            {
              "gamma": "0.6"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "-17"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-66"
            },
            {
              "weight": 1.2
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "labels.text",
          "stylers": [{
            "lightness": "-63"
          }]
        },
        {
          "featureType": "administrative",
          "elementType": "labels.text.fill",
          "stylers": [{
              "lightness": "43"
            },
            {
              "color": "#4e5c49"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "labels.text.stroke",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-69"
            }
          ]
        },
        {
          "featureType": "landscape",
          "elementType": "geometry",
          "stylers": [{
              "color": "#335942"
            },
            {
              "lightness": "-15"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "-13"
            },
            {
              "gamma": "1"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [{
            "color": "#4e5c49"
          }]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.fill",
          "stylers": [{
              "color": "#4e5c49"
            },
            {
              "lightness": "13"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.stroke",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-66"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "14"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-70"
            },
            {
              "weight": 0.2
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "0"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [{
              "color": "#3b5d49"
            },
            {
              "lightness": "3"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "geometry",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "-59"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [{
              "color": "#293d31"
            },
            {
              "lightness": "6"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-45"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.stroke",
          "stylers": [{
              "color": "#419d8c"
            },
            {
              "lightness": "-62"
            }
          ]
        }
      ]
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
