@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-uppercase text-success text-center display-1 font-weight-bolder"><b>Area amministrazione</b></h1>
                    </div>
                    <div class="card-body">

                        {{-- @include('bannersDashboard') --}}
                        @if (session('msg_novità'))
                            <div class="mt-1 mb-1 alert alert-info alert-dismissible fade show text-center" role="alert">
                                <b> {{ session('msg_novità') ?? '' }}
                                </b>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('msg_field'))
                            <div class="mt-1 mb-1 alert alert-info alert-dismissible fade show text-center" role="alert">
                                <b> {{ session('msg_field') ?? '' }}
                                </b>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('msg_delete'))
                            <div class="mt-1 mb-1 alert alert-danger alert-dismissible fade show text-center" role="alert">
                                <b> {{ session('msg_delete') ?? '' }}
                                </b>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ url('/') }}/svg/profile-admin.png" class="rounded mx-auto d-block"
                                        height="200" width="200" alt="Foto profilo">
                                    <h1 class="mt-3 mb-4 text-center text-uppercase font-weight-bold">{{ $user->name }}
                                    </h1>
                                </div>
                            </div>
                        </div>

                        <hr class="mb-5">

                        <div class="container">
                            <div class="input-group mb-3 justify-content-center">

                                <div class="input-group col-lg-5">
                                    <span class="input-group-text bg-light rounded" id="email-dashboard">E-mail</span>
                                    <input type="text" class="form-control disabled text-center"
                                        placeholder="{{ $user->email }}" aria-label="E-mail" disabled>
                                </div>
                            </div>

                        </div>

                        <hr class="mt-5">

                        @include('admin.campiAdminDashboard')

                        <hr class="">

                        @include('admin.prenotazioniAdminDashboard')

                        <hr class="">

                        @include('admin.aggiungiCampoAdminDashboard')

                        <hr class="">

                        @include('admin.aggiungiNewsAdminDashboard')

                        <hr>

                    </div> <!-- END-CARD_BODY -->
                </div>
            </div>
        </div>
    </div>
@endsection
