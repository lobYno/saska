<?php
session_start();

//overenie pristupu
if (!isset($_SESSION['access_granted']) || $_SESSION['access_granted'] !== true) {
    //ak nie je nastavena session - presmerovat naspat na index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sikovna.css">
  <title>Sikovna</title>
</head>
<body>
  <!-- switche pre hudbu, pozadie, text a list -->
  <div class="controls">
    <!-- hudba -->
    <div class="audio-switch">
      <span>Hudba</span>
      <label class="switch">
        <input type="checkbox" id="audioToggle" onclick="toggleAudio()">
        <span class="slider"></span>
      </label>
      <div id="audioContainer" style="display: none;">
        <audio id="audioPlayer" controls>
          <source src="music/voda.mp3" type="audio/mpeg">
          Chýba prehliadač. Nemôžete prehrávať hudbu.
        </audio>
      </div>
    </div>

    <!-- farba pozadia -->
    <div class="background-switch">
      <span>Farba pozadia</span>
      <label class="switch">
        <input type="checkbox" id="backgroundToggle" onclick="toggleBackgroundPicker()">
        <span class="slider"></span>
      </label>
      <div id="backgroundColorPickerContainer" style="display: none;">
        <input type="color" id="backgroundColorPicker" value="#f4e1c1" oninput="changeBackgroundColor(this.value)">
      </div>
    </div>

    <!-- farba textu -->
    <div class="text-switch">
      <span>Farba textu</span>
      <label class="switch">
        <input type="checkbox" id="textToggle" onclick="toggleTextColorPicker()">
        <span class="slider"></span>
      </label>
      <div id="textColorPickerContainer" style="display: none;">
        <input type="color" id="textColorPicker" value="#5C4033" oninput="changeTextColor(this.value)">
      </div>
    </div>

    <!-- farba listu -->
    <div class="container-switch">
      <span>Farba listu</span>
      <label class="switch">
        <input type="checkbox" id="containerToggle" onclick="toggleContainerColorPicker()">
        <span class="slider"></span>
      </label>
      <div id="containerColorPickerContainer" style="display: none;">
        <input type="color" id="containerColorPicker" value="#fffaf0" oninput="changeContainerColor(this.value)">
      </div>
    </div>
  </div>

  <!-- obsah listu -->
  <div class="letter-container" id="letterContainer">
    <div class="header">
      <h1>Saska Moja Zlata,</h1>
    </div>
    <div class="content">
      <p>
        setko najlepsie ktvojim 18tim narodeninam abisi bola stasna.zdrava
        citilasa milovana.abi sati setki sni a tuzbi splnili.nechsa citis uzasne a mas.dobru naladu.
        dufam zesi uzijes nesni.dnik oslavis ho srodinou a kamaratmi. vitaj medzi nami.dospelimi
        cosa citime este stale ako.deti. 
      </p>
      <p>
        dakujemti zasetko.za setok ten cas ktorisom mohol stebou 
        stravit.zato zesom ta mohol blisie spoznat.si zlate.dievcatko a ajketi ostatni hovoria ze 
        vizeras ako 12rocni.chlapec premna budes odnesneho dna.uz 18rocne.milucke a simpaticke dievca. 
        vobec sitim nelam hlavu tosu len seci.slepi dakujem.
      </p>
      <p> 
        saska jata mam velmi rat.asi velmi
        fajn ajked mame obcas uplne ine.nazori a pohladi naveci jasom rad ze aj napriek tomu.to medzi
        nami.stale zije jeto krasne a chcel bisom ti povedat este jedno velke.prepac aksom ta niekedi
        niecim odradil a javiem ze aj somnou toje.obcas tazke ze azmoc sa mozno staram doteba.ajked jato
        mislim v dobrom a zaujimam sa oteba najviac akosa.len da .nadruhu stranu si vazim.tvoje sukromie
        viac ako cokoladki.cosom dostal namikulasa a nechcem abisi nieco primne robila keto ti sama.neces.
      </p>
      <p>
        dakujem saska zeta mam aze situ stale premna.jasom tu tiez stale preteba a nebojsa napisat
        kedikolvek.hocico keca ces virozpravat alebo uvolnit.sa somtu zdi a stale.len alen preteba.uzisi
        tvoj nesni.den akosa len najviac da abisi mala co najlepsie spomienki ale prosimta.neprepisa
        k smrti.tobima mrzelo a bol bisom smutni. dakujem saska za setko.❤️
      </p>
      <p>
        S laskou<br>
        Tvoj Marecek
      </p>
    </div>
  </div>

  <!-- profilove fotky a hlasove spravy -->
  <div class="profile-container">
  <div class="profile">
    <img src="images/marek.png" alt="profilovka" class="profile-photo">
    <div class="microphone-container">
      <img src="images/mikrofon.png" alt="mikrofon" class="microphone-icon" data-audio-id="audioPlayerMarek">
    </div>
    <audio id="audioPlayerMarek">
      <source src="music/marek.m4a" type="audio/mpeg">
    </audio>
  </div>

  <div class="profile">
    <img src="images/samko.png" alt="profilovka" class="profile-photo">
    <div class="microphone-container">
      <img src="images/mikrofon.png" alt="mikrofon" class="microphone-icon" data-audio-id="audioPlayerSamko">
    </div>
    <audio id="audioPlayerSamko">
      <source src="music/samko.m4a" type="audio/mpeg">
    </audio>
  </div>

  <div class="profile">
    <img src="images/lenka.png" alt="profilovka" class="profile-photo">
    <div class="microphone-container">
      <img src="images/mikrofon.png" alt="mikrofon" class="microphone-icon" data-audio-id="audioPlayerLenka">
    </div>
    <audio id="audioPlayerLenka">
      <source src="music/lenka.m4a" type="audio/mpeg">
    </audio>
  </div>
  </div>

    <!-- sipka a ingrid -->
    <div class="arrow-container" id="arrowContainer">
      <div class="arrow" id="arrow">&#x2191;</div> <!-- sipka smeruje nahor -->
      <div class="hidden-image" id="hiddenImage">
        <img src="images/ingrid.png" alt="Ingrid" />
      </div>
    </div>


  <!-- JavaScript -->
  <script>
    //premenne pre povodne farby
    let originalBackgroundColor = '#f4e1c1';
    let originalTextColor = '#5C4033';
    let originalContainerColor = '#fffaf0';
    
    //funkcia na pustenie/zastavenie hudby
    function toggleAudio() {
      const audioContainer = document.getElementById('audioContainer');
      const audioPlayer = document.getElementById('audioPlayer');
      const toggleSwitch = document.getElementById('audioToggle');
    
      if (toggleSwitch.checked) {
        audioContainer.style.display = 'block';
        audioPlayer.play();
      } else {
        audioContainer.style.display = 'none';
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
      }
    }
    
    document.addEventListener('DOMContentLoaded', () => {
      //mikrofony na hlasove spravy
      const microphoneIcons = document.querySelectorAll('.microphone-icon');
      
      microphoneIcons.forEach(icon => {
        icon.addEventListener('click', function() {
          const audioId = this.getAttribute('data-audio-id');
          const audioPlayer = document.getElementById(audioId);
      
          if (audioPlayer) {
            audioPlayer.play().catch(error => {
              console.error('Chyba pri prehrávaní audia:', error);
            });
          } else {
            console.error('Audio prehrávač nebol nájdený');
          }
        });
      });
    });
    
    //povodny gradient
    let originalGradient = 'linear-gradient(135deg, #f4e1c1, #d9b79f)';
    
    //funkcia na menenie farby pozadia
    function toggleBackgroundPicker() {
      const backgroundPickerContainer = document.getElementById('backgroundColorPickerContainer');
      const backgroundToggle = document.getElementById('backgroundToggle');
    
      if (backgroundToggle.checked) {
        backgroundPickerContainer.style.display = 'block';
      } else {
        backgroundPickerContainer.style.display = 'none';
        //nastavenie povodneho gradientu po vypnuti switchu
        document.body.style.background = originalGradient;
      }
    }
    
    function changeBackgroundColor(color) {
      document.body.style.background = `linear-gradient(135deg, ${color}, ${color})`;
    }

    
    //funkcia na menenie farby textu
    function toggleTextColorPicker() {
      const textColorPickerContainer = document.getElementById('textColorPickerContainer');
      const textToggle = document.getElementById('textToggle');
    
      if (textToggle.checked) {
        textColorPickerContainer.style.display = 'block';
      } else {
        textColorPickerContainer.style.display = 'none';
        //resetuje farbu textu na povodnu farbu
        document.body.style.color = originalTextColor;
        document.querySelector('.header h1').style.color = originalTextColor;
      }
    }
    
    function changeTextColor(color) {
      document.body.style.color = color;
      document.querySelector('.header h1').style.color = color;
    }
    
    //funkcia na menenie farby listu (containera)
    function toggleContainerColorPicker() {
      const containerColorPickerContainer = document.getElementById('containerColorPickerContainer');
      const containerToggle = document.getElementById('containerToggle');
    
      if (containerToggle.checked) {
        containerColorPickerContainer.style.display = 'block';
      } else {
        containerColorPickerContainer.style.display = 'none';
        //nastavenie povodnej farby listu s opacity 0.9
        document.getElementById('letterContainer').style.backgroundColor = 'rgba(255, 250, 240, 0.9)';
      }
    }
    
    function changeContainerColor(color) {
      document.getElementById('letterContainer').style.backgroundColor = color;
    }


    //sipka a ingrid micuskova
    const arrowContainer = document.getElementById('arrowContainer');
    const arrow = document.getElementById('arrow');
    const hiddenImage = document.getElementById('hiddenImage');
    
    //funkcia na zobrazovanie ingrid
    arrowContainer.addEventListener('click', () => {
      //ak nie je ingrid zobrazena, zobrazi sa
      if (hiddenImage.classList.contains('show')) {
        hiddenImage.classList.remove('show');
        arrow.classList.remove('up'); //sipka sa otoci
      } else {
        hiddenImage.classList.add('show');
        arrow.classList.add('up'); //sipka sa otoci
      }
    });

  </script>
</body>
</html>