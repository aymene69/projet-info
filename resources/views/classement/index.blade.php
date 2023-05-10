@include('layouts.header')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');

        .lienQ{
            color: white;
        }
    </style>
    <div class="quizT">
        <a class="quizT-items" href="{{route('home')}}"><i class="fa-solid fa-compass"></i> Accueil</a>
        <a class="quizT-items" href="{{route('regles')}}"><i class="fa-brands fa-leanpub"></i> Règles</a>
        <a class="quizT-items" style="font-weight:bold;" href="{{route('classement')}}"><i class="fa-solid fa-ranking-star"></i> Classement</a>
    </div>
    <table class="table" style=" font-family: 'Montserrat', sans-serif; color: #1e1e1e; background-color: #e1e1e1; opacity:0.75; border: #888888 2px solid !important; margin:1vw; width: 98vw; text-align: center;">
        <tr>
            <th>Position</th>
            <th>Nom d'utilisateur</th>
            <th>Score</th>
            <th>Nombre de parties jouées</th>
            <th>Nombre de parties gagnées/perdues</th>
            <th>Ratio</th>
            <th>Nombre d'indices</th>
            <th>Nombre d'indices utilisés</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="/profile/{{$user->id}}" style="text-decoration: none;"><i class="fa-solid fa-arrow-up-right-from-square" style="margin-right:10px;"></i>{{ $user->username }}</a></td>
                <td>{{ $user->score }}</td>
                <td>{{ $user->nbParties }}</td>
                <td>{{ $user->nbVictoires }}/{{ $user->nbDefaites }}</td>
                <td>@if($user->nbVictoires==$user->nbDefaites)
                    1
                    @else
                    {{$user->nbVictoires/$user->nbDefaites}}
                    @endif
                </td>
                <td>{{ $user->nbIndices }}</td>
                <td>{{ $user->nbIndicesUtilises }}</td>
            </tr>
        @endforeach
    </table>
@include('layouts.footer')
