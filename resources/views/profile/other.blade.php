<?php
$user = DB::table('users')->where('id', $id)->first();
?>
@include('layouts.header')
<div class="container-fluid">
    <h2>Profil de {{$user->username}}</h2>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><img src="/avatar/{{ $user->avatar }}" width=50></li>
            <li class="list-group-item">Nom d'utilisateur: {{ $user->username }}</li>
            <li class="list-group-item">Prénom: {{ $user->prenom }}</li>
            <li class="list-group-item">Score: {{ $user->score }}</li>
            <li class="list-group-item">Nombre de parties jouées: {{ $user->nbParties }}</li>
            <li class="list-group-item">Nombre de parties gagnées/perdues (ratio): {{ $user->nbVictoires }}/{{ $user->nbDefaites }} @if($user->nbVictoires==$user->nbDefaites)
                (1)
                @else
                ({{$user->nbVictoires/$user->nbDefaites}})
                @endif
            </li>
            <li class="list-group-item">Nombre d'indices: {{ $user->nbIndices }}</li>
            <li class="list-group-item">Nombre d'indices utilisés: {{ $user->nbIndicesUtilises }}</li>

        </ul>
    </div>
</div>
@include('layouts.footer')

