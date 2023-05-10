@include('layouts.header')
<style>
@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
body{
    background-color:#1e1e1e;
    color:#fff;
}
nav{
    border-bottom:2px solid #FFC700;
}
#texte{        font-size: 5em;        font-weight: bold;        text-align: center;        margin-top: 100px;        font-family: 'Press Start 2P', cursive;        color: #fff;    }   .spinner{      position: relative;      top: -35px;      display: inline-block;      transform: translate(-50%, -50%);      width: 16px;      height: 16px;      box-shadow: 32px 0 0 0 #fff,        25px 25px 0 0 #fff,        0px 32px 0 0 #fff,        -25px 25px 0 0 #fff,        -32px 0 0 0 #fff,        -25px -25px 0 0 #fff,        0px -32px 0 0 #EFCE57,        25px -25px 0 0 #FFC700;    animation: animate 1.5s infinite steps(9);}@keyframes animate{    from{transform: rotate(0deg);}    to{transform: rotate(360deg);}}  </style>

<span style="height: 30vh; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 50px;">
    <span id="texte"><span id="ERR">ERREUR</span>
    <span>
        <span style="color: #FFC700; margin-right: -24px; ">4</span>
        <div class="spinner"> </div>
        <span style="color: #FFC700; margin-left: -24px;">4</span>
    </span>
    </span>

    <span style="font-family: 'Roboto', cursive; font-size: 2em;">
    Oops ! Cette page n'existe pas..
    </span>
</span>
<script>
    let textElement = document.getElementById("ERR");
    let text = textElement.textContent;
    setInterval( () => {
      let randomIndex = Math.floor(Math.random() * text.length);
      let randomLetter = text.charAt(randomIndex);
      text = text.replace(randomLetter, randomLetter === " " ? " " : randomLetter === randomLetter.toUpperCase() ? randomLetter.toLowerCase() : randomLetter.toUpperCase());
      textElement.textContent = text;
    } , 500);
    </script>
@include('layouts.footer')
