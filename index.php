<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Vsetko najlepsieee</title>
</head>
<body>
  <div class="container">
    <h1>setko najlepsie saska!</h1>
    <p>saska.moja prajemti setko.najlepsie tvojim 18.narodeninam abisi bola stasna a zdrava.mamta velmi.rat <33</p>
    <p>tusom ti pripravil taku malu.aktivitku de musis zadat spravni petmiestni.kod (fotki ti pomozu.cisla su vporadi fotiek)</p>

    <div class="image-section">
      <div class="image-card">
        <img src="images/saska3.png" alt="Saska 3">
        <div class="image-card-back">Počet písmen <br> priezviska tvojho <br> triedneho učiteľa</div>
      </div>
      <div class="image-card">
        <img src="images/saska.png" alt="Saska">
        <div class="image-card-back">Posledná číslica <br> roka, kedy bola <br> dokončená <br> Eiffelova veža.</div>
      </div>
      <div class="image-card">
        <img src="images/saska1.png" alt="Saska 1">
        <div class="image-card-back">Počet <br> vnútorných uhlov <br> v rovnoramennom △ <br> so základňou <br> dlhou 17 cm.</div>
      </div>
      <div class="image-card">
        <img src="images/ovca.png" alt="Ovca">
        <div class="image-card-back">Súčin druhej a <br> tretej číslice roka, <br> kedy bol uvedený <br> prvý iPhone <br> na trh.</div>
      </div>
      <div class="image-card">
        <img src="images/saska2.png" alt="Saska 2">
        <div class="image-card-back">Koľko hodín má <br> 14 400 sekúnd?</div>
      </div>
    </div>

    <div class="code-input">
      <form method="POST" action="verify.php">
        <div class="code-boxes">
            <input type="tel" name="digit1" id="digit1" maxlength="1" class="digit" inputmode="numeric" oninput="moveToNext(this, 'digit2')">
            <input type="tel" name="digit2" id="digit2" maxlength="1" class="digit" inputmode="numeric" oninput="moveToNext(this, 'digit3')">
            <input type="tel" name="digit3" id="digit3" maxlength="1" class="digit" inputmode="numeric" oninput="moveToNext(this, 'digit4')">
            <input type="tel" name="digit4" id="digit4" maxlength="1" class="digit" inputmode="numeric" oninput="moveToNext(this, 'digit5')">
            <input type="tel" name="digit5" id="digit5" maxlength="1" class="digit" inputmode="numeric" oninput="moveToNext(this, 'digit1')">
        </div>
        <button type="submit">Overiť</button>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>