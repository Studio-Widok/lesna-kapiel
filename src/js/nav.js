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
  if (!isLangOpen || event?.fromLanguageDropdown) return;
  langDropdownElement.removeClass('open');
  document.removeEventListener('click', langClose);
  isLangOpen = false;
}

function langOpen() {
  if (isLangOpen) return;
  langDropdownElement.addClass('open');
  document.addEventListener('click', langClose);
  isLangOpen = true;
  lastLangOpen = new Date().getTime();
}

const langDropdownElement = $('.language-dropdown');
let isLangOpen = false;
let lastLangOpen = 0;

$('.language-dropdown .lang-title').on('mouseenter', langOpen);
$('.language-dropdown .lang-title').on('touchstart', () => {
  if (new Date().getTime() - lastLangOpen < 100) return;
  if (isLangOpen) langClose();
  else langOpen();
});
$('.language-dropdown').on('mouseleave', langClose);

langDropdownElement.on('click', event => {
  event.fromLanguageDropdown = true;
});