const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
const fixedLinkContainer = $('.fixed-link-container');

const fixedOrAbs = (index, scrollItem) => {
  const currentFixedLink = scrollItem.options.currentFixedLink;
  const currentFixedLinkH = scrollItem.options.currentFixedLinkH;
  if (
    widok.s < scrollItem.offset - scrollItem.height ||
    scrollItem.offset - currentFixedLinkH < widok.s
  ) {
    if (scrollItem.options.isFixed) {
      scrollItem.options.isFixed = false;
      currentFixedLink.removeClass('fixed');
      if (scrollItem.offset - currentFixedLinkH < widok.s) {
        currentFixedLink.css({
          top: scrollItem.height - currentFixedLinkH,
          bottom: 'auto',
        });
      } else if (widok.s < scrollItem.offset - scrollItem.height) {
        currentFixedLink.css({
          bottom: 'auto',
          top: currentFixedLinkH,
        });
      }
    }
  } else {
    if (!scrollItem.options.isFixed) {
      scrollItem.options.isFixed = true;
      currentFixedLink.addClass('fixed');
      currentFixedLink.css({
        bottom: '1em',
        top: 'auto',
      });
    }
  }
};

$.each(fixedLinkContainer, (index, e) => {
  createScrollItem(e, {
    onScroll: scrollItem => fixedOrAbs(index, scrollItem),
    isFixed: false,
    currentFixedLink: $(fixedLink[index]),
    currentFixedLinkH: $(fixedLink[index]).height(),
  });
});
