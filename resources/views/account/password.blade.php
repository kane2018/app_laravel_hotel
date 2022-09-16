@extends('template')

@section('titre')
    Modification de mot de passe
@endsection

@section('contenu')

    <div class="container">

        <h1 class="my-5">Modification du mot de passe</h1>
        <form action="{{route('update_password')}}" method="post">

            @csrf()
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 alert-light">

                    <div class="form-group">
                        <label for="hash" class="form-label mt-4">Ancien mot de passe</label>

                        <input type="password" class="form-control @error('ancien') is-invalid @enderror" name="ancien" placeholder="Donnez votre mot de passe actuel" id="hash" />
                        @error('ancien')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nouveau" class="form-label mt-4">Nouveau mot de passe</label>

                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Donnez votre nouveau mot de passe" id="nouveau" />
                        @error('password')
                        <p class="error">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="passwordConfirm" class="form-label mt-4">Confirmation Mot de passe</label>

                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre nouveau mot de passe" id="passwordConfirm" />


                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>

                </div>
            </div>
        </form>
    </div>
@endsection
