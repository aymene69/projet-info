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
        <a class="quizT-items" href="{{route('jouer')}}"><i class="fa-solid fa-gamepad"></i> Jouer</a>
    </div>
    <br><br>

    <p style="font-family: 'Montserrat', cursive; margin:10px;">Bienvenue sur notre site dédié à l'environnement et à la protection de la planète ! Notre groupe est fier de vous présenter une plateforme qui regroupe différentes ressources pour vous aider à adopter des gestes écologiques au quotidien, tout en restant informé sur les catastrophes naturelles en cours dans le monde.
    <br><br>
    Sur notre site, vous trouverez un quizz interactif pour tester vos connaissances en matière d'écologie, ainsi qu'une liste d'éco-gestes simples à appliquer dans votre vie de tous les jours. Nous sommes convaincus que chaque petit geste compte pour préserver notre environnement, et nous espérons que notre site vous aidera à prendre conscience de l'impact de vos actions sur notre planète.
    <br><br>

    Enfin, nous avons également mis en place un fil d'actualité en direct pour vous tenir informé des dernières catastrophes naturelles en cours dans le monde. Nous pensons qu'il est important de rester informé sur ces événements afin de mieux comprendre les enjeux de la protection de notre planète et les défis que nous devons relever ensemble.
    <br><br>

    Nous espérons que notre site vous plaira et que vous y trouverez des informations utiles pour adopter un mode de vie plus respectueux de l'environnement. N'hésitez pas à nous contacter si vous avez des questions ou des suggestions pour améliorer notre plateforme. Bonne visite !</p>
@include('layouts.footer')
