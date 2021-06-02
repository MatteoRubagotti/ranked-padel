@extends('layouts.layout')

@section('titolo', 'Homepage')

@section('left_navbar')
<li class="nav-item">
    <a class="nav-link active" href="{{route('home')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
            fill="currentColor" class="bi bi-house-door" viewBox="0 0 20 20">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </svg>Home
    </a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Trova
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="{{route('campi')}}">Campo</a></li>
        <li><a class="dropdown-item" href="{{route('partite')}}">Partita</a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('ranking')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
            fill="currentColor" class="bi bi-list-ol" viewBox="0 -1 20 20">
            <path fill-rule="evenodd"
                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
            <path
                d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
        </svg>Ranking
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('home')}}#news">
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
    <!-- <img id="news-icon" class="mb-1" src="{{url('/')}}/svg/news.svg" width="30" height="25"></img> Novità</a> -->
</li>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{route('home')}}">Home</a></li>
@endsection

@section('corpo')
<!-- WELCOME -->
<div class="welcome-container container my-5 mw-100 bg-light mb-2">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-xl-3 pt-lg-3 mb-lg-5">
            <h1 class="fw-bold mt-3 display-2 ms-3 text-center">BENVENUTO IN <b class="title">RANKED PADEL!</b></h1>
            <h1 class="text-center"><img src="svg/logo-padel.png" width="110" height="128"></img></h1>
            <p class="lead mt-3 ms-5 me-5">Piattaforma per la <b class="fw-bold text-uppercase">prenotazione</b> di
                campi da padel oppure <b class="fw-bold text-uppercase">partecipa</b> a partite già create da altri
                giocatori del tuo livello. Tieni traccia delle
                tue statistiche e la <b class="fw-bold text-uppercase">classifica</b> di tutti i giocatori registrati!
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-4 mb-lg-0 ms-3 me-3 mt-5">
                <button type="button" class="btn btn-success btn-lg px-4 me-md-2 fw-bold col-lg-5 col-md-4 ms-lg-5">
                    <a href="{{route('campi')}}">PRENOTA ORA!</a></button>
                <button type="button"
                    class="btn btn-outline-secondary btn-light btn-lg px-4 fw-bold col-lg-5 col-md-4 me-lg-4">
                    <a href="{{route('ranking')}}">RANKING</a> </button>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 position-relative overflow-hidden ">
            <div class="position-lg-absolute overflow-hidden pb-0">
                <img class="d-block rounded-lg-3 mx-auto" src="{{ url('/') }}/img/homepage-welcome.jpeg" alt=""
                    width="720" id="welcome-img" />
            </div>
        </div>
    </div>
</div>
<!-- END WELCOME -->

<br>

<!-- NEWS -->
<div class="col-lg-6 float-left mb-3 me-3 bg-success rounded-2 text-center ms-3" id="news">
    <h1 class="display-3 fw-bold pt-1 text-uppercase mb-2 text-light"><img src="{{ url('/')}}/svg/news-index.svg"
            width="60" height="60"> <b>Novità</b> </h1>
</div>
@if(count($news) == 0)
<div class="col-lg-6 me-3 float-left mb-5 text-center pt-3 pb-5" id="news-div">
    <h1 class="text-uppercase text-black-50"><i>Non ci sono novità ...</i></h1>
</div>
@else
<div class="col-lg-6 me-3 float-left mb-5 ms-3" id="news-div">
    <div class="accordion" id="accordionNews">
        @foreach($news as $news)
        <div class="accordion-item">
            @if($loop->first)
            <h2 class="accordion-header" id="heading{{$loop->index}}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$loop->index}}" aria-expanded="true"
                    aria-controls="collapse{{$loop->index}}">
                    <div class="title-accordion me-0"> {{$news->title }} </div>
                </button>
            </h2>
            <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionNews">
                <div class="accordion-body accordion-body-custom overflow-auto">
                    <div class="">{{ $news->description }}</div>
                </div>
            </div>
            @else
            <h2 class="accordion-header" id="heading{{$loop->index}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$loop->index}}" aria-expanded="false"
                    aria-controls="collapse{{$loop->index}}">
                    <div class="title-accordion me-0"> {{$news->title }} </div>
                </button>
            </h2>
            <div id="collapse{{$loop->index}}" class="accordion-collapse collapse"
                aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionNews">
                <div class="accordion-body accordion-body-custom overflow-auto">
                    <div class="">{{ $news->description }}</div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif
<!-- END NEWS -->
@endsection