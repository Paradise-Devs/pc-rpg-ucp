@extends('layouts.master')
<!--                                                                        -->
@section('title')
    | Perfil de {{ $profile->username }}
@endsection
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/summernote/summernote.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fonts/icomoon/icomoon.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/select2/css/core.css') }}">
@endsection
<!--                                                                        -->
@section('topbar')
<header id="topbar" class="affix">
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
            <li class="crumb-trail">{{ $profile->username }}</li>
        </ol>
    </div>

    <div class="topbar-right">
        {{-- Gerenciar --}}
        @can('admin')
            <a href="#" type="button" class="btn btn-sm btn-system btn-gradient dark">
                <i class="fa fa-cog"></i> Gerenciar Jogador
            </a>
        @endcan
        {{-- Amizade --}}
        @if($profile->id != $user->id)
            <a id="quick-compose" type="button" class="btn btn-sm btn-info btn-gradient dark">
                <i class="fa fa-envelope-o"></i> Enviar mensagem
            </a>
            @if($profile->admin < 1)
                <a id="report_btn" href="{{ url('/denuncia/create') }}" type="button" class="btn btn-sm btn-warning btn-gradient dark">
                    <i class="fa fa-warning"></i> Denúnciar
                </a>
            @endif
            @if($user->hasSentFriendRequestTo($profile))
                <a id="friend_btn" href="#" type="button" class="btn btn-sm btn-primary btn-gradient dark" disabled>
                    <i class="fa fa-user-plus"></i> Solicitação de amizade pendente
                </a>
            @elseif($user->isFriendWith($profile))
                <a id="unfriend_btn" href="{{ url('/perfil/amizade/desfazer/'.$profile->id) }}" type="button" class="btn btn-sm btn-danger btn-gradient dark">
                    <i class="fa fa-user-times"></i> Desfazer amizade
                </a>
            @elseif($user->hasFriendRequestFrom($profile))
                <a id="friend_btn" href="{{ url('/perfil/amizade/aceitar/'.$profile->id) }}" type="button" class="btn btn-sm btn-primary btn-gradient dark">
                    <i class="fa fa-user-plus"></i> Aceitar solicitação de amizade
                </a>
            @else
                <a id="friend_btn" href="{{ url('/perfil/amizade/enviar/'.$profile->id) }}" type="button" class="btn btn-sm btn-primary btn-gradient dark">
                    <i class="fa fa-user-plus"></i> Enviar solicitação de amizade
                </a>
            @endif
        @endif
        {{-- Configurações --}}
        @if($profile->id == $user->id)
            <a id="accconfig_btn" href="{{ url('/perfil/configuracoes') }}" type="button" class="owner_player btn btn-sm btn-info btn-gradient dark">
                <i class="fa fa-cog"></i> Configurar da conta
            </a>
        @endif
        {{--<a id="block_btn" href="#" type="button" class="btn btn-sm btn-info btn-gradient dark">
            <i class="fa fa-bell-slash"></i> Bloquear
        </a>
        <a id="unblock_btn" href="#" type="button" class="btn btn-sm btn-success btn-gradient dark">
            <i class="fa fa-bell"></i> Desbloquear
        </a>--}}
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="animated fadeIn">
  <div class="page-heading">
      @if (count($errors) > 0)
      <div class="panel" style="margin-bottom: 0px;">
          <div class="panel-menu br-n">
              <div class="alert alert-danger light ml10" style="width: 99%; margin-bottom: 0px;">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>
                              <i class="fa fa-info"></i> {{ $error }}
                          </li>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
      <hr style="margin-bottom: 0px; margin-top: 0px">
      @endif
      <div class="media clearfix">
          {{--
          <div id="blocked_info" class="alert alert-micro alert-border-left alert-danger">
              <i class="fa fa-ban pr10"></i>
              Usuário bloqueado.<br />
              Usuários bloqueados por você são impossibilitados de ter qualquer contato com você. Não conseguem visualizar seu perfil ou lhe enviar mensagens privadas.
          </div>
          --}}
          <div class="media-left pr30">
              <a href="#">
                  <img class="media-object mw150" src="{{ URL::asset("storage/avatars/$profile->avatar_url") }}" alt="...">
              </a>
          </div>
          <div class="media-body va-m">
              <h3 class="media-heading">{{ $profile->username }}
                  @if($player->level < 15)
                      <span class="label label-rounded label-default fs12">{{ $player->level }}</span>
                  @elseif($player->level < 30)
                      <span class="label label-rounded label-primary fs12">{{ $player->level }}</span>
                  @elseif($player->level < 45)
                      <span class="label label-rounded label-info fs12">{{ $player->level }}</span>
                  @elseif($player->level < 60)
                      <span class="label label-rounded label-system fs12">{{ $player->level }}</span>
                  @elseif($player->level < 75)
                      <span class="label label-rounded label-success fs12">{{ $player->level }}</span>
                  @elseif($player->level < 100)
                      <span class="label label-rounded label-warning fs12">{{ $player->level }}</span>
                  @elseif($player->level < 115)
                      <span class="label label-rounded label-danger fs12">{{ $player->level }}</span>
                  @elseif($player->level < 150)
                      <span class="label label-rounded label-alert fs12">{{ $player->level }}</span>
                  @else
                      <span class="label label-rounded label-dark fs12">{{ $player->level }}</span>
                  @endif
              </h3>
              @if($profile->admin == 1)
                  <span class="label label-warning"><i class="fa fa-star-o"></i> paradiser</span>
              @elseif($profile->admin == 2)
                  <span class="label label-info"><i class="fa fa-fire"></i> moderador</span>
              @elseif($profile->admin == 3)
                  <span class="label label-primary"><i class="imoon imoon-user3"></i> supervisor</span>
              @elseif($profile->admin == 4)
                  <span class="label label-danger"><i class="imoon imoon-user3"></i> administrador</span>
              @elseif($profile->admin > 4)
                  <span class="label label-success"><i class="fa fa-code"></i> desenvolvedor</span>
              @else
                  <span class="label label-default"><i class="fa fa-briefcase"></i> Jogador</span>
              @endif

              <p class="lead mt10">{{ $profile->bio }}</p>
              <div class="media-links">
                  <ul class="list-inline list-unstyled">
                      @if($profile->facebook_url)
                          <li>
                              <a href="http://fb.com/{{ $profile->facebook_url }}" title="{{ $profile->facebook_url }}">
                                  <span class="fa fa-facebook-square fs35 text-primary"></span>
                              </a>
                          </li>
                      @endif
                      @if($profile->twitter_url)
                          <li>
                              <a href="http://twitter.com/{{ $profile->twitter_url }}" title="{{ $profile->twitter_url }}">
                                  <span class="fa fa-twitter-square fs35 text-info"></span>
                              </a>
                          </li>
                      @endif
                      @if($profile->github_url)
                          <li>
                              <a href="http://github.com/{{ $profile->github_url }}" title="{{ $profile->github_url }}">
                                  <span class="fa fa-github-square fs35 text-dark"></span>
                              </a>
                          </li>
                      @endif
                      @if($profile->email)
                          <li>
                              <a href="mailto:{{ $profile->email }}" title="{{ $profile->email }}">
                                  <span class="fa fa-envelope-square fs35 text-muted"></span>
                              </a>
                          </li>
                      @endif
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel panel-info">
          <div class="panel-heading">
              <span class="panel-icon">
                  <i class="fa fa-list"></i>
              </span>
              <span class="panel-title"> Estatísticas</span>
              <div class="widget-menu pull-right">
                  <a href="{{ url('/ranking') }}" style="color: #fff">Ver ranking</a>
              </div>
          </div>
          <div class="panel-body pn">
              <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                  <thead>
                      <tr class="hidden">
                          <th class="mw30">#</th>
                          <th>First Name</th>
                          <th>Revenue</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+ Tempo Jogado</td>
                          <td>{{ gmdate("H:i:s", $player->played_time) }} horas <i class="fa fa-clock-o text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+ Level</td>
                          <td>{{ $player->level }} <i class="fa fa-angle-double-up text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+ Dinheiro</td>
                          <td>{{ $player->money + $player->bank }} <i class="fa fa-usd text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+ Eventos Ganhos</td>
                          <td>0 <i class="fa fa-trophy text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+</td>
                          <td><span class="text-info"></span></td>
                      </tr>
                      <tr>
                          <td><strong>#</strong></td>
                          <td>+</td>
                          <td><span class="text-info"></span></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="col-md-8">
      <div class="panel user-group-widget admin-form theme-primary panel-primary panel-border top">
          <div class="panel-heading" style="height: 55px; padding-bottom: 5px; padding-top: 0px; padding-right: 8px">
              <span class="panel-icon">
                  <i class="fa fa-users"></i>
              </span>
              <a href="{{ url('/perfil/amigos/'.$profile->id) }}" class="panel-title fs20 pl5"> Amigos ({{ $profile->getFriends()->count() }})</a>
              <div class="widget-menu pull-right" style="padding-top: 5px">
                  <div class="input-group">
                      <label class="field prepend-icon">
                      <input id="friend_search" type="text" class="gui-input input-sm" placeholder="Procurar amigo...">
                          <label for="website" class="field-icon">
                            <i class="fa fa-search"></i>
                          </label>
                      </label>
                  </div>
              </div>
          </div>
          <div class="panel-body panel-scroller scroller-overlay pn" style="max-height: 261px;">
              @foreach($profile->getFriends() as $friend)
                  <div class="friend_item mt20">
                      <div class="col-md-2">
                          <a href="{{ url('/perfil/'.$friend->id) }}" class="link-unstyled">
                              <img src="{{ URL::asset("storage/avatars/$friend->avatar_url") }}" class="user-avatar" style="width: 134px;">
                              <div class="caption">
                                  <h4 class="text-system fs10" style="margin-top: 3px">
                                      {{ $friend->username }}
                                  </h4>
                              </div>
                          </a>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</section>
@endsection
<!--                                                                        -->
@section('scripts')
    <div class="quick-compose-form">
        <form id="compose-quick-form" method="POST" action="{{ url('/message') }}">
            {{ csrf_field() }}
            <input name="usuario" type="text" class="form-control" placeholder="Usuário" value="{{ $profile->username }}" readonly="">
            <input name="assunto" type="text" class="form-control" id="inputSubject" placeholder="Assunto" required="">
            <textarea name="conteudo" class="summernote-quick"></textarea>
        </form>
    </div>
    <script src="{{ URL::asset('assets/js/hideseek/jquery.hideseek.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        // button click display quick compose message form
        $('#quick-compose').on('click', function() {

          // Admin Dock Plugin
          $('.quick-compose-form').dockmodal({
            minimizedWidth: 260,
            width: 470,
            height: 480,
            title: 'Mensagem para ' + '{!! $profile->username !!}',
            initialState: "docked",
            buttons: [{
              html: "Enviar",
              buttonClass: "btn btn-primary btn-sm",
              click: function(e, dialog) {
                // do something when the button is clicked
                // dialog.dockmodal("close");
                $('.summernote-quick').each( function() { $(this).val($(this).code()); });
                document.getElementById("compose-quick-form").submit();

                // after dialog closes fire a success notification
                setTimeout(function() {
                  msgCallback();
                }, 500);
              }
            }]
          });
        });

        // Init Summernote
        $('.summernote-quick').summernote({
          height: 275, //set editable area's height
          focus: false, //set focus editable area after Initialize summernote
          toolbar: [
            ['style', ['bold', 'italic', 'underline', ]],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
          ]
        });
      });
    </script>
@endsection
