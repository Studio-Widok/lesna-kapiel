const $ = require('cash-dom');

const moreButton = $('#atrraction-more');
const verticalImageTextMore768 = $(
  '.vertical-image-text.vertical-image-more-768'
);
const verticalImageText = $('.vertical-image-text');
let isMore = false;

moreButton.on('click', () => {
  verticalImageTextMore768.toggleClass('show-more');
  if (!isMore) {
    moreButton.html(moreButton.data('less'));
    verticalImageTextMore768.css({ height: verticalImageText.height() });
    isMore = true;
  } else {
    moreButton.html(moreButton.data('more'));
    verticalImageTextMore768.css({ height: 0 });
    isMore = false;
  }
});

window.addEventListener('afterLayoutChange', function () {
  if (isMore) {
    verticalImageTextMore768.css({ height: verticalImageText.height() });
  } else {
    verticalImageTextMore768.css({ height: 0 });
  }
});
