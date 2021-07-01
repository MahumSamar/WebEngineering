// Mahum Samar
// 290647
// BSCS-9B

let inp = document.getElementById("inp");
buttoms = document.querySelectorAll("button");
let inValue = "";
let result = 0;
for (item of buttoms) {
  item.addEventListener("click", (e) => {
    buttonText = e.target.innerText;
    console.log("button text is ", buttonText);
    if (buttonText == "x") {
      buttonText = "*";
      inValue += buttonText;
      inp.value = inValue;
      result = inp.value;
    } else if (buttonText == "C") {
      inValue = "";
      inp.value = inValue;
    } else if (buttonText == "=") {
      inp.value = eval(inValue);
      result = inp.value;
    } else if (buttonText == "x2") {
      inValue = Math.pow(inp.value, 2);
      inp.value = inValue;
      result = inp.value;
    } else if (buttonText == "1/x") {
      inValue = eval(1 / inValue);
      inp.value = inValue;
      result = inp.value;
    } else if (buttonText == "√") {
      inValue = Math.sqrt(inValue);
      inp.value = inValue;
      result = inp.value;
    } else if (buttonText == "±") {
      inValue = eval(-1 * inValue);
      inp.value = inValue;
      result = inp.value;
    } else if (buttonText == "MC") {
      result = 0;
    } else if (buttonText == ".") {
      inValue = inValue + ".0";
      inp.value = inValue;
    } else if (buttonText == "MS") {
      if (!isNaN(inp.value)) {
        console.log("MS called");
        result = inp.value;
        console.log(result);
      }
    } else if (buttonText == "MR") {
      inp.value = result;
    } else if (buttonText == "M+") {
      if (!isNaN(inp.value)) {
        console.log("M+ called");
        console.log(result);
        result = Number(result) + Number(inp.value);
        console.log(result);
      }
    } else {
      inValue += buttonText;
      inp.value = inValue;
    }
  });
}
