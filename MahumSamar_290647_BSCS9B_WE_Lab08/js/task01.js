$(document).ready(function () {
  var $li = $("li");

  $li.on("click", liAppend);
});

function liAppend() {
  var monthName = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  var dayName = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
  var d = new Date();
  var month = d.getMonth();
  var date = d.getDate();
  var day = d.getDay();
  var dt = new Date();
  var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

  var output =
    " Clicked on " +
    dayName[day] +
    " " +
    monthName[month] +
    " " +
    date +
    " " +
    d.getFullYear() +
    " at " +
    time;
  $("li").each(function () {
    $("span").empty();
  });
  $(this).append('<span class="date">' + output + "</span>");
}
