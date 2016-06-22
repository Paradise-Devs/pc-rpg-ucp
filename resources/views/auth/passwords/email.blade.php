@extends('layouts.auth')
@section('title', '- Recuperação de senha')
@section('content')
<div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
    <div class="row mb15 table-layout">
        <div class="col-xs-6 pln">
            <a href="dashboard.html" title="Return to Dashboard">
            <img src="../assets/img/logos/logo-big.png" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>
        <div class="col-xs-6 va-b">
            <div class="login-links text-right">
                <a href="#" class="" title="False Credentials">Recuperação de senha</a>
            </div>
        </div>
    </div>
    <div class="panel panel-info heading-border br-n">
        <form role="form" method="POST" action="{{ url('/password/email') }}" id="contact">
            {{ csrf_field() }}
            <div class="panel-body p15 pt25">
                @if (session('status'))
                    <div class="alert alert-micro alert-success pastel mn">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="alert alert-micro alert-info pastel mn">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info pr10"></i> Insira o seu
                        <b>e-mail</b> e instruções serão enviadas para você.
                    </div>
                @endif
            </div>
            <div class="panel-footer">
                <div class="section">
                    <div class="smart-widget">
                        <label for="email" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                            <input type="email" name="email" id="email" class="gui-input" value="{{ old('email') }}" placeholder="Insira o seu endereço de email">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope-o"></i>
                            </label>
                        </label>
                        @if ($errors->has('email'))
                            <em for="email" class="state-error">{{ $errors->first('email') }}</em>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Enviar solicitação</button>
            </div>
        </form>
    </div>
</div>
@endsection
