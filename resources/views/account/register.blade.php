@extends('template')

@section('contenu')

    <div class="container">
        <h1 class="my-5">Inscrivez vous !</h1>
        <form action="{{route('store')}}" method="post">

            @csrf()
            <div class="row">
                <div class="col">
                    <div class="alert-light">
                        <h2 class="alert-heading">Informations générales</h2>
                        <hr>
                        <div class="form-group">
                            <label for="firstName" class="form-label mt-4">Prénom</label>

                            <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" id="firstName" />

                            @error('first_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="form-label mt-4">Nom</label>

                            <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" id="lastName" />

                            @error('last_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label mt-4">Email</label>

                            <input type="text" class="form-control" value="{{old('email')}}" name="email" id="email" />

                            @error('email')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture" class="form-label mt-4">Photo de profil</label>

                            <input type="text" class="form-control @error('picture') is-invalid @enderror" value="{{old('picture')}}" name="picture" id="picture" />

                            @error('picture')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="alert-light">
                        <h2 class="alert-heading">Mot de passe</h2>
                        <hr>
                        <div class="form-group">
                            <label for="hash" class="form-label mt-4">Mot de passe</label>

                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="hash" />

                            @error('password')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirm" class="form-label mt-4">Confirmation Mot de passe</label>

                            <input type="password" class="form-control" name="password_confirmation" id="passwordConfirm" />

                            @error('password_confirmation')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="alert-light">
                        <h2 class="alert-heading">Détails</h2>
                        <hr>
                        <div class="form-group">
                            <label for="intro" class="form-label mt-4">Introduction</label>
                            <input type="text" class="form-control" value="{{old('introduction')}}" name="introduction" id="intro">

                            @error('introduction')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label mt-4">Description</label>
                            <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
                            @error('description')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <p>Vous y êtes presque, confirmez votre inscription et rejoignez nous !</p>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i>
                            Inscription</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
