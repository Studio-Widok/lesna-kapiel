const $ = require('cash-dom');

const moreButton = $('#atrraction-more');
const verticalImageTextMore768 = $(
  '.vertical-image-text.vertical-image-more-768'
);
const verticalImageText = $('.vertical-image-text');
let isMore = false;

moreButton.on('click', function () {
  verticalImageTextMore768.toggleClass('show-more');
  console.log(this.clientHeight);
  if (!isMore) {
    moreButton.html(moreButton.data('less'));
    $('.vertical-image-text.vertical-image-more-768').each((index, element) => {
      $(element).css({ height: element.scrollHeight });
    });
    isMore = true;
  } else {
    moreButton.html(moreButton.data('more'));
    verticalImageTextMore768.css({ height: 0 });
    isMore = false;
  }
});

window.addEventListener('afterLayoutChange', function () {
  if (isMore) {
    $('.vertical-image-text.vertical-image-more-768').each((index, element) => {
      $(element).css({ height: element.scrollHeight });
    });
  } else {
    verticalImageTextMore768.css({ height: 0 });
  }
});
