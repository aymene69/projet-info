@include('layouts.header')
    <a class="titreQ tailleTitre" href="{{route('home')}}">Quizz</a>
    <span>
        <a class="titreQ liens-quizz" href="{{route('home')}}">Accueil</a>
        <a class="titreQ liens-quizz" href="{{route('regles')}}">Règles</a>
        <a class="titreQ liens-quizz" href="{{route('classement')}}">Classement</a>
    </span>
@include('layouts.footer')
