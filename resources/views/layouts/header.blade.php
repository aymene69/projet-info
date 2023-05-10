<?php
$user = auth()->user();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" type="image/png" href="https://i.ibb.co/wrHkYZh/logo-Simple.png" />
        <title>A.L.L.E.D.</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/3163a98507.js" crossorigin="anonymous"></script>
        <style>
            * {  scrollbar-width: auto;  scrollbar-color: #1eff0000 #ffffff00;}
            *::-webkit-scrollbar {  width: 16px;}
            *::-webkit-scrollbar-track {  background: #ffffff00;}
            *::-webkit-scrollbar-thumb {  background-color: #1eff0000;  border-radius: 10px;  border: 3px solid #ffffff00;}
            @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');
            body{
                margin :0;
                background : #D9D9D9;
                overflow: overlay;
            }
            nav{
                position: sticky;
                top: 0px;
                height: 55px;
                background: #1E1E1E;
                display: flex;
                align-items: center;
                gap:10px;
                border-bottom:2px solid #FFC700;
            }
            .logoL{
                height : 49px;
                width: 148px;
            }
            .lienC, .lienE, .lienQ{
                color: #D0BEA1;
            }
            .lienC, .lienE, .lienQ, .lienN{
                margin: 18px;
                text-decoration: none;
                z-index:2;
                font-size: 1.3em;
                font-family: 'Raleway', sans-serif;
            }
            .lienU{
                color: #D0BEA1;
                width: 100%;
                text-align: center;
            }
            #nav .lienN {
                position: relative;
                text-decoration: none;
            }
            #nav .lienN:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 2px;
                bottom: -5px;
                left: 0;
                background-color: #FFF; /* changer cette couleur selon votre choix */
                visibility: hidden;
                transform: scaleX(0);
                transition: all 0.2s ease-in-out 0s;
            }

            #nav .lienN:hover:before {
                visibility: visible;
                transform: scaleX(1);
            }
            .menuU{
                color: #1e1e1e;
                background-color: #d4d4d4;
                border-radius: 5px;
                height:35px;
                width:35px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.6em;
                transition: all 0.4s;
                z-index:2;
            }
            .menuU:hover{
                background-color: #FFF;
            }

            nav #menu-deroulant {
                display: none;
              flex-direction: column;
              align-items: center;
              width : 150px;
              position: absolute;
              top:0px;
              border-radius: 2px;
              padding-top:55px;
              background-color: #1e1e1e;
              border-bottom:1px solid #FFC700;
              animation: fade-in 0.5s;
              opacity:0.85;
            }

            nav #menu-deroulant-Q {
              display: none;
              flex-direction: column;
              align-items: center;
              width : 150px;
              position: absolute;
              top:0px;
              border-radius: 2px;
              padding-top:55px;
              background-color: #1e1e1e;
              border-bottom:1px solid #FFC700;
              animation: fade-in 0.5s;
              opacity:0.85;
            }

            @keyframes fade-in {
              from {
                opacity: 0;
              }
              to {
                opacity: 0.85;
              }
            }

            #menu-deroulant-Q {
                display: none;
            }
            #menuQ:hover + #menu-deroulant-Q, #menu-deroulant-Q:hover{
                display: flex;
            }

            #menu-deroulant {
                display: none;
            }
            #menuU:hover + #menu-deroulant, #menu-deroulant:hover{
                display: flex;
            }

            .lienQSE{
                text-decoration : none;
                width:100%;
                padding: 5px;
                color: #D0BEA1;
            }

            .lienQSE:hover{
                color: #FFC700;
            }
            .quizT{
                width: 50vw; display:flex; align-items:center; justify-content:center;margin-top:0.5vh;
            }
            .quizT-items{
                font-family: 'Raleway', sans-serif; color: #868686; font-weight:bold; text-decoration: none; font-size: 1.25em; margin-left: 8px; flex: 0.33; text-align:center
            }
            .quizT-items:hover{
                color: #5F5F5F;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
<body>

    <nav id="nav">
        <a href="{{route('home')}}" style="flex: 0.1;"> <img src="https://i.ibb.co/4PjzC5z/logo-info-marron.png" class="logoL"/> </a>

        <span style="flex: 0.7;">
            <a class="lienQ lienN" id="menuQ" href="{{route('home')}}">Quizz</a>
            <span id="menu-deroulant-Q">
                <a class="lienQSE" href="{{route('home')}}">Accueil</a>
                <a class="lienQSE" href="{{route('regles')}}">Règles</a>
                <a class="lienQSE" href="{{route('classement')}}">Classement</a>
            </span>
            <a class="lienC lienN" href="{{route('catastrophes-naturelles')}}">Catastrophes naturelles</a>
            <a class="lienE lienN" href="{{route('eco-gestes')}}">Eco-gestes</a>
        </span>
        <span style="flex: 0.19; display:flex; justify-content: right; margin-left:15px; align-items:center;">
            @if ($user)
                    <a style="text-decoration: none; color: #fff; margin-right: 2vw;" href="{{route('viewprofile', ['id' => $user->id])}}">Bonjour, {{ $user->prenom }}</a>
            @endif
            <span class="menuU" id="menuU">
                <i class="fa-solid fa-circle-user" id="icone"></i>
            </span>

            <span id="menu-deroulant">
                @if ($user)
                    <a class="lienQSE" href="{{route('logout')}}">Déconnexion</a>
                @if($user->adminRole==1)
                    <a class="lienQSE" href="{{route('admin')}}">Panel administrateur</a>
                @endif
                @else
                    <a class="lienQSE" href="{{route('login')}}">Se connecter</a>
                    <a class="lienQSE" href="{{route('register')}}">Inscription</a>
                @endif
            </span>

        </span>
    </nav>




        </div>
    </nav>
    <script>
    </script>
