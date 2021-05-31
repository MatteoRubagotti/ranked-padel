@extends('layouts.layout')

@section('titolo', 'Ranking')

@section('left_navbar')
<li class="nav-item">
  <a class="nav-link" href="{{route('home')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
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
  <a class="nav-link active" href="{{route('ranking')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
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
<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Ranking</li>
@endsection

@section('corpo')
<div class="p-3 pt-0 mb-4" id="div-ranking">
  <div class="container-fluid py-3">
    <!-- <hr class="divider p-0 mt-0 mb-3 ms-0 ps-0" style="border: solid 3px;"> -->
    <div class="container mb-3 bg-success" id="ranking-title">
      <h1 class="display-3 fw-bold pt-1 text-uppercase mb-2 text-light"><img src="{{ url('/')}}/svg/rank.svg" width="60"
          height="60"> <b>@yield('titolo')</b> </h1>
    </div>
    <!-- <hr class="divider p-0 mt-0 mb-3 ms-0 ps-0" style="border: solid 3px;"> -->
    <div class="container-fluid mt-0" id="ranking">
      <div class="container-fluid table-responsive">
        <table class="table table-hover align-middle shadow" id="ranking-table">
          <thead class="ranking-table-head table-dark">
            <tr class="align-items-center">
              <th scope="col"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                  class="bi bi-list-ol" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                  <path
                    d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                </svg></th>
              <th scope="col">Utente&ensp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                  fill="currentColor" class="bi bi-person-circle" viewBox="0 0 20 20">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg></th>
              <!-- data-bs-toggle="tooltip" data-bs-placement="right" title="(W-L)" -->
              <th scope="col">Storico partite&ensp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                  fill="currentColor" class="bi bi-clock-history" viewBox="0 0 20 20">
                  <path
                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                  <path
                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                </svg></th>
              <th scope="col">Ultime partite&ensp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                  fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 20 20">
                  <path
                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                  <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg></th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row"> {{ $loop->index + 1 }}</th>
              <td class="username">
                <p class="m-0">
                  <a class="btn p-0" data-bs-toggle="collapse" role="button" aria-expanded="false"
                    data-bs-target="#collapseUser{{$loop->index}}" aria-controls="collapseUser{{$loop->index}}">
                    {{ $user->username }}
                  </a>
                </p>
                <div class="collapse multi-collapse mt-2" id="collapseUser{{$loop->index}}">
                  <div class="card card-body">
                    <h5 class="card-title">{{ $user->name }} {{ $user->lastname }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><img class="me-1" src="{{url('/')}}/img/flags/it.png"
                        height="16" width="25"> ITALIA</h6>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><span> Età: </span> <span
                          class="font-weight-lighter">{{$user->age ?? '--'}}</span>
                      </li>
                      <li class="list-group-item">Livello: <span class="font-weight-light">@if($user->level == 0) <span
                            class="text-info">Principiante <i class="bi bi-star-fill"></i></span>@elseif($user->level ==
                          1) <span class="text-primary">Dilettante <i class="bi bi-star-fill"></i></span>
                          @elseif($user->level == 2) <span class="text-warning">Campione <i
                              class="bi bi-star-fill"></i></span>
                          @else <span class="text-danger">Leggenda <i class="bi bi-star-fill"></i></span> @endif </span>
                      </li>
                      <li class="list-group-item">Sesso: @if($user->sex == 'm') Maschio <i
                          class="bi bi-gender-male"></i> @else Femmina <i class="bi bi-gender-female"></i>@endif</li>
                      <li class="list-group-item">Mano: @if($user->hand == 'dx') Destra @else Sinistra @endif
                        <img src="{{url('/')}}/svg/hand-icon.svg" height="18" width="18"></li>
                    </ul>
                  </div>
                </div>
              </td>
              <td>{{ $winsUsers[$user->id] }} - {{ $lostsUsers[$user->id] }}</td>
              <td class="last-matches">
                @if ($lastGames[$user->id]->isEmpty())
                - - -
                @else
                @foreach($lastGames[$user->id] as $game)
                @if(!$loop->last) @if($game->result) W @else L @endif - @else @if($game->result) W @else L @endif @endif
                @endforeach
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- END RANKING TABLE -->
    {{-- {{ $users->links() }} --}}
    
    {{-- Pagination DataTable --}}
    <script>
      $(document).ready( function () {
      $('#ranking-table').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Italian.json'
        }
      } );
    } );
    </script>
  </div>
</div>
@endsection

