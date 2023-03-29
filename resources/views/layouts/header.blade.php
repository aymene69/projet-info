<?php
$user = auth()->user();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <link href="{{ URL::asset('css/style.css'); }}" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
<body>

    <div id="menu">
        <ul class="liste_menu">
            <li><a href="{{route('catastrophes-naturelles')}}">Catastrophes naturelles</a></li>
            <li><a href="{{route('eco-gestes')}}">Eco-gestes</a></li>
            <li><a href="{{route('home')}}">Quizz</a></li>
        </ul>

        <span class="container-logo-menu" onclick="myFunction(this)" id="menu-toggle">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </span>
    </div>

    <div class="nav" id="nav">
        <a href="#"> <img src="https://i.ibb.co/T0d76kQ/logo-AVCTXT.png" class="logoIMG"/> </a>
    </div>
    <span>
        <a class="titreQ liens-quizz" href="{{route('home')}}">Accueil</a>
        <a class="titreQ liens-quizz" href="{{route('regles')}}">Règles</a>
        <a class="titreQ liens-quizz" href="{{route('classement')}}">Classement</a>
    </span>

    <ul class="container-connex titreQ">
        @if ($user)
        <a class="item-connex" href="{{route('viewprofile', ['id' => $user->id])}}">Bonjour, {{ $user->prenom }}</a>
            <a class="item-connex" href="{{route('logout')}}">Déconnexion</a>
        @if($user->adminRole==1)
            <a class="item-connex" href="{{route('admin')}}">Panel administrateur</a>
        @endif
        @else
            <a class="item-connex" href="{{route('login')}}">Se connecter</a>
            <a class="item-connex" href="{{route('register')}}">Inscription</a>
        @endif
    </ul>

        </div>
    </nav>
