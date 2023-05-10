<?php
$user = auth()->user();
session_start();
?>
@if($user!=null)
@include('layouts.header')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');

    .container-resultat{
        background-color: #1a1a1d;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
        margin:20px;
        font-family: 'Poppins', cursive;
    }
    .resultat-header{
        margin-top:10px;
        color:#fff;
        font-size: 25px;
    }
</style>
<div class="container-resultat">
    <p class="resultat-header">Vous avez eu {{ session('nbPoints') }}/10</p>Voici vos réponses et les bonnes réponses
    @php
    $loopn = 0;
    @endphp
    <ul>
    @foreach(session()->get('idQuestions') as $id)
    @php
    $reponse = DB::table('question')->where('id', $id)->first()->reponse;
    $reponsesFull = session()->get('reponsesFull');
    @endphp
    @if(($reponsesFull)[$loopn] == $reponse)
    <li style="color: green">{{ DB::table('question')->where('id', $id)->first()->question }} Réponse: {{ $reponse }}</li>
    @else
    <li style="color: red">{{ DB::table('question')->where('id', $id)->first()->question }} Réponse: {{ $reponse }}</li>
    @endif
    @php
    $loopn = $loopn+1;
    @endphp
    @endforeach
    </ul>
</div>
@include('layouts.footer')
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

