const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
const fixedLinkContainer = $('.fixed-link-container');

const fixedOrAbs = (scrollItem, isLayoutChange = false) => {
  const currentFixedLink = scrollItem.options.currentFixedLink;
  const currentFixedLinkH = scrollItem.options.currentFixedLinkH;
  const currentFixedLinkW = scrollItem.options.currentFixedLinkW;
  if (
    scrollItem.offset + currentFixedLinkH + widok.em > widok.s + widok.h ||
    scrollItem.offset + scrollItem.height < widok.s + widok.h
  ) {
    if (isLayoutChange || scrollItem.options.isFixed) {
      scrollItem.options.isFixed = false;
      currentFixedLink.removeClass('fixed');
      if (scrollItem.offset + scrollItem.height < widok.s + widok.h) {
        currentFixedLink.css({
          top: scrollItem.height - currentFixedLinkW - widok.em,
          bottom: 'auto',
        });
      } else if (
        scrollItem.offset + currentFixedLinkH + widok.em >
        widok.s + widok.h
      ) {
        currentFixedLink.css({
          bottom: 'auto',
          top: currentFixedLinkH - currentFixedLinkW,
        });
      }
    }
  } else {
    if (isLayoutChange || !scrollItem.options.isFixed) {
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
  const currentFixedLink = $(fixedLink[index]);
  const item = createScrollItem(e, {
    onScroll: scrollItem => fixedOrAbs(scrollItem),
    isFixed: false,
    currentFixedLink,
    currentFixedLinkH: currentFixedLink.height(),
    currentFixedLinkW: currentFixedLink.width(),
  });

  item._onResize = () => {
    Object.getPrototypeOf(item)._onResize.call(item);
    item.options.currentFixedLinkH = item.options.currentFixedLink.height();
    item.options.currentFixedLinkW = item.options.currentFixedLink.width();
    fixedOrAbs(item, true);
  };
});
