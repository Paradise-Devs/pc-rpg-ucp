@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Feedback')
<!--                                                                        -->
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/footable/css/footable.core.min.css') }}">
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
                <li class="crumb-trail"><a href="{{ url('/bugs') }}">Feedback</a></li>
                <li class="crumb-trail"><a href="{{ url('/bugs') }}">Bugs</a></li>
                <li class="crumb-trail">Reportar bug</li>
            </ol>
        </div>
    </header>
@endsection
<!--                                                                        -->
@section('content')
    <section id="content" class="animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/bugs') }}" method="post" id="post_form">
                    {{ csrf_field() }}
                    <div class="admin-form theme-primary">
                        <div class="panel panel-primary panel-border top">
                            <div class="panel-heading">
                                <span class="panel-title"><i class="fa fa-bug"></i>Reportar bug</span>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger light ml10" style="width: 99%;">
                                        <i class="fa fa-info"></i> {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <!-- end .panel-heading section -->
                            <textarea id="markdown-editor" name="description" data-language="pt" rows="10" placeholder="Diga-nos, detalhadamente, qual o problema que está enfrentando?"></textarea>
                            <div class="section-divider mb40" id="spy1">
                                <span style="color: #4a89dc;">Título</span>
                            </div>
                            <div class="panel-body" style="padding-top: 1px">
                                <div class="section row">
                                    <div class="col-md-6">
                                        <label for="title" class="field {{ $errors->has('title') ? 'state-error' : '' }}">
                                            <input type="text" name="title" id="title" class="gui-input" maxlength="70" placeholder="Título" required>
                                        </label>
                                        @if ($errors->has('title'))
                                            <em for="title" class="state-error">{{ $errors->first('title') }}</em>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="field select {{ $errors->has('importance') ? 'state-error' : '' }}">
                                            <select name="importance">
                                                <option selected="" value="">Prioridade</option>
                                                <option value="crítico">Crítico</option>
                                                <option value="alta">Alta</option>
                                                <option value="média">Média</option>
                                                <option value="baixa">Baixa</option>
                                            </select>
                                        </label>
                                        @if ($errors->has('importance'))
                                            <em for="importance" class="state-error">{{ $errors->first('importance') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <a href="{{ url('/bugs') }}" class="btn btn-default btn-gradient dark btn-blocks">
                                        <i class="fa fa-close"></i> Cancelar
                                    </a>
                                    <button form="post_form" class="btn btn-primary btn-gradient dark btn-blocks">
                                        <i class="fa fa-mail-forward"></i> Enviar
                                    </button>
                                </div>
                            </div>
                            <!-- end .form-footer section -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<!--                                                                        -->
@section('scripts')
    <script src="{{ URL::asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>
    <!-- MarkDown JS -->
    <script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>
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

            // Init Bootstrap Maxlength Plugin
            $('input[maxlength]').maxlength({
                threshold: 70,
                placement: "bottom"
            });
        });
    </script>
@endsection
