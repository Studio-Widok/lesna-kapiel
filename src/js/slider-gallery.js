const $ = require('cash-dom');
const widok = require('./widok');
const createSlider = require('./widok-slider');
const createLightbox = require('./widok-lightbox');
const Masonry = require('masonry-layout');

function onImageChange() {
  var imageSrc =
    imageSrc === undefined ? this.$element.data('full-image') : imageSrc;

  this.parent.$containerIn.find('.image-container').css({
    backgroundImage: 'none',
  });

  this.parent.$containerIn.find('.image-container').css({
    backgroundImage: 'url(' + imageSrc + ')',
  });
  setTimeout(() => {
    if (this.parent.currentLb === this.id) {
      this.parent.$containerIn.find('.image-container').css({
        opacity: 1,
      });
    }
  }, 300);
  this.onScreen = true;
}

function onImageActivate() {
  onImageResize.call(this);
  onImageChange.call(this);
}

function onImageResize() {
  var h = h === undefined ? this.$element.data('height') : h;
  var w = w === undefined ? this.$element.data('width') : w;

  if (w / h > widok.w / widok.h) {
    h *= widok.w / w;
    w = widok.w;
  } else {
    w *= widok.h / h;
    h = widok.h;
  }
  h *= 0.95;
  w *= 0.95;
  this.parent.$containerIn.css({
    left: (widok.w - w) / 2,
    top: (widok.h - h) / 2,
    width: w,
    height: h,
  });
}

const masonryContainer = document.querySelector('.masonry');

let masonry = new Masonry(masonryContainer, {
  itemSelector: '.gallery-item',
  resize: true,
  transitionDuration: 0,
  percentPosition: true,
});

function onMasonryChange() {
  masonry.layout();
}

createSlider({
  wrap: '.slider-gallery',
  useKeys: true,
  shouldHaveBullets: false,
  arrowPrev: '.slider-arrows-container .arrow-left',
  arrowNext: '.slider-arrows-container .arrow-right',
  duration: 600,
});

const singleLb = createLightbox({
  items: '.single-slide',
  container: '#lb-container-image',
  onChange: onImageChange,
  onActivate: onImageActivate,
  onResize: onImageResize,
  hasArrows: true,
  hasExit: true,
  exitClass: '#lb-container-image .close-lb',
});

const masonryLb = createLightbox({
  items: '.masonry-icon',
  container: '#lb-container-masonry',
  onChange: onMasonryChange,
  onActivate: onMasonryChange,
  onResize: onMasonryChange,
  hasExit: true,
});

$('.gallery-item').on('click', function () {
  const id = $(this).data('iterator');
  masonryLb.deactive();
  singleLb.active(id);
});
