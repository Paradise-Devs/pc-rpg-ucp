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
    <div class="topbar-right">
        <a href="/faq/manage" type="button" class="btn btn-system btn-gradient dark btn-block">
            <i class="fa fa-cog"></i> Gerenciar FAQ
        </a>
    </div>
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
                            <li>
                                <a class="accordion-toggle link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accord1_1">
                                    <i class="fa fa-exclamation-circle text-primary fa-lg pr10"></i> Quais as vantagens do Paradise Pass?</a>
                                </a>
                                <div id="accord1_1" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </li>
                            <li>
                                <a class="accordion-toggle link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accord1_2">
                                    <i class="fa fa-exclamation-circle text-primary fa-lg pr10"></i> Como sei que vai ocorrer um evento?</a>
                                </a>
                                <div id="accord1_2" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </li>
                            <li>
                                <a class="accordion-toggle link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accord1_3">
                                    <i class="fa fa-exclamation-circle text-primary fa-lg pr10"></i> Qual a diferença de um grupo para uma facção?</a>
                                </a>
                                <div id="accord1_3" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </li>
                            <li>
                                <a class="accordion-toggle link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accord1_4">
                                    <i class="fa fa-exclamation-circle text-primary fa-lg pr10"></i> O que eu ganho com eventos?</a>
                                </a>
                                <div id="accord1_4" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p25 br-t">
                    <h5 class="text-muted mb20 mtn"> Todas as Perguntas </h5>
                    <div class="panel-group accordion accordion-lg" id="accordion2">
                        <div class="faqItem">
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_1">
                                    Como posso alterar meu nome?
                                    </a>
                                </div>
                                <div id="accord2_1" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </div>
                        </div>
                        <div class="faqItem">
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_2">
                                    Fui banido injustamente, o que eu faço? </a>
                                </div>
                                <div id="accord2_2" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </div>
                        </div>
                        <div class="faqItem">
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_3">
                                    Posso ser da equipe? </a>
                                </div>
                                <div id="accord2_3" class="panel-collapse collapse">
                                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                                </div>
                            </div>
                        </div>
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
