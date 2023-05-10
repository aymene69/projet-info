<?php
$user = auth()->user();
?>
@include('layouts.header')
@if($user!=null)
@if($user->id==$id)
<div class="container-fluid">
    <h2>Mon profil</h2>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Mes informations</b></li>
            <li class="list-group-item"><img src="/avatar/{{ $user->avatar }}" width=50><br><a class="btn btn-primary" data-bs-toggle="collapse" href="#modifAvatar" role="button" aria-expanded="false" aria-controls="modifAvatar">Modifier</a>
            <div class="collapse" id="modifAvatar">
                <form method="POST" action="/profile/modifavatar" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="avatar">Nouvel avatar:</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/png, image/jpeg" required="required">
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
            </li>
            <li class="list-group-item">Nom d'utilisateur: {{ $user->username }}<br><a class="btn btn-primary" data-bs-toggle="collapse" href="#modifUsername" role="button" aria-expanded="false" aria-controls="modifUsername">Modifier</a>
            <div class="collapse" id="modifUsername">
                <form method="POST" action="/profile/modifusername">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">Nouveau nom d'utilisateur:</label>
                        <input type="text" class="form-control" id="username" name="username"required="required">
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
            </li>
            <li class="list-group-item">Mot de passe<br><a class="btn btn-primary" data-bs-toggle="collapse" href="#modifPassword" role="button" aria-expanded="false" aria-controls="modifPassword">Modifier</a>
            <div class="collapse" id="modifPassword">
                <form method="POST" action="/profile/modifpassword">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password"required="required">
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
            </li>
            <li class="list-group-item">Prénom: {{ $user->prenom }}</li>
            <li class="list-group-item">Nom: {{ $user->nom }}</li>
            <li class="list-group-item">Email: {{ $user->email }}<br><a class="btn btn-primary" data-bs-toggle="collapse" href="#modifEmail" role="button" aria-expanded="false" aria-controls="modifEmail">Modifier</a>
            <div class="collapse" id="modifEmail">
                <form method="POST" action="/profile/modifemail">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Nouvel email:</label>
                        <input type="text" class="form-control" id="email" name="email"required="required">
                    </div>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
            </li>
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
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif
@include('layouts.footer')

