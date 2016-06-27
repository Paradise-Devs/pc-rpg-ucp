@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Visualizar ticket')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/select2/css/core.css') }}">
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
                <a href="/">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail"><a href="/ticket">Tickets</a></li>
            <li class="crumb-trail">Ticket #{{ $ticket->id }}</li>
        </ol>
    </div>
    <div class="topbar-right">
        <select id="status_select" data-status="{{ $ticket->status }}">
            @if($ticket->status != 3)
                <option value="opened" selected><i class="fa fa-eye-slash"></i> Aberto</option>
                <option value="closed" disabled><i class="fa fa-eye-slash"></i> Fechado</option>
            @else
                <option value="opened" disabled><i class="fa fa-eye-slash"></i> Aberto</option>
                <option value="closed" selected><i class="fa fa-eye-slash"></i> Fechado</option>
            @endif
        </select>
        <a href="#" id="open_ticket" type="button" class="closed_ticket btn btn-sm btn-danger btn-gradient dark">
            <i class="fa fa-unlock-alt"></i> Reabrir Ticket
        </a>
        <a href="#" id="close_ticket" type="button" class="opened_ticket btn btn-sm btn-danger btn-gradient dark">
            <i class="fa fa-lock"></i> Fechar Ticket
        </a>
        <form method="post" action="/ticket/open/{{ $ticket->id }}" id="open_form">
            {{ csrf_field() }}
        </form>
        <form method="post" action="/ticket/close/{{ $ticket->id }}" id="close_form">
            {{ csrf_field() }}
        </form>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="col-md-12 closed_ticket">
    <div class="alert alert-danger light">
        <i class="fa fa-info pr10"></i> Este ticket está fechado. É necessário a reabertura caso deseje alguma outra informação referente ao mesmo.
    </div>
</div>
<div class="col-md-12">
    @if ($errors->has('content'))
        <div class="state-error alert alert-danger pastel">
          <strong>Erro!</strong> {{ $errors->first('content') }}
        </div>
    @endif
    <div id="ticket_panel" class="admin-form">
        <div id="ticket_panel_heading" class="panel heading-border">
            <div class="panel-heading">
                <span class="panel-title"><span class="fa fa-support"></span>Ticket #{{ $ticket->id }} - {{ $ticket->title }}</span></span>
                <div class="widget-menu pull-right mr10">
                    <span class="label bg-info mr10">{{ $ticket->category }}</span>
                </div>
            </div>
            <div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
                <div class="section row">
                    <div class="col-md-12">
                        <div id="original_message">
                            <p>
                                <h5>às <span class="text-muted">{{ $ticket->created_at->format('d/m/Y H:m:s') }}</span> Você relatou:</h5>
                                <br />
                                <blockquote class="blockquote-primary" style="font-size: 95%;">
                                    {{ $ticket->content }}
                                </blockquote>
                            </p>
                        </div>
                        @foreach($ticket->answers as $answer)
                            @if($answer->user->admin > 2)
                                <div id="admin_response" style="background-color: #F7F7F7; padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px">
                                    <p class="text-right">
                                        <h5 class="text-right">Resposta da Administração:</h5>
                                        <br />
                                        <blockquote class="blockquote-system blockquote-reverse" style="font-size: 95%;">
                                            {{ $answer->content }}
                                        </blockquote>
                                    </p>
                                </div>
                            @else
                                <div id="player_response">
                                    <p>
                                        <h5><span class="text-muted">{{ $answer->created_at->format('d/m/Y H:m:s') }}</span> Você respondeu:</h5>
                                        <blockquote class="blockquote-primary" style="font-size: 95%;">
                                            {{ $answer->content }}
                                        </blockquote>
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ url("ticket/answer/$ticket->id") }}">
    {{ csrf_field() }}
    <div id="ticket_responseform" class="opened_ticket col-md-12">
        <div class="admin-form theme-primary">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><span class="fa fa-support"></span>Responder ticket</span></span>
                </div>
                <textarea id="markdown-editor" class="{{ $errors->has('content') ? 'state-error' : '' }}" name="content" data-language="pt" rows="10" placeholder="Escreva aqui a resposta ao ticket..."></textarea>
                <div class="section-divider mb40" id="spy1" style="padding-bottom: 0px">
                    <span style="color: #4a89dc;">Anexo</span>
                </div>
                <div class="panel-body" style="padding-top: 1px">
                    <div class="col-md-12">
                        <div class="section" style="margin-top: 1px; margin-bottom: 0px">
                            <label class="field prepend-icon file">
                                <span class="button btn-primary">Selecionar arquivo...</span>
                                <input type="file" class="gui-file" name="file2" id="file2" onchange="document.getElementById('uploader2').value = this.value;" multiple>
                                <input type="text" class="gui-input" id="uploader2" placeholder="Por favor, selecione o(s) arquivo(s)" multiple>
                                <label class="field-icon">
                                    <i class="fa fa-upload"></i>
                                </label>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer p7 mt0 pt0 text-right">
                    <div class="actions btn-group">
                        <button href="/ticket" class="btn btn-sm btn-default btn-gradient dark"><i class="fa fa-arrow-left"></i> Voltar</button>
                        <button type="submit" class="btn btn-sm btn-primary btn-gradient dark"><i class="fa fa-mail-forward"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<!--                                                                        -->
@section('scripts')
<!-- MarkDown JS -->
<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

<!-- Select2 Plugin Plugin -->
<script src="{{ URL::asset('vendor/plugins/select2/select2.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/custom_tickets.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init MarkDown Editor
        $("#markdown-editor").markdown({
            savable: false,
            onChange: function(e) {
                var content = e.parseContent(),
                content_length = (content.match(/\n/g) || []).length + content.length
                if (content == '') {
                    $('#md-footer').hide()
                } else {
                    $('#md-footer').show().html(content)
                }
            }
        });

        $('#open_ticket').on('click', function(e) {
            $('#open_form').submit();
            e.preventDefault();
        });

        $('#close_ticket').on('click', function(e) {
            $('#close_form').submit();
            e.preventDefault();
        });
    });
</script>
@endsection
