@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase text-center"><h4>{{ __('Verifica il tuo indirizzo e-mail') }}</h4></div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Ti è stato appena inviato un link all\'e-mail che hai utilizzato per registrarti.') }}
                    </div>
                    @endif
                    <div class="text-center">
                        <h5>{{ __('Prima di procedere, devi verificare il tuo account. Controlla il link di verifica nella tua e-mail!') }}</h5>
                        <h6 class="mt-3 mb-2"><i>{{ __('Se non hai ancora ricevuto il link di verifica:') }}</i></h6>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-outline-secondary p-1 m-0 align-baseline">{{ __('Clicca qui per richiederne un altro') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection