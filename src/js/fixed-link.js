const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
let isFixed = false;

const fixedOrAbs = scrollItem => {
  console.log(scrollItem.isOnScreen);
  if (
    widok.s < scrollItem.offset ||
    scrollItem.offset + scrollItem.height - infoSectionScrollHeight < widok.s
  ) {
    if (isFixed) {
      isFixed = false;
      infoSectionScroll.removeClass('fixed');
      if (
        scrollItem.offset + scrollItem.height - infoSectionScrollHeight <
        widok.s
      ) {
        infoSectionScroll.css({
          top: scrollItem.height - infoSectionScrollHeight + rsepHeight,
        });
      } else if (widok.s < scrollItem.offset) {
        infoSectionScroll.css({
          top: rsepHeight,
        });
      }
    }
  } else {
    if (!isFixed) {
      isFixed = true;
      infoSectionScroll.addClass('fixed');
      infoSectionScroll.css({
        top: rsepHeight,
      });
    }
  }
};

console.log(fixedLink);

$.each(fixedLink, (index, element) => {
  console.log(element);
  createScrollItem(element, {
    onScroll: fixedOrAbs,
  });
});
