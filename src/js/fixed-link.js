const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
const fixedLinkContainer = $('.fixed-link-container');
let isFixed = false;

const fixedOrAbs = (index, scrollItem) => {
  const currentFixedLink = $(fixedLink[index]);
  const currentFixedLinkH = currentFixedLink.height();
  if (
    widok.s < scrollItem.offset ||
    scrollItem.offset + scrollItem.height - currentFixedLinkH < widok.s
  ) {
    if (isFixed) {
      isFixed = false;
      currentFixedLink.removeClass('fixed');
      if (scrollItem.offset + scrollItem.height - currentFixedLinkH < widok.s) {
        currentFixedLink.css({
          bottom: scrollItem.height - currentFixedLinkH, // + resepHeight
        });
      } else if (widok.s < scrollItem.offset) {
        currentFixedLink.css({
          bottom: 0, // resepHeight
        });
      }
    }
  } else {
    if (!isFixed) {
      isFixed = true;
      currentFixedLink.addClass('fixed');
      currentFixedLink.css({
        bottom: 0, // resepHeight
      });
    }
  }
};

$.each(fixedLinkContainer, (index, element) => {
  console.log(index, element);
  createScrollItem(element, {
    onScroll: fixedOrAbs(index, element),
  });
});
