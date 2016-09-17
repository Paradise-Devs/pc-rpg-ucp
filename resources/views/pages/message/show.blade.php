@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Mensagens')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/summernote/summernote.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
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
              <li class="crumb-trail">Mensagem</li>
          </ol>
      </div>
  </header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="table-layout animated fadeIn">
  <aside class="tray tray-left tray270" data-tray-height="match">
      <button id="quick-compose" type="button" class="btn btn-primary light btn-block fw600">
          <i class="fa fa-pencil"></i> Nova Mensagem
      </button>
      <!-- Message Menu -->
      <div class="list-group list-group-links mt20">
          <div class="list-group-header"> Menu </div>
          <a href="{{ url('/message') }}" class="list-group-item">
              <i class="fa fa-inbox"></i>Caixa de Entrada
              @if($new_msg_count > 0)
                  <span class="label badge-warning">{{ $new_msg_count }}</span>
              @endif
          </a>
          <a href="{{ url('/message/outbox') }}" class="list-group-item">
              <i class="fa fa-mail-forward"></i>Caixa de Saída
          </a>
          <a href="{{ url('/message/lixeira') }}" class="list-group-item">
              <i class="fa fa-trash"></i>Lixeira
          </a>
      </div>

      <!-- Tags Menu -->
      {{--<div class="list-group list-group-links">
          <div class="list-group-header"> Categorias </div>
          <a href="#" class="list-group-item">
              Servidor
              <span class="badge badge-warning">6</span>
          </a>
          <a href="#" class="list-group-item">
              Administração
              <span class="badge badge-system">13</span>
          </a>
          <a href="#" class="list-group-item">
              Amigos
              <span class="badge badge-primary">11</span>
          </a>
          <a href="#" class="list-group-item">
              Financeiro
              <span class="badge badge-alert">8</span>
          </a>
      </div>--}}
  </aside>
  <!-- end: .tray-left -->
  <!-- begin: .tray-center -->
  <div class="tray tray-center pn bg-light">
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
    <div class="panel">
        <!-- message view -->
        <div class="message-view">

            <!-- message meta info -->
            <div class="message-meta">
                <span class="pull-right text-muted">{{ $message->created_at->format('d/M/Y - H:i') }}</span>
                <h3 class="subject">{{ $message->subject }}</h3>
                <hr class="mt20 mb15">
            </div>

            <!-- message header -->
            <div class="message-header">
                <img src="{{ URL::asset("storage/avatars/".$message->creator->avatar_url) }}" class="img-responsive mw40 pull-left mr20">
                <div class="pull-right mt5 clearfix">
                    @if($message->creator->admin == 1)
                        <span class="label label-warning"><i class="fa fa-star-o"></i> paradiser</span>
                    @elseif($message->creator->admin == 2)
                        <span class="label label-info"><i class="fa fa-fire"></i> moderador</span>
                    @elseif($message->creator->admin == 3)
                        <span class="label label-primary"><i class="imoon imoon-user3"></i> supervisor</span>
                    @elseif($message->creator->admin == 4)
                        <span class="label label-danger"><i class="imoon imoon-user3"></i> administrador</span>
                    @elseif($message->creator->admin > 4)
                        <span class="label label-success"><i class="fa fa-code"></i> desenvolvedor</span>
                    @else
                        <span class="label label-default"><i class="fa fa-briefcase"></i> Jogador</span>
                    @endif
                    <span class="label label-system">Administração</span>
                </div>
                <h4 class="mt15 mb5">De: <a href="{{ url('/perfil/'.$message->creator->id) }}" class="link-unstyled"><span class="text-primary" style="font-weight: bold;">{{ $message->creator->username }}</span></a></h4>
                <small class="text-muted clearfix">Para: <a href="{{ url('/perfil/'.$message->receiver->id) }}" class="link-unstyled">{{ $message->receiver->username }}</a></small>
            </div>

            <hr class="mb15 mt15">

            <!-- message body -->
            <div class="message-body">
                {!! $message->content !!}
            </div>

            <hr class="mb15 mt15">

            <!-- message footer -->
            {{--
            <div class="message-footer">
                <span class="text-center text-muted">
                    Visto que todos os pedidos de ajuda devem estar visível a todos
                    (outras pessoas podem ter o mesmo problema que você),
                    eu não dou suporte via mensagem privada ou
                    qualquer outro meio de contato.
                </span>
            </div>
            --}}
        </div>
        <!-- message reply form -->
        <form id="compose-form" method="POST" action="{{ url('/message') }}">
            {{ csrf_field() }}
            <div class="message-reply pt0 pb0 mt0 mb0">
                <textarea id="compose-reply-form" name="conteudo" class="summernote">Resposta...</textarea>
                <div class="panel-footer p7 mt0 pt0 text-right">
                    <div class="actions btn-group">
                        <input name="usuario" type="hidden" value="{{ $message->creator->username }}">
                        <input name="assunto" type="hidden" value="RE: {{ $message->subject }}">
                        <button href="{{ url('/message') }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Voltar</button>
                        <button id="submit-compose-form" type="button" class="btn btn-sm btn-primary"><i class="fa fa-mail-forward"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</section>
@endsection
<!--                                                                        -->
@section('scripts')
<div class="quick-compose-form">
    <form id="compose-quick-form" method="POST" action="{{ url('/message') }}">
        {{ csrf_field() }}
        <input name="usuario" type="text" class="form-control" placeholder="Usuário" required="">
        <input name="assunto" type="text" class="form-control" id="inputSubject" placeholder="Assunto" required="">
        <textarea name="conteudo" class="summernote-quick"></textarea>
    </form>
</div>
<script src="{{ URL::asset('vendor/plugins/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    // Summernote
    $('#submit-compose-form').on('click', function() {
        $('#compose-reply-form').each( function() { $(this).val($(this).code()); });
        document.getElementById("compose-form").submit();
    });

    $('.summernote').summernote({
      height: 297, //set editable area's height
      focus: false, //set focus editable area after Initialize summernote
      oninit: function() {},
      onChange: function(contents, $editable) {},
    });

    // On button click display quick compose message form
    $('#quick-compose').on('click', function() {

      // Admin Dock Plugin
      $('.quick-compose-form').dockmodal({
        minimizedWidth: 260,
        width: 470,
        height: 480,
        title: 'Nova Mensagem',
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
