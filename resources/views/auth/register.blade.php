@extends('layouts.auth')
@section('title', '- Registro')
@section('content')
    <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">
        <div class="row mb15 table-layout">
            <div class="col-xs-6 va-m pln">
                <a href="dashboard.html" title="Return to Dashboard">
                <img src="assets/img/logos/logo-big.png" title="AdminDesigns Logo" class="img-responsive w250">
                </a>
            </div>
            <div class="col-xs-6 text-right va-b pr5">
                <div class="login-links">
                    <a href="{{ url('/login') }}" class="" title="Acessar">Acessar</a>
                    <span class="text-white"> | </span>
                    <a href="{{ url('/register') }}" class="active" title="Registrar">Registrar</a>
                </div>
            </div>
        </div>
        <div class="panel panel-info mt10 br-n">
            <div class="panel-heading heading-border bg-white">
                <div class="section row mn">
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social facebook span-left mr5 btn-block" disabled>
                        <span>
                        <i class="fa fa-facebook"></i>
                        </span>Facebook</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social twitter span-left mr5 btn-block" disabled>
                        <span>
                        <i class="fa fa-twitter"></i>
                        </span>Twitter</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social googleplus span-left btn-block" disabled>
                        <span>
                        <i class="fa fa-google-plus"></i>
                        </span>Google+</a>
                    </div>
                </div>
            </div>
            <form role="form" method="POST" action="{{ url('/register') }}" id="account2">
                {{ csrf_field() }}
                <div class="panel-body p25 bg-light">
                    <div class="section-divider mt10 mb40">
                        <span>Registre a sua conta</span>
                    </div>
                    <!-- .section-divider -->
                    <div class="section row">
                        <div class="col-md-6">
                            <label for="firstname" class="field prepend-icon {{ $errors->has('firstname') ? 'state-error' : '' }}">
                                <input type="text" name="firstname" id="firstname" class="gui-input" value="{{ old('firstname') }}" placeholder="Primeiro nome">
                                <label for="firstname" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                            </label>
                            @if ($errors->has('firstname'))
                                <em for="firstname" class="state-error">{{ $errors->first('firstname') }}</em>
                            @endif
                        </div>
                        <!-- end section -->
                        <div class="col-md-6">
                            <label for="lastname" class="field prepend-icon {{ $errors->has('lastname') ? 'state-error' : '' }}">
                                <input type="text" name="lastname" id="lastname" class="gui-input" value="{{ old('lastname') }}" placeholder="Último nome">
                                <label for="lastname" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                            </label>
                            @if ($errors->has('lastname'))
                                <em for="lastname" class="state-error">{{ $errors->first('lastname') }}</em>
                            @endif
                        </div>
                        <!-- end section -->
                    </div>
                    <!-- end .section row section -->
                    <div class="section">
                        <label for="email" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                            <input type="email" name="email" id="email" class="gui-input" value="{{ old('email') }}" placeholder="Endereço de e-mail">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                        @if ($errors->has('email'))
                            <em for="email" class="state-error">{{ $errors->first('email') }}</em>
                        @endif
                    </div>
                    <!-- end section -->
                    <div class="section">
                        <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                            <input type="password" name="password" id="password" class="gui-input" value="{{ old('password') }}" placeholder="Crie uma senha">
                            <label for="password" class="field-icon">
                                <i class="fa fa-unlock-alt"></i>
                            </label>
                        </label>
                        @if ($errors->has('password'))
                            <em for="password" class="state-error">{{ $errors->first('password') }}</em>
                        @endif
                    </div>
                    <!-- end section -->
                    <div class="section">
                        <label for="password-confirm" class="field prepend-icon {{ $errors->has('password_confirmation') ? 'state-error' : '' }}">
                            <input type="password" name="password_confirmation" id="password-confirm" class="gui-input" placeholder="Repita a sua senha">
                            <label for="password_confirmation" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                        @if ($errors->has('password_confirmation'))
                            <em for="password_confirmation" class="state-error">{{ $errors->first('password_confirmation') }}</em>
                        @endif
                    </div>
                    <!-- end section -->
                    <div class="section-divider mv40">
                        <span>Termos de Serviço</span>
                    </div>
                    <!-- .section-divider -->
                    <div class="section mb15">
                        <label class="option block mt15 {{ $errors->has('terms') ? 'state-error' : '' }}">
                            <input type="checkbox" name="terms" id="terms">
                            <span class="checkbox"></span>Eu aceito os <a href="#" class="theme-link"> termos de uso. </a>
                        </label>
                        @if ($errors->has('terms'))
                            <em for="terms" class="state-error">{{ $errors->first('terms') }}</em>
                        @endif
                    </div>
                    <!-- end section -->
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer clearfix">
                    <button type="submit" class="button btn-primary pull-right">Criar conta</button>
                </div>
                <!-- end .form-footer section -->
            </form>
        </div>
    </div>
@endsection
