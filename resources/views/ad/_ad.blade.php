<div class="col-md-4">
    <div class="card bg-light mb-3">
        <div class="card-header text-center">
            {{ $ad->rooms }}
            chambres, <strong>{{ $ad->price }}&euro; / nuit</strong> <br />
            <small>Pas encore noté</small>
        </div>
        <a href="{{route('ads.show', $ad->slug)}}"> <img
                src="{{  $ad->cover_image }}" alt="{{  $ad->cover_image }}"
                style="height: 200px; width: 100%; display: block"/>
        </a>

        <div class="card-body">
            <h4 class="card-title">
                <a href="{{route('ads.show', $ad->slug)}}">{{ $ad->title }}</a>
            </h4>
            <p>
                {{ $ad->introduction }}
            </p>
            <a href="{{route('ads.show', $ad->slug)}}"
               class="btn btn-secondary">En savoir plus !</a>

        </div>
    </div>
</div>
