@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Editar FAQ')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/faq.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
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
            <li class="crumb-trail"><a href="/faq">FAQ</a></li>
            <li class="crumb-trail">Gerenciar FAQ</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')

<div class="row mt30">
    @if(Session::get('success'))
        <div class="col-md-12">
            <div class="special-alerts">
                <div class="alert alert-success pastel light alert-dismissable" id="alert-demo-1" style="display: block;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>Operação realizada com sucesso!
                </div>
            </div>
        </div>
    @endif
    <!-- FAQ Left Column -->
    <div class="col-md-12">
        <div class="admin-form theme-primary tab-pane active">
            <div class="panel panel-primary heading-border">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-pencil"></i>Editar FAQ</span>
                </div>
                <!-- end .panel-heading section -->
                <form method="POST" action="{{ route('faq.update', $faq_data->id) }}" role="form">
                    <div class="panel-body p25">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            <div class="section row">
                                <div class="col-md-12">
                                    <label for="title" class="field prepend-icon {{ $errors->has('title') ? 'state-error' : '' }}">
                                        <input type="text" name="title" id="title" class="gui-input" value="{{ $faq_data->title }}" placeholder="Título...">
                                        <label for="title" class="field-icon">
                                            <i class="fa fa-pencil"></i>
                                        </label>
                                    </label>
                                    @if ($errors->has('title'))
                                        <em for="password" class="state-error">{{ $errors->first('title') }}</em>
                                    @endif
                                </div>
                            </div>
                            <!-- end section row section -->
                            <div class="section">
                                <label for="comment" class="field prepend-icon {{ $errors->has('comment') ? 'state-error' : '' }}">
                                    <textarea class="gui-textarea" id="comment" name="comment" placeholder="Conteúdo">{{ $faq_data->content }}</textarea>
                                    <label for="comment" class="field-icon">
                                        <i class="fa fa-paragraph"></i>
                                    </label>
                                    <span class="input-footer">
                                        Utilize <strong>somente</strong> texto.
                                    </span>
                                </label>
                                @if ($errors->has('comment'))
                                    <em for="password" class="state-error">{{ $errors->first('comment') }}</em>
                                @endif
                            </div>
                            <!-- end section -->
                        </div>
                        <div class="panel-footer">
                             <button type="submit" class="btn btn-success btn-gradient dark btn-blocks">
                                 <i class="fa fa-check"></i> Salvar
                             </button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
@endsection
