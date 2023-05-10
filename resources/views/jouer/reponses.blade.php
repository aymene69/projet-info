<?php
$user = auth()->user();
session_start();
?>
@if($user!=null)
@include('layouts.header')
<p>Vous avez eu {{ session('nbPoints') }}/10</p>
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
@include('layouts.footer')
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

