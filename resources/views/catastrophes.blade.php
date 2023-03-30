<?php
$response = file_get_contents("https://www.seismicportal.eu/fdsnws/event/1/query?limit=10&format=json&minmag=3");
$data = json_decode($response);
$tsunami = file_get_contents("https://api.weather.gov/alerts/active?limit=50");
$tsunami = json_decode($tsunami);
dd($tsunami);
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
        <h3>Dernière alerte tsunami</h3>
            @foreach($data->features as $seisme)
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-triangle-exclamation"></i> Alerte tsunami vers {{$seisme->properties->flynn_region}}</h5>
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
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
</div>
@include('layouts.footer')
