@extends('template')

@section('titre')
    Annonces
@endsection

@section('contenu')

    <div class="container">
        <h1>Voici les annonces de nos hôtes</h1>

        <div class="row">
            @foreach($ads as $ad)
                @include('ad._ad', ['ad' => $ad])
            @endforeach
        </div>

    </div>

@endsection


