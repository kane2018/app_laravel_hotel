@extends('template')

@section('titre')
    Modification du profil utilisateur
@endsection

@section('contenu')
    <div class="container">
        <h1 class="my-5">Modification du profil !</h1>
        <form action="{{route('update_profile', auth()->user()->id)}}" method="post">

            @csrf()
            <div class="row">
                <div class="col">
                    <div class="alert-light">
                        <h2 class="alert-heading">Informations générales</h2>
                        <hr>
                        <div class="form-group">
                            <label for="firstName" class="form-label mt-4">Prénom</label>

                            <input type="text" class="form-control" value="{{old('first_name', auth()->user()->first_name)}}" name="first_name" id="lastName" />

                            @error('first_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="form-label mt-4">Nom</label>

                            <input type="text" class="form-control" value="{{old('last_name', auth()->user()->last_name)}}" name="last_name" id="lastName" />

                            @error('last_name')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label mt-4">Email</label>

                            <input type="text" class="form-control" name="email" value="{{old('email', auth()->user()->email)}}" id="email" />

                            @error('email')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture" class="form-label mt-4">Photo de profil</label>

                            <input type="text" class="form-control" name="picture" value="{{old('picture', auth()->user()->picture)}}" id="picture" />

                            @error('picture')
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
                            <input type="text" class="form-control" name="introduction" value="{{old('introduction', auth()->user()->introduction)}}" id="intro" />

                            @error('introduction')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label mt-4">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" >{{old('description', auth()->user()->description)}}</textarea>
                            @error('description')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i>
                            Enregistrer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
