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
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/custom.css') }}">
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
                <a href="{{ url('/dashboard') }}">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">
                <a href="{{ url('/jogadores') }}">
                    Jogadores
                </a>
            <li class="crumb-trail">{{ $profile->username }}</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="animated fadeIn" style="padding-bottom: 0px">
  <div class="page-heading" style="padding: 0px 0px 0px 0px">
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
      <div class="media clearfix profile-header" style="
          background-image: url('{{URL::asset('assets/img/covers/default.jpg')}}');
          background-repeat: no-repeat;
          background-size: 100% 100%;
          color: #fff;
          padding: 0px 0px 0px 0px;
          margin-top: 0px;
      ">
          {{--
          <div id="blocked_info" class="alert alert-micro alert-border-left alert-danger">
              <i class="fa fa-ban pr10"></i>
              Usuário bloqueado.<br />
              Usuários bloqueados por você são impossibilitados de ter qualquer contato com você. Não conseguem visualizar seu perfil ou lhe enviar mensagens privadas.
          </div>
          --}}
          <div class="media-left pr10">
              <img class="media-object mw150 mr20" src="{{ URL::asset("storage/avatars/$profile->avatar_url") }}" alt="..." style="height: 100%">
              <div class="level-circle">
                  @if($player->level < 15)
                      <span class="label label-rounded label-default level-label fs24"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 30)
                      <span class="label label-rounded label-primary level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 45)
                      <span class="label label-rounded label-info level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 60)
                      <span class="label label-rounded label-system level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 75)
                      <span class="label label-rounded label-success level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 100)
                      <span class="label label-rounded label-warning level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 115)
                      <span class="label label-rounded label-danger level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @elseif($player->level < 150)
                      <span class="label label-rounded label-alert level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @else
                      <span class="label label-rounded label-dark level-label"><i class="fa fa-angle-double-up"></i> {{ $player->level }}</span>
                  @endif
              </div>
          </div>
          <div class="media-body va-m mt10 ml10">
              <br />
              @if($profile->admin == 1)
                  <span class="label label-warning fs12"><i class="fa fa-star-o"></i> paradiser</span>
              @elseif($profile->admin == 2)
                  <span class="label label-info fs12"><i class="fa fa-fire"></i> moderador</span>
              @elseif($profile->admin == 3)
                  <span class="label label-primary fs12"><i class="imoon imoon-user3"></i> supervisor</span>
              @elseif($profile->admin == 4)
                  <span class="label label-danger fs12"><i class="imoon imoon-user3"></i> administrador</span>
              @elseif($profile->admin > 4)
                  <span class="label label-success fs12"><i class="fa fa-code"></i> desenvolvedor</span>
              @else
                  <span class="label label-default fs12"><i class="fa fa-briefcase"></i> Jogador</span>
              @endif
              <h2 class="user-nickname">{{ $profile->username }}</h2>
              <h5 class="user-realname">{{ $profile->name }}</h5>

              <blockquote class="blockquote-primary user-status-block mt10" style="background-color: rgba(0, 0, 0, 0.3); max-width: 80%">
                  <p class="lead fs16">{{ $profile->bio }}</p>
              </blockquote>
              <div class="media-links mb10">
                  @if($profile->id != Auth::user()->id)
                      @if(!Auth::user()->isFriendWith($profile))
                          @if(Auth::user()->hasSentFriendRequestTo($profile))
                              <a id="friend_btn" href="#" type="button" class="btn btn-sm btn-alert btn-rounded btn-gradient dark disabled">
                                  <i class="fa fa-user-plus"></i> Solicitação de amizade pendente
                              </a>
                          @elseif(Auth::user()->hasFriendRequestFrom($profile))
                              <a id="friend_btn" href="{{ url('/perfil/amizade/aceitar/'.$profile->id) }}" type="button" class="btn btn-sm btn-rounded btn-success btn-gradient dark">
                                  <i class="fa fa-user-plus"></i> Aceitar solicitação de amizade
                              </a>
                          @else
                              <a id="friend_btn" href="{{ url('/perfil/amizade/enviar/'.$profile->id) }}" type="button" class="btn btn-sm btn-rounded btn-primary btn-gradient dark">
                                  <i class="fa fa-user-plus"></i> Enviar solicitação de amizade
                              </a>
                          @endif
                      @elseif(Auth::user()->isFriendWith($profile))
                          <a id="unfriend_btn" href="{{ url('/perfil/amizade/desfazer/'.$profile->id) }}" type="button" class="btn btn-sm btn-default btn-rounded btn-gradient dark">
                              <i class="fa fa-user-times"></i> Desfazer amizade
                          </a>
                      @endif
                      @if($profile->admin < 1)
                          <a id="report_btn" href="{{ url('/denuncia/create') }}" type="button" class="btn btn-sm btn-danger btn-rounded btn-gradient dark ml10">
                              <i class="fa fa-warning"></i> Denúnciar
                          </a>
                      @endif
                  @endif
                  {{-- Configurações --}}
                  @if($profile->id == Auth::user()->id)
                      <a id="accconfig_btn" href="{{ url('/perfil/configuracoes') }}" type="button" class="owner_player btn btn-sm btn-info btn-rounded btn-gradient dark">
                          <i class="fa fa-cog"></i> Configurar conta
                      </a>
                  @endif
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4 animated slideInLeft" style="position: relative; z-index: 1">
      <div class="panel user-group-widget panel-info">
          <div class="panel-heading" style="height: 55px; padding-bottom: 5px; padding-top: 0px; padding-right: 8px">
              <span class="panel-icon">
                  <i class="fa fa-users"></i>
              </span>
              <span class="panel-title fs20 pl5"> Amigos ({{ $profile->getFriendsCount() }})</span>
              <div class="widget-menu pull-right">
                  <a href="{{ url('/perfil/amigos/'.$profile->id) }}" style="color: #fff">ver todos</a>
              </div>
          </div>
          <div class="panel-body panel-scroller scroller-overlay pn" style="max-height: 261px;">
              <table class="table tc-bold-last">
                  <thead>
                      <tr class="hidden">
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($profile->getFriends() as $friend)
                          <tr>
                              <td style="width: 20%"><img src="{{ URL::asset("storage/avatars/$friend->avatar_url") }}" class="user-avatar" style="width: 50px; float: center"></td>
                              <td>
                                  <span class="friend-nick">
                                      @if($friend->isOnline)
                                          <span class="fa fa-circle text-success fs10"></span>
                                      @else
                                          <span class="fa fa-circle text-danger fs10"></span>
                                      @endif
                                      <a href="{{ url('/perfil/'.$friend->id) }}" class="link-unstyled">
                                          <span class="text-admin">{{ $friend->username }}</span>
                                      </a>
                                  </span>
                                  <span class="text-muted friend-data">{{ $friend->jobname }}</span>
                                  <span class="text-muted friend-data">{{ $friend->rankname }}</span>
                              </td>
                              <td>
                                  @if($player->level < 15)
                                      <span class="label label-rounded label-default level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 30)
                                      <span class="label label-rounded label-primary level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 45)
                                      <span class="label label-rounded label-info level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 60)
                                      <span class="label label-rounded label-system level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 75)
                                      <span class="label label-rounded label-success level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 100)
                                      <span class="label label-rounded label-warning level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 115)
                                      <span class="label label-rounded label-danger level-label fs10">{{ $friend->level }}</span>
                                  @elseif($player->level < 150)
                                      <span class="label label-rounded label-alert level-label fs10">{{ $friend->level }}</span>
                                  @else
                                      <span class="label label-rounded label-dark level-label fs10">{{ $friend->level }}</span>
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
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
              <table class="table tc-med-1 tc-bold-last">
                  <thead>
                      <tr class="hidden">
                          <th>First Name</th>
                          <th>Revenue</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>+ Tempo Jogado</td>
                          <td>{{ gmdate("H:i:s", $player->played_time) }} horas <i class="fa fa-clock-o text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td>+ Level</td>
                          <td>{{ $player->level }} <i class="fa fa-angle-double-up text-info pl5"></i></td>
                      </tr>
                      <tr>
                          <td>+ Dinheiro</td>
                          <td>{{ $player->money + $player->bank }} <i class="fa fa-usd text-info pl5"></i></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="col-md-4 mb30 animated slideInRight">
      <div class="panel panel-info">
          <div class="panel-heading">
              <span class="panel-icon">
              <i class="fa fa-life-ring"></i>
              </span>
              <span class="panel-title">Social</span>
          </div>
          <div class="panel-body text-muted p10">
              <div class="list-group fs14 fw600" style="margin-bottom: 3px">
                  <a class="list-group-item" href="#">
                      <i class="fa fa-comments-o fa-fw text-primary"></i>&nbsp; Enviar mensagem particular
                  </a>
                  @if($profile->email)
                      <a class="list-group-item" href="mailto:{{ $profile->email }}" target="_blank">
                          <i class="fa fa-envelope-o fa-fw text-primary"></i>&nbsp; Email
                      </a>
                  @endif
                  {{--<a class="list-group-item" href="https://www.youtube.com/channel/UCGo6hd688I7PS3NzRa01yiw" target="_blank">
                      <i class="fa fa-youtube-play fa-fw text-primary"></i>&nbsp; YouTube
                  </a>--}}
                  @if($profile->twitter_url)
                      <a class="list-group-item" href="http://twitter.com/{{ $profile->twitter_url }}" target="_blank">
                          <i class="fa fa-twitter fa-fw text-primary"></i>&nbsp; <span class="text-muted">@<span class="text-primary">{{ $profile->twitter_url }}</span>
                      </a>
                  @endif
                  @if($profile->facebook_url)
                      <a class="list-group-item" href="https://fb.com/{{ $profile->facebook_url }}" target="_blank">
                          <i class="fa fa-facebook fa-fw"></i>&nbsp; <span class="text-muted">/<span class="text-primary">{{ $profile->facebook_url }}</span>
                      </a>
                  @endif
                  @if($profile->admin > 4)
                      @if($profile->github_url)
                          <a class="list-group-item" href="http://github.com/{{ $profile->github_url }}" target="_blank">
                              <i class="fa fa-github fa-fw"></i>&nbsp; <span class="text-muted">/<span class="text-primary">{{ $profile->github_url }}</span>
                          </a>
                      @endif
                  @endif
              </div>
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
