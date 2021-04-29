const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');

const videoOverlay = $('#footer-video-overlay');
const video = document.getElementById('footer-video');
let isPaused = false;
let isMuted = true;
let isInteracted = false;

if (video) {
  videoOverlay.on('click', () => {
    isInteracted = true;
    if (video.paused) {
      isPaused = false;
      video.play();
      videoOverlay.addClass('non-active');
    } else if (isMuted) {
      isMuted = false;
      video.muted = isMuted;
    } else {
      isPaused = true;
      isMuted = true;
      video.pause();
      video.muted = isMuted;
      videoOverlay.removeClass('non-active');
    }
  });

  createScrollItem(videoOverlay, {
    onScroll: scrollItem => {
      if (scrollItem.isOnScreen && !isInteracted) {
        video.play();
        videoOverlay.addClass('non-active');
        isInitialized = true;
      } else {
        video.pause();
        videoOverlay.removeClass('non-active');
      }
    },
  });
}
