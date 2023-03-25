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
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <h2>Modifier les questions</h2>
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
