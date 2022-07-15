<?php
  $title   = $title ?? '';
  $text    = $text ?? '';
  $classes = $classes ?? '';
  if ($__index) {
    return;
  }

?>

<?php if (!empty($title)) {?>
<div class="text-center fade">
  <div class="big-title handwrite"><?=$title?></div>
  <div class="r"></div>
  <div class="r"></div>
</div>
<?php }?>

<?php if (false) { // custom hotres popup ?>
<form action="https://panel.hotres.pl/v4_step1" target="_blank"
  class="hotresChooser <?=$classes?>" id="hotresChooser" method="get">

  <input type="hidden" name="oid" id="hotresOid" value="2447" />
  <input type="hidden" name="lang" id="hotresLang" value="" />
  <input type="text" name="arrival" id="hotresArrival" value="2022-04-01" />
  <input type="text" name="departure" id="hotresDeparture" value="2022-04-03" />
  <input type="text" name="adults" value="2" />

  <button id="hotresButtonChooser">submit</button>
</form>
<?php }?>

<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css"
  integrity="sha512-ioRJH7yXnyX+7fXTQEKPULWkMn3CqMcapK0NNtCN8q//sW7ZeVFcbMJ9RvX99TwDg6P8rAH2IqUSt2TLab4Xmw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/*calendarCss START*/




#mainSearchField {
  position: absolute;
  bottom: 120px;
  left: 0px;
  width: 100%;
  z-index: 9;
  text-align: center;
}




#mainSearchField .button {
  height: 30px;
  line-height: 30px;
  font-size: 10px;
  float: right;
  background: #9aa485;
  padding: 0 10px;
  color: #fff;
  border-radius: 2px;
}

.disabled {
  opacity: 0.4 !important;
}

.datesBox:after {
  padding: 0;
  margin: 0;
  position: absolute;
  height: 60px;
  line-height: 60px;
  top: 0px;
  opacity: 0.7;
  right: 18px;
  font-size: 15px;
  font-family: 'Font Awesome 5 Free';
  width: 20px;
  height: 20px;
  content: '\f133';
}

.chooserBox {
  height: 60px;
  overflow: hidden;
  color: #707070;
  text-align: left;
  font-size: 12px;
  cursor: pointer;
  line-height: 60px;
  padding: 0px 20px;
  position: relative;
  border-right: 1px solid #eee;
  position: relative;
  background: #fff;
}

.chooserBox:hover {
  background: #faf8f8;
}

.chooserBox big {
  display: block;
  font-size: 33px;
  color: #018a76db;
  font-weight: 500;
  padding: 0px;
  margin: 0px;
  line-height: 60px;
  height: 60px;
  position: absolute;
  top: 0px;
  left: 20px;
}

.chooserBox p {
  margin: 0;
  color: ;
  padding: 0;
  height: auto;
  text-transform: uppercase;
  position: absolute;
  top: 13px;
  left: 70px;
  line-height: 20px;
  font-weight: 600;
}

.chooserBox p i {
  font-style: normal;
}

.chooserBox span {
  margin: 0;
  color: ;
  padding: 0;
  position: absolute;
  top: 28px;
  left: 70px;
  line-height: 20px;
  color: #808080;
  font-size: 10px;
}

.personBox .calBtnIcon {
  position: absolute;
  top: 0;
  right: 20px;
  font-size: 13px;
  line-height: 60px;
  height: 60px;
}

#mainSearchForm {
  max-width: 860px;
  color: #000;
}

#mainSearchForm .button_accept {
  position: relative;
  height: 60px;
  line-height: 60px;
  width: 100%;
  background: #9aa485 !important;
  color: #fff;
  border: transparent;
  padding: 0 15px;
  font-size: 12.6px;
  left: 0px;
  font-weight: 500;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: 1px;
}

#mainSearchForm .button_accept:hover {
  background: #afa084;
}

#mainSearchForm .button_accept i {
  right: 0;
  position: absolute;
  top: 0;
  opacity: 0.6;
  font-size: 12px;
  height: 60px;
  line-height: 60px;
  padding: 0 20px;
  background: rgba(255, 255, 255, 0.12156862745098039);
}

#mainSearchForm .bg_wrap {
  background: #fff;
}

#mainSearchForm .row .columns {
  padding-left: 0rem;
  padding-right: 0rem;
  position: relative;
}

.bookingItemForm {
  padding: 20px;
  background: rgba(0, 0, 0, .1) !important;
  margin: 20px 0px;
}

#greenSearchBooking #mainSearchForm {
  background: #eee !important;
  margin-bottom: 20px;
  color: #303030;
}

#mainSearchField input,
#mainSearchField button,
#mainSearchField select {
  cursor: pointer;
}

.calendar {
  position: relative;
}

.calendar input {
  cursor: pointer;
}

.overlay_bookingselect {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(48, 28, 29, 0.85);
  z-index: 99999999999;
  overflow: hidden;
  display: none;
}

.overlay_bookingselect svg {
  width: 20px;
  height: 20px;
  position: fixed;
  right: 5%;
  top: 10%;
  cursor: pointer;
}

.overlay_bookingselect svg * {
  fill: #fff !important;
}

.chooserCalendarBox {
  position: absolute;
  top: 60px;
  left: 0px;
  width: 60%;
  height: 0px;
  overflow: hidden;
  z-index: 2;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
  opacity: 0;
  font-size: 13px;
  transition: all 0.15s ease-out 0s;
  -webkit-transition: all 0.15s ease-out 0s;
  -moz-transition: all 0.15s ease-out 0s;
}

.person_chooser_box {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 0px;
  overflow: hidden;
  z-index: 2;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
  border-top: 1px solid #d1d1d1;
  opacity: 0;
  background: #fff;
  transition: all 0.15s ease-out 0s;
  -webkit-transition: all 0.15s ease-out 0s;
  -moz-transition: all 0.15s ease-out 0s;
  padding: 20px;
}

.person_chooser_box_show {
  height: auto;
  opacity: 1;
  z-index: 999999999;
}

.chooserPersonBoxItem {
  margin-bottom: 15px;
}

.chooserPersonBoxItem .row {
  max-width: none;
  margin-left: 0;
  margin-right: 0;
}

.chooserPersonBoxItem .chooserCntWrap input,
.chooserPersonBoxItem .chooserCntWrap select,
.chooserPersonBoxItem .chooserCntWrap textarea {
  color: #000;
  height: 25px;
  font-weight: 600;
  line-height: 25px;
  text-align: center;
  outline: none;
  width: 100%;
  margin-bottom: 0;
  padding: 0px 0px;
  display: inline-block;
  letter-spacing: 1px;
  border-radius: 0px;
  border: 0px;
  font-size: 12px;
  background: transparent;
  cursor: pointer;
}

.chooserMinus,
.chooserPlus {
  cursor: pointer;
  width: 25px;
  height: 25px;
  border: 0px;
  line-height: 25px;
  border: 1px solid rgba(0, 0, 0, .15);
  box-shadow: 1px 1px 1px rgba(0, 0, 0, .05);
  border-radius: 100%;
  margin: 0;
  font-size: 9px;
  color: #404040;
  padding: 0;
  text-align: center;
  display: block;
}

.chooserMinus:hover,
.chooserPlus:hover {
  color: #018a76db;
  background: #f1f1f1;
  border-color: #018a76db;
}

.chooserPersonLabel {
  font-size: 11px;
  padding-left: 20px;
  font-weight: 500;
}

.chooserPersonLabel i {
  position: absolute;
  top: 0px;
  left: 0px;
  font-size: 13px;
  opacity: 0.8;
}

.chooserPersonLabel span {
  font-size: 11px;
  display: block;
  letter-spacing: 0;
  color: #b3b3b3;
  line-height: 11px;
}

.personSummary {
  margin-top: 20px;
  text-align: right;
}

.text_in {
  font-size: 12px;
  font-weight: 500;
  margin-bottom: 2px;
}

.text_in i {
  font-size: 8px;
}

.chooserCalendarContent {
  background: #fff;
  padding: 20px;
}

.inline {
  display: inline-block;
  height: 60px;
}

.chooserCalendarBoxShow {
  height: auto;
  opacity: 1;
  background: #fff;
  z-index: 999999999;
}

.chooserInfo {
  color: ;
  font-weight: 400;
}

.chooserClear {
  color: #909090;
  cursor: pointer;
  height: 30px;
  line-height: 30px;
}

.chooserCalendar {
  width: 100%;
}

.chooserCalendarWrap {
  clear: both;
  margin-bottom: 20px;
}

.chooserCalendarNav {
  position: relative;
  z-index: 5;
}

.chooserCalendarPrev {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border: 1px solid #ccc;
  border-radius: 3px;
  color: #404040;
  text-align: center;
  position: absolute;
  top: 5px;
  left: 0px;
  cursor: pointer;
}

.chooserCalendarNext {
  position: absolute;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border: 1px solid #ccc;
  border-radius: 3px;
  color: #404040;
  text-align: center;
  position: absolute;
  top: 5px;
  right: 0px;
  cursor: pointer;
}

.chooserCalendar>div {
  width: 30px;
  float: left;
  height: 36px;
  line-height: 34px;
  text-align: center;
  padding: 0px;
  color: #303030;
  font-weight: bold;
  background-color: #fff;
  border-right: 1px solid rgba(0, 0, 0, .05);
  border-bottom: 1px solid rgba(0, 0, 0, .05);
  background-repeat: no-repeat;
  background-position: center center;
  position: relative;
  cursor: pointer;
}

.chooserCalendarMonth {
  text-align: center;
  font-size: 13px;
  height: 40px;
  line-height: 40px;
  font-weight: bold;
  color: #404040;
}

.chooserDayTitle {
  background: #fafafa !important;
  color: #808080 !important;
  font-size: 12px !important;
  font-weight: 400 !important;
}

.rSel {
  transition: all 0.15s ease-out 0s;
  -webkit-transition: all 0.15s ease-out 0s;
  -moz-transition: all 0.15s ease-out 0s;
}

.rSel:hover {
  background: #caf1ce;
}

.chCalDis:hover {
  background: #f1caca;
  cursor: unset;
}

.chCalDis {
  color: #ddd !important;
  font-weight: 100 !important;
}

.chCalDis:before {
  content: '';
  position: absolute;
  left: 30%;
  right: 0;
  top: 18px;
  height: 1px;
  width: 40%;
  background: #ddd;
  transform: rotate(40deg);
}

.chCalRangeSelect {
  background: #9aa485 !important;
  color: #fff !important;
}

.chArrival::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  z-index: 0;
  border-right: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-top: 10px solid #fff;
  border-left: 10px solid #fff;
}

.chDeparture {
  border-right: 1px solid #fff !important;
}

.chDeparture::after {
  content: "";
  position: absolute;
  bottom: -1px;
  right: 0px;
  display: block;
  z-index: 0;
  border-left: 10px solid transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid #fff;
  border-right: 10px solid #fff;
}

