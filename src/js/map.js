module.exports = () => {
  const script = document.createElement('script');
  script.type = 'text/javascript';
  script.src =
    // 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDh1cBvGlHA4BwCGsecfiBhgEdi80meJYM'; // widok.studio
    'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDXMpRObII3oqqVm11NwzmtbDRwYOZPVY8'; // lesna-kapiel.com
  document.head.appendChild(script);

  script.addEventListener('load', () => {
    const myLatLng = {
      lat: 50.7714079,
      lng: 15.7803477,
    };
    const colors = {
      dark: '#294133',
      light: '#33583c',
      labelStroke: '#419d8c',
      label: '#8a9992',
      roads: '#3b5d49',
    };
    const options = {
      center: myLatLng,
      zoom: 15,
      disableDefaultUI: true,
      zoomControl: true,
      gestureHandling: 'cooperative',
      scrollwheel: false,
      styles: [
        {
          featureType: 'all',
          elementType: 'labels.text.fill',
          stylers: [
            {
              saturation: 36,
            },
            {
              color: colors.label,
            },
            {
              lightness: '-43',
            },
          ],
        },
        {
          featureType: 'all',
          elementType: 'labels.text.stroke',
          stylers: [
            {
              visibility: 'on',
            },
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-70',
            },
          ],
        },
        {
          featureType: 'all',
          elementType: 'labels.icon',
          stylers: [
            {
              visibility: 'on',
            },
            {
              hue: '#243e1a',
            },
            {
              saturation: '-63',
            },
            {
              gamma: '0.6',
            },
          ],
        },
        {
          featureType: 'administrative',
          elementType: 'geometry.fill',
          stylers: [
            {
              color: colors.dark,
            },
          ],
        },
        {
          featureType: 'administrative',
          elementType: 'geometry.stroke',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-66',
            },
            {
              weight: 1.2,
            },
          ],
        },
        {
          featureType: 'administrative',
          elementType: 'labels.text',
          stylers: [
            {
              lightness: '-63',
            },
          ],
        },
        {
          featureType: 'administrative',
          elementType: 'labels.text.fill',
          stylers: [
            {
              lightness: '43',
            },
            {
              color: colors.label,
            },
          ],
        },
        {
          featureType: 'administrative',
          elementType: 'labels.text.stroke',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-69',
            },
          ],
        },
        {
          featureType: 'landscape',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.light,
            },
            {
              lightness: '-15',
            },
          ],
        },
        {
          featureType: 'poi',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.dark,
            },
            {
              lightness: '-13',
            },
            {
              gamma: '1',
            },
          ],
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [
            {
              color: colors.label,
            },
          ],
        },
        {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [
            {
              color: colors.label,
            },
            {
              lightness: '13',
            },
          ],
        },
        {
          featureType: 'road',
          elementType: 'labels.text.stroke',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-66',
            },
          ],
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.fill',
          stylers: [
            {
              color: colors.dark,
            },
            {
              lightness: '14',
            },
          ],
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.stroke',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-70',
            },
            {
              weight: 0.2,
            },
          ],
        },
        {
          featureType: 'road.arterial',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.dark,
            },
            {
              lightness: '0',
            },
          ],
        },
        {
          featureType: 'road.local',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.roads,
            },
            {
              lightness: '3',
            },
          ],
        },
        {
          featureType: 'transit',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.dark,
            },
            {
              lightness: '-59',
            },
          ],
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [
            {
              color: colors.dark,
            },
            {
              lightness: '6',
            },
          ],
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-45',
            },
          ],
        },
        {
          featureType: 'water',
          elementType: 'labels.text.stroke',
          stylers: [
            {
              color: colors.labelStroke,
            },
            {
              lightness: '-62',
            },
          ],
        },
      ],
    };
    const div = document.getElementById('gmap');
    const map = new google.maps.Map(div, options);
    const image = baseUrl + '/media/pin.png';
    new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: {
        url: image,
        scaledSize: new google.maps.Size(45, 50),
        anchor: new google.maps.Point(22, 50),
      },
    });
  });
};
