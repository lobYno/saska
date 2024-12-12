//funkcia na posun do dalsieho policka po zadani cisla
function moveToNext(currentInput, nextId) {
  if (currentInput.value.length == 1) {
    document.getElementById(nextId).focus();
  }
}

//funkcia na overenie zadaneho kodu
function checkCode() {
  const digit1 = document.getElementById('digit1').value;
  const digit2 = document.getElementById('digit2').value;
  const digit3 = document.getElementById('digit3').value;
  const digit4 = document.getElementById('digit4').value;
  const digit5 = document.getElementById('digit5').value;

  //spojenie cisel dokopy
  const userCode = digit1 + digit2 + digit3 + digit4 + digit5;

  //overenie ci je kod spravny
  if (userCode === "69304") {
    window.location.href = "sikovna.php"; //ak je kod spravny - presmeruj na sikovna.php
  } else {
    alert("nespravni.kod saska ti nato.prides si sikovne a mudre.dievca!");  //ak je kod nespravny - vypis hlasenie
  }
}
