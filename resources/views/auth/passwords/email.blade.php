@extends('layouts.auth')
@section('title', '- Recuperação de senha')
@section('content')
<div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
    <div class="row mb15 table-layout">
        <div class="col-xs-6 pln">
            <a href="{{ url('/') }}" title="Voltar ao início">
            <img src="../assets/img/logos/logo-big.png" class="img-responsive w250">
            </a>
        </div>
        <div class="col-xs-6 va-b">
            <div class="login-links text-right">
                Recuperação de senha
            </div>
        </div>
    </div>
    <div class="panel panel-info heading-border br-n">
        <form role="form" method="POST" action="{{ url('/password/email') }}" id="contact">
            <div class="panel-body bg-light">
                {{ csrf_field() }}
                @if (session('status'))
                    <div class="alert alert-micro alert-success pastel mn">
                        {{ session('status') }}
                    </div>
                @endif
                <small class="text-muted mt10">Instruções para redefinição da senha será enviada caso o e-mail seja localizado no nosso banco de dados.</small>
                <label for="email" class="field prepend-icon mt20 {{ $errors->has('email') ? 'state-error' : '' }}">
                    <input type="email" name="email" id="email" class="gui-input" value="{{ old('email') }}" placeholder="Insira o seu endereço de email" required>
                    <label for="email" class="field-icon">
                        <i class="fa fa-envelope-o"></i>
                    </label>
                </label>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success btn-block">Enviar solicitação</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
<footer id="auth-footer" class="affix">
    <div class="row">
        <div class="col-md-6">
            <span class="footer-since">DESDE <b>2012</b></span>
            <span class="footer-separator">|</span>
            <a href="http://www.webgit.com.br/" class="link-unstyled">WEBGIT INC.</a> -
            <a href="#" class="link-unstyled">PARADISE DEVS</a>
            <span class="footer-separator">|</span>
            <span class="footer-poweredby">FEITO COM <a href="#" class="link-unstyled"><i class="fa fa-gitlab ml5 mr5"></i></a> E <i class="fa fa-heart-o ml5 mr5 text-danger"></i></span>
        </div>
    </div>
</footer>
@endsection
