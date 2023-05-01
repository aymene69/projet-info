@include('layouts.header')
<style>
.lienQ{
    color: white;
}
</style>
<div class="container-fluid">
    <h2>Classement</h2>
    <table class="table" style="border: #1e1e1e !important">
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
                <td><a href="/profile/{{$user->id}}">{{ $user->username }}</a></td>
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
</div>
@include('layouts.footer')
