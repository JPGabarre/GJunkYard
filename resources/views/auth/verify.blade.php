@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica la teva adreça e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('S'ha enviat un nou enllaç de verificació a la vostra adreça e-mail.') }}
                        </div>
                    @endif

                    {{ __('Abans de continuar, comproveu si hi ha un enllaç de verificació en la vostra adreça e-mail.') }}
                    {{ __('Si no heu rebut el correu electrònic') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Feu clic aquí per demanar-ne un altre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
