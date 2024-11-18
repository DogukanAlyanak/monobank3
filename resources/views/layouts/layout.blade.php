<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', '') | {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/6.2.0/css/all.min.css') }}">

    @stack('css')
    @stack('js-start')
</head>

<body>
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="{{ route('home') }}" class="btn btn-primary col-12 col-md-auto">
                    <i class="fa-solid fa-house"></i>
                    Ana Sayfa
                </a>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12 text-center">
                <h1>@yield('page_head')</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 text-end">
                @yield('page_buttons')
                <button type="button" class="btn btn-primary col-12 col-md-auto change-player-name">
                    <i class="fa-solid fa-user"></i>
                    <span class="player-name"></span>
                </button>
            </div>
        </div>
    </div>
    @yield('main_content')
    @include('layouts.player_modal')

    <input type="hidden" id="playerRouteUUID" value="{{ route('player.create_uuid') }}">
    <input type="hidden" id="playerRouteName" value="{{ route('player.save_name') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/plugins/fontawesome/6.2.0/js/pro.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax_csrf.js') }}"></script>
    <script src="{{ asset('assets/js/player.js') }}"></script>

    @stack('js')
</body>

</html>
