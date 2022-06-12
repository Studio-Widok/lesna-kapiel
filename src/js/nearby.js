import $ from 'cash-dom';

$('.bike-popup-open').on('click', () => {
  $('#bike-popup-container').addClass('open');
});

$('#bike-popup-close').on('click', () => {
  $('#bike-popup-container').removeClass('open');
});

$('#bike-popup').on('click', event => {
  event.isOnPopup = true;
});

$('#bike-popup-container').on('click', event => {
  if (event.isOnPopup) return;
  $('#bike-popup-container').removeClass('open');
});
