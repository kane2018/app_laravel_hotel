@extends('template')

@section('contenu')

    <div class="container">
        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
                <div class="bg-light py-3 py-3">
                    <h1>Connectez vous !</h1>

                    @error('email')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                    @enderror


                    <form action="{{route('account.authenticate')}}" method="post">

                        @csrf()

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Adresse email..." value="" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe..." required>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Connexion !">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
