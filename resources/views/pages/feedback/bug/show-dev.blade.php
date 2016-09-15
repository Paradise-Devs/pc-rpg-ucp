@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Feedback')
<!--                                                                        -->
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/summernote/summernote.css') }}">
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
                <li class="crumb-trail"><a href="{{ url('/bugs') }}">Feedback</a></li>
                <li class="crumb-trail"><a href="{{ url('/bugs') }}">Bugs</a></li>
                <li class="crumb-trail">{{ $bug->title }}</li>
            </ol>
        </div>
    </header>
@endsection
<!--                                                                        -->
@section('content')
    <section id="content" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="tray tray-center pn bg-light">
            <div class="panel">
                <!-- message view -->
                <div class="message-view">

                    <!-- message meta info -->
                    <div class="message-meta">
                        <span class="pull-right">
                            <span class="label label-{{ $bug->status_style }} fs15"><i class="fa fa-check"></i> {{ $bug->status }}</span>
                            <span class="label label-{{ $bug->importance_style }} fs15"><i class="fa fa-fire"></i> {{ $bug->importance }}</span>
                        </span>
                        <h3 class="subject">{{ $bug->title }}</h3>
                        <hr class="mt20 mb15">
                    </div>

                    <!-- message header -->
                    <div class="message-header">
                        <img src="{{ URL::asset('storage/avatars/'.$bug->user->avatar_url) }}" class="img-responsive mw40 pull-left mr20">
                        <h4>
                            <a href="{{ url('/perfil/'.$bug->user->id) }}" class="link-unstyled"><b class="link-unstyled">{{ $bug->user->username }}</b></a>
                            <small class="text-muted clearfix">{{ $bug->created_at->format('d/m/Y - H:i:s') }}</small>
                        </h4>
                    </div>

                    <hr class="mb15 mt15">

                    <!-- message body -->
                    <div class="message-body">
                        {{ $bug->description }}
                    </div>
                </div>

                <hr class="alt" style="margin-bottom: 0px; margin-top: 0px">
                <!-- message reply form -->
                <div class="message-reply pt0 pb0 mt0 mb0">
                    <textarea id="report-reply" name="content" data-language="pt" rows="10" placeholder="Comentário..." required></textarea>
                    <div class="panel-footer p7 mt0 pt0 text-right">
                        <button class="btn btn-sm btn-rounded btn-gradient dark btn-primary">enviar <i class="fa fa-mail-forward"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- begin: .tray-right -->
        <aside class="tray tray-right pn" data-tray-height="match" style="width: 420px">
            <!-- Message Menu -->
            <ol class="timeline-list pl5 mt5">
                <li class="timeline-item">
                    <div class="timeline-icon bg-info light">
                        <span class="fa fa-bug"></span>
                    </div>
                    <div class="timeline-desc">
                        <a href="{{ url('/perfil/'.$bug->user->id) }}" class="link-unstyled"><b>{{ $bug->user->username }}</b></a> reportou o bug
                    </div>
                    <div class="timeline-date">{{ $bug->created_at->format('g:ia') }}</div>
                </li>
                @foreach($bug->actions as $action)
                    <li class="timeline-item">
                        <div class="timeline-icon bg-{{ $action->style }} light">
                            <span class="fa fa-{{ $action->icon }}"></span>
                        </div>
                        <div class="timeline-desc">
                            @if($action->type == 0)
                                <a href="{{ url('/perfil/'.$action->user->id) }}" class="link-unstyled"><b>{{ $action->user->username }}</b></a>: prioridade alterada para <span class="label label-{{ $action->style }}">{{ $action->status }}</span>
                            @else
                                <a href="{{ url('/perfil/'.$action->user->id) }}" class="link-unstyled"><b>{{ $action->user->username }}</b></a>: status alterado para <span class="label label-{{ $action->style }}">{{ $action->status }}</span>
                            @endif
                        </div>
                        <div class="timeline-date">{{ $action->created_at->format('g:ia') }}</div>
                    </li>
                @endforeach
            </ol>
            <div id="priority-switcher" class="tray-affix affix-top" data-spy="affix" data-offset-top="200">
                <div class="tray-bin btn-dimmer row" style="margin-left: -1px; margin-top: 10px; padding-right: 20px; margin-bottom: 5px">
                    <div class="col-xs-3 pln">
                        <a class="btn btn-success btn-gradient btn-alt btn-block">baixa</a>
                    </div>
                    <div class="col-xs-3">
                        <a class="btn btn-primary btn-gradient btn-alt btn-block">média</a>
                    </div>
                    <div class="col-xs-3">
                        <a class="btn btn-warning btn-gradient btn-alt btn-block">alta</a>
                    </div>
                    <div class="col-xs-3">
                        <a class="btn btn-danger btn-gradient btn-alt btn-block item-active">crítico</a>
                    </div>
                </div>
            </div>
            <br />
            <div id="status-switcher" class="tray-affix affix-top" data-spy="affix" data-offset-top="200">
                <div class="tray-bin btn-dimmer row" style="margin-left: -1px; padding-right: 20px; margin-bottom: 5px">
                    <div class="col-xs-4 pln">
                        <a class="btn btn-system btn-gradient btn-alt btn-block">confirmado</a>
                    </div>
                    <div class="col-xs-4">
                        <a class="btn btn-alert btn-gradient btn-alt btn-block">em análise</a>
                    </div>
                    <div class="col-xs-4">
                        <a class="btn btn-warning btn-gradient btn-alt btn-block">em progresso</a>
                    </div>
                    <div class="col-xs-4 pln">
                        <a class="btn btn-success btn-gradient btn-alt btn-block item-active">corrigido</a>
                    </div>
                    <div class="col-xs-4 ">
                        <a class="btn btn-danger btn-gradient btn-alt btn-block">incompleto</a>
                    </div>
                    <div class="col-xs-4">
                        <a class="btn btn-danger btn-gradient btn-alt btn-block">cancelado</a>
                    </div>
                </div>
            </div>
            <div class="admin-form">
                <div class="pull-right section p5">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-rounded btn-gradient dark btn-dark"><i class="fa fa-pencil"></i> editar</button>
                        <button class="btn btn-sm btn-rounded btn-gradient dark btn-dark"><i class="fa fa-trash"></i> deletar</button>
                        <button class="btn btn-sm btn-rounded btn-gradient dark btn-primary"><i class="fa fa-save"></i> salvar</button>
                    </div>
                </div>
            </div>
        </aside>
        <!-- end: .tray-left -->
    </section>
@endsection
<!--                                                                        -->
@section('scripts')
    <!-- MarkDown JS -->
    <script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('#priority-switcher a').on('click', function() {
                $('#priority-switcher a').removeClass('item-active');
                $(this).addClass('item-active');

                buttons.removeClass().addClass('button btn-' + btnData);
            });

            $('#status-switcher a').on('click', function() {
                $('#status-switcher a').removeClass('item-active');
                $(this).addClass('item-active');

                buttons.removeClass().addClass('button btn-' + btnData);
            });

            // Init MarkDown Editor
            $("#report-reply").markdown({
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
        });
    </script>
@endsection
