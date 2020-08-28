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
  onActive();
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
  this.parent.$containerIn.css({
    left: (widok.w - w) / 2,
    top: (widok.h - h) / 2,
    width: w,
    height: h,
  });
}

const masonryContainer = document.querySelector('.masonry');

const masonry = new Masonry(masonryContainer, {
  columnWidth: '.gallery-sizer',
  itemSelector: '.gallery-item',
  resize: true,
  transitionDuration: 0,
  percentPosition: true,
});

function onMasonryActive() {
  onActive();
  onMasonryChange();
}

function onMasonryChange() {
  masonry.layout();
}

function onActive() {
  $('body').addClass('lightbox-opened');
}

function onDeactive() {
  $('body').removeClass('lightbox-opened');
}

createSlider({
  wrap: '.slider-gallery',
  useKeys: true,
  shouldHaveBullets: false,
  arrowPrev: '.slider-arrows-container .arrow-left',
  arrowNext: '.slider-arrows-container .arrow-right',
  duration: 600,
  loop: 'true',
});

const singleLb = createLightbox({
  items: '.single-slide',
  container: '#lb-container-image',
  onChange: onImageChange,
  onActivate: onImageActivate,
  onResize: onImageResize,
  onDeactive: onDeactive,
  hasArrows: true,
  hasExit: true,
  exitClass: '#lb-container-image .close-lb',
  loop: true,
});

const masonryLb = createLightbox({
  items: '.masonry-icon',
  container: '#lb-container-masonry',
  onChange: onMasonryChange,
  onActivate: onMasonryActive,
  onDeactive: onDeactive,
  onResize: onMasonryChange,
  hasExit: true,
});

$('.gallery-item-in').on('click', function () {
  const id = $(this).data('iterator');
  singleLb.active(id);
});

$('#lb-container-masonry .lb').on('click', function (event) {
  if (event.target.className !== 'cake') {
    masonryLb.deactive();
  }
});