.chArrivalInfo,
.chDepartureInfo {
  position: absolute;
  top: -12px;
  left: -12px;
  z-index: 999;
  background: #242424;
  border-radius: 3px;
  font-size: 9px;
  padding: 0px 5px;
  height: 20px;
  line-height: 20px;
  z-index: 999;
  color: #fff;
}

.chDepartureInfo {
  top: inherit;
  left: inherit;
  bottom: -12px;
  right: -12px;
}


/*calendarCss END*/

.txt-left {
  text-align: left;
}

.chooserClear {
  text-align: left;
}

#mainSearchField .row {
  max-width: 900px;
  margin: auto;
  padding: 0;
}



#mainSearchField .button {
  font-size: 12px;
  cursor: pointer;
  margin-top: 20px;

}

.txt-right {
  text-align: right;
}

.chooserCalendarItemWrap p {
  margin: 0;
  padding: 0;
}

.chooserCalendarItemWrap {
  padding: 5px;
}


#mainSearchField .columns {
  margin: 0;
  padding: 0;
  width: 100%;
}


#mainSearchField .medium-6,
#mainSearchField .small-6 {
  float: left;
  width: 50%;
}

#mainSearchField .medium-5 {
  float: left;
  width: 33%;
}


#mainSearchField .medium-4,
#mainSearchField .small-4 {
  float: left;
  width: 33%;
}



#mainSearchField .medium-3 {
  float: left;
  width: 25%;
}


#mainSearchField .small-7 {
  float: left;
  width: 60%;
}

#mainSearchField .small-5 {
  float: left;
  width: 40%;
}


#mainSearchField .small-8 {
  float: left;
  width: 66%;
}




/*SLICK*/


.slick-list {

  position: relative;

  display: block;
  overflow: hidden;
  height: 100%;
  margin: 0;
  padding: 0 !important;
}

.slick-list:focus {
  outline: none;
}

.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);

}

.slick-track {
  position: relative;
  top: 0;
  left: 0;
  height: 100%;
  display: block;
}

.slick-track:before,
.slick-track:after {
  display: table;

  content: '';
}

.slick-track:after {
  clear: both;
}

.slick-loading .slick-track {
  visibility: hidden;
}

.slick-slide {
  display: none;
  float: left;

  height: 100%;
  min-height: 1px;
}

[dir='rtl'] .slick-slide {
  float: right;
}

.slick-slide.slick-loading img {
  display: none;
}

.slick-slide.dragging img {
  pointer-events: none;
}

.slick-initialized .slick-slide {
  display: block;
}

.slick-loading .slick-slide {
  visibility: hidden;
}

.slick-vertical .slick-slide {
  display: block;

  height: auto;

  border: 1px solid transparent;
}

.slick-arrow.slick-hidden {
  display: none;
}

@media only screen and (max-width: 700px) {
  #mainSearchField {
    width: 60%;
    left: 15%;
    bottom: 10px;
  }

  #mainSearchForm .button_accept {
    left: 0;
  }

  .show-for-medium {
    display: none;

  }

  #mainSearchField .medium-3 {
    width: 100%;
  }

}

</style>
<!--mainSearchStart-->
<div id="mainSearchField">

  <div class="row">
    <div class="columns">

      <script>
      var setDates = false;
      </script>



      <form id="mainSearchForm" action="/rezerwacja" method="get">

        <input type="hidden" name="departure" id="departure"
          value="2020-05-23" />
        <input type="hidden" name="arrival" id="arrival" value="2020-05-22" />



        <div class="row">
          <div class="columns medium-6   show-for-medium">


            <div class="row">
              <div class="small-6 columns">
                <div class="chooserBox datesBox" id="arrivalBox">Przyjazd</div>

              </div>
              <div class="small-6 columns">
                <div class="chooserBox datesBox" id="departureBox">Wyjazd </div>

              </div>
            </div>

          </div>


          <div class="columns medium-3 show-for-medium">

            <div class="chooserBox personBox">



              <big id="cnt_adult_txt">2</big>
              <p id="cnt_details_txt">Dorośli</p>
              <span id="cnt_rooms_txt">bez dzieci</span>



              <div class="calBtnIcon"><i class="fas fa-chevron-down"></i></div>


            </div>

            <div style="position:relative">

              <div class="person_chooser_box">

                <div class="chooserPersonBoxItem">
                  <div class="row">
                    <div class="small-7 columns txt-left">

                      <div class="chooserPersonLabel">
                        <i class="fas fa-male" style="font-size:20px;"></i>
                        Dorośli
                      </div>



                    </div>



                    <div class="small-5 columns">


                      <div class="row  chooserCntWrap">
                        <div class="small-4 columns">
                          <a class="chooserMinus"><i
                              class="fas fa-minus"></i></a>
                        </div>
                        <div class="small-4 columns">
                          <input type="text" readonly="readonly" value="2"
                            id="adults" name="adults" class="chooserCnt">
                        </div>
                        <div class="small-4 columns">
                          <a class="chooserPlus"><i class="fas fa-plus"></i></a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>



                <div class="chooserPersonBoxItem">
                  <div class="row">
                    <div class="small-7 columns txt-left">

                      <div class="chooserPersonLabel">
                        <i class="fas fa-child"></i>
                        <label>Wiek 0-1</label>
                        <span> dziecko</span>

                      </div>
                    </div>

                    <div class="small-5 columns">
                      <div class="row  chooserCntWrap">
                        <div class="small-4 columns">
                          <a class="chooserMinus"><i
                              class="fas fa-minus"></i></a>
                        </div>
                        <div class="small-4 columns">
                          <input type="text" readonly="readonly" value="0"
                            id="child1" name="child1" class="chooserCnt">
                        </div>
                        <div class="small-4 columns">
                          <a class="chooserPlus"><i class="fas fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="chooserPersonBoxItem">
                  <div class="row">
                    <div class="small-7 columns txt-left">

                      <div class="chooserPersonLabel">
                        <i class="fas fa-child"></i>
                        <label>Wiek 2-5</label>
                        <span> dziecko</span>

                      </div>
                    </div>

                    <div class="small-5 columns">
                      <div class="row  chooserCntWrap">
                        <div class="small-4 columns">
                          <a class="chooserMinus"><i
                              class="fas fa-minus"></i></a>
                        </div>
                        <div class="small-4 columns">
                          <input type="text" readonly="readonly" value="0"
                            id="child2" name="child2" class="chooserCnt">
                        </div>
                        <div class="small-4 columns">
                          <a class="chooserPlus"><i class="fas fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="chooserPersonBoxItem">
                  <div class="row">
                    <div class="small-7 columns txt-left">

                      <div class="chooserPersonLabel">
                        <i class="fas fa-child"></i>
                        <label>Wiek 6-17</label>
                        <span> dziecko</span>

                      </div>
                    </div>

                    <div class="small-5 columns">
                      <div class="row  chooserCntWrap">
                        <div class="small-4 columns">
                          <a class="chooserMinus"><i
                              class="fas fa-minus"></i></a>
                        </div>
                        <div class="small-4 columns">
                          <input type="text" readonly="readonly" value="0"
                            id="child3" name="child3" class="chooserCnt">
                        </div>
                        <div class="small-4 columns">
                          <a class="chooserPlus"><i class="fas fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="personSummary">

                  <div class="button chooserPersonBtn"
                    onclick="$('.chooserBox').removeClass('disabled');$('.person_chooser_box').removeClass('person_chooser_box_show');">
                    Wybierz</div>


                </div>


              </div>


            </div>

          </div>



          <div class="columns medium-3 txt-left">

            <div onclick="$('#mainSearchForm').submit();"
              class="expand button_accept">
              Rezerwacja
            </div>

          </div>

        </div>




      </form>


      <div style="position:relative">

        <div class="chooserCalendarBox">
          <div class="chooserCalendarContent">

            <div class="chooserCalendarNav">
              <div class="row">
                <div class="columns">
                  <div style="position:relative">
                    <a class="chooserCalendarPrev">&nbsp;<i
                        class="fas fa-chevron-left"></i>&nbsp;</a>
                    <a class="chooserCalendarNext">&nbsp;<i
                        class="fas fa-chevron-right"></i>&nbsp;</a>
                  </div>
                </div>
              </div>
            </div>



            <div class="chooserCalendarWrap">

              <div class="chooserSlickCalendar">

              </div>
            </div>



            <div class="row">
              <div class="columns small-4">
                <div class="chooserClear"><i class="fas fa-times"></i> Wyczyść
                </div>
              </div>

              <div class="columns small-8 txt-right">
                <div class="chooserInfo">Wybierz datę przyjazdu</div>

              </div>
            </div>


          </div>
        </div>
      </div>



    </div>
  </div>
