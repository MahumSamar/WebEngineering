function loadData() {
    var xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        var user = JSON.parse(this.responseText);
        if (this.readyState == 4 && this.status == 200) {
            var table = "<thead><th>Name</th><th>Designation</th><th>Joining Date</th><th>Office</th><th>Extension</th></thead><tbody>";
            for (var i in user.empolyees) {
                table += '<tr><td>' + user.empolyees[i].name + '</td><td>' + user.empolyees[i].designation + '</td><td>' + user.empolyees[i].joining_date + '</td><td>' + user.empolyees[i].office + '</td><td>' + user.empolyees[i].extension + '</td></tr>';
            }
            table += '</tbody>';
            document.getElementById("content").innerHTML = table;
        }
    }
    xhttp.open("GET", "emp_data.json", true);
    xhttp.send();
}