@include('layouts.header')
<div class="container-fluid">
    <h2>Inscription</h2>

    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Pseudonyme:</label>
            <input type="text" class="form-control" id="username" name="username" required="required">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required="required">
        </div>

        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required="required">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required="required">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required="required">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>

@include('layouts.footer')
