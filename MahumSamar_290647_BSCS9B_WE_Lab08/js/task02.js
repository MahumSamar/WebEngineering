$(document).ready(function () {
  var li = $("li");

  li.on("click", function (e) {
    var item = $(this).text();
    var status = "";
    if (item == "honey" || item == "pine nuts") {
      status = "Important";
    } else {
      status = "Available";
    }

    var output =
      "Item: " +
      item +
      "<br>" +
      "Status: " +
      status +
      "<br>" +
      "Event: " +
      e.type;

    $("#itemInfo").empty();
    $("#itemInfo").append(output);
  });

  li.on("mouseover", function (e) {
    var item = $(this).text();
    var status = "";
    if (item == "honey" || item == "pine nuts") {
      status = "Important";
    } else {
      status = "Available";
    }

    var output =
      "Item: " +
      item +
      "<br>" +
      "Status: " +
      status +
      "<br>" +
      "Event: " +
      e.type;

    $("#itemInfo").empty();
    $("#itemInfo").append(output);
  });
});
