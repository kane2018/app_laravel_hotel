@extends('template')

@section('titre')
    {{ $ad->title }}
@endsection

@section('contenu')

    <div class="container">
        <h1>Modification de l'annonce : {{$ad-> title}} !</h1>
        <form action="{{route('ads.update', $ad->id)}}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <label for="titre" class="form-label mt-4">Titre</label>

                <input type="text" name="title" value="{{old('title', $ad->title)}}" placeholder="Taper un super titre pour votre annonce"
                       class="form-control @error('title') is-invalid @enderror" id="titre"/>

                @error('title')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label mt-4">URL de l'image principale</label>
                <input type="text" name="cover_image" value="{{old('cover_image', $ad->cover_image)}}" placeholder="Donnez l'adresse d'une image qui vous donne envie"
                       class="form-control @error('cover_image') is-invalid @enderror" id="image"/>

                @error('cover_image')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="intro" class="form-label mt-4">Introduction</label>
                <textarea placeholder="Donner une description globale de l'annonce" class="form-control @error('introduction') is-invalid @enderror" name="introduction"
                          id="intro">{{old('introduction', $ad->introduction)}}</textarea>
                @error('introduction')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="contenu" class="form-label mt-4">Description détaillée</label>
                <textarea placeholder="Donner une description qui vous donne envie de revenir chez vous" class="form-control @error('content') is-invalid @enderror" name="content"
                          id="contenu">{{old('content', $ad->content)}}</textarea>
                @error('content')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="nbrecham" class="form-label mt-4">Nombre de chambres</label>
                <input type="text" value="{{old('rooms', $ad->rooms)}}" placeholder="Le nombre de chambre disponible" class="form-control @error('rooms') is-invalid @enderror"
                       name="rooms" id="nbrecham"/>
                @error('rooms')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="prix" class="form-label mt-4">Prix par nuit</label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input type="text" value="{{old('price', $ad->price)}}" placeholder="Indiquez le prix que vous voulez pour une nuit"
                           class="form-control @error('price') is-invalid @enderror" name="price" id="prix">
                </div>
                @error('price')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <br>
            <h2>Images de l'annonce</h2>

            <p>Ici, vous pouvez ajouter vos propres images</p>
            <div id="img">
                <input type="hidden" id="compteur" value="0">


                    @foreach($ad->images as $image)

                        <div class="form-group" id="block_{{$loop->index}}">
                            <div class="row">
                                <div class="col-10">
                                    <div class="row">
                                        <input type="hidden" name="images[{{$loop->index}}][id]" value="{{$image['id']}}" />
                                        <div class="col">
                                            <input placeholder="URL de l'annonce" value="{{ old('images.'.$loop->index.'.url', $image['url']) }}"
                                                   class="form-control @error('images.'.$loop->index.'.url') is-invalid @enderror"
                                                   name="images[{{$loop->index}}][url]">
                                            @error('images.'.$loop->index.'.url')
                                            <p class="error">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input placeholder="Caption de l'annonce"
                                                   class="form-control @error('images.'.$loop->index.'.caption') is-invalid @enderror"
                                                   value="{{ old('images.'.$loop->index.'.caption', $image['caption']) }}"
                                                   name="images[{{$loop->index}}][caption]">
                                            @error('images.'.$loop->index.'.caption')
                                            <p class="error">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="btn btn-danger" data-action="delete"
                                       data-target="#block_{{$loop->index}}">X</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @php $total = count($ad->images) @endphp

                @if(old('images'))
                    @foreach(old('images') as $image)
                        @if(!isset($image['id']))
                    <div class="form-group" id="block_{{ $loop->index}}">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col">
                                        <input placeholder="URL de l'annonce" value="{{ old('images.'.$loop->index.'.url') }}"
                                               class="form-control @error('images.'.$loop->index.'.url') is-invalid @enderror"
                                               name="images[{{$loop->index}}][url]">
                                        @error('images.'.$loop->index.'.url')
                                        <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input placeholder="Caption de l'annonce"
                                               class="form-control @error('images.'.$loop->index.'.caption') is-invalid @enderror"
                                               value="{{ old('images.'.$loop->index.'.caption') }}"
                                               name="images[{{$loop->index}}][caption]">
                                        @error('images.'.$loop->index.'.caption')
                                        <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="#" class="btn btn-danger" data-action="delete"
                                   data-target="#block_{{ $loop->index}}">X</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                @endif



            </div>

            <br>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="add-image">

                    Ajouter une image
                </button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script>
        $('document').ready(function () {

            const count = +$('#img div.form-group').length;
            $('#compteur').val(count);

            $("#add-image").click(function () {

                const x = +$('#compteur').val();

                $("#img").append('<div class="form-group" id="block_' + x + '"><div class="row">\n' +
                    '                    <div class="col-10">\n' +
                    '                        <div class="row">\n' +
                    '                            <div class="col">\n' +
                    '                                <input placeholder="URL de l\'annonce" class="form-control" name="images[' + x + '][url]" />\n' +
                    '                            </div>\n' +
                    '                            <div class="col">\n' +
                    '                                <input placeholder="Caption de l\'annonce" class="form-control" name="images[' + x + '][caption]" />\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <div class="col-2">\n' +
                    '                        <a href="#" class="btn btn-danger" data-action="delete" data-target="#block_' + x + '">X</a>\n' +
                    '                    </div>\n' +
                    '                </div></div>');

                const count = +$('#img div.form-group').length;
                $('#compteur').val(count);
            });

            $('#img').on('click', '.btn.btn-danger', function (e) {
                e.preventDefault();
                const target = this.dataset.target;
                $(target).remove();
                const count = +$('#img div.form-group').length;
                $('#compteur').val(count);
            });

        });
    </script>
@endsection
