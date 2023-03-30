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
    <h1>Catastrophes naturelles</h1>
    <h3>Sont affichées ici les dernières catastrophes naturelles</h3>
    <div class="row align-items-start text-center">
        <div class="col">
            <h3>Séismes</h3>
            @foreach($data->features as $seisme)
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-triangle-exclamation"></i> Séisme vers {{$seisme->properties->flynn_region}}</h5>
                    <table class="table table-striped">
                        <tr>
                            <td><i class="fa-solid fa-signal"></i> Magnitude</td>
                            <td>{{$seisme->properties->mag}} sur l'échelle de Richter</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-solid fa-globe"></i> Profondeur</td>
                            <td>{{$seisme->properties->depth}} km</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-location-dot"></i> Latitude</td>
                            <td>{{$seisme->properties->lat}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-location-dot"></i> Longitude</td>
                            <td>{{$seisme->properties->lon}}</td>
                        </tr>
                    </table>
                    <a href="https://www.emsc-csem.org/Earthquake/earthquake.php?id={{$seisme->properties->source_id}}" class="btn btn-primary">Voir en détail</a>
                </div>
            </div>
            <br>
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
@include('layouts.footer')
