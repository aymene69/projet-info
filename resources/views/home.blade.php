@include('layouts.header')
    <style>.liens-quizz{font-size:1.3em; margin:0px 10px 0px 10px; color:#1e9972; font-family: 'Montserrat' , sans-serif ; text-decoration:none;}</style>
    <span>
        <a class="liens-quizz" href="{{route('home')}}">Accueil</a>
        <a class="liens-quizz" href="{{route('regles')}}">Règles</a>
        <a class="liens-quizz" href="{{route('classement')}}">Classement</a>
    </span>
@include('layouts.footer')