</div>
<!--mainSearchEnd-->
<script async defer>
! function(i) {
  "use strict";
  "function" == typeof define && define.amd ? define(["jquery"], i) :
    "undefined" != typeof exports ? module.exports = i(require("jquery")) : i(
      jQuery)
}(function(i) {
  "use strict";
  var e = window.Slick || {};
  (e = function() {
    var e = 0;
    return function(t, o) {
      var s, n = this;
      n.defaults = {
          accessibility: !0,
          adaptiveHeight: !1,
          appendArrows: i(t),
          appendDots: i(t),
          arrows: !0,
          asNavFor: null,
          prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
          nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
          autoplay: !1,
          autoplaySpeed: 3e3,
          centerMode: !1,
          centerPadding: "50px",
          cssEase: "ease",
          customPaging: function(e, t) {
            return i('<button type="button" />').text(t + 1)
          },
          dots: !1,
          dotsClass: "slick-dots",
          draggable: !0,
          easing: "linear",
          edgeFriction: .35,
          fade: !1,
          focusOnSelect: !1,
          focusOnChange: !1,
          infinite: !0,
          initialSlide: 0,
          lazyLoad: "ondemand",
          mobileFirst: !1,
          pauseOnHover: !0,
          pauseOnFocus: !0,
          pauseOnDotsHover: !1,
          respondTo: "window",
          responsive: null,
          rows: 1,
          rtl: !1,
          slide: "",
          slidesPerRow: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
          speed: 500,
          swipe: !0,
          swipeToSlide: !1,
          touchMove: !0,
          touchThreshold: 5,
          useCSS: !0,
          useTransform: !0,
          variableWidth: !1,
          vertical: !1,
          verticalSwiping: !1,
          waitForAnimate: !0,
          zIndex: 1e3
        }, n.initials = {
          animating: !1,
          dragging: !1,
          autoPlayTimer: null,
          currentDirection: 0,
          currentLeft: null,
          currentSlide: 0,
          direction: 1,
          $dots: null,
          listWidth: null,
          listHeight: null,
          loadIndex: 0,
          $nextArrow: null,
          $prevArrow: null,
          scrolling: !1,
          slideCount: null,
          slideWidth: null,
          $slideTrack: null,
          $slides: null,
          sliding: !1,
          slideOffset: 0,
          swipeLeft: null,
          swiping: !1,
          $list: null,
          touchObject: {},
          transformsEnabled: !1,
          unslicked: !1
        }, i.extend(n, n.initials), n.activeBreakpoint = null, n
        .animType = null, n.animProp = null, n.breakpoints = [], n
        .breakpointSettings = [], n.cssTransitions = !1, n.focussed = !1,
        n.interrupted = !1, n.hidden = "hidden", n.paused = !0, n
        .positionProp = null, n.respondTo = null, n.rowCount = 1, n
        .shouldClick = !0, n.$slider = i(t), n.$slidesCache = null, n
        .transformType = null, n.transitionType = null, n
        .visibilityChange = "visibilitychange", n.windowWidth = 0, n
        .windowTimer = null, s = i(t).data("slick") || {}, n.options = i
        .extend({}, n.defaults, o, s), n.currentSlide = n.options
        .initialSlide, n.originalSettings = n.options, void 0 !== document
        .mozHidden ? (n.hidden = "mozHidden", n.visibilityChange =
          "mozvisibilitychange") : void 0 !== document.webkitHidden && (n
          .hidden = "webkitHidden", n.visibilityChange =
          "webkitvisibilitychange"), n.autoPlay = i.proxy(n.autoPlay, n),
        n.autoPlayClear = i.proxy(n.autoPlayClear, n), n
        .autoPlayIterator = i.proxy(n.autoPlayIterator, n), n
        .changeSlide = i.proxy(n.changeSlide, n), n.clickHandler = i
        .proxy(n.clickHandler, n), n.selectHandler = i.proxy(n
          .selectHandler, n), n.setPosition = i.proxy(n.setPosition, n), n
        .swipeHandler = i.proxy(n.swipeHandler, n), n.dragHandler = i
        .proxy(n.dragHandler, n), n.keyHandler = i.proxy(n.keyHandler, n),
        n.instanceUid = e++, n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, n
        .registerBreakpoints(), n.init(!0)
    }
  }()).prototype.activateADA = function() {
    this.$slideTrack.find(".slick-active").attr({
      "aria-hidden": "false"
    }).find("a, input, button, select").attr({
      tabindex: "0"
    })
  }, e.prototype.addSlide = e.prototype.slickAdd = function(e, t, o) {
    var s = this;
    if ("boolean" == typeof t) o = t, t = null;
    else if (t < 0 || t >= s.slideCount) return !1;
    s.unload(), "number" == typeof t ? 0 === t && 0 === s.$slides.length ?
      i(e).appendTo(s.$slideTrack) : o ? i(e).insertBefore(s.$slides.eq(
        t)) : i(e).insertAfter(s.$slides.eq(t)) : !0 === o ? i(e).prependTo(
        s
        .$slideTrack) : i(e).appendTo(s.$slideTrack), s.$slides = s
      .$slideTrack.children(this.options.slide), s.$slideTrack.children(this
        .options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides
      .each(function(e, t) {
        i(t).attr("data-slick-index", e)
      }), s.$slidesCache = s.$slides, s.reinit()
  }, e.prototype.animateHeight = function() {
    var i = this;
    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !
      1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.animate({
        height: e
      }, i.options.speed)
    }
  }, e.prototype.animateSlide = function(e, t) {
    var o = {},
      s = this;
    s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical &&
      (e = -e), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s
      .$slideTrack.animate({
        left: e
      }, s.options.speed, s.options.easing, t) : s.$slideTrack.animate({
        top: e
      }, s.options.speed, s.options.easing, t) : !1 === s.cssTransitions ? (
        !0 === s.options.rtl && (s.currentLeft = -s.currentLeft), i({
          animStart: s.currentLeft
        }).animate({
          animStart: e
        }, {
          duration: s.options.speed,
          easing: s.options.easing,
          step: function(i) {
            i = Math.ceil(i), !1 === s.options.vertical ? (o[s
                .animType] = "translate(" + i + "px, 0px)", s
              .$slideTrack.css(o)) : (o[s.animType] =
              "translate(0px," + i + "px)", s.$slideTrack.css(o))
          },
          complete: function() {
            t && t.call()
          }
        })) : (s.applyTransition(), e = Math.ceil(e), !1 === s.options
        .vertical ? o[s.animType] = "translate3d(" + e + "px, 0px, 0px)" :
        o[s.animType] = "translate3d(0px," + e + "px, 0px)", s.$slideTrack
        .css(o), t && setTimeout(function() {
          s.disableTransition(), t.call()
        }, s.options.speed))
  }, e.prototype.getNavTarget = function() {
    var e = this,
      t = e.options.asNavFor;
    return t && null !== t && (t = i(t).not(e.$slider)), t
  }, e.prototype.asNavFor = function(e) {
    var t = this.getNavTarget();
    null !== t && "object" == typeof t && t.each(function() {
      var t = i(this).slick("getSlick");
      t.unslicked || t.slideHandler(e, !0)
    })
  }, e.prototype.applyTransition = function(i) {
    var e = this,
      t = {};
    !1 === e.options.fade ? t[e.transitionType] = e.transformType + " " + e
      .options.speed + "ms " + e.options.cssEase : t[e.transitionType] =
      "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e
      .options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t)
  }, e.prototype.autoPlay = function() {
    var i = this;
    i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i
      .autoPlayTimer = setInterval(i.autoPlayIterator, i.options
        .autoplaySpeed))
  }, e.prototype.autoPlayClear = function() {
    var i = this;
    i.autoPlayTimer && clearInterval(i.autoPlayTimer)
  }, e.prototype.autoPlayIterator = function() {
    var i = this,
      e = i.currentSlide + i.options.slidesToScroll;
    i.paused || i.interrupted || i.focussed || (!1 === i.options.infinite &&
      (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? i
        .direction = 0 : 0 === i.direction && (e = i.currentSlide - i
          .options.slidesToScroll, i.currentSlide - 1 == 0 && (i
            .direction = 1))), i.slideHandler(e))
  }, e.prototype.buildArrows = function() {
    var e = this;
    !0 === e.options.arrows && (e.$prevArrow = i(e.options.prevArrow)
      .addClass("slick-arrow"), e.$nextArrow = i(e.options.nextArrow)
      .addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e
        .$prevArrow.removeClass("slick-hidden").removeAttr(
          "aria-hidden tabindex"), e.$nextArrow.removeClass(
          "slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr
        .test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options
          .appendArrows), e.htmlExpr.test(e.options.nextArrow) && e
        .$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options
        .infinite && e.$prevArrow.addClass("slick-disabled").attr(
          "aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow)
      .addClass("slick-hidden").attr({
        "aria-disabled": "true",
        tabindex: "-1"
      }))
  }, e.prototype.buildDots = function() {
    var e, t, o = this;
    if (!0 === o.options.dots) {
      for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o
          .options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) t
        .append(i("<li />").append(o.options.customPaging.call(this, o,
          e)));
      o.$dots = t.appendTo(o.options.appendDots), o.$dots.find("li").first()
        .addClass("slick-active")
    }
  }, e.prototype.buildOut = function() {
    var e = this;
    e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)")
      .addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides
      .each(function(e, t) {
        i(t).attr("data-slick-index", e).data("originalStyling", i(t)
          .attr("style") || "")
      }), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e
      .slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e
      .$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e
      .$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack
      .css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options
      .swipeToSlide || (e.options.slidesToScroll = 1), i("img[data-lazy]", e
        .$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(),
      e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses(
        "number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e
      .options.draggable && e.$list.addClass("draggable")
  }, e.prototype.buildRows = function() {
    var i, e, t, o, s, n, r, l = this;
    if (o = document.createDocumentFragment(), n = l.$slider.children(), l
      .options.rows > 1) {
      for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n
          .length / r), i = 0; i < s; i++) {
        var d = document.createElement("div");
        for (e = 0; e < l.options.rows; e++) {
          var a = document.createElement("div");
          for (t = 0; t < l.options.slidesPerRow; t++) {
            var c = i * r + (e * l.options.slidesPerRow + t);
            n.get(c) && a.appendChild(n.get(c))
          }
          d.appendChild(a)
        }
        o.appendChild(d)
      }
      l.$slider.empty().append(o), l.$slider.children().children()
        .children().css({
          width: 100 / l.options.slidesPerRow + "%",
          display: "inline-block"
        })
    }
  }, e.prototype.checkResponsive = function(e, t) {
    var o, s, n, r = this,
      l = !1,
      d = r.$slider.width(),
      a = window.innerWidth || i(window).width();
    if ("window" === r.respondTo ? n = a : "slider" === r.respondTo ? n =
      d : "min" === r.respondTo && (n = Math.min(a, d)), r.options
      .responsive && r.options.responsive.length && null !== r.options
      .responsive) {
      s = null;
      for (o in r.breakpoints) r.breakpoints.hasOwnProperty(o) && (!1 === r
        .originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r
          .breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[
          o]));
      null !== s ? null !== r.activeBreakpoint ? (s !== r
          .activeBreakpoint || t) && (r.activeBreakpoint = s, "unslick" ===
          r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({},
            r.originalSettings, r.breakpointSettings[s]), !0 === e && (r
            .currentSlide = r.options.initialSlide), r.refresh(e)), l = s) :
        (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r
          .unslick(s) : (r.options = i.extend({}, r.originalSettings, r
            .breakpointSettings[s]), !0 === e && (r.currentSlide = r
            .options.initialSlide), r.refresh(e)), l = s) : null !== r
        .activeBreakpoint && (r.activeBreakpoint = null, r.options = r
          .originalSettings, !0 === e && (r.currentSlide = r.options
            .initialSlide), r.refresh(e), l = s), e || !1 === l || r.$slider
        .trigger("breakpoint", [r, l])
    }
  }, e.prototype.changeSlide = function(e, t) {
    var o, s, n, r = this,
      l = i(e.currentTarget);
    switch (l.is("a") && e.preventDefault(), l.is("li") || (l = l.closest(
        "li")), n = r.slideCount % r.options.slidesToScroll != 0, o = n ?
      0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll, e.data
      .message) {
      case "previous":
        s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o,
          r.slideCount > r.options.slidesToShow && r.slideHandler(r
            .currentSlide - s, !1, t);
        break;
      case "next":
        s = 0 === o ? r.options.slidesToScroll : o, r.slideCount > r.options
          .slidesToShow && r.slideHandler(r.currentSlide + s, !1, t);
        break;
      case "index":
        var d = 0 === e.data.index ? 0 : e.data.index || l.index() * r
          .options.slidesToScroll;
        r.slideHandler(r.checkNavigable(d), !1, t), l.children().trigger(
          "focus");
        break;
      default:
        return
    }
  }, e.prototype.checkNavigable = function(i) {
    var e, t;
    if (e = this.getNavigableIndexes(), t = 0, i > e[e.length - 1]) i = e[e
      .length - 1];
    else
      for (var o in e) {
        if (i < e[o]) {
          i = t;
          break
        }
        t = e[o]
      }
    return i
  }, e.prototype.cleanUpEvents = function() {
    var e = this;
    e.options.dots && null !== e.$dots && (i("li", e.$dots).off(
        "click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e
        .interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt,
        e, !1)), !0 === e.options.accessibility && e.$dots.off(
        "keydown.slick", e.keyHandler)), e.$slider.off(
        "focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount >
      e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off(
        "click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off(
        "click.slick", e.changeSlide), !0 === e.options.accessibility && (
        e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e
        .$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e
      .$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e
      .$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list
      .off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off(
        "touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off(
        "click.slick", e.clickHandler), i(document).off(e.visibilityChange,
        e.visibility), e.cleanUpSlideEvents(), !0 === e.options
      .accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e
      .options.focusOnSelect && i(e.$slideTrack).children().off(
        "click.slick", e.selectHandler), i(window).off(
        "orientationchange.slick.slick-" + e.instanceUid, e
        .orientationChange), i(window).off("resize.slick.slick-" + e
        .instanceUid, e.resize), i("[draggable!=true]", e.$slideTrack).off(
        "dragstart", e.preventDefault), i(window).off("load.slick.slick-" +
        e.instanceUid, e.setPosition)
  }, e.prototype.cleanUpSlideEvents = function() {
    var e = this;
    e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list
      .off("mouseleave.slick", i.proxy(e.interrupt, e, !1))
  }, e.prototype.cleanUpRows = function() {
    var i, e = this;
    e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr(
      "style"), e.$slider.empty().append(i))
  }, e.prototype.clickHandler = function(i) {
    !1 === this.shouldClick && (i.stopImmediatePropagation(), i
      .stopPropagation(), i.preventDefault())
  }, e.prototype.destroy = function(e) {
    var t = this;
    t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), i(
        ".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t
      .$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass(
          "slick-disabled slick-arrow slick-hidden").removeAttr(
          "aria-hidden aria-disabled tabindex").css("display", ""), t
        .htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t
      .$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass(
          "slick-disabled slick-arrow slick-hidden").removeAttr(
          "aria-hidden aria-disabled tabindex").css("display", ""), t
        .htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t
      .$slides && (t.$slides.removeClass(
          "slick-slide slick-active slick-center slick-visible slick-current"
        ).removeAttr("aria-hidden").removeAttr("data-slick-index").each(
          function() {
            i(this).attr("style", i(this).data("originalStyling"))
          }), t.$slideTrack.children(this.options.slide).detach(), t
        .$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)
      ), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider
      .removeClass("slick-initialized"), t.$slider.removeClass(
        "slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy",
        [t])
  }, e.prototype.disableTransition = function(i) {
    var e = this,
      t = {};
    t[e.transitionType] = "", !1 === e.options.fade ? e.$slideTrack.css(t) :
      e.$slides.eq(i).css(t)
  }, e.prototype.fadeSlide = function(i, e) {
    var t = this;
    !1 === t.cssTransitions ? (t.$slides.eq(i).css({
      zIndex: t.options.zIndex
    }), t.$slides.eq(i).animate({
      opacity: 1
    }, t.options.speed, t.options.easing, e)) : (t.applyTransition(i), t
      .$slides.eq(i).css({
        opacity: 1,
        zIndex: t.options.zIndex
      }), e && setTimeout(function() {
        t.disableTransition(i), e.call()
      }, t.options.speed))
  }, e.prototype.fadeSlideOut = function(i) {
    var e = this;
    !1 === e.cssTransitions ? e.$slides.eq(i).animate({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }, e.options.speed, e.options.easing) : (e.applyTransition(i), e
      .$slides.eq(i).css({
        opacity: 0,
        zIndex: e.options.zIndex - 2
      }))
  }, e.prototype.filterSlides = e.prototype.slickFilter = function(i) {
    var e = this;
    null !== i && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack
      .children(this.options.slide).detach(), e.$slidesCache.filter(i)
      .appendTo(e.$slideTrack), e.reinit())
  }, e.prototype.focusHandler = function() {
    var e = this;
    e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick",
      "*",
      function(t) {
        t.stopImmediatePropagation();
        var o = i(this);
        setTimeout(function() {
          e.options.pauseOnFocus && (e.focussed = o.is(":focus"), e
            .autoPlay())
        }, 0)
      })
  }, e.prototype.getCurrent = e.prototype.slickCurrentSlide = function() {
    return this.currentSlide
  }, e.prototype.getDotCount = function() {
    var i = this,
      e = 0,
      t = 0,
      o = 0;
    if (!0 === i.options.infinite)
      if (i.slideCount <= i.options.slidesToShow) ++o;
      else
        for (; e < i.slideCount;) ++o, e = t + i.options.slidesToScroll,
          t += i.options.slidesToScroll <= i.options.slidesToShow ? i
          .options.slidesToScroll : i.options.slidesToShow;
    else if (!0 === i.options.centerMode) o = i.slideCount;
    else if (i.options.asNavFor)
      for (; e < i.slideCount;) ++o, e = t + i.options.slidesToScroll, t +=
        i.options.slidesToScroll <= i.options.slidesToShow ? i.options
        .slidesToScroll : i.options.slidesToShow;
    else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i
      .options.slidesToScroll);
    return o - 1
  }, e.prototype.getLeft = function(i) {
    var e, t, o, s, n = this,
      r = 0;
    return n.slideOffset = 0, t = n.$slides.first().outerHeight(!0), !0 ===
      n.options.infinite ? (n.slideCount > n.options.slidesToShow && (n
          .slideOffset = n.slideWidth * n.options.slidesToShow * -1, s = -1,
          !0 === n.options.vertical && !0 === n.options.centerMode && (2 ===
            n.options.slidesToShow ? s = -1.5 : 1 === n.options
            .slidesToShow && (s = -2)), r = t * n.options.slidesToShow * s),
        n.slideCount % n.options.slidesToScroll != 0 && i + n.options
        .slidesToScroll > n.slideCount && n.slideCount > n.options
        .slidesToShow && (i > n.slideCount ? (n.slideOffset = (n.options
          .slidesToShow - (i - n.slideCount)) * n.slideWidth * -1, r = (
          n.options.slidesToShow - (i - n.slideCount)) * t * -1) : (n
          .slideOffset = n.slideCount % n.options.slidesToScroll * n
          .slideWidth * -1, r = n.slideCount % n.options.slidesToScroll *
          t * -1))) : i + n.options.slidesToShow > n.slideCount && (n
        .slideOffset = (i + n.options.slidesToShow - n.slideCount) * n
        .slideWidth, r = (i + n.options.slidesToShow - n.slideCount) * t), n
      .slideCount <= n.options.slidesToShow && (n.slideOffset = 0, r = 0), !
      0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow ?
      n.slideOffset = n.slideWidth * Math.floor(n.options.slidesToShow) /
      2 - n.slideWidth * n.slideCount / 2 : !0 === n.options.centerMode && !
      0 === n.options.infinite ? n.slideOffset += n.slideWidth * Math.floor(
        n.options.slidesToShow / 2) - n.slideWidth : !0 === n.options
      .centerMode && (n.slideOffset = 0, n.slideOffset += n.slideWidth *
        Math.floor(n.options.slidesToShow / 2)), e = !1 === n.options
      .vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r, !
      0 === n.options.variableWidth && (o = n.slideCount <= n.options
        .slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(
          ".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(
          i + n.options.slidesToShow), e = !0 === n.options.rtl ? o[0] ? -
        1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[
          0] ? -1 * o[0].offsetLeft : 0, !0 === n.options.centerMode && (o =
          n
          .slideCount <= n.options.slidesToShow || !1 === n.options
          .infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n
          .$slideTrack.children(".slick-slide").eq(i + n.options
            .slidesToShow + 1), e = !0 === n.options.rtl ? o[0] ? -1 * (n
            .$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ?
          -1 * o[0].offsetLeft : 0, e += (n.$list.width() - o
            .outerWidth()) / 2)), e
  }, e.prototype.getOption = e.prototype.slickGetOption = function(i) {
    return this.options[i]
  }, e.prototype.getNavigableIndexes = function() {
    var i, e = this,
      t = 0,
      o = 0,
      s = [];
    for (!1 === e.options.infinite ? i = e.slideCount : (t = -1 * e.options
        .slidesToScroll, o = -1 * e.options.slidesToScroll, i = 2 * e
        .slideCount); t < i;) s.push(t), t = o + e.options.slidesToScroll,
      o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options
      .slidesToScroll : e.options.slidesToShow;
    return s
  }, e.prototype.getSlick = function() {
    return this
  }, e.prototype.getSlideCount = function() {
    var e, t, o = this;
    return t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o
        .options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o
        .$slideTrack.find(".slick-slide").each(function(s, n) {
          if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft)
            return e = n, !1
        }), Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1) :
      o.options.slidesToScroll
  }, e.prototype.goTo = e.prototype.slickGoTo = function(i, e) {
    this.changeSlide({
      data: {
        message: "index",
        index: parseInt(i)
      }
    }, e)
  }, e.prototype.init = function(e) {
    var t = this;
    i(t.$slider).hasClass("slick-initialized") || (i(t.$slider).addClass(
          "slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t
        .startLoad(), t.loadSlider(), t.initializeEvents(), t
        .updateArrows(), t.updateDots(), t.checkResponsive(!0), t
        .focusHandler()), e && t.$slider.trigger("init", [t]), !0 === t
      .options.accessibility && t.initADA(), t.options.autoplay && (t
        .paused = !1, t.autoPlay())
  }, e.prototype.initADA = function() {
    var e = this,
      t = Math.ceil(e.slideCount / e.options.slidesToShow),
      o = e.getNavigableIndexes().filter(function(i) {
        return i >= 0 && i < e.slideCount
      });
    e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
      "aria-hidden": "true",
      tabindex: "-1"
    }).find("a, input, button, select").attr({
      tabindex: "-1"
    }), null !== e.$dots && (e.$slides.not(e.$slideTrack.find(
      ".slick-cloned")).each(function(t) {
      var s = o.indexOf(t);
      i(this).attr({
        role: "tabpanel",
        id: "slick-slide" + e.instanceUid + t,
        tabindex: -1
      }), -1 !== s && i(this).attr({
        "aria-describedby": "slick-slide-control" + e
          .instanceUid + s
      })
    }), e.$dots.attr("role", "tablist").find("li").each(function(s) {
      var n = o[s];
      i(this).attr({
        role: "presentation"
      }), i(this).find("button").first().attr({
        role: "tab",
        id: "slick-slide-control" + e.instanceUid + s,
        "aria-controls": "slick-slide" + e.instanceUid + n,
        "aria-label": s + 1 + " of " + t,
        "aria-selected": null,
        tabindex: "-1"
      })
    }).eq(e.currentSlide).find("button").attr({
      "aria-selected": "true",
      tabindex: "0"
    }).end());
    for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++)
      e.$slides.eq(s).attr("tabindex", 0);
    e.activateADA()
  }, e.prototype.initArrowEvents = function() {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i
      .$prevArrow.off("click.slick").on("click.slick", {
        message: "previous"
      }, i.changeSlide), i.$nextArrow.off("click.slick").on(
        "click.slick", {
          message: "next"
        }, i.changeSlide), !0 === i.options.accessibility && (i.$prevArrow
        .on("keydown.slick", i.keyHandler), i.$nextArrow.on(
          "keydown.slick", i.keyHandler)))
  }, e.prototype.initDotEvents = function() {
    var e = this;
    !0 === e.options.dots && (i("li", e.$dots).on("click.slick", {
        message: "index"
      }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on(
        "keydown.slick", e.keyHandler)), !0 === e.options.dots && !0 === e
      .options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i
        .proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e
        .interrupt, e, !1))
  }, e.prototype.initSlideEvents = function() {
    var e = this;
    e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e
      .interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e
      .interrupt, e, !1)))
  }, e.prototype.initializeEvents = function() {
    var e = this;
    e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on(
        "touchstart.slick mousedown.slick", {
          action: "start"
        }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
        action: "move"
      }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
        action: "end"
      }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
        action: "end"
      }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), i(
        document).on(e.visibilityChange, i.proxy(e.visibility, e)), !0 === e
      .options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !
      0 === e.options.focusOnSelect && i(e.$slideTrack).children().on(
        "click.slick", e.selectHandler), i(window).on(
        "orientationchange.slick.slick-" + e.instanceUid, i.proxy(e
          .orientationChange, e)), i(window).on("resize.slick.slick-" + e
        .instanceUid, i.proxy(e.resize, e)), i("[draggable!=true]", e
        .$slideTrack).on("dragstart", e.preventDefault), i(window).on(
        "load.slick.slick-" + e.instanceUid, e.setPosition), i(e
        .setPosition)
  }, e.prototype.initUI = function() {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i
        .$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i
      .slideCount > i.options.slidesToShow && i.$dots.show()
  }, e.prototype.keyHandler = function(i) {
    var e = this;
    i.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === i.keyCode &&
      !0 === e.options.accessibility ? e.changeSlide({
        data: {
          message: !0 === e.options.rtl ? "next" : "previous"
        }
      }) : 39 === i.keyCode && !0 === e.options.accessibility && e
      .changeSlide({
        data: {
          message: !0 === e.options.rtl ? "previous" : "next"
        }
      }))
  }, e.prototype.lazyLoad = function() {
    function e(e) {
      i("img[data-lazy]", e).each(function() {
        var e = i(this),
          t = i(this).attr("data-lazy"),
          o = i(this).attr("data-srcset"),
          s = i(this).attr("data-sizes") || n.$slider.attr(
            "data-sizes"),
          r = document.createElement("img");
        r.onload = function() {
          e.animate({
            opacity: 0
          }, 100, function() {
            o && (e.attr("srcset", o), s && e.attr("sizes", s)), e
              .attr("src", t).animate({
                opacity: 1
              }, 200, function() {
                e.removeAttr("data-lazy data-srcset data-sizes")
                  .removeClass("slick-loading")
              }), n.$slider.trigger("lazyLoaded", [n, e, t])
          })
        }, r.onerror = function() {
          e.removeAttr("data-lazy").removeClass("slick-loading")
            .addClass("slick-lazyload-error"), n.$slider.trigger(
              "lazyLoadError", [n, e, t])
        }, r.src = t
      })
    }
    var t, o, s, n = this;
    if (!0 === n.options.centerMode ? !0 === n.options.infinite ? s = (o = n
        .currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options
      .slidesToShow + 2 : (o = Math.max(0, n.currentSlide - (n.options
          .slidesToShow / 2 + 1)), s = n.options.slidesToShow / 2 + 1 + 2 +
        n.currentSlide) : (o = n.options.infinite ? n.options.slidesToShow +
        n.currentSlide : n.currentSlide, s = Math.ceil(o + n.options
          .slidesToShow), !0 === n.options.fade && (o > 0 && o--, s <= n
          .slideCount && s++)), t = n.$slider.find(".slick-slide").slice(o,
        s), "anticipated" === n.options.lazyLoad)
      for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a =
          0; a < n.options.slidesToScroll; a++) r < 0 && (r = n.slideCount -
        1), t = (t = t.add(d.eq(r))).add(d.eq(l)), r--, l++;
    e(t), n.slideCount <= n.options.slidesToShow ? e(n.$slider.find(
        ".slick-slide")) : n.currentSlide >= n.slideCount - n.options
      .slidesToShow ? e(n.$slider.find(".slick-cloned").slice(0, n.options
        .slidesToShow)) : 0 === n.currentSlide && e(n.$slider.find(
        ".slick-cloned").slice(-1 * n.options.slidesToShow))
  }, e.prototype.loadSlider = function() {
    var i = this;
    i.setPosition(), i.$slideTrack.css({
        opacity: 1
      }), i.$slider.removeClass("slick-loading"), i.initUI(),
      "progressive" === i.options.lazyLoad && i.progressiveLazyLoad()
  }, e.prototype.next = e.prototype.slickNext = function() {
    this.changeSlide({
      data: {
        message: "next"
      }
    })
  }, e.prototype.orientationChange = function() {
    var i = this;
    i.checkResponsive(), i.setPosition()
  }, e.prototype.pause = e.prototype.slickPause = function() {
    var i = this;
    i.autoPlayClear(), i.paused = !0
  }, e.prototype.play = e.prototype.slickPlay = function() {
    var i = this;
    i.autoPlay(), i.options.autoplay = !0, i.paused = !1, i.focussed = !1, i
      .interrupted = !1
  }, e.prototype.postSlide = function(e) {
    var t = this;
    t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t
      .animating = !1, t.slideCount > t.options.slidesToShow && t
      .setPosition(), t.swipeLeft = null, t.options.autoplay && t
      .autoPlay(), !0 === t.options.accessibility && (t.initADA(), t
        .options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr(
          "tabindex", 0).focus()))
  }, e.prototype.prev = e.prototype.slickPrev = function() {
    this.changeSlide({
      data: {
        message: "previous"
      }
    })
  }, e.prototype.preventDefault = function(i) {
    i.preventDefault()
  }, e.prototype.progressiveLazyLoad = function(e) {
    e = e || 1;
    var t, o, s, n, r, l = this,
      d = i("img[data-lazy]", l.$slider);
    d.length ? (t = d.first(), o = t.attr("data-lazy"), s = t.attr(
        "data-srcset"), n = t.attr("data-sizes") || l.$slider.attr(
        "data-sizes"), (r = document.createElement("img")).onload =
      function() {
        s && (t.attr("srcset", s), n && t.attr("sizes", n)), t.attr("src",
            o).removeAttr("data-lazy data-srcset data-sizes").removeClass(
            "slick-loading"), !0 === l.options.adaptiveHeight && l
          .setPosition(), l.$slider.trigger("lazyLoaded", [l, t, o]), l
          .progressiveLazyLoad()
      }, r.onerror = function() {
        e < 3 ? setTimeout(function() {
          l.progressiveLazyLoad(e + 1)
        }, 500) : (t.removeAttr("data-lazy").removeClass(
            "slick-loading").addClass("slick-lazyload-error"), l.$slider
          .trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad())
      }, r.src = o) : l.$slider.trigger("allImagesLoaded", [l])
  }, e.prototype.refresh = function(e) {
    var t, o, s = this;
    o = s.slideCount - s.options.slidesToShow, !s.options.infinite && s
      .currentSlide > o && (s.currentSlide = o), s.slideCount <= s.options
      .slidesToShow && (s.currentSlide = 0), t = s.currentSlide, s.destroy(!
        0), i.extend(s, s.initials, {
        currentSlide: t
      }), s.init(), e || s.changeSlide({
        data: {
          message: "index",
          index: t
        }
      }, !1)
  }, e.prototype.registerBreakpoints = function() {
    var e, t, o, s = this,
      n = s.options.responsive || null;
    if ("array" === i.type(n) && n.length) {
      s.respondTo = s.options.respondTo || "window";
      for (e in n)
        if (o = s.breakpoints.length - 1, n.hasOwnProperty(e)) {
          for (t = n[e].breakpoint; o >= 0;) s.breakpoints[o] && s
            .breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;
          s.breakpoints.push(t), s.breakpointSettings[t] = n[e].settings
        } s.breakpoints.sort(function(i, e) {
        return s.options.mobileFirst ? i - e : e - i
      })
    }
  }, e.prototype.reinit = function() {
    var e = this;
    e.$slides = e.$slideTrack.children(e.options.slide).addClass(
        "slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e
      .slideCount && 0 !== e.currentSlide && (e.currentSlide = e
        .currentSlide - e.options.slidesToScroll), e.slideCount <= e.options
      .slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e
      .setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e
      .initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(),
      e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !
        0), !0 === e.options.focusOnSelect && i(e.$slideTrack).children()
      .on(
        "click.slick", e.selectHandler), e.setSlideClasses("number" ==
        typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e
      .focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e
      .$slider.trigger("reInit", [e])
  }, e.prototype.resize = function() {
    var e = this;
    i(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e
      .windowDelay = window.setTimeout(function() {
        e.windowWidth = i(window).width(), e.checkResponsive(), e
          .unslicked || e.setPosition()
      }, 50))
  }, e.prototype.removeSlide = e.prototype.slickRemove = function(i, e, t) {
    var o = this;
    if (i = "boolean" == typeof i ? !0 === (e = i) ? 0 : o.slideCount - 1 :
      !0 === e ? --i : i, o.slideCount < 1 || i < 0 || i > o.slideCount - 1)
      return !1;
    o.unload(), !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack
      .children(this.options.slide).eq(i).remove(), o.$slides = o
      .$slideTrack.children(this.options.slide), o.$slideTrack.children(this
        .options.slide).detach(), o.$slideTrack.append(o.$slides), o
      .$slidesCache = o.$slides, o.reinit()
  }, e.prototype.setCSS = function(i) {
    var e, t, o = this,
      s = {};
    !0 === o.options.rtl && (i = -i), e = "left" == o.positionProp ? Math
      .ceil(i) + "px" : "0px", t = "top" == o.positionProp ? Math.ceil(i) +
      "px" : "0px", s[o.positionProp] = i, !1 === o.transformsEnabled ? o
      .$slideTrack.css(s) : (s = {}, !1 === o.cssTransitions ? (s[o
          .animType] = "translate(" + e + ", " + t + ")", o.$slideTrack
        .css(s)) : (s[o.animType] = "translate3d(" + e + ", " + t +
        ", 0px)", o.$slideTrack.css(s)))
  }, e.prototype.setDimensions = function() {
    var i = this;
    !1 === i.options.vertical ? !0 === i.options.centerMode && i.$list.css({
        padding: "0px " + i.options.centerPadding
      }) : (i.$list.height(i.$slides.first().outerHeight(!0) * i.options
        .slidesToShow), !0 === i.options.centerMode && i.$list.css({
        padding: i.options.centerPadding + " 0px"
      })), i.listWidth = i.$list.width(), i.listHeight = i.$list.height(), !
      1 === i.options.vertical && !1 === i.options.variableWidth ? (i
        .slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow), i
        .$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(
          ".slick-slide").length))) : !0 === i.options.variableWidth ? i
      .$slideTrack.width(5e3 * i.slideCount) : (i.slideWidth = Math.ceil(i
        .listWidth), i.$slideTrack.height(Math.ceil(i.$slides.first()
        .outerHeight(!0) * i.$slideTrack.children(".slick-slide").length
      )));
    var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
    !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide")
      .width(i.slideWidth - e)
  }, e.prototype.setFade = function() {
    var e, t = this;
    t.$slides.each(function(o, s) {
      e = t.slideWidth * o * -1, !0 === t.options.rtl ? i(s).css({
        position: "relative",
        right: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      }) : i(s).css({
        position: "relative",
        left: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      })
    }), t.$slides.eq(t.currentSlide).css({
      zIndex: t.options.zIndex - 1,
      opacity: 1
    })
  }, e.prototype.setHeight = function() {
    var i = this;
    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !
      1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.css("height", e)
    }
  }, e.prototype.setOption = e.prototype.slickSetOption = function() {
    var e, t, o, s, n, r = this,
      l = !1;
    if ("object" === i.type(arguments[0]) ? (o = arguments[0], l =
        arguments[1], n = "multiple") : "string" === i.type(arguments[0]) &&
      (o = arguments[0], s = arguments[1], l = arguments[2],
        "responsive" === arguments[0] && "array" === i.type(arguments[1]) ?
        n = "responsive" : void 0 !== arguments[1] && (n = "single")),
      "single" === n) r.options[o] = s;
    else if ("multiple" === n) i.each(o, function(i, e) {
      r.options[i] = e
    });
    else if ("responsive" === n)
      for (t in s)
        if ("array" !== i.type(r.options.responsive)) r.options
          .responsive = [s[t]];
        else {
          for (e = r.options.responsive.length - 1; e >= 0;) r.options
            .responsive[e].breakpoint === s[t].breakpoint && r.options
            .responsive.splice(e, 1), e--;
          r.options.responsive.push(s[t])
        } l && (r.unload(), r.reinit())
  }, e.prototype.setPosition = function() {
    var i = this;
    i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i
      .getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger(
      "setPosition", [i])
  }, e.prototype.setProps = function() {
    var i = this,
      e = document.body.style;
    i.positionProp = !0 === i.options.vertical ? "top" : "left", "top" === i
      .positionProp ? i.$slider.addClass("slick-vertical") : i.$slider
      .removeClass("slick-vertical"), void 0 === e.WebkitTransition &&
      void 0 === e.MozTransition && void 0 === e.msTransition || !0 === i
      .options.useCSS && (i.cssTransitions = !0), i.options.fade && (
        "number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i
          .options.zIndex = 3) : i.options.zIndex = i.defaults.zIndex),
      void 0 !== e.OTransform && (i.animType = "OTransform", i
        .transformType = "-o-transform", i.transitionType = "OTransition",
        void 0 === e.perspectiveProperty && void 0 === e
        .webkitPerspective && (i.animType = !1)), void 0 !== e
      .MozTransform && (i.animType = "MozTransform", i.transformType =
        "-moz-transform", i.transitionType = "MozTransition", void 0 === e
        .perspectiveProperty && void 0 === e.MozPerspective && (i
          .animType = !1)), void 0 !== e.webkitTransform && (i.animType =
        "webkitTransform", i.transformType = "-webkit-transform", i
        .transitionType = "webkitTransition", void 0 === e
        .perspectiveProperty && void 0 === e.webkitPerspective && (i
          .animType = !1)), void 0 !== e.msTransform && (i.animType =
        "msTransform", i.transformType = "-ms-transform", i.transitionType =
        "msTransition", void 0 === e.msTransform && (i.animType = !1)),
      void 0 !== e.transform && !1 !== i.animType && (i.animType =
        "transform", i.transformType = "transform", i.transitionType =
        "transition"), i.transformsEnabled = i.options.useTransform &&
      null !== i.animType && !1 !== i.animType
  }, e.prototype.setSlideClasses = function(i) {
    var e, t, o, s, n = this;
    if (t = n.$slider.find(".slick-slide").removeClass(
        "slick-active slick-center slick-current").attr("aria-hidden",
        "true"), n.$slides.eq(i).addClass("slick-current"), !0 === n.options
      .centerMode) {
      var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
      e = Math.floor(n.options.slidesToShow / 2), !0 === n.options
        .infinite && (i >= e && i <= n.slideCount - 1 - e ? n.$slides.slice(
            i - e + r, i + e + 1).addClass("slick-active").attr(
            "aria-hidden", "false") : (o = n.options.slidesToShow + i, t
            .slice(o - e + 1 + r, o + e + 2).addClass("slick-active").attr(
              "aria-hidden", "false")), 0 === i ? t.eq(t.length - 1 - n
            .options.slidesToShow).addClass("slick-center") : i === n
          .slideCount - 1 && t.eq(n.options.slidesToShow).addClass(
            "slick-center")), n.$slides.eq(i).addClass("slick-center")
    } else i >= 0 && i <= n.slideCount - n.options.slidesToShow ? n.$slides
      .slice(i, i + n.options.slidesToShow).addClass("slick-active").attr(
        "aria-hidden", "false") : t.length <= n.options.slidesToShow ? t
      .addClass("slick-active").attr("aria-hidden", "false") : (s = n
        .slideCount % n.options.slidesToShow, o = !0 === n.options
        .infinite ? n.options.slidesToShow + i : i, n.options
        .slidesToShow == n.options.slidesToScroll && n.slideCount - i < n
        .options.slidesToShow ? t.slice(o - (n.options.slidesToShow - s),
          o + s).addClass("slick-active").attr("aria-hidden", "false") : t
        .slice(o, o + n.options.slidesToShow).addClass("slick-active").attr(
          "aria-hidden", "false"));
    "ondemand" !== n.options.lazyLoad && "anticipated" !== n.options
      .lazyLoad || n.lazyLoad()
  }, e.prototype.setupInfinite = function() {
    var e, t, o, s = this;
    if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s
      .options.infinite && !1 === s.options.fade && (t = null, s
        .slideCount > s.options.slidesToShow)) {
      for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s
        .options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -=
        1) t = e - 1, i(s.$slides[t]).clone(!0).attr("id", "").attr(
          "data-slick-index", t - s.slideCount).prependTo(s.$slideTrack)
        .addClass("slick-cloned");
      for (e = 0; e < o + s.slideCount; e += 1) t = e, i(s.$slides[t])
        .clone(!0).attr("id", "").attr("data-slick-index", t + s.slideCount)
        .appendTo(s.$slideTrack).addClass("slick-cloned");
      s.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
        i(this).attr("id", "")
      })
    }
  }, e.prototype.interrupt = function(i) {
    var e = this;
    i || e.autoPlay(), e.interrupted = i
  }, e.prototype.selectHandler = function(e) {
    var t = this,
      o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target)
      .parents(".slick-slide"),
      s = parseInt(o.attr("data-slick-index"));
    s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s,
      !1, !0) : t.slideHandler(s)
  }, e.prototype.slideHandler = function(i, e, t) {
    var o, s, n, r, l, d = null,
      a = this;
    if (e = e || !1, !(!0 === a.animating && !0 === a.options
        .waitForAnimate || !0 === a.options.fade && a.currentSlide === i))
      if (!1 === e && a.asNavFor(i), o = i, d = a.getLeft(o), r = a.getLeft(
          a.currentSlide), a.currentLeft = null === a.swipeLeft ? r : a
        .swipeLeft, !1 === a.options.infinite && !1 === a.options
        .centerMode && (i < 0 || i > a.getDotCount() * a.options
          .slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !
        0 !== t ? a.animateSlide(r, function() {
          a.postSlide(o)
        }) : a.postSlide(o));
      else if (!1 === a.options.infinite && !0 === a.options.centerMode && (
        i < 0 || i > a.slideCount - a.options.slidesToScroll)) !1 === a
      .options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r,
        function() {
          a.postSlide(o)
        }) : a.postSlide(o));
    else {
      if (a.options.autoplay && clearInterval(a.autoPlayTimer), s = o < 0 ?
        a.slideCount % a.options.slidesToScroll != 0 ? a.slideCount - a
        .slideCount % a.options.slidesToScroll : a.slideCount + o : o >= a
        .slideCount ? a.slideCount % a.options.slidesToScroll != 0 ? 0 : o -
        a.slideCount : o, a.animating = !0, a.$slider.trigger(
          "beforeChange", [a, a.currentSlide, s]), n = a.currentSlide, a
        .currentSlide = s, a.setSlideClasses(a.currentSlide), a.options
        .asNavFor && (l = (l = a.getNavTarget()).slick("getSlick"))
        .slideCount <= l.options.slidesToShow && l.setSlideClasses(a
          .currentSlide), a.updateDots(), a.updateArrows(), !0 === a.options
        .fade) return !0 !== t ? (a.fadeSlideOut(n), a.fadeSlide(s,
        function() {
          a.postSlide(s)
        })) : a.postSlide(s), void a.animateHeight();
      !0 !== t ? a.animateSlide(d, function() {
        a.postSlide(s)
      }) : a.postSlide(s)
    }
  }, e.prototype.startLoad = function() {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i
        .$prevArrow.hide(), i.$nextArrow.hide()), !0 === i.options.dots && i
      .slideCount > i.options.slidesToShow && i.$dots.hide(), i.$slider
      .addClass("slick-loading")
  }, e.prototype.swipeDirection = function() {
    var i, e, t, o, s = this;
    return i = s.touchObject.startX - s.touchObject.curX, e = s.touchObject
      .startY - s.touchObject.curY, t = Math.atan2(e, i), (o = Math.round(
        180 * t / Math.PI)) < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >=
      0 ? !1 === s.options.rtl ? "left" : "right" : o <= 360 && o >= 315 ? !
      1 === s.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 ===
      s.options.rtl ? "right" : "left" : !0 === s.options.verticalSwiping ?
      o >= 35 && o <= 135 ? "down" : "up" : "vertical"
  }, e.prototype.swipeEnd = function(i) {
    var e, t, o = this;
    if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !
      1, !1;
    if (o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength >
        10), void 0 === o.touchObject.curX) return !1;
    if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o
        .swipeDirection()
      ]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
      switch (t = o.swipeDirection()) {
        case "left":
        case "down":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o
              .getSlideCount()) : o.currentSlide + o.getSlideCount(), o
            .currentDirection = 0;
          break;
        case "right":
        case "up":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o
              .getSlideCount()) : o.currentSlide - o.getSlideCount(), o
            .currentDirection = 1
      }
      "vertical" != t && (o.slideHandler(e), o.touchObject = {}, o.$slider
        .trigger("swipe", [o, t]))
    } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o
      .currentSlide), o.touchObject = {})
  }, e.prototype.swipeHandler = function(i) {
    var e = this;
    if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e
        .options.swipe || !1 === e.options.draggable && -1 !== i.type
        .indexOf("mouse"))) switch (e.touchObject.fingerCount = i
      .originalEvent && void 0 !== i.originalEvent.touches ? i
      .originalEvent.touches.length : 1, e.touchObject.minSwipe = e
      .listWidth / e.options.touchThreshold, !0 === e.options
      .verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e
        .options.touchThreshold), i.data.action) {
      case "start":
        e.swipeStart(i);
        break;
      case "move":
        e.swipeMove(i);
        break;
      case "end":
        e.swipeEnd(i)
    }
  }, e.prototype.swipeMove = function(i) {
    var e, t, o, s, n, r, l = this;
    return n = void 0 !== i.originalEvent ? i.originalEvent.touches : null,
      !(!l.dragging || l.scrolling || n && 1 !== n.length) && (e = l
        .getLeft(l.currentSlide), l.touchObject.curX = void 0 !== n ? n[0]
        .pageX : i.clientX, l.touchObject.curY = void 0 !== n ? n[0].pageY :
        i.clientY, l.touchObject.swipeLength = Math.round(Math.sqrt(Math
          .pow(l.touchObject.curX - l.touchObject.startX, 2))), r = Math
        .round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY,
          2))), !l.options.verticalSwiping && !l.swiping && r > 4 ? (l
          .scrolling = !0, !1) : (!0 === l.options.verticalSwiping && (l
            .touchObject.swipeLength = r), t = l.swipeDirection(),
          void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && (l
            .swiping = !0, i.preventDefault()), s = (!1 === l.options.rtl ?
            1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1),
          !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l
            .touchObject.startY ? 1 : -1), o = l.touchObject.swipeLength, l
          .touchObject.edgeHit = !1, !1 === l.options.infinite && (0 === l
            .currentSlide && "right" === t || l.currentSlide >= l
            .getDotCount() && "left" === t) && (o = l.touchObject
            .swipeLength * l.options.edgeFriction, l.touchObject.edgeHit = !
            0), !1 === l.options.vertical ? l.swipeLeft = e + o * s : l
          .swipeLeft = e + o * (l.$list.height() / l.listWidth) * s, !0 ===
          l.options.verticalSwiping && (l.swipeLeft = e + o * s), !0 !== l
          .options.fade && !1 !== l.options.touchMove && (!0 === l
            .animating ? (l.swipeLeft = null, !1) : void l.setCSS(l
              .swipeLeft))))
  }, e.prototype.swipeStart = function(i) {
    var e, t = this;
    if (t.interrupted = !0, 1 !== t.touchObject.fingerCount || t
      .slideCount <= t.options.slidesToShow) return t.touchObject = {}, !1;
    void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e =
        i.originalEvent.touches[0]), t.touchObject.startX = t.touchObject
      .curX = void 0 !== e ? e.pageX : i.clientX, t.touchObject.startY = t
      .touchObject.curY = void 0 !== e ? e.pageY : i.clientY, t.dragging = !
      0
  }, e.prototype.unfilterSlides = e.prototype.slickUnfilter = function() {
    var i = this;
    null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this
        .options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack),
      i.reinit())
  }, e.prototype.unload = function() {
    var e = this;
    i(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e
      .$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow
      .remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e
      .$nextArrow.remove(), e.$slides.removeClass(
        "slick-slide slick-active slick-visible slick-current").attr(
        "aria-hidden", "true").css("width", "")
  }, e.prototype.unslick = function(i) {
    var e = this;
    e.$slider.trigger("unslick", [e, i]), e.destroy()
  }, e.prototype.updateArrows = function() {
    var i = this;
    Math.floor(i.options.slidesToShow / 2), !0 === i.options.arrows && i
      .slideCount > i.options.slidesToShow && !i.options.infinite && (i
        .$prevArrow.removeClass("slick-disabled").attr("aria-disabled",
          "false"), i.$nextArrow.removeClass("slick-disabled").attr(
          "aria-disabled", "false"), 0 === i.currentSlide ? (i.$prevArrow
          .addClass("slick-disabled").attr("aria-disabled", "true"), i
          .$nextArrow.removeClass("slick-disabled").attr("aria-disabled",
            "false")) : i.currentSlide >= i.slideCount - i.options
        .slidesToShow && !1 === i.options.centerMode ? (i.$nextArrow
          .addClass("slick-disabled").attr("aria-disabled", "true"), i
          .$prevArrow.removeClass("slick-disabled").attr("aria-disabled",
            "false")) : i.currentSlide >= i.slideCount - 1 && !0 === i
        .options.centerMode && (i.$nextArrow.addClass("slick-disabled")
          .attr("aria-disabled", "true"), i.$prevArrow.removeClass(
            "slick-disabled").attr("aria-disabled", "false")))
  }, e.prototype.updateDots = function() {
    var i = this;
    null !== i.$dots && (i.$dots.find("li").removeClass("slick-active")
      .end(), i.$dots.find("li").eq(Math.floor(i.currentSlide / i.options
        .slidesToScroll)).addClass("slick-active"))
  }, e.prototype.visibility = function() {
    var i = this;
    i.options.autoplay && (document[i.hidden] ? i.interrupted = !0 : i
      .interrupted = !1)
  }, i.fn.slick = function() {
    var i, t, o = this,
      s = arguments[0],
      n = Array.prototype.slice.call(arguments, 1),
      r = o.length;
    for (i = 0; i < r; i++)
      if ("object" == typeof s || void 0 === s ? o[i].slick = new e(o[i],
          s) : t = o[i].slick[s].apply(o[i].slick, n), void 0 !== t)
        return t;
    return o
  }
});


var langArr = {
  'de': {
    closeText: "Schließen",
    prevText: "&#x3C;Zurück",
    nextText: "Vor&#x3E;",
    currentText: "Heute",
    monthNames: ["Januar", "Februar", "März", "April", "Mai", "Juni",
      "Juli", "August", "September", "Oktober", "November", "Dezember"
    ],
    monthNamesShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun",
      "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"
    ],
    dayNames: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag",
      "Freitag", "Samstag"
    ],
    dayNamesShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
    dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
    weekHeader: "KW",
    dateFormat: "dd.mm.yy",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ""
  },

  'pl': {
    closeText: "Zamknij",
    prevText: "&#x3C;Poprzedni",
    nextText: "Następny&#x3E;",
    currentText: "Dziś",
    monthNames: ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
      "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad",
      "Grudzień"
    ],
    monthNamesShort: ["Sty", "Lu", "Mar", "Kw", "Maj", "Cze",
      "Lip", "Sie", "Wrz", "Pa", "Lis", "Gru"
    ],
    dayNames: ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek",
      "Piątek", "Sobota"
    ],
    dayNamesShort: ["Nie", "Pn", "Wt", "Śr", "Czw", "Pt", "So"],
    dayNamesMin: ["N", "Pn", "Wt", "Śr", "Cz", "Pt", "So"],
    weekHeader: "Tydz",
    dateFormat: "dd.mm.yy",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ""
  },

  'en': {
    closeText: "Done",
    prevText: "Prev",
    nextText: "Next",
    currentText: "Today",
    monthNames: ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ],
    monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
      "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ],
    dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
      "Friday", "Saturday"
    ],
    dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
    weekHeader: "Wk",
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ""
  }
};




