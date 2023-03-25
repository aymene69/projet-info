<?php
$user = auth()->user();
$types = DB::connection('mysql')->table('question_type')->get();
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
    <h2>Liste des questions</h2>
    @foreach ($types as $type)
    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#type{{$type->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
            {{$type->questionType}}
        </a>
    </p>
    <div class="collapse" id="type{{$type->id}}">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID question</th>
                <th scope="col">Question</th>
                <th scope="col">Réponse</th>
                <th scope="col">Indice</th>
                <th scope="col">Difficulté</th>
                </tr>
            </thead>
            <tbody>
                @foreach (DB::connection('mysql')->table('question')->where('questionType', $type->questionType)->get() as $question)
                <tr>
                    <th scope="row">{{$question->id}}</th>
                    <td>{{$question->question}}</td>
                    <td>{{$question->reponse}}</td>
                    <td>{{$question->indice}}</td>
                    <td>{{$question->questionLevel}}</td>
                </tr>
                @endforeach
        </table>
    </div>
    @endforeach

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
