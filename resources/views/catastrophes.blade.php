<?php
$response = file_get_contents("https://www.seismicportal.eu/fdsnws/event/1/query?limit=10&format=json&minmag=3");
$data = json_decode($response);
$options = array(
'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7\r\n" .
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36\r\n" // i.e. An iPad
)
);

$context = stream_context_create($options);
$meteo = file_get_contents("https://api.weather.gov/alerts/active", false, $context);
$meteo = json_decode($meteo);
?>
@include('layouts.header')
<div class="container-fluid">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');

    .lienC{
        color: white;
    }
    .card_meteo{ background-color: #467DCF;       border-radius: 5px;        box-shadow: 0 0 10px rgba(0,0,0,0.2);        margin-top: 20px;        font-family: 'Montserrat', sans-serif;       }
    .card_seisme{        border-radius: 5px;        box-shadow: 0 0 10px rgba(0,0,0,0.2);        margin-top: 20px;        font-family: 'Montserrat', sans-serif;       }
    .card-header{        text-align: center;        font-size: 20px;               color:#fff; font-family: 'Nunito Sans', sans-serif;}
    .card-body{          font-family: 'Raleway', sans-serif; display: flex;          flex-direction: column;          background-color: rgb(236, 236, 236);        color:#1e1e1e !important;}
    .card-body-item-value{margin-right:10px;}
    .card-body-item{          display: flex;          justify-content: space-between;          align-items: center;          font-size: 18px;          padding-top: 5px;          padding-bottom: 5px;        }
    .card-body-item-title{          font-weight: bold;        margin-left:10px;}        .lienDetails{          text-align: center;          font-size: 18px;     margin:3px        }
    .lien{          color: #fff;          text-decoration: none;        }
    </style>

    <div style="font-weight:bold; font-family: 'Poppins', sans-serif; text-align: center; font-size:2em; padding-top:3vh">Catastrophes naturelles</div>
    <div style="font-family: 'Montserrat', sans-serif;  text-align:center; opacity:0.7; font-size:1.1em; font-weight:600;padding-bottom:2vh">Dernière mise à jour :<span id="date" style="margin-left:5px"></span></div>
    <div class="row align-items-start text-center">
        <div class="col">
            <h3 style="font-family: 'Montserrat', sans-serif;">Séismes</h3>

            @foreach($data->features as $seisme)
            <div class="card_seisme" onload="coul_card({{$seisme->properties->mag}})">
                <div class="card-header">
                  Séisme vers {{$seisme->properties->flynn_region}}
                </div>
                <div class="card-body">
                  <div class="card-body-item" style="border-bottom: solid 2px #fff">
                    <div class="card-body-item-title">
                      <i class="fa-solid fa-signal"></i> Magnitude
                    </div>
                    <div class="card-body-item-value">
                      {{$seisme->properties->mag}}
                    </div>
                  </div>
                  <div class="card-body-item" style="border-bottom: solid 2px #fff">
                    <div class="card-body-item-title">
                      <i class="fa-regular fa-solid fa-globe"></i> Profondeur
                    </div>
                    <div class="card-body-item-value">
                      {{$seisme->properties->depth}} km
                    </div>
                  </div>
                  <div class="card-body-item" style="border-bottom: solid 2px #fff">
                    <div class="card-body-item-title">
                      <i class="fa-solid fa-location-dot" style="margin-right:3px"></i>Latitude
                    </div>
                    <div class="card-body-item-value">
                      {{$seisme->properties->lat}}
                    </div>
                  </div>
                  <div class="card-body-item">
                    <div class="card-body-item-title">
                      <i class="fa-solid fa-location-dot" style="margin-right:3px"></i>Longitude
                    </div>
                    <div class="card-body-item-value">
                      {{$seisme->properties->lon}}
                    </div>
                  </div>
                </div>
                <div class="lienDetails">
                    <a href="https://www.emsc-csem.org/Earthquake/earthquake.php?id={{$seisme->properties->source_id}}" class="lien"><i class="fa-solid fa-arrow-up-right-from-square" style="margin-right:10px;"></i>Voir plus de détails</a>
                </div>
            </div>
            @endforeach
            <br>
        </div>
        <div class="col">
        <h3 style="font-family: 'Montserrat', sans-serif;">Dernières alertes météo (US)</h3>
            @php
            $i=0;
            @endphp
            @foreach($meteo->features as $info)
            @if($info->properties->severity=="Severe")
            @if(substr($info->properties->effective, 0, 10)==date("Y-m-d"))
            <div class="card_meteo">
        <div class="card-header">
          <i class="fa-solid fa-triangle-exclamation"></i> Alerte vers {{$info->properties->areaDesc}}
        </div>
        <div class="card-body" style="border-radius:0px 0px 5px 5px;">
          <div class="card-body-item" style="border-bottom: solid 2px #fff">
            <div class="card-body-item-title">
              <i class="fa-solid fa-arrow-right"></i> Type d'alerte
            </div>
            <div class="card-body-item-value">
              {{$info->properties->event}}
            </div>
          </div>
          <div class="card-body-item" style="border-bottom: solid 2px #fff">
            <div class="card-body-item-title">
              <i class="fa-solid fa-signal"></i> Gravité
            </div>
            <div class="card-body-item-value">
              {{$info->properties->severity}}
            </div>
          </div>
          <div class="card-body-item" style="border-bottom: solid 2px #fff">
            <div class="card-body-item-title">
              <i class="fa-sharp fa-solid fa-clover"></i> Certitude
            </div>
            <div class="card-body-item-value">
              {{$info->properties->certainty}}
            </div>
          </div>
          <div class="card-body-item" style="border-bottom: solid 2px #fff">
            <div class="card-body-item-title">
              <i class="fa-solid fa-calendar-days"></i> Début
            </div>
            <div class="card-body-item-value">
              {{substr($info->properties->effective, 0, 10)}} à {{substr($info->properties->effective, 11, -9)}}
            </div>
          </div>
          <div class="card-body-item">
            <div class="card-body-item-title">
              <i class="fa-solid fa-calendar-days"></i> Fin
            </div>
            <div class="card-body-item-value">
              {{substr($info->properties->expires, 0, 10)}} à {{substr($info->properties->expires, 11, -9)}}
            </div>
          </div>
        </div>
        </div>
            @endif
            @endif
            @php
            $i++;
            @endphp
            @if($i==50)
            @break
            @endif
            @endforeach
        </div>
    </div>
</div>
<script>
let currDate = new Date();
let hoursMin = currDate.getHours() + 'h' + currDate.getMinutes();
document.getElementById('date').innerHTML=  hoursMin;

window.onload = function() {var cards = document.getElementsByClassName("card_seisme");for (var i = 0; i < cards.length; i++) {var magnitude = cards[i].getElementsByClassName("card-body-item-value")[0].innerHTML;coul_card(cards[i], magnitude);}}
function coul_card(card, magnitude) {if (magnitude < 2) {card.style.backgroundColor = "#DCD0BE";} else if (magnitude < 3) {card.style.backgroundColor = "#AA9474";} else if (magnitude < 4) {card.style.backgroundColor = "#907C5E";} else if (magnitude < 5) {card.style.backgroundColor = "#726147";} else if (magnitude < 7) {card.style.backgroundColor = "#453A2A";} else{card.style.backgroundColor = "black";}}
</script>
@include('layouts.footer')