function slideTo(elementId) {

  var sT = $(elementId).offset().top - 300;
  $('html, body').animate({
    scrollTop: sT
  }, 150);

}


function dateToStr(divId, date, lang) {

  var from = date.split("-");
  var f = new Date(from[0], from[1] - 1, from[2]);

  var monthNameLong = langArr[lang]['monthNames'][f.getMonth()];
  var monthNameShort = langArr[lang]['monthNamesShort'][f.getMonth()];

  //var monthName = f.getMonth();

  $(divId).html(' <big>' + f.getDate() +
    ' </big><p><i class="show-for-large">' + monthNameLong +
    '</i></p><span>' + f.getFullYear() + '</span>');

}

function calcNights(from, to) {
  var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

  var fromArr = from.split("-");
  var toArr = to.split("-");

  var firstDate = new Date(fromArr[0], fromArr[1], fromArr[2]);
  var secondDate = new Date(toArr[0], toArr[1], toArr[2]);

  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate
    .getTime()) / (oneDay)));

  return diffDays;
}

function calcTime(from, to) {
  var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

  var fromArr = from.split("-");
  var toArr = to.split("-");

  var firstDate = new Date(fromArr[0], fromArr[1], fromArr[2]);
  var secondDate = new Date(toArr[0], toArr[1], toArr[2]);

  var time = secondDate.getTime() - firstDate.getTime();
  return time;
}






