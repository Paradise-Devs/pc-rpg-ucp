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
                  <a href="{{ url('/') }}">
                  <span class="glyphicon glyphicon-home"></span>
                  </a>
              </li>
              <li class="crumb-trail">Caixa de Saída</li>
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
              <i class="fa fa-mail-forward text-info"></i>Caixa de Saída
          </a>
          <a href="{{ url('/message/lixeira') }}" class="list-group-item">
              <i class="fa fa-trash"></i>Excluídos
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
      @if(Session::has('success'))
          <div class="panel" style="margin-bottom: 0px;">
              <div class="panel-menu br-n">
                  <div class="alert alert-success light ml10" style="width: 99%; margin-bottom: 0px;">
                      <i class="fa fa-info"></i> Operação realizada com sucesso.
                  </div>
              </div>
          </div>
          <hr style="margin-bottom: 0px; margin-top: 0px">
      @endif
      <div class="panel">
          <!-- message toolbar header -->
          <div class="panel-menu br-n">
              <div class="row">
                  <div class="hidden-xs hidden-sm col-md-3">
                      <div class="btn-group">
                          <a href="javascript:location.reload();" class="btn btn-default light">
                              <i class="fa fa-refresh"></i>
                          </a>
                      </div>
                      <span class="hidden-xs va-m text-muted mr15"> Mostrando
                          <strong>{{ $messages->count() }}</strong> de
                          <strong>{{ $messages->total() }}</strong> mensagens.
                      </span>
                  </div>
                  <div class="col-xs-12 col-md-9 text-right">
                      <div class="btn-group mr10">

                      </div>
                      <div class="btn-group mr10">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default light dropdown-toggle ph8" data-toggle="dropdown">
                                  <span class="fa fa-tags"></span>
                                  <span class="caret ml5"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                  <li><a href="#">Servidor</a></li>
                                  <li><a href="#">Administração</a></li>
                                  <li><a href="#">Amigos</a></li>
                                  <li><a href="#">Financeiro</a></li>
                              </ul>
                              <button type="button" class="btn btn-default light">
                                  <i class="fa fa-trash"></i>
                              </button>
                          </div>
                      </div>
                      <div class="btn-group">
                          <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default light">
                              <i class="fa fa-chevron-left"></i>
                          </a>
                          <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default light">
                              <i class="fa fa-chevron-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <!-- message listings table -->
          <table id="message-table" class="table tc-checkbox-1 admin-form theme-warning br-t">
              <thead>
                  <tr class="">
                      <th class="text-center hidden-xs">Selecionar</th>
                      <th>Destinário</th>
                      <th class="hidden-xs text-center">Categoria</th>
                      <th>Assunto</th>
                      <th class="hidden-xs"></th>
                      <th class="text-center">Data</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($messages as $message)
                      <tr class="message-{{ ($message->read) ? 'read' : 'unread' }}">
                          <td class="hidden-xs" data-id="{{ $message->id }}">
                              <label class="option block mn">
                                  <input type="checkbox" name="mobileos" value="FR">
                                  <span class="checkbox mn"></span>
                              </label>
                          </td>
                          <td data-id="{{ $message->id }}"><a href="{{ url('/perfil/'.$message->receiver->id) }}" class="link-unstyled">
                              @if($message->receiver->admin == 1)
                                  <span class="text-warning" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @elseif($message->receiver->admin == 2)
                                  <span class="text-info" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @elseif($message->receiver->admin == 3)
                                  <span class="text-primary" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @elseif($message->receiver->admin == 4)
                                  <span class="text-danger" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @elseif($message->receiver->admin > 4)
                                  <span class="text-system" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @else
                                  <span class="text-unstyled" style="font-weight: bold;">{{ $message->receiver->username }}</span>
                              @endif
                          </a></td>
                          <td class="hidden-xs text-center" data-id="{{ $message->id }}">
                              <span class="badge badge-system mr10 fs11">Administração</span>
                          </td>
                          <td class="" data-id="{{ $message->id }}">{{ $message->subject }}</td>
                          <td class="hidden-xs" data-id="{{ $message->id }}">
                              <i class="fa fa-paperclip fs15 text-muted va-b"></i>
                          </td>
                          <td class="text-center" data-id="{{ $message->id }}">{{ $message->created_at->format('d/M/Y - H:i') }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</section>
@endsection
<!--                                                                        -->
@section('scripts')
<div class="quick-compose-form">
    <form id="compose-form" method="POST" action="{{ url('/message') }}">
        {{ csrf_field() }}
        <input name="usuario" type="text" class="form-control" placeholder="Usuário" required="">
        <input name="assunto" type="text" class="form-control" id="inputSubject" placeholder="Assunto" required="">
        <textarea name="conteudo" class="summernote-quick"></textarea>
    </form>
</div>
<script src="{{ URL::asset('vendor/plugins/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
  var msgListing = $('#message-table > tbody > tr > td');
  var msgCheckbox = $('#message-table > tbody > tr input[type=checkbox]');

  // on message table checkbox click, toggle highlighted class
  msgCheckbox.on('click', function() {
    $(this).parents('tr').toggleClass('highlight');
  });

  // on message table row click, redirect page. Unless target was a checkbox
  msgListing.not(":first-child").on('click', function(e) {

    // stop event bubble if clicked item is not a checkbox
    e.stopPropagation();
    e.preventDefault();

    // Redirect to message compose page if clicked item is not a checkbox
    window.location = '{!! url('/message') !!}' + '/' + $(this).data("id");
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
            document.getElementById("compose-form").submit();

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
