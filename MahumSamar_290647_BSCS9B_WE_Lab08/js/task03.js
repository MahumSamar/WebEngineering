$(document).ready(function () {
  $(window).on("scroll", function () {
    window.onscroll = function () {
      var curPos = $(window).scrollTop();
      var pos = $("#footer").offset().top - $(window).height() - 500;
      if (curPos >= pos) {
        $("#slideAd").animate({ opacity: "1" }, 0);
      } else {
        $("#slideAd").animate({ opacity: "0" }, 0);
      }
    };
  });
});
