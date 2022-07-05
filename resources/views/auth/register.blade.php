@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-uppercase">
                        <h1 class="login-title">{{ __('Registrazione') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" name="registerForm" id="register-form">
                            @csrf

                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username" phpautofocus
                                        oninvalid="this.setCustomValidity('Inserisci un username')"
                                        oninput="setCustomValidity('')" required>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sesso') }}</label>

                                <div class="col-md-6 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-1" type="radio" name="sex" id="male" value="m"
                                            required checked>
                                        <label class="form-check-label" for="male">Maschio</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-1" type="radio" name="sex" id="female" value="f"
                                            required>
                                        <label class="form-check-label" for="female">Femmina</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        oninvalid="this.setCustomValidity('Inserisci un nome')"
                                        oninput="setCustomValidity('')">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <strong><span class="text-danger" id="alert_msg_name"></span></strong>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autofocus
                                        oninvalid="this.setCustomValidity('Inserisci un cognome')"
                                        oninput="setCustomValidity('')">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <strong><span class="text-danger" id="alert_msg_lastname"></span></strong>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="sex"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mano preferita') }}</label>

                                <div class="col-md-6 mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-1" type="radio" name="hand" id="sx" value="sx"
                                            checked required>
                                        <label class="form-check-label" for="sx">Sinistra</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-1" type="radio" name="hand" id="hand" value="dx"
                                            required>
                                        <label class="form-check-label" for="dx">Destra</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" {{-- oninvalid="this.setCustomValidity('Inserisci un\'e-mail')"
                                    oninput="setCustomValidity('')" --}}>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" autofocus
                                        oninvalid="this.setCustomValidity('Inserisci una password')"
                                        oninput="setCustomValidity('')">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        oninvalid="this.setCustomValidity('Conferma la tua password')"
                                        oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="offset-md-4 col-md-6 col-sm-12 col-12">
                                    <button type="submit" class="w-100 btn btn-outline-primary text-uppercase"
                                        onclick="event.preventDefault(); checkStrings()">
                                        {{ __('Registrati') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                            class="bi bi-person-plus" viewBox="0 -1 20 20">
                                            <path
                                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            <path fill-rule="evenodd"
                                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
