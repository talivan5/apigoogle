@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se envio un correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar verifique su correo electronico') }}
                    {{ __('Si no recibiste el correo') }}, <a href="{{ route('verification.resend') }}">{{ __('Haga clic aquí para volver a solicitar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
