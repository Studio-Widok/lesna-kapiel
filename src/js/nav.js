const nav = () => {
  $('#burger').on('click', () => {
    $('#nav').toggleClass('opened');
  });
}

module.exports = nav;