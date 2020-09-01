const videoOverlay = document.getElementById('footer-video-overlay');
const video = document.getElementById('footer-video');

videoOverlay.addEventListener('click', () => {
  if (video.paused) {
    video.play();
    videoOverlay.classList.add('non-active');
  } else {
    video.pause();
    videoOverlay.classList.remove('non-active');
  }
});
