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
    <style>.card{        border-radius: 3px;        box-shadow: 0 0 10px rgba(0,0,0,0.2);        margin-top: 10px;        font-family: 'Montserrat', sans-serif;       }       .card-header{        text-align: center;        font-size: 20px;        font-weight: bold;       }        .card-body{          display: flex;          flex-direction: column;          background-color: rgb(236, 236, 236);        }        .card-body-item{          display: flex;          justify-content: space-between;          align-items: center;          font-size: 18px;          padding-top: 5px;          padding-bottom: 5px;        }        .card-body-item-title{          font-weight: bold;        }        .lienDetails{          text-align: center;          font-size: 18px;     margin:3px        }        .lien{          color: #3b3b3b;          text-decoration: none;        }</style>
    <div class="tailleTitre titreQ">Catastrophes naturelles</div>
    <h3>Sont affichées ici les dernières catastrophes naturelles. Elles sont mises à jour automatiquement.</h3>
    <div class="row align-items-start text-center">
        <div class="col">
            <h3>Séismes</h3>
            @foreach($data->features as $seisme)
            <div class="card" onload="coul_card({{$seisme->properties->mag}})">
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
                      <i class="fa-solid fa-location-dot"></i>Latitude
                    </div>
                    <div class="card-body-item-value">
                      {{$seisme->properties->lat}}
                    </div>
                  </div>
                  <div class="card-body-item">
                    <div class="card-body-item-title">
                      <i class="fa-solid fa-location-dot"></i>Longitude
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
        <h3>Dernières alertes météo (US)</h3>
            @php
            $i=0;
            @endphp
            @foreach($meteo->features as $info)
            @if($info->properties->severity=="Severe")
            @if(substr($info->properties->effective, 0, 10)==date("Y-m-d"))
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-triangle-exclamation"></i> Alerte vers {{$info->properties->areaDesc}}</h5>
                    <table class="table table-striped">
                        <tr>
                            <td><i class="fa-solid fa-arrow-right"></i> Type d'alerte</td>
                            <td>{{$info->properties->event}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-signal"></i> Gravité</td>
                            <td>{{$info->properties->severity}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-sharp fa-solid fa-clover"></i> Certitude</td>
                            <td>{{$info->properties->certainty}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-calendar-days"></i> Début</td>
                            <td>{{substr($info->properties->effective, 0, 10)}} à {{substr($info->properties->effective, 11, -9)}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-calendar-days"></i> Fin</td>
                            <td>{{substr($info->properties->expires, 0, 10)}} à {{substr($info->properties->expires, 11, -9)}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
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
window.onload = function() {var cards = document.getElementsByClassName("card");for (var i = 0; i < cards.length; i++) {var magnitude = cards[i].getElementsByClassName("card-body-item-value")[0].innerHTML;coul_card(cards[i], magnitude);}}
function coul_card(card, magnitude) {if (magnitude < 2) {card.style.backgroundColor = "#ffdddd";} else if (magnitude < 3) {card.style.backgroundColor = "#ffb4b4";} else if (magnitude < 4) {card.style.backgroundColor = "#ff7f7f";} else if (magnitude < 5) {card.style.backgroundColor = "#ff6060";} else if (magnitude < 7) {card.style.backgroundColor = "#ff3e3e";} else{card.style.backgroundColor = "#f00";}}
</script>
@include('layouts.footer')
