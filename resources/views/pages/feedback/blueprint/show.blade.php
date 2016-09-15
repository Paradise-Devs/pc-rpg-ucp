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
                    <a href="{{ url('/') }}">UCP</a>
                </li>
                <li class="crumb-icon">
                    <a href="{{ url('/') }}">
                    <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="crumb-trail"><a href="{{ url('/bugs') }}">Feedback</a></li>
                <li class="crumb-trail"><a href="{{ url('/blueprints') }}">Blueprints</a></li>
                <li class="crumb-trail">{{ $blueprint->title }}</li>
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
                    @if(Session::has('error'))
                        <div class="alert alert-danger light ml10" style="width: 99%;">
                            <i class="fa fa-info"></i> {{ Session::pull('error') }}
                        </div>
                    @endif
                    <!-- message meta info -->
                    <div class="message-meta">
                        <span class="pull-right">
                            <span class="label label-{{ $blueprint->status_style }} fs15"><i class="fa fa-{{ $blueprint->status_icon }}"></i> {{ $blueprint->status }}</span>
                            <span class="label label-{{ $blueprint->importance_style }} fs15"><i class="fa fa-{{ $blueprint->importance_icon }}"></i> {{ $blueprint->importance }}</span>
                        </span>
                        <h3 class="subject">{{ $blueprint->title }}</h3>
                        <hr class="mt20 mb15">
                    </div>

                    <!-- message header -->
                    <div class="message-header">
                        <img src="{{ URL::asset('storage/avatars/'.$blueprint->user->avatar_url) }}" class="img-responsive mw40 pull-left mr20">
                        <div class="pull-right mt5 clearfix">
                            @if($user->id == $blueprint->user->id)
                                <button class="btn btn-sm btn-gradient btn-dark dark btn-primary"><i class="fa fa-pencil"></i> editar</button>
                            @else
                                {{--<form action="{{ url('/blueprints/upvote/'.$blueprint->id) }}" method="post" id="form_affects">
                                    {{ csrf_field() }}
                                </form>--}}
                                <a href="{{ url('/blueprints/upvote/'.$blueprint->id) }}" class="btn btn-sm btn-gradient btn-success"><i class="fa fa-thumbs-up"></i> {{ $blueprint->upvotes }}</a>
                                <a href="{{ url('/blueprints/downvote/'.$blueprint->id) }}" class="btn btn-sm btn-gradient btn-danger"><i class="fa fa-thumbs-down"></i> {{ $blueprint->downvotes }}</a>
                            @endif
                        </div>
                        <h4>
                            <a href="{{ url('/perfil/'.$blueprint->user->id) }}" class="link-unstyled"><b class="link-unstyled">{{ $blueprint->user->username }}</b></a>
                            <small class="text-muted clearfix">{{ $blueprint->created_at->format('d/m/Y - H:i:s') }}</small>
                        </h4>
                    </div>

                    <hr class="mb15 mt15">

                    <!-- message body -->
                    <div class="message-body">
                        {{ $blueprint->description }}
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
                        <span class="fa fa-file-text"></span>
                    </div>
                    <div class="timeline-desc">
                        <a href="{{ url('/perfil/'.$blueprint->user->id) }}" class="link-unstyled"><b>{{ $blueprint->user->username }}</b></a> sugeriu a blueprint
                    </div>
                    <div class="timeline-date">{{ $blueprint->created_at->format('g:ia') }}</div>
                </li>
                @foreach($blueprint->actions as $action)
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
            @can('developer')
                <div class="tray-affix affix-top" data-spy="affix" data-offset-top="200">
                    <div class="tray-bin btn-dimmer row" style="margin-left: -1px; margin-top: 10px; padding-right: 20px; margin-bottom: 5px">
                        <div class="col-xs-3 pln">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="importance" value="baixa">
                                <input type="hidden" name="importance_style" value="success">
                                <input type="hidden" name="importance_icon" value="arrow-down">
                                <input type="submit" class="btn btn-success btn-gradient btn-alt btn-block item-active" value="baixa"></button>
                            </form>
                        </div>
                        <div class="col-xs-3">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="importance" value="média">
                                <input type="hidden" name="importance_style" value="primary">
                                <input type="hidden" name="importance_icon" value="arrow-right">
                                <input type="submit" class="btn btn-primary btn-gradient btn-alt btn-block item-active" value="média"></button>
                            </form>
                        </div>
                        <div class="col-xs-3">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="importance" value="alta">
                                <input type="hidden" name="importance_style" value="warning">
                                <input type="hidden" name="importance_icon" value="arrow-up">
                                <input type="submit" class="btn btn-warning btn-gradient btn-alt btn-block item-active" value="alta"></button>
                            </form>
                        </div>
                        <div class="col-xs-3">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="importance" value="crítico">
                                <input type="hidden" name="importance_style" value="danger">
                                <input type="hidden" name="importance_icon" value="fire">
                                <input type="submit" class="btn btn-danger btn-gradient btn-alt btn-block item-active" value="crítico"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <br />
                <div class="tray-affix affix-top" data-spy="affix" data-offset-top="200">
                    <div class="tray-bin btn-dimmer row" style="margin-left: -1px; padding-right: 20px; margin-bottom: 5px">
                        <div class="col-xs-4 pln">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="confirmado">
                                <input type="hidden" name="status_style" value="system">
                                <input type="hidden" name="status_icon" value="exclamation">
                                <input type="submit" class="btn btn-system btn-gradient btn-alt btn-block item-active" value="confirmado"></button>
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="em análise">
                                <input type="hidden" name="status_style" value="alert">
                                <input type="hidden" name="status_icon" value="eye">
                                <input type="submit" class="btn btn-alert btn-gradient btn-alt btn-block item-active" value="em análise"></button>
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="em progresso">
                                <input type="hidden" name="status_style" value="warning">
                                <input type="hidden" name="status_icon" value="code">
                                <input type="submit" class="btn btn-warning btn-gradient btn-alt btn-block item-active" value="em progresso"></button>
                            </form>
                        </div>
                        <div class="col-xs-4 pln">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="corrigido">
                                <input type="hidden" name="status_style" value="success">
                                <input type="hidden" name="status_icon" value="check">
                                <input type="submit" class="btn btn-success btn-gradient btn-alt btn-block item-active" value="corrigido"></button>
                            </form>
                        </div>
                        <div class="col-xs-4 ">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="incompleto">
                                <input type="hidden" name="status_style" value="danger">
                                <input type="hidden" name="status_icon" value="times">
                                <input type="submit" class="btn btn-danger btn-gradient btn-alt btn-block item-active" value="incompleto"></button>
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="status" value="cancelado">
                                <input type="hidden" name="status_style" value="danger">
                                <input type="hidden" name="status_icon" value="fire">
                                <input type="submit" class="btn btn-danger btn-gradient btn-alt btn-block item-active" value="cancelado"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="admin-form">
                    <div class="pull-right section p5">
                        <div class="btn-group">
                            <!--<button class="btn btn-sm btn-rounded btn-gradient dark btn-dark"><i class="fa fa-pencil"></i> editar</button>-->
                            <form action="{{ url('/blueprints/'.$blueprint->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="status" value="cancelado">
                                <input type="submit" class="btn btn-sm btn-rounded btn-gradient dark btn-danger" value="deletar"></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
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
