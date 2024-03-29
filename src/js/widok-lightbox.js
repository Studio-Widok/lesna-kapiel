/**
 * add new Lightbox
 * @param {object} options extra options
 * @param {selector} options.container lightbox container
 * @param {selector} options.items single element which activate lightbox
 * @param {boolean} options.hasArrows does lightbox have arrows
 * @param {boolean} options.hasExit does lightbox have exit icon
 * @param {function} options.onActivate callback function which is executed on activate
 * @param {function} options.onDeactivate callback function which is executed on deactivate
 * @param {function} options.onChange callback function which is executed on change
 * @param {function} options.onResize callback function which is executed on resize
 * @param {selector} options.exitClass name of custom exit class
 * @param {boolean} options.loop is images are looped
 * @returns {object} Lightbox
 * containerIn '.lb'
 * arrows '.arrow-left' '.arrow-right'
 * exit '.close-lb'
 */

const $ = require('cash-dom');

const createLightbox = (function () {
  class SingleLightbox {
    constructor(i, e, parent) {
      this.parent = parent;
      this.$element = $(e);
      this.id = i;
      this.onScreen = false;

      this.$element.on('click', () => {
        this.parent.active(this.id);
      });
    }

    destroy() {
      this.$element.off('click');
    }
  }

  class Lightbox {
    constructor(options) {
      this.options = options;
      this.$container = $(this.options.container);
      this.$containerIn = this.$container.find('.lb');
      this.$items = $(this.options.items);
      this.hasArrows =
        this.options.hasArrows === undefined ? false : this.options.hasArrows;
      this.hasExit =
        this.options.hasExit === undefined ? false : this.options.hasExit;
      this.onScreen = false;
      this.lightboxCollection = [];
      this.currentLb = 0;
      this.loop = this.options.loop || false;

      if (this.hasArrows) {
        this.arrowLeft = this.$container.find('.arrow-left');
        this.arrowRight = this.$container.find('.arrow-right');
        this.isLeftHidden = false;
        this.isRightHidden = false;
      }

      if (this.hasExit) {
        if (this.options.exitClass) {
          this.exit = $(this.options.exitClass);
        } else {
          this.exit = this.$container.find('.close-lb');
        }

        this.exit.on('click', () => {
          this.deactive();
        });
      }

      this.$items.map((i, e) => {
        let singleLb = new SingleLightbox(i, e, this);
        this.lightboxCollection.push(singleLb);
      });

      this.$container.on('click', () => {
        this.deactive();
      });

      this.$containerIn.on('click', e => {
        e.stopPropagation();
      });

      $(document).on('keyup', e => {
        if (e.keyCode === 27) this.deactive();
      });

      if (this.hasArrows) {
        $(document).on('keyup', e => {
          if (e.keyCode === 37) this.prevLb();
          else if (e.keyCode === 39) this.nextLb();
        });

        this.arrowLeft.on('click', e => {
          e.stopPropagation();
          this.prevLb();
        });
        this.arrowRight.on('click', e => {
          e.stopPropagation();
          this.nextLb();
        });
      }

      window.addEventListener('layoutChange', () => {
        this.resize();
      });
    }

    active(id) {
      if (!this.onScreen) {
        this.onScreen = true;
        this.$container.removeClass('hidden');
        setTimeout(() => {
          this.$container.addClass('active');
        }, 0);

        this.currentLb = id;
        this.checkArrows();

        if (this.options.onActivate !== undefined) {
          this.options.onActivate.call(this.lightboxCollection[id]);
        }
      }
    }

    deactive() {
      if (this.onScreen) {
        this.onScreen = false;
        this.$container.removeClass('active');
        setTimeout(() => {
          this.$container.addClass('hidden');
        }, 300);
        if (this.options.onDeactivate !== undefined) {
          this.options.onDeactivate.call(this);
        }
      }
    }

    change(id) {
      this.lightboxCollection[this.currentLb].onScreen = false;
      this.currentLb = id;
      this.checkArrows();

      if (this.options.onChange !== undefined) {
        this.options.onChange.call(this.lightboxCollection[this.currentLb]);
      }
    }

    resize() {
      if (this.options.onResize !== undefined) {
        this.options.onResize.call(this.lightboxCollection[this.currentLb]);
      }
    }

    nextLb() {
      if (this.loop && this.$items.length - 1 === this.currentLb) {
        this.change(0);
      }
      if (this.onScreen && !this.isRightHidden) {
        this.change(this.currentLb + 1);
      }
    }
    prevLb() {
      if (this.loop && this.currentLb === 0) {
        this.change(this.$items.length - 1);
      }
      if (this.onScreen && !this.isLeftHidden) {
        this.change(this.currentLb - 1);
      }
    }

    checkArrows() {
      if (this.hasArrows && this.onScreen && !this.loop) {
        if (this.currentLb + 1 === this.lightboxCollection.length) {
          this.isRightHidden = true;
          this.arrowRight.addClass('hidden');
        } else if (this.isRightHidden) {
          this.isRightHidden = false;
          this.arrowRight.removeClass('hidden');
        }
        if (this.currentLb === 0) {
          this.isLeftHidden = true;
          this.arrowLeft.addClass('hidden');
        } else if (this.isLeftHidden) {
          this.isLeftHidden = false;
          this.arrowLeft.removeClass('hidden');
        }
      }
    }

    recreate(items) {
      this.lightboxCollection.map(singleLightbox => singleLightbox.destroy());
      this.lightboxCollection = [];
      if (items === undefined) {
        this.$items = $(this.options.items);
      } else {
        this.$items = $(items);
      }
      this.$items.map((i, e) => {
        let singleLb = new SingleLightbox(i, e, this);
        this.lightboxCollection.push(singleLb);
      });
    }
  }

  window.addEventListener('afterLayoutChange', this.resize);

  return function (options) {
    const lb = new Lightbox(options);
    return lb;
  };
})();

if (typeof module !== 'undefined') module.exports = createLightbox;
