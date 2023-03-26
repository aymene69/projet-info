<?php
$regles = DB::table('regles')->get();
?>
@include('layouts.header')
<div class="container-fluid">
    <h2>Règles</h2>
    <ul>
        @foreach($regles as $regle)
            <li>{{ $regle->regle }}</li>
        @endforeach
    </ul>
</div>
@include('layouts.footer')
