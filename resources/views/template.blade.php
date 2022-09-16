<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SymBNB - @yield('titre')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0128 128%22>
<text y=%221.2em%22 font-size=%2296%22>⚫️</text>
</svg>
">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>


</head>
<body>

@include('partials.header')


@yield('contenu')


@include('partials.footer')

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
@yield('script')
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.fr.min.js')}}"></script>

</body>
</html>
