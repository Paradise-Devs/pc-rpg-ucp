@extends('layouts.master')
<!--                                                                        -->
@section('title', '| FAQ')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/faq.css') }}">
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
            <li class="crumb-trail">FAQ</li>
        </ol>
    </div>
    @can('admin')
        <div class="topbar-right">
            <a href="/faq/gerenciar" type="button" class="btn btn-system btn-gradient dark btn-block">
                <i class="fa fa-cog"></i> Gerenciar FAQ
            </a>
        </div>
    @endcan
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <!-- FAQ Left Column -->
    <div class="col-md-12">
        <div class="panel br-t bw5 br-grey">
            <div class="panel-body pn">
                <div class="p25 br-b">
                    <h2 class="fw200 mb20 mt10">Precisa de Suporte? Estamos aqui para ajudar!</h2>
                    <div class="input-group input-hero mb30">
                        <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                        </span>
                        <input type="text" id="faqSearch" class="form-control" placeholder="Procurar respostas..." data-list=".faqItem">
                    </div>
                </div>
                <div id="recentAnswered" class="table-layout bg-light">
                    <div class="col-xs-3 text-center va-m">
                        <span class="fa fa-user-md fs80 text-info"></span>
                    </div>
                    <div class="col-xs-9 br-l">
                        <h5 class="text-muted pl5 mt20 mb20"> Respondidas Recentemente </h5>
                        <ul class="fs15 list-divide-items mb30">
                            @foreach($recent as $question)
                                <li>
                                    <a class="accordion-toggle link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accord1_{{ $question->id }}">
                                        <i class="fa fa-exclamation-circle text-primary fa-lg pr10"></i> {{ $question->title }}</a>
                                    </a>
                                    <div id="accord1_{{ $question->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">{{ $question->content }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p25 br-t">
                    <h5 class="text-muted mb20 mtn"> Todas as Perguntas </h5>
                    <div class="panel-group accordion accordion-lg" id="accordion2">
                        @foreach($questions as $question)
                            <div class="faqItem">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_{{ $question->id }}">
                                        {{ $question->title }}</a>
                                    </div>
                                    <div id="accord2_{{ $question->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">{{ $question->content }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('assets/js/hideseek/jquery.hideseek.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/custom_faq.js') }}"></script>
@endsection
