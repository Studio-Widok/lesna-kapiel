const $ = require('cash-dom');

const moreButton = $('#atrraction-more');
let isMore = true;

moreButton.on('click', () => {
  $('.vertical-image-text.more-768').toggleClass('show-more');
  if (isMore) {
    moreButton.html(moreButton.data('less'));
    isMore = false;
  } else {
    moreButton.html(moreButton.data('more'));
    isMore = true;
  }
});
