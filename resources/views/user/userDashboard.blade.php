@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-uppercase text-success text-center display-1 font-weight-bolder"><b>Dashboard</b>
                        </h1>
                    </div>
                    <div class="card-body">

                        @include('user.bannersDashboard')

                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-8">
                                    @if ($user->sex == 'm')
                                        <img src="{{ url('/') }}/svg/profile-male.png" class="rounded mx-auto d-block"
                                            height="200" width="200" alt="Foto profilo">
                                    @else
                                        <img src="{{ url('/') }}/svg/profile-female.png"
                                            class="rounded mx-auto d-block" height="200" width="200" alt="Foto profilo">
                                    @endif
                                    <h1 class="mt-3 mb-4 text-center text-uppercase font-weight-bold">{{ $user->name }}
                                        {{ $user->lastname }}</h1>
                                </div>
                                <div class="col-3 offset-1 text-uppercase my-auto mx-auto">
                                    <ul class="list-group list-group-horizontal mb-5 justify-content-center">
                                        <li
                                            class="list-group-item list-group-item-success pt-3 flex-fill justify-content-center text-center">
                                            <h5 class="font-weight-bolder text-success text-center">Vittorie </h5>
                                            <h4><span class="badge bg-success rounded-pill">{{ $wins ?? '0' }}</span></h4>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-horizontal justify-content-center">
                                        <li
                                            class="list-group-item list-group-item-danger pt-3 flex-fill justify-content-center text-center">
                                            <h5 class="font-weight-bolder text-danger text-center">Sconfitte </h5>
                                            <h4><span class="badge bg-danger rounded-pill">{{ $losts ?? '0' }}</span></h4>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <hr class="mb-3">


                        <div class="">
                            <span class="position-absolute end-0 me-3 mb-2"> <button class="btn btn-primary text-uppercase text-white"
                                    type="button" onclick="enableEditUserProfile()">Aggiorna dati
                                    <i class="ms-2 bi bi-pencil-square"> </button></span>
                        </div>

                        <div class="container">
                            <form name="edit-profile" method="post" action="{{ route('user.aggiornaProfilo') }}"
                                id="edit-profile" class="needs-validation" novalidate>
                                @csrf
                                <div class="input-group mb-3 mt-3 justify-content-center">
                                    <div class="input-group col-10 col-lg-5 mb-3 mb-lg-0">
                                        <span class="input-group-text bg-light rounded" id="username-dashboard">
                                            Username @
                                        </span>
                                        <input type="text" class="form-control text-center"
                                            placeholder="{{ $user->username }}" aria-label="Username" name="username"
                                            disabled>
                                    </div>

                                    <div class="input-group col-lg-5 col-11">
                                        <span class="input-group-text bg-light rounded">E-mail</span>
                                        <input type="text" class="form-control disabled text-center"
                                            placeholder="{{ $user->email }}" value="{{ $user->email }}"
                                            aria-label="E-mail" id="email-dashboard" name="email" disabled>
                                    </div>
                                </div>

                                <b>
                                    <div id="email-alert" class="text-center text-danger"></div>
                                </b>

                                <div class="input-group mt-5 mb-3 justify-content-center">
                                    <span class="input-group-text bg-light ps-3 pe-3 rounded">Sesso</span>
                                    <span class="col-2 col-sm-1 p-0"><input type="text"
                                            class="form-control disabled text-uppercase text-center"
                                            placeholder="{{ $user->sex }}" aria-label="Sex" id="sex-dashboard"
                                            disabled></span>

                                    <span class="ms-4 ms-sm-5 input-group-text bg-light ps-md-3 pe-md-3 rounded">Mano</span>
                                    <span class="col-3 col-md-2 p-0">
                                        @if ($user->hand == 'dx')
                                            <input type="text" class="form-control disabled text-center"
                                                placeholder='Destra' aria-label="Mano preferita" id="hand-dashboard"
                                                disabled>
                                        @else
                                            <input type="text" class="form-control disabled text-center"
                                                placeholder='Sinistra' aria-label="Mano preferita" id="hand-dashboard"
                                                disabled>
                                        @endif
                                    </span>

                                    <span
                                        class="col-2 col-sm-3 col-md-1 mt-4 mt-sm-4 ms-4 ms-sm-5 mt-md-0 input-group-text bg-light ps-md-3 pe-md-3 rounded justify-content-center">Età</span>
                                    <span class="col-2 col-sm-2 col-md-1 mt-4 p-0 mt-sm-4 mt-md-0"><input id="age-dashboard"
                                            type="text" class="form-control disabled text-uppercase text-center"
                                            placeholder="{{ $user->age }}" name="age" value="{{ $user->age }}"
                                            aria-label="Age" disabled></span>
                                </div>

                                <b>
                                    <div id="age-alert" class="text-center text-danger"></div>
                                </b>

                                <div class="">

                                    <span class="position-absolute end-0 me-3"><button
                                            class="btn btn-outline-success text-uppercase" type="submit"
                                            onclick="event.preventDefault(); editUserProfile()" id="save-profile" hidden>
                                            Salva <i class="bi bi-sd-card"></i></button></span>
                                </div>
                            </form>
                        </div>


                        <div class="justify-content-center text-center">
                            <h5 class="mt-5 text-uppercase"><b>Livello</b></h5>
                            <div class="progress mt-2 h-25">
                                <div class="progress-bar p-2 @if ($levelRate == 25) bg-info @elseif($levelRate == 50) bg-primary @elseif($levelRate == 75) bg-warning @else bg-danger @endif" role="progressbar"
                                    style="width: {{ $levelRate }}%;" aria-valuenow="{{ $levelRate }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <h6 class="m-0 text-uppercase">{{ $levelString }}</h6>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-5">

                        @include('user.prenotazioniDashboard')

                        <hr class="mb-4">

                        @include('user.partiteDashboard')

                        <hr>

                    </div> <!-- END-CARD_BODY -->
                </div>
            </div>
        </div>
    </div>
@endsection
