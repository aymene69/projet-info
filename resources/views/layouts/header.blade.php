<?php
$user = auth()->user();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>@import url('https://fonts.googleapis.com/css2?family=Baloo+2&display=swap');@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');:root {--bg-menu: #3de6b1}.titreQ{    font-family: 'Montserrat', sans-serif;    text-decoration: none;    color: #1783e0;}#nav{  border-bottom: 2px solid #3de6b1;} .tailleTitre{    font-size: 2.5em !important;    font-weight: bold;background: -webkit-linear-gradient(164deg, rgba(70,230,61,1) 0%, rgba(63,235,189,1) 100%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;}.footer{    position: fixed;    bottom:0px;    width:100vw;}.container-connex{    position: absolute;    top:0px;    right:0px;    margin:17px;}.item-connex{    text-decoration:none;    color:#5a5a5a;    margin-left:10px;}.item-connex:hover{    color:black;}.quizz{  font-family: 'Baloo 2', cursive;}.quizztitre{  font-family: 'Montserrat', sans-serif;}.TITRE{  font-family: 'Ubuntu', sans-serif;}.card-police{    font-family: 'Roboto', sans-serif;}.couleurs {    animation: bleu #50a7f2;    animation: vert fluo #0bd904;    animation: vert sombre #0abf04;    animation: noir #0d0d0d;}body{    margin-left: 60px !important;    background-color: #ffffff;    transition: margin-left 0.3s ease-in-out;}.nav{    height: 60px;}#body.show{    margin-left: 280px !important;}.logoIMG{    width: 161px;    height: 50px;    margin-top: 5px;}.liste_menu{    font-family: 'Montserrat', sans-serif;    font-weight: 700;}#menu{  position: fixed;  background: var(--bg-menu);  width: 275px;  height: 100vh;  left: -220px;  transition: left 0.3s ease-in-out;}#menu ul {  list-style: none;  margin: 0;  padding: 0;  margin-top: 10px;}#menu ul li a {  display: block;  width: 70%;  padding: 10px;  color: #000000;  text-decoration: none;}#menu ul li a:hover {  text-shadow: 0 0 10px #000000;}#menu.show{    left: 0  !important;}.container-logo-menu {  cursor: pointer;  position: absolute;  right: 10px;  top: 10px;}.bar1, .bar2, .bar3 {  width: 35px;  height: 5px;  background-color: #000000;  margin: 6px 0;  transition: 0.25s;}.change .bar1 {  transform: translate(0, 11px) rotate(-45deg);}.change .bar2 {opacity: 0;}.change .bar3 {  transform: translate(0, -11px) rotate(45deg);}* {  scrollbar-width: auto;  scrollbar-color: #1eff0000 #ffffff00;}*::-webkit-scrollbar {  width: 16px;}*::-webkit-scrollbar-track {  background: #ffffff00;}*::-webkit-scrollbar-thumb {  background-color: #1eff0000;  border-radius: 10px;  border: 3px solid #ffffff00;} .liens-quizz{font-size:1.3em; margin:0px 10px 0px 10px; color:#1e9972 }</style>
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
