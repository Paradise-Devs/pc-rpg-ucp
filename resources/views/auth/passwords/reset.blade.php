@extends('layouts.auth')
@section('title', '- Redefinição de senha')
@section('content')
<div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
    <div class="row mb15 table-layout">
        <div class="col-xs-6 pln">
            <a href="{{ url('/dashboard') }}" title="Retornar ao Dashboard">
            <img src="{{ URL::asset('assets/img/logos/logo-big.png') }}" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>
        <div class="col-xs-6 va-b">
            <div class="login-links text-right">
                <a href="#" class="" title="False Credentials">Redefinição de senha</a>
            </div>
        </div>
    </div>
    <div class="panel panel-info heading-border br-n">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="panel-body p15 pt25">
                <div class="alert alert-micro alert-info pastel mn">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-info pr10"></i> Redefina a sua senha.
                </div>
            </div>
            <div class="panel-footer">
                <div class="section">
                    <div class="smart-widget">
                        <label for="email" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                            <input type="email" name="email" id="email" class="gui-input" value="{{ $email or old('email') }}" placeholder="Insira o seu endereço de email">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope-o"></i>
                            </label>
                        </label>
                        @if ($errors->has('email'))
                            <em for="email" class="state-error">{{ $errors->first('email') }}</em>
                        @endif
                    </div>
                </div>
                <div class="section">
                    <div class="smart-widget">
                        <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                            <input type="password" name="password" id="password" class="gui-input" placeholder="Insira a sua nova senha">
                            <label for="password" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                        @if ($errors->has('password'))
                            <em for="password" class="state-error">{{ $errors->first('password') }}</em>
                        @endif
                    </div>
                </div>
                <div class="section">
                    <div class="smart-widget">
                        <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                            <input type="password" name="password_confirmation" id="password-confirm" class="gui-input" placeholder="Repita a sua nova senha">
                            <label for="password" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                        @if ($errors->has('password'))
                            <em for="password" class="state-error">{{ $errors->first('password') }}</em>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Redefinir senha</button>
            </div>
        </form>
    </div>
</div>
@endsection
