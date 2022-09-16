@extends('template')

@section('titre')
{{ $ad->title }}
@endsection

@section('contenu')
    <div class="ad-titre"
         style="background-image: url('{{ $ad->cover_image }}');">
        <div class="container">
            <h1>
                {{ $ad->title }}
            </h1>
            <p>
                {{ $ad->introduction }}
            </p>
            <p class="h2">
                <strong>{{ $ad->rooms }} chambres</strong> pour <strong>{{ $ad->price }} &euro;</strong>
                par nuit
            </p>

            @if(auth()->user()->name != $ad->user->name)
            <a href="#" class="btn btn-primary">Réserver !</a>
            @endif
            {{--{% if app.user == ad.author %}
            <a href="{{ path('ads_edit', {'slug' : ad.slug }) }}" class="btn btn-secondary">Modifier</a>
            <a href="{{ path('ads_delete', {'slug' : ad.slug }) }}"
               onclick="return confirm('Voulez vous vraiment supprimer l\'annonce {{ ad.title }}')"
               class="btn btn-danger">Supprimer</a>
            {% endif %}--}}
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8 my-3">

                {!! $ad->content !!}


                <div id="carouselExampleIndicators" class="carousel slide mt-3"
                     data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach($ad->images as $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif
                                aria-current="true"
                                aria-label="Slide 1"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($ad->images as $image)
                        <div class="carousel-item  @if ($loop->first) active @endif">
                            <img src="{{ $image->url }}" class="d-block w-100" alt="First">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $ad->title }}</h5>
                                <p>{{ $image->caption }}</p>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                {{--<hr>
                {% if ad.comments | length > 0 %}
                <h2 class="mb-3">Commentaires de nos voyageurs :</h2>

                <div class="alert alert-info">
                    <h4 class="alert-heading text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                Note globale donnée par nos voyageurs
                            </div>
                            <div class="col">
                                {% include 'partials/rating.html.twig' with  {'rating' : ad.avgRatings}  %}
                                <br>
                                <small>Calculée sur {{ ad.comments | length }} avis</small>
                            </div>
                        </div>
                    </h4>
                </div>

                {% for comment in ad.comments %}
                <div class="bg-light rounded mb-3 py-3 px-3">
                    <strong>{{ comment.author.firstName }}</strong> a dit :
                    <blockquote>{{ comment.contenu }}</blockquote>
                    <strong>Note donnée :</strong>

                    {% include 'partials/rating.html.twig' with  {'rating' : comment.rating}  %}
                </div>

                {% endfor %}
                {% else %}
                <h2>Pas de commentaire</h2>
                {% endif %}--}}
            </div>
            <div class="col">

                <div class="row mb-3 align-items-center">
                    <div class="col-3">
                        <a href="{{route('user_show', $ad->user->id)}}">
                            <img alt="Avatar de {{ $ad->user->name }}" src="{{ $ad->user->picture }}" class="avatar avatar-medium">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('user_show', $ad->user->id) }}">
                            <h3>{{ $ad->user->name }}</h3>
                        </a>
                        <span class="badge bg-primary">{{ count($ad->user->ads) }} annonces</span>
                    </div>
                </div>
                {!! $ad->user->description !!}

            </div>
        </div>
    </div>
@endsection
