<?php
$user = auth()->user();
?>
@include('layouts.header')
@if($user!=null)
@if($user->adminRole==1)
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('admin')}}">Panel administrateur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listequestions')}}">Liste questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('editquestions')}}">Modifier/Ajouter questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('editregles')}}">Modifier/Ajouter règles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <h2>Modifier les règles</h2>
    <p>
        <a class="btn btn-success" data-bs-toggle="collapse" href="#ajouterRegle" role="button" aria-expanded="false" aria-controls="ajouterRegle">
            Ajouter une règle
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#modifierRegle" role="button" aria-expanded="false" aria-controls="modifierRegle">
            Modifier une règle
        </a>
        <a class="btn btn-danger" data-bs-toggle="collapse" href="#supprimerRegle" role="button" aria-expanded="false" aria-controls="supprimerRegle">
            Supprimer une règle
        </a>
    </p>
        <br>
        <div class="collapse" id="ajouterRegle">
            <form method="POST" action="/admin/ajouterregle">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="regle">Nom de la règle:</label>
                    <input type="text" class="form-control" id="regle" name="regle" required="required">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
        <div class="collapse" id="modifierRegle">
            <form method="POST" action="/admin/modifregle">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-select" aria-label="regle" id="regle" name="regle" required="required">
                        @foreach(DB::connection('mysql')->table('regles')->get() as $regle)
                            <option value="{{$regle->id}}">{{$regle->regle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nouvelleRegle">Nouvelle règle:</label>
                    <input type="text" class="form-control" id="nouvelleRegle" name="nouvelleRegle" required="required">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
        <div class="collapse" id="supprimerRegle">
            <form method="POST" action="/admin/supprimerregle">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-select" aria-label="regle" id="regle" name="regle" required="required">
                        @foreach(DB::connection('mysql')->table('regles')->get() as $regle)
                            <option value="{{$regle->id}}">{{$regle->regle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
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
