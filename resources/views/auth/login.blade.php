@extends('layouts.auth')
@section('title', '- Login')
@section('content')
<div class="admin-form theme-info" id="login1">
    <div class="row mb15 table-layout">
        <div class="col-xs-6 va-m pln">
            <a href="dashboard.html" title="Return to Dashboard">
            <img src="assets/img/logos/logo-big.png" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>
        <div class="col-xs-6 text-right va-b pr5">
            <div class="login-links">
                <a href="{{ url('/password/reset') }}" class="" title="Esqueci minha senha">Esqueci minha senha</a>
                <span class="text-white"> | </span>
                <a href="{{ url('/register') }}" class="active" title="Registrar">Registrar</a>
            </div>
        </div>
    </div>
    <div class="panel panel-info mt10 br-n">
        <div class="panel-heading heading-border bg-white">
            <span class="panel-title hidden">
            <i class="fa fa-sign-in"></i>Registrar</span>
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
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="panel-body bg-light p30">
                <div class="row">
                    <div class="col-sm-7 pr30">
                        <div class="section row hidden">
                            <div class="col-md-4">
                                <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                <span>
                                <i class="fa fa-facebook"></i>
                                </span>Facebook</a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                <span>
                                <i class="fa fa-twitter"></i>
                                </span>Twitter</a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="button btn-social googleplus span-left btn-block">
                                <span>
                                <i class="fa fa-google-plus"></i>
                                </span>Google+</a>
                            </div>
                        </div>
                        <div class="section">
                            <label for="username" class="field-label text-muted fs18 mb10">E-mail</label>
                            <label for="email" class="field prepend-icon {{ $errors->has('email') ? ' state-error' : '' }}">
                                <input type="email" name="email" id="email" class="gui-input" value="{{ old('email') }}" placeholder="Entre com o email">
                                <label for="email" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                            </label>
                            @if ($errors->has('email'))
                                <em for="email" class="state-error">{{ $errors->first('email') }}</em>
                            @endif
                        </div>
                        <div class="section">
                            <label for="username" class="field-label text-muted fs18 mb10">Senha</label>
                            <label for="password" class="field prepend-icon {{ $errors->has('password') ? ' state-error' : '' }}">
                                <input type="password" name="password" id="password" class="gui-input" placeholder="Entre com a senha">
                                <label for="password" class="field-icon">
                                    <i class="fa fa-lock"></i>
                                </label>
                            </label>
                            @if ($errors->has('password'))
                                <em for="password" class="state-error">{{ $errors->first('password') }}</em>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-5 br-l br-grey pl30">
                        <h3 class="mb25"> Paradise City RPG:</h3>
                        <p class="mb15">
                            <span class="fa fa-check text-success pr5"></span> Totalmente gratuido
                        </p>
                        <p class="mb15">
                            <span class="fa fa-check text-success pr5"></span> Ilimitadas possibilidades
                        </p>
                        <p class="mb15">
                            <span class="fa fa-check text-success pr5"></span> Conquiste propriedades
                        </p>
                        <p class="mb15">
                            <span class="fa fa-check text-success pr5"></span> Conheça pessoas novas
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-primary mr10 pull-right">Acessar</button>
                <label class="switch ib switch-primary pull-left input-align mt10">
                <input type="checkbox" name="remember" id="remember" checked>
                <label for="remember" data-on="SIM" data-off="NÃO"></label>
                <span>Lembrar me</span>
                </label>
            </div>
        </form>
    </div>
</div>
@endsection
