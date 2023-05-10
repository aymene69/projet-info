<?php
$user = auth()->user();
session_start()
?>
@if($user!=null)
@include('layouts.header')
{{ print_r($nombresAleatoires) }}
@include('layouts.footer')
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif

