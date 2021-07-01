function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        xmlParser(this);
      }
    };
    xhttp.open("GET", "cd_catalog.xml", true);
    xhttp.send();
  }
  function xmlParser(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<thead><tr><th>Title</th><th>Artist</th><th>Country</th><th>Company</th><th>Price</th><th>Year</th></tr></thead><tbody>";
    var x = xmlDoc.getElementsByTagName("CD");
    for (i = 0; i < x.length; i++) {
      table += "<tr><td>" +
        x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("COUNTRY")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("COMPANY")[0].childNodes[0].nodeValue +
        "</td><td>";
      if (x[i].getElementsByTagName("PRICE")[0].getAttribute('currency') == '$') {
        table += '$' + x[i].getElementsByTagName("PRICE")[0].childNodes[0].nodeValue;
      } else {
        table += x[i].getElementsByTagName("PRICE")[0].childNodes[0].nodeValue;
      }
      table += "</td><td>" +
        x[i].getElementsByTagName("YEAR")[0].childNodes[0].nodeValue +
        "</td></tr>";
    }
    table += '</tbody>'
    document.getElementById("content").innerHTML = table;
  }