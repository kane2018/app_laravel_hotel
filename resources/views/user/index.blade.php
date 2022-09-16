@extends('template')

@section('titre')
Page de {{$user->name}}
@endsection

@section('contenu')
    <div class="container">
        <div class="row align-items-center my-5">
            <div class="col-3 text-center">
                <img src="{{ $user->picture }}" alt="Avatar de {{ $user->name }}" class="avatar mb-3">
                <br>
                <span class="badge bg-primary">{{ count($user->ads) }} annonces</span>
            </div>
            <div class="col-9">
                <h1>{{ $user->name }}</h1>
                @if($user->id == auth()->user()->id)
                <div class="mt-3">
                    <a href="{{ route('profile') }}" class="btn btn-primary mb-2">Modifier mes informations</a>
                    <a href="{{ route('password') }}" class="btn btn-primary mb-2">Modifier mon mot de passe</a>
                </div>
                @endif
            </div>
        </div>

        {!! $user->description !!}

        <hr>
        <h2>Les annonces de {{ $user->name }}</h2>
        @if(count($user->ads) > 0)
        <div class="row">
            @foreach($user->ads as $ad)
                @include('ad._ad', ['ad' => $ad])
            @endforeach
        </div>
        @else
        <div class="alert alert-warning">
            <p>
                <strong>{{ $user->name }}</strong> n'a pas encore d'annonce sur le site
            </p>
        </div>
        @endif

    </div>
@endsection
