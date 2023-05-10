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
        <a class="quizT-items" href="{{route('jouer')}}"><i class="fa-solid fa-gamepad"></i> Jouer</a>
    </div>

    <h3 style="text-align: center; margin-top:15px;">Question n°{{ $idRound }}</h3>
    

    @php
    $reponses = array($questionHasard->reponse, $questionHasard->reponse2, $questionHasard->reponse3, $questionHasard->reponse4);
    shuffle($reponses);
    @endphp
    <form method="POST" action="/jouer/verif">
        @csrf
        <style>
      .container-question{
        background-color: rgb(130, 186, 219);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
        margin:20px;
        font-family: 'Poppins', cursive;
      }
      .question-header{
        font-size: 30px;
        font-weight: bold;
        padding-top: 10px;
        padding-bottom: 10px;
      }
      .question-header i{
        font-size: 18px;
      }
      .question-body{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #1a1a1d;
        border-radius: 10px;
        gap: 10px;
      }
      .question-img{
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 0.4;
        margin-left: 10px;
      }
      .question-img img{
        height: 100%;
        width: 100%;
        
        border-radius: 5px;
        object-fit:cover;
      } 
      .question-reponses{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-wrap: wrap;
        flex: 0.6;
      }
    </style>
    <div class="container-question">
      <div class="question-header">
        {{ $questionHasard->question }}
        <i><br>Niveau: {{ $questionHasard->questionLevel }}<br>Indices: {{ $questionHasard->indice }}</i>
      </div>
      <div class="question-body">
        <div class="question-img">
        <img src="/uploads/{{ $questionHasard->questionImage }}" alt="round1" height="120">
        </div>
        <div class="question-reponses">
          <div>
              <input type="radio" id="{{ $reponses[3] }}" name="reponse" value="{{ $reponses[0] }}">
              <label for="{{ $reponses[3] }}">{{ $reponses[0] }}</label>
          </div>
          <div>
              <input type="radio" id="{{ $reponses[3] }}" name="reponse" value="{{ $reponses[1] }}">
              <label for="{{ $reponses[3] }}">{{ $reponses[1] }}</label>
          </div>
          <div>
              <input type="radio" id="{{ $reponses[3] }}" name="reponse" value="{{ $reponses[2] }}">
              <label for="{{ $reponses[3] }}">{{ $reponses[2] }}</label>
          </div>
          <div>
              <input type="radio" id="{{ $reponses[3] }}" name="reponse" value="{{ $reponses[3] }}">
              <label for="{{ $reponses[3] }}">{{ $reponses[3] }}</label>
          </div>
        </div>
      </div>
    <input type="hidden" name="id" value="{{ $questionHasard->id }}">
        <input type="hidden" name="round" value="{{ $idRound }}">
        <input type="hidden" name="difficulte" value="{{ $questionHasard->questionLevel }}">
        <input type="submit" value="Suivant!" style="margin:5px; background-color: #1a1a1d;color:#fff;">
    </div>

    </form>
@include('layouts.footer')
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

