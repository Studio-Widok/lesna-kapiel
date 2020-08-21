const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
const fixedLinkContainer = $('.fixed-link-container');

const fixedOrAbs = (scrollItem, isLayoutChange = false) => {
  const currentFixedLink = scrollItem.options.currentFixedLink;
  const currentFixedLinkH = scrollItem.options.currentFixedLinkH;
  if (
    scrollItem.offset + currentFixedLinkH + 16 > widok.s + widok.h ||
    scrollItem.offset + scrollItem.height < widok.s + widok.h
  ) {
    if (isLayoutChange || scrollItem.options.isFixed) {
      scrollItem.options.isFixed = false;
      currentFixedLink.removeClass('fixed');
      if (scrollItem.offset + scrollItem.height < widok.s + widok.h) {
        currentFixedLink.css({
          top: scrollItem.height - currentFixedLinkH,
          bottom: 'auto',
        });
      } else if (
        scrollItem.offset + currentFixedLinkH + 16 >
        widok.s + widok.h
      ) {
        currentFixedLink.css({
          bottom: 'auto',
          top: currentFixedLinkH,
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

const scrollItems = [];

$.each(fixedLinkContainer, (index, e) => {
  const item = createScrollItem(e, {
    onScroll: scrollItem => fixedOrAbs(scrollItem),
    isFixed: false,
    currentFixedLink: $(fixedLink[index]),
    currentFixedLinkH: $(fixedLink[index]).height(),
    currentFixedLinkW: $(fixedLink[index]).width(),
  });

  scrollItems.push(item);

  item._onResize = () => {
    Object.getPrototypeOf(item)._onResize.call(item);
  };
});

window.addEventListener('afterLayoutChange', function () {
  scrollItems.map(e => {
    fixedOrAbs(e, true);
  });
});
