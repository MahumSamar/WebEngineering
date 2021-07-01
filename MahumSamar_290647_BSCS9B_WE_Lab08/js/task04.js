$(document).ready(function () {
  //you code here
  $(".add-row").click(function () {
    $("#error").empty();
    if ($("#name").val() != "" && $("#email").val() != "") {
      var name = $("#name").val();
      var email = $("#email").val();
      var tableValue = $("table tbody");
      var row =
        '<tr><td><input type="checkbox" name="record"></td>' +
        "<td>" +
        name +
        "</td>" +
        "<td>" +
        email +
        "</td>";
      tableValue.append(row);
    } else {
      $("#error").append("Enter the name and email");
    }
  });

  $(".delete-row").click(function () {
    $("table input:checked").parents("tr").remove();
  });
});
