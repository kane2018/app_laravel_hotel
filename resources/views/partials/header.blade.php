<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home.index')}}">SymBNB</a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link"
                                        href="{{route('home.index')}}">Accueil </a></li>

                <li class="nav-item"><a class="nav-link"
                                        href="{{route('ads.index')}}">Annonces </a></li>
            </ul>

            <ul class="navbar-nav align-self-auto">

                @auth()
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="{{auth()->user()->picture}}" alt="avatar de " class="avatar avatar-min" id="accountDropdownLink">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdownLink">
                        <a href="{{route('ads.create')}}" class="dropdown-item">Créer une annonce</a>
                        <a href="{{route('account.index')}}" class="dropdown-item">Mon compte</a>
                        <a href="" class="dropdown-item">Mes réservations</a>
                        <a href="{{route('profile')}}" class="dropdown-item">Modifier mon profil</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('logout')}}" class="dropdown-item">Déconnexion</a>
                    </div>
                </li>
                @endauth

                @guest()
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Inscription</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">Connexion</a>
                </li>
                    @endguest

            </ul>

        </div>
    </div>
</nav>
@if (session('success'))
    <div class="container alert alert-success">
        {{session('success')}}
    </div>
@endif
@if (session('warning'))
    <div class="container alert alert-warning">
        {{session('warning')}}
    </div>
@endif
