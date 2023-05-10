<?php
$regles = DB::table('regles')->get();
?>
@include('layouts.header')
    <style>
        .lienQ{
            color: white;
        }
    </style>
    <div class="quizT">
        <a class="quizT-items" style="font-weight:bold;" href="{{route('home')}}"><i class="fa-solid fa-compass"></i> Accueil</a>
        <a class="quizT-items" href="{{route('regles')}}"><i class="fa-brands fa-leanpub"></i> Règles</a>
        <a class="quizT-items" href="{{route('classement')}}"><i class="fa-solid fa-ranking-star"></i> Classement</a>
        <a class="quizT-items" href="{{route('jouer')}}"><i class="fa-solid fa-gamepad"></i> Jouer</a>
    </div>
    <ul>
        @foreach($regles as $regle)
            <li>{{ $regle->regle }}</li>
        @endforeach
    </ul>
@include('layouts.footer')
