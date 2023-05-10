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
    </div>

    <a href="{{route('round', ['id' => 1])}}" class="lienQ">Round 1</a>
@include('layouts.footer')
