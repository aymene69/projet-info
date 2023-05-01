@include('layouts.header')
    <style>
        .lienQ{
            color: white;
        }
    </style>
    <div style="width: 60vw; margin:0 auto; display:flex; align-items:center; justify-content:center;">
        <a style="font-weight:bold; color: #1e1e1e; text-decoration: none; font-size: 1.25em; margin-left: 8px; flex: 0.33; text-align:center" href="{{route('home')}}">Accueil</a>
        <a style="color: #1e1e1e; text-decoration: none; font-size: 1.25em; margin-left: 8px; flex: 0.34; text-align:center" href="{{route('regles')}}">Règles</a>
        <a style="color: #1e1e1e; text-decoration: none; font-size: 1.25em; margin-left: 8px; flex: 0.33; text-align:center" href="{{route('classement')}}">Classement</a>
    </div>
@include('layouts.footer')
