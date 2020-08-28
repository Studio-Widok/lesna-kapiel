<div class="footer-video-section content col-2-no-pic">
  <div class="flex flex-column flex-justify-center flex-align-center">
    <div class="column">
      <div class="video-wrapper rel">
        <div id="footer-video-overlay"
          class="video-overlay flex flex-align-center flex-justify-center">
          <div class="play-button flex">
            <div class="uppercase flex flex-align-center">Play Video</div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
              <path d="M10 20L90 50L10 80z" />
            </svg>
          </div>
        </div>
        <video id="footer-video" data-paused="true" src="<?=$source['url']?>"
          loop></video>
      </div>

    </div>
    <div class="column">
      <div class="big-title handwrite">
        <?=$text?>
      </div>
    </div>

  </div>
</div>
