const $ = require('./cash.min.js');

const nav = () => {
  $('#burger').on('click', () => {
    $('#nav').toggleClass('opened');
  });
}

module.exports = nav;