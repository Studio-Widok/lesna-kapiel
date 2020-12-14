const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem');
const widok = require('./widok');

$('.cake-frame').each((index, element) => {
  // createScrollItem($(element).parent('.cake'), {
  //   isActive: false,
  //   onScroll: scrollItem => {
  //     if (scrollItem.offset + scrollItem.height < widok.s + widok.h) {
  //       if (!scrollItem.options.isActive) {
  //         scrollItem.element.addClass('active');
  //         scrollItem.options.isActive = true;
  //       }
  //     } else {
  //       if (scrollItem.options.isActive) {
  //         scrollItem.element.removeClass('active');
  //         scrollItem.options.isActive = false;
  //       }
  //     }
  //   },
  // });
});
