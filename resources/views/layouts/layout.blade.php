<!DOCTYPE html>
<html>

<head>

    <title>Ranked Padel - @yield('titolo')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap jQuery + plugin JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Bootstrap (v5.0) CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- Scripts (Auth) --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!--jQuery 3.6.0-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href='{{ url('/')}}/css/features.css' rel="stylesheet" type="text/css">

    <!-- My CSS & Custom JavaScript -->
    <link href='{{ url('/')}}/css/customCSS.css' rel="stylesheet" type="text/css">
    <script src="{{ url('/') }}/js/myScripts.js"></script>

    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{url('/')}}/svg/padel.svg" width="60" height="60" id="icon-padel">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav nav">
                    @yield('left_navbar')
                </ul>

                <ul class="navbar-nav ms-auto me-4" id="signIn">
                    <!-- <div class="col-3"> -->
                    @guest
                    <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-light float-end mb-2" id="btnSignIn"> Accedi /
                            Registrati
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 1 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </button>
                    </a>
                    @else
                    <ul class="navbar-nav ml-auto">
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle text-uppercase text-success" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->username }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-md-end" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item text-uppercase" @if(Auth::user()->is_admin)
                                        href="{{ route('admin.dashboard') }}" @else href="{{ route('user.dashboard') }}"
                                        @endif>
                                        {{ __('Profilo') }}
                                    </a></li>
                                <hr class="divider m-0 text-uppercase" style="border: solid 1px grey;">
                                <li><a class="dropdown-item logout text-uppercase" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </ul>
                    @endguest
                    <!-- </div> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-4 breadcrumb-div">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb float-end shadow">
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>

    <hr class="divider p-0 mt-2 mb-3 ms-0 ps-0">

    @yield('corpo')

</body>

</html>