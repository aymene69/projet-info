@include('layouts.header')
<div class="container-fluid">
    <h2>Connexion</h2>
    @if(isset($failed))
        <div class="alert alert-danger">
            <strong>Erreur!</strong> {{ $message }}
        </div>
    @endif
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required="required">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required="required">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>

@include('layouts.footer')
