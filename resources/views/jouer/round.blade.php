<?php
$user = auth()->user();
session_start();
?>
@if($user!=null)
@include('layouts.header')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');

        .lienQ{
            color: white;
        }
    </style>
    <div class="quizT">
        <a class="quizT-items" style="font-weight:bold;" href="{{route('home')}}"><i class="fa-solid fa-compass"></i> Accueil</a>
        <a class="quizT-items" href="{{route('regles')}}"><i class="fa-brands fa-leanpub"></i> Règles</a>
        <a class="quizT-items" href="{{route('classement')}}"><i class="fa-solid fa-ranking-star"></i> Classement</a>
    </div>

    <h3>Question n°{{ $idRound }}</h3>
    <h3>Niveau: {{ $questionHasard->questionLevel }}</h3>
    <h4>Indices: {{ $questionHasard->indice }}</h4>
    <h2>{{ $questionHasard->question }}</h2>
    <img src="/image/{{ $questionHasard->questionImage }}" alt="round1" style="width: 100%; height: 100%;">

    @php
    $reponses = array($questionHasard->reponse, $questionHasard->reponse2, $questionHasard->reponse3, $questionHasard->reponse4);
    shuffle($reponses);
    @endphp
    <form method="POST" action="/jouer/verif">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col">
                    <input type="radio" id="{{ $reponses[0] }}" name="reponse" value="{{ $reponses[0] }}">
                    <label for="{{ $reponses[0] }}">{{ $reponses[0] }}</label>
                </div>
                <div class="col">
                    <input type="radio" id="{{ $reponses[1] }}" name="reponse" value="{{ $reponses[1] }}">
                    <label for="{{ $reponses[1] }}">{{ $reponses[1] }}</label>
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <input type="radio" id="{{ $reponses[2] }}" name="reponse" value="{{ $reponses[2] }}">
                    <label for="{{ $reponses[2] }}">{{ $reponses[2] }}</label>
                </div>
                <div class="col">
                    <input type="radio" id="{{ $reponses[3] }}" name="reponse" value="{{ $reponses[3] }}">
                    <label for="{{ $reponses[3] }}">{{ $reponses[3] }}</label>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $questionHasard->id }}">
        <input type="hidden" name="round" value="{{ $idRound }}">
        <input type="hidden" name="difficulte" value="{{ $questionHasard->questionLevel }}">
        <input type="submit" value="Suivant!">
    </form>
@include('layouts.footer')
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

