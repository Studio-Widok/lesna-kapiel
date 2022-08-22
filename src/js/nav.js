const $ = require('cash-dom');

$('#burger').on('click', () => {
  $('#nav').toggleClass('opened');
  $('body').toggleClass('nav-opened');
});

$('.nav-link-scroll').on('click', event => {
  event.preventDefault();
  const href = $(event.currentTarget).attr('href');
  const target = $(href).offset().top - 100;
  window.scrollTo({ top: target, behavior: 'smooth' });
});

// language switcher
function langClose(event) {
  if (event?.fromLanguageDropdown) return;
  langDropdownElement.removeClass('open');
  document.removeEventListener('click', langClose);
}

const langDropdownElement = $('.language-dropdown');

$('.language-dropdown .lang-title').on('click', event => {
  if (langDropdownElement.hasClass('open')) {
    langClose();
  } else {
    langDropdownElement.addClass('open');
    document.addEventListener('click', langClose);
  }
});

langDropdownElement.on('click', event => {
  event.fromLanguageDropdown = true;
});