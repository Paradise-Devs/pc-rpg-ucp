@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Configurar Conta')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
@endsection
<!--                                                                        -->
@section('topbar')
<header id="topbar" class="alt affix">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="#">UCP</a>
            </li>
            <li class="crumb-icon">
                <a href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail"><a href="{{ url('/perfil/'.$profile->id) }}">Meu Perfil</a></li>
            <li class="crumb-trail">Configurar Conta</li>
        </ol>
    </div>
    @can('admin')
        <div class="topbar-right">
            <a href="ticket_manage.html" type="button" class="btn btn-sm btn-system btn-gradient dark">
                <i class="fa fa-cog"></i> Gerenciar Jogador
            </a>
        </div>
    @endcan
</header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="animated fadeIn">
  <div class="row mt30">
      <div class="col-md-12">
          <div class="page-heading">
              <div class="media clearfix">
                  <div class="media-left pr30">
                      <a href="#">
                          <img class="media-object mw150" style="border-radius: 100%" src="{{ URL::asset("uploads/avatars/$profile->avatar_url") }}" alt="Avatar de {{ $profile->name }}">
                      </a>
                  </div>
                  <div class="media-body va-m">
                      <h2 class="media-heading">{{ $profile->name }}</h2>
                      @if($profile->admin == 1)
                          <button type="button" class="btn btn-xs btn-warning">Paradiser</button>
                      @elseif($profile->admin == 2)
                          <button type="button" class="btn btn-xs btn-info">Moderador</button>
                      @elseif($profile->admin == 3)
                          <button type="button" class="btn btn-xs btn-primary">Supervisor</button>
                      @elseif($profile->admin == 4)
                          <button type="button" class="btn btn-xs btn-danger">Administrador</button>
                      @elseif($profile->admin > 4)
                          <button type="button" class="btn btn-xs btn-success">Desenvolvedor</button>
                      @else
                          <button type="button" class="btn btn-xs btn-default">Jogador</button>
                      @endif

                      <p class="lead mt15" style="font-size: 14pt;">{{ $profile->bio }}</p>
                      <div class="media-links">
                          <ul class="list-inline list-unstyled">
                              <li>
                                  <a href="http://fb.com/{{ $profile->facebook_url }}" title="Facebook" target="_blank">
                                      <span class="fa fa-facebook-square fs35 text-primary" style="color: #3B5998"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://twitter.com/{{ $profile->twitter_url }}" title="Twitter" target="_blank">
                                      <span class="fa fa-twitter-square fs35 text-info"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="http://github.com/{{ $profile->github_url }}" title="GitHub" target="_blank">
                                      <span class="fa fa-github-square fs35 text-dark"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="mailto:{{ $profile->email }}" title="Email">
                                      <span class="fa fa-envelope-square fs35 text-muted"></span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          @if(Session::get('success'))
              <div class="special-alerts">
                  <div class="alert alert-success pastel light alert-dismissable" id="alert-demo-1" style="display: block;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-check pr10"></i>Operação realizada com sucesso!
                  </div>
              </div>
          @endif
          @if(Session::get('error'))
              <div class="special-alerts">
                  <div class="alert alert-danger pastel light alert-dismissable" id="alert-demo-1" style="display: block;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-times pr10"></i>Ocorreu um erro ao realizar a operação.
                  </div>
              </div>
          @endif
          <div class="admin-form theme-primary">
              <div class="panel">
                  <div class="panel-heading" style="height: 50px; padding-bottom: 0px; padding-top: 3px">
                      <span class="panel-title fs18">
                          Config. da Conta
                      </span>
                      <ul class="nav panel-tabs">
                          <li class="active">
                              <a href="#tab1" class="tab-forms" data-toggle="tab" aria-expanded="true" data-form="form-info">Informações Pessoais</a>
                          </li>
                          <li class="">
                              <a href="#tab2" class="tab-forms" data-toggle="tab" aria-expanded="false" data-form="form-avatar">Avatar</a>
                          </li>
                          <li class="">
                              <a href="#tab3" class="tab-forms" data-toggle="tab" aria-expanded="false" data-form="form-email">Email</a>
                          </li>
                          <li class="">
                              <a href="#tab4" class="tab-forms" data-toggle="tab" aria-expanded="false" data-form="form-password">Senha</a>
                          </li>
                          <li class="">
                              <a href="#tab5" class="tab-forms" data-toggle="tab" aria-expanded="false" data-form="form-privacy">Privacidade</a>
                          </li>
                      </ul>
                  </div>
                  <div class="panel-body">
                      <div class="tab-content">
                          <div id="tab1" class="tab-pane active">
                              <form role="form" method="POST" id="form-info" action="{{ url('perfil/save/info') }}" autocomplete="off">
                                  {{ csrf_field() }}
                                  <div class="section row">
                                      <div class="col-md-4 {{ $errors->has('fullname') ? 'state-error' : '' }}">
                                          <label for="name" class="field-label">Nome Completo</label>
                                          <input name="name" type="text" value="{{ $profile->name }}" class="gui-input">
                                      </div>
                                      <div class="col-md-4 {{ $errors->has('username') ? 'state-error' : '' }}">
                                          <label for="username" class="field-label">Usuário</label>
                                          <input name="username" type="text" class="form-control" value="{{ $profile->username }}" readonly />
                                      </div>
                                      <div class="col-md-4 {{ $errors->has('bio') ? 'state-error' : '' }}">
                                          <label for="bio" class="field-label">Bio</label>
                                          <input name="bio" type="text" class="gui-input" value="{{ $profile->bio }}" />
                                      </div>
                                  </div>
                                  <div class="section-divider" style="margin-top: 3%; margin-bottom: 3%">
                                      <span style="color: #4a89dc;">Social</span>
                                  </div>
                                  <div class="section row">
                                      <div class="col-md-3 {{ $errors->has('twitter') ? 'state-error' : '' }}">
                                          <label for="twitter_url" style="margin-bottom:10px">Twitter</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-twitter font-blue"></i> twitter.com/
                                              </span>
                                              <input name="twitter_url" type="text" class="form-control" placeholder="Twitter" value="{{ $profile->twitter_url }}">
                                          </div>
                                      </div>
                                      <div class="col-md-3 {{ $errors->has('facebook') ? 'state-error' : '' }}">
                                          <label for="facebook_url" style="margin-bottom:10px">Facebook</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-facebook font-blue"></i> fb.com/
                                              </span>
                                              <input name="facebook_url" type="text" class="form-control" placeholder="Facebook" value="{{ $profile->facebook_url }}">
                                          </div>
                                      </div>
                                      <div class="col-md-3 {{ $errors->has('github') ? 'state-error' : '' }}">
                                          <label for="github_url" style="margin-bottom:10px">GitHub</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-github"></i> github.com/
                                              </span>
                                              <input name="github_url" class="form-control" type="text" placeholder="GitHub" value="{{ $profile->github_url }}">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <label for="email" style="margin-bottom:10px">E-mail</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-envelope-o"></i>
                                              </span>
                                              <input class="form-control" type="text" placeholder="E-mail" value="{{ $profile->email }}" readonly>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div id="tab2" class="tab-pane">
                              <div class="col-md-3">
                                  <div class="media-left pr30">
                                      <img class="media-object mw150" src="{{ URL::asset("uploads/avatars/$profile->avatar_url") }}" alt="...">
                                  </div>
                              </div>
                              <div class="col-md-9 admin-form theme-primary">
                                  <ul class="list-unstyled mt40">
                                      <li>Dimensões Máximas:
                                          <strong class="text-dark"> 165x165</strong>
                                      </li>
                                      <li>Tamanho Máximo:
                                          <strong class="text-dark"> 500kb</strong>
                                      </li>
                                      <li>Formatos Aceitos:
                                          <strong class="text-dark">.jpg, .jpeg, .bmp, .png</strong>
                                      </li>
                                  </ul>
                                  <div class="section" style="margin-top: 1px; margin-bottom: 0px">
                                      <form id="form-avatar" method="POST" action="{{ url('perfil/save/avatar') }}" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          <label class="field prepend-icon file {{ $errors->has('file2') ? 'state-error' : '' }}">
                                              <span class="button btn-primary">Selecionar arquivo...</span>
                                              <input type="file" class="gui-file" name="file2" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                                              <input type="text" class="gui-input" id="uploader2" placeholder="Por favor, selecione o arquivo">
                                              <label class="field-icon">
                                                  <i class="fa fa-upload"></i>
                                              </label>
                                          </label>
                                          @if ($errors->has('file2'))
                                              <em for="reason" class="state-error">{{ $errors->first('file2') }}</em>
                                          @endif
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <div id="tab3" class="tab-pane">
                              <form method="POST" action="{{ url('perfil/save/email') }}" id="form-email">
                                  {{ csrf_field() }}
                                  <div class="col-md-6">
                                      <div class="section row">
                                          <label for="acemail" style="margin-bottom:10px">E-mail Atual</label>
                                          <div class="input-group col-xs-10">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-envelope-o"></i>
                                              </span>
                                              <input class="form-control" type="text" placeholder="E-mail" value="{{ $profile->email }}" readonly>
                                          </div>
                                      </div>
                                      <div class="section row {{ $errors->has('password') ? 'has-error' : '' }}">
                                          <div class="input-group col-xs-10">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-lock"></i>
                                              </span>
                                              <input name="password" class="form-control" type="password" placeholder="Senha atual">
                                          </div>
                                          @if($errors->has('password'))
                                              <div class="help-block with-errors"><ul class="list-unstyled"><li>{{ $errors->first('password') }}</li></ul></div>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="section row {{ $errors->has('email') ? 'has-error' : '' }}">
                                          <label for="email" style="margin-bottom:10px">E-mail Desejado</label>
                                          <div class="input-group col-xs-10">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-envelope-o"></i>
                                              </span>
                                              <input name="email" class="form-control" type="text" placeholder="E-mail desejado">
                                          </div>
                                          @if($errors->has('email'))
                                              <div class="help-block with-errors"><ul class="list-unstyled"><li>{{ $errors->first('email') }}</li></ul></div>
                                          @endif
                                      </div>
                                      <div class="section row {{ $errors->has('email_confirmation') ? 'has-error' : '' }}">
                                          <div class="input-group col-xs-10">
                                              <span class="input-group-addon">
                                                  <i class="fa fa-envelope-o"></i>
                                              </span>
                                              <input name="email_confirmation" class="form-control" type="text" placeholder="Confirme o e-mail">
                                          </div>
                                          @if($errors->has('email_confirmation'))
                                              <div class="help-block with-errors"><ul class="list-unstyled"><li>{{ $errors->first('email_confirmation') }}</li></ul></div>
                                          @endif
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div id="tab4" class="tab-pane">
                              <div class="col-md-6">
                                  <div class="section row">
                                      <label for="email" style="margin-bottom:10px">Senha Atual</label>
                                      <div class="input-group col-xs-10">
                                          <span class="input-group-addon">
                                              <i class="fa fa-lock"></i>
                                          </span>
                                          <input id="email" class="form-control" type="password" placeholder="Senha atual">
                                      </div>
                                  </div>
                                  <div class="section row">
                                      <div class="input-group col-xs-10">
                                          <span class="input-group-addon">
                                              <i class="fa fa-lock"></i>
                                          </span>
                                          <input id="email" class="form-control" type="password" placeholder="Confirme a senha atual">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="section row">
                                      <label for="passrequested" style="margin-bottom:10px">Senha Desejada</label>
                                      <div class="input-group col-xs-10">
                                          <span class="input-group-addon">
                                              <i class="fa fa-lock"></i>
                                          </span>
                                          <input id="passrequested" class="form-control" type="password" placeholder="Nova senha desejada">
                                      </div>
                                  </div>
                                  <div class="section row">
                                      <div class="input-group col-xs-10">
                                          <span class="input-group-addon">
                                              <i class="fa fa-lock"></i>
                                          </span>
                                          <input id="passconfirm" class="form-control" type="password" placeholder="Confirme a nova senha">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="tab5" class="tab-pane"></div>
                      </div>
                  </div>
                  <div class="panel-footer text-right">
                      <div class="btn-group">
                          <a href="#" id="sub_forms" type="submit" class="btn btn-sm btn-primary btn-gradient dark btn-blocks">
                              <i class="fa fa-save"></i> Salvar
                          </a>
                          <a href="#" class="btn btn-sm btn-default btn-gradient dark btn-blocks">
                              <i class="fa fa-close"></i> Cancelar
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
<!--                                                                        -->
@section('scripts')
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var tabs = $('.tab-forms');
            var formToSubmit = 'form-info';
            var submitButton = $('#sub_forms');

            tabs.on('click', function() {
                formToSubmit = $(this).data('form');
            });

            submitButton.on('click', function(e) {
                $('#' + formToSubmit).submit();
                e.preventDefault();
            })
        });
    </script>
@endsection