function chooserPM() {
  $(".chooserPlus, .chooserMinus").click(function(e) {



    var parent = $(this).parents('.chooserCntWrap');
    var chooserCnt = parent.find('.chooserCnt');
    var chooserInt = parseInt(chooserCnt.val());

    var min = 0;
    var max = 10;


    if ($(chooserCnt).attr('id') == 'adults') {
      min = 1;
      max = 20;
    }


    if ($(this).hasClass('chooserPlus')) {

      if (chooserInt < max) {
        chooserInt++;
      }
    }

    if ($(this).hasClass('chooserMinus')) {

      if (chooserInt > min) {
        chooserInt--;
      }
    }


    $(chooserCnt).val(chooserInt);


  });




  $('.chooserPersonBtn').on("click", function() {

    //validate childs
    var childrenTxt = '';
    var cntChilds = $('#child').val();
    var cnt_child_1 = parseInt($('#child1').val());
    var cnt_child_2 = parseInt($('#child2').val());
    var cnt_child_3 = parseInt($('#child3').val());

    var childCnt = 0;
    var childArr = [];



    childrenTxt = 'bez dzieci';



    if (cnt_child_1 > 0) {
      childCnt += cnt_child_1;
    }

    if (cnt_child_2 > 0) {
      childCnt += cnt_child_2;
    }

    if (cnt_child_3 > 0) {
      childCnt += cnt_child_3;
    }


    if (childCnt > 0) {
      var childTxt = 'dzieci';
      if (childCnt == 1) {
        childTxt = 'dziecko';
      }
      childrenTxt = childCnt + ' ' + childTxt;
    }



    $('.calBtn').removeClass('unavailable');


    $('#cnt_childs').val(childArr.length);
    $('#cnt_adult_txt').html($('#adults').val());
    $('#cnt_details_txt').html('<strong>Dorośli</strong>');
    $('#cnt_rooms_txt').html(childrenTxt);

    return false;

  });


}


