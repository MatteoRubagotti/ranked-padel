@extends('layouts.layout')

@section('titolo', 'Campi')

@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="30"
                height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 20 20">
                <path
                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
            </svg>Home
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Trova
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item active" href="#">Campo</a></li>
            <li><a class="dropdown-item" href="{{ route('partite') }}">Partita</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ranking') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="30"
                height="30" fill="currentColor" class="bi bi-list-ol" viewBox="0 -1 20 20">
                <path fill-rule="evenodd"
                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
            </svg>Ranking
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}#news">
            <svg viewBox="0 25 550 550" width="22" height="22" xmlns="http://www.w3.org/2000/svg">
                <g color="rgba(255,255,255,.55)">
                    <path fill="currentcolor"
                        d="m497 121h-114v-89c0-8.284-6.716-15-15-15h-353c-8.284 0-15 6.716-15 15v388c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-284c0-8.284-6.716-15-15-15zm-422 344c-24.813 0-45-20.187-45-45v-373h323c0 396.466-.189 374.424.344 380.077 1.304 13.906 6.49 27.019 14.691 37.923zm407-45c0 24.813-20.187 45-45 45-3.366 0-5.695 0-9 0-24.813 0-45-20.187-45-45v-269h99z" />
                    <path fill="currentcolor"
                        d="m304 89h-224c-8.284 0-15 6.716-15 15s6.716 15 15 15h224c8.284 0 15-6.716 15-15s-6.716-15-15-15z" />
                    <path fill="currentcolor"
                        d="m304 153h-224c-8.284 0-15 6.716-15 15s6.716 15 15 15h224c8.284 0 15-6.716 15-15s-6.716-15-15-15z" />
                    <path fill="currentcolor"
                        d="m304 393h-224c-8.284 0-15 6.716-15 15s6.716 15 15 15h224c8.284 0 15-6.716 15-15s-6.716-15-15-15z" />
                    <path fill="currentcolor"
                        d="m304 217h-112c-8.284 0-15 6.716-15 15v112c0 8.284 6.716 15 15 15h112c8.284 0 15-6.716 15-15v-112c0-8.284-6.716-15-15-15zm-15 112h-82v-82h82z" />
                    <path fill="currentcolor"
                        d="m80 271h48c8.284 0 15-6.716 15-15s-6.716-15-15-15h-48c-8.284 0-15 6.716-15 15s6.716 15 15 15z" />
                    <path fill="currentcolor"
                        d="m80 335h48c8.284 0 15-6.716 15-15s-6.716-15-15-15h-48c-8.284 0-15 6.716-15 15s6.716 15 15 15z" />
                </g>
            </svg>
            Novità</a>
        <!-- <img id="news-icon" class="mb-1" src="{{ url('/') }}/svg/news.svg" width="30" height="25"></img> Novità</a> -->
    </li>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Trova Campo</li>
@endsection

@section('corpo')

    @include('user.bannersDashboard')

    @if (session('error_msg'))
        <div class="mt-5 mb-0 alert alert-danger alert-dismissible fade show text-center" role="alert">
            <b>{{ session('error_msg') }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- CONTAINER -->
    <div class="container first-component" id="prenota-campo-div">
        <div class="row p-2 ps-0 pe-0 pb-0 pe-lg-0 pt-lg-4 rounded-3 border shadow-lg">
            <div class="col-lg-6 col-md-12 p-lg-4 ps-lg-4 mt-xs-3 text-center mb-3 h-100">
                <h1
                    class="shadow display-4 fw-bold lh-1 text-uppercase pt-3 pb-3 p-md-2 text-center my-auto bg-success rounded text-light mt-2 ms-3 me-3">
                    Prenota un campo</h1>
                <p class="mt-4 p-2 h3 text-center">Seleziona un campo disponibile ed effettua la tua prenotazione.</p>
            </div>
            <div class="col-lg-6 col-md-12 position-relative overflow-hidden p-0 my-auto mx-auto ps-lg-0 pe-lg-3 ps-5 pe-5">
                <div class="position-lg-absolute overflow-hidden p-0">
                    <img class="d-block col-12 rounded img-fluid" src="{{ url('/') }}/img/campi.jpeg" id="campo-img">
                </div>
            </div>

            <hr class="divider mt-4 mb-0 ms-0 ps-0">

            <div class="row row-cols-12 mt-2 ps-5 pe-4" id="fields_page">
                @foreach ($fields as $field)
                    <div class="col-lg-4 col-sm-12 col-12 p-3">
                        @if ($field->available)
                            <a href="{{ route('campi.prenotazione', ['idField' => $field->id]) }}">
                            @else
                                <a data-bs-toggle="tooltip" title="Campo non disponibile!" data-bs-placement="top"
                                    id="field-not-available{{ $loop->index }}">
                                    <script>
                                        var index = JSON.parse("{{ json_encode($loop->index) }}");
                                        var element = document.getElementById('field-not-available'.concat(index));
                                        var tooltip = new bootstrap.Tooltip(element);
                                    </script>
                        @endif
                        <div class="card card-cover h-100 overflow-hidden bg-light rounded-5 shadow-lg"
                            style="background-image: url('{{ '/' }}svg/padel-field.svg'); height: 260px !important;">
                            <div class="d-flex flex-column h-100 pt-2 pe-2 pb-3 ps-3 pb-0 text-shadow-1">
                                <h3 class="mb-3 display-7 lh-1 fw-bold text-uppercase d-flex justify-content-end">
                                    {{ $field->name }}</h3>
                                <!-- <ul class="d-flex mb-0 ms-auto">
                                    <li class="d-flex align-items-center me-3 text-white bg-info rounded-2 p-1 ps-2 pe-2">
                                    <i class="bi bi-umbrella me-2"></i></i>Coperto
                                    </li>
                                </ul> -->
                                <ul class="d-flex list-unstyled mt-auto mb-0">
                                    <li class="me-3 justify-content-end align-items-center">
                                        @if ($field->available)
                                            <i class="bi bi-circle-fill me-2"
                                                style="color: rgb(0, 175, 0); font-size: 25px"></i> <b
                                                style="font-size: 15px !important" class="">Disponibile</b>
                                        @else
                                            <i class="bi bi-circle-fill me-2" style="color: red; font-size: 25px"></i> <b
                                                style="font-size: 15px !important" class="">Non
                                                disponibile</b>
                                        @endif
                                    </li>
                                    @if ($field->indoor)
                                        <li
                                            class="d-flex align-items-center mx-auto me-3 text-white bg-info rounded-4 p-1 pe-2 ps-2">
                                            <b class="text-uppercase"> Outdoor </b>
                                        @else
                                        <li
                                            class="d-flex align-items-center mx-auto me-3 text-white bg-warning rounded-4 p-1 pe-2 ps-2">
                                            <b class="text-uppercase"> Indoor </b>
                                    @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="container mt-3"> {{ $fields->links() }} </div>
        </div>
    </div>
    <!-- END CONTAINER -->
@endsection