window.addEventListener("load", chooserPM, false);




function calendar(year, month) {

  //transform given number by adding "0" in front of it if length of it == 1.
  function transform(value) {
    return value.toString().length == 1 ? value = "0" + value : value;
  }

  let final_html = "";

  //day cell class name.
  let cellClass = "chCalAvb";

  //today current date.
  let today = new Date();

  //picking given month as a new date.
  let currMonth = new Date(year, month);

  //getting first day of given month.
  let first_month_day = currMonth.getDay();

  //setting empty days amount.
  let empty_days = (first_month_day - 1 < 0) ? 6 : first_month_day - 1;

  //getting month length.
  let days_in_month = new Date(year, month + 1, 0).getDate();


  //month name label with year.
  final_html +=
    '<div class="chooserCalendarItemWrap"><div class="chooserCalendarMonth">' +
    langArr["pl"]["monthNames"][month] + " " + year + "</div>";
  final_html += '<div class="chooserCalendar">';

  //fill names of days.
  for (let i = 1; i <= 7; i++) {
    final_html += "<div class='chooserDayTitle'>" + langArr["pl"][
      "dayNamesShort"
    ][i % 7] + "</div>";
  }
  final_html += "<p style='clear:both'></p>";

  //fill empty days.
  for (let i = 0; i < empty_days; i++) {
    final_html += "<div></div>";
  }

  //all days in month.
  for (let i = 1; i <= days_in_month; i++) {
    if ((i + empty_days - 1) % 7 == 0) {
      final_html += "<p style='clear: both'></p>";
    }
    let day = new Date(year, month, i, 23, 59, 59);

    cellClass = (today > day) ? "chCalDis" : "chCalAvb";

    dateString = year + "-" + transform(month + 1) + "-" + transform(i);

    final_html +=
      "<div class='rSel " +
      cellClass + "' data-date='" + dateString + "'>" + i +
      "</div>";

  }

  while ((empty_days + days_in_month++) % 7 != 0) {
    final_html += "<div></div>";
  }


  final_html += '<p style="clear:both"></p></div>';
  //final_html = document.createRange().createContextualFragment(final_html);

  $(".chooserSlickCalendar").append(final_html);
}

let generated = false;

function renderCalendar() {
  if (!generated) {
    let monthsToRender = 12;

    for (let i = 0; i < monthsToRender; i++) {
      time = new Date();

      //console.log((time.getMonth()+1) + "/1/" + time.getFullYear());
      time = new Date((time.getMonth() + 1) + "/1/" + time.getFullYear());

      time.setMonth(time.getMonth() + i);
      calendar(time.getFullYear(), time.getMonth());
    }
    console.log('Hotres : odpala slick');

    $('.chooserSlickCalendar').slick({
      dots: false,
      infinite: true,
      autoplay: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      'prevArrow': '.chooserCalendarPrev',
      'nextArrow': '.chooserCalendarNext',

      responsive: [{
        breakpoint: 641,
        settings: {
          slidesToShow: 1,
          centerMode: false,
          slidesToScroll: 1
        }
      }]
    });
    generated = true;
  }
}




function onloadJquery() {


  function rangeSelect(arrival, departure) {

    var arrivalDiv = $(".rSel[data-date='" + arrival + "']");
    var departureDiv = $(".rSel[data-date='" + departure + "']");

    var startPosition = $(".chooserCalendarWrap .rSel").index(arrivalDiv);
    var endPosition = $(".chooserCalendarWrap .rSel").index(departureDiv) + 1;
    var rangeItems = $(".chooserCalendarWrap .rSel").slice(startPosition,
      endPosition);

    rangeItems.addClass('chCalRangeSelect');

    arrivalDiv.addClass('chArrival');
    departureDiv.addClass('chDeparture');


    arrivalDiv.append('<div class="chArrivalInfo">Przyjazd</div>');
    departureDiv.append('<div class="chDepartureInfo">Wyjazd</div>');

    $('#arrival').val(arrival);
    $('#departure').val(departure);

  }




  function startHotresCalendar() {

    var startItem = false;
    var endItem = false;
    var setRange = false;
    var nights = 0;

    $(".chooserSlickCalendar").on("click", ".chCalAvb", function(e) {
      e.stopPropagation();
      setRange = !setRange;

      if (setRange) {
        startItem = $(this);
        $(".chooserCalendarWrap .rSel").removeClass(
          'chDeparture chArrival chCalRangeSelect');

        $('.chArrivalInfo').remove();
        $('.chDepartureInfo').remove();

        $(this).addClass('chCalRangeSelect chArrival');
        $(this).append('<div class="chArrivalInfo">Przyjazd</div>');

        $('.chooserInfo').html('Wybierz datę wyjazdu');
        dateToStr('#arrivalBox', startItem.data('date'), 'pl');
        $('#departureBox').html('-');

      } else {
        $(this).addClass('chDeparture');
        $(this).append('<div class="chDepartureInfo">Wyjazd</div>');

        endItem = $(this);

        rangeSelect(startItem.data('date'), endItem.data('date'));

        $('.chooserInfo').html('');
        $('.chooserInfo').html(
          '<div class="button" onclick="$(\'.chooserBox\').removeClass(\'disabled\');$(\'.chooserCalendarBox\').removeClass(\'chooserCalendarBoxShow\');$(\'#mainSearchForm\'); $(\'.bg_wrap\').css(\'opacity\',\'1\');">Wybierz</div>'
        );

        var night = calcNights(startItem.data('date'), endItem.data(
          'date'));

        if (night == 1)
          $('#nightBox').html('<b>' + night + '</b> night');
        else if (night < 5)
          $('#nightBox').html('<b>' + night + '</b> nights');
        else
          $('#nightBox').html('<b>' + night + '</b> nights');


        dateToStr('#departureBox', endItem.data('date'), 'pl');

        var time = calcTime(startItem.data('date'), endItem.data('date'));

        if (time <= 0) {
          $(".chooserCalendarWrap .rSel").removeClass(
            'chDeparture chArrival chCalRangeSelect');
          $('.chooserInfo').html('Wybierz datę przyjazdu');

          $('.chArrivalInfo').hide();
          $('.chDepartureInfo').hide();


          $('#arrivalBox').html('');
          $('#departureBox').html('');
          $('#nightBox').html('');
        }



      }


    });

    $(".chooserSlickCalendar").on("mouseover", ".rSel", function(e) {
      e.stopPropagation();
      if (setRange) {
        var startPosition = $(".chooserCalendarWrap .rSel").index(
          startItem);
        var curPosition = $(".chooserCalendarWrap .rSel").index($(this)) +
          1;

        $(".chooserCalendarWrap .rSel").removeClass('chCalRangeSelect');

        var rangeItems = $(".chooserCalendarWrap .rSel").slice(
          startPosition, curPosition);
        nights = rangeItems.length - 1;

        var isSelectable = true;

        rangeItems.each(function(index) {

          if ($(this).hasClass('chCalDis')) {
            isSelectable = false;
          }

        });


        if (isSelectable) {

          rangeItems.addClass('chCalRangeSelect');
          dateToStr('#arrivalBox', startItem.data('date'), 'pl');

          var last = $('.chCalRangeSelect').last();
          $('.rSel').removeClass('chDeparture');

          if (nights > 1) {
            last.addClass('chDeparture');
          }

        } else {
          setRange = false;

          $('.chooserInfo').html('Wybierz datę wyjazdu');
          $('.chooserInfo').fadeIn();

          $('.chArrivalInfo').remove();
          $('.chDepartureInfo').remove();
        }

      }

    });

    $(".chooserClear").click(function() {
      $(".chooserCalendarWrap .rSel").removeClass(
        'chDeparture chArrival chCalRangeSelect');
      $('.chooserInfo').html('Wybierz datę przyjazdu');

      $('.chArrivalInfo').hide();
      $('.chDepartureInfo').hide();


      $('#arrivalBox').html('');
      $('#departureBox').html('');
      $('#nightBox').html('');

    });

  }

  startHotresCalendar();
  $(".datesBox").on("click", renderCalendar);

}

window.addEventListener("load", onloadJquery, false);











function startDatePickes() {




  $('.datesBox').click(function() {

    slideTo('.chooserCalendarBox');


    $('.chooserCalendarBox').addClass('chooserCalendarBoxShow');
    $('.person_chooser_box').removeClass('person_chooser_box_show');
    $('.overlay_bookingselect').fadeIn(500);

    $('.chooserBox').addClass('disabled');
    $('.datesBox').removeClass('disabled');



  });


  $('.personBox').click(function() {
    slideTo('.chooserCalendarBox');
    $('.person_chooser_box').addClass('person_chooser_box_show');
    $('.chooserCalendarBox').removeClass('chooserCalendarBoxShow');
    $('.overlay_bookingselect').fadeIn(500);


    $('.chooserBox').addClass('disabled');
    $('.personBox').removeClass('disabled');



  });



}


window.addEventListener("load", startDatePickes, false);
</script>
<?php if (!$__index) {?>
<script src="https://panel.hotres.pl/public/api/hotres_v4_chooser.js"></script>
<script>
window.addEventListener('load', (event) => {
  new hotresChooser({});
});
</script>
<style>
#hotresChooser .hotresAdultsChooser #hotresAdultsSelect,
#hotresChooser .hotresAdultsChooser #hotresChild1,
#hotresChooser .hotresAdultsChooser #hotresChild2,
#hotresChooser .hotresAdultsChooser #hotresChild3 {
  border-right: none;
  background: none;
  height: 100%;
  border: none;
  color: #fff;
  width: auto;
  font-weight: 700;
  font-size: 1em;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  padding: 0 0 0 1.5em;
  line-height: inherit;
}

#hotresChooser .hotresAdultsChooser #hotresChild1 option,
#hotresChooser .hotresAdultsChooser #hotresChild2 option,
#hotresChooser .hotresAdultsChooser #hotresChild3 option {
  color: #000;
}

</style>
<?php }?>

<?php if (!empty($text)) {?>
<div class="text-center fade">
  <div class="rmin"></div>
  <div class="uppercase"><?=$text?></div>
</div>
<?php }?>
