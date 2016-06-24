@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Gerenciar denúncia')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/animate/animate.min.css') }}">
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
                <a href="index.html">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail"><a href="complaint_index.html">Denúncias</a></li>
            <li class="crumb-trail">Denúncia #12313</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="admin-form theme-primary">
            <div class="panel heading-border panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"><span class="fa fa-flag"></span>Denúncia #21313213</span></span>
                    <div class="widget-menu pull-right mr10">
                        <span class="label bg-danger mr10">Cheating</span>
                    </div>
                </div>
                <div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
                    <form>
                        <div class="section row">
                            <div class="col-md-12">
                                <p>
                                    <h5><span style="color: #A1ACBD">(07/06/2016 - 16:13)</span> Você relatou:</h5>
                                    <br />
                                    <blockquote class="blockquote-primary" style="font-size: 95%;">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat tortor ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus arcu, viverra quis turpis id, faucibus faucibus turpis. Sed at rhoncus nunc. Aliquam non fringilla purus. Curabitur faucibus tellus et efficitur lacinia. Mauris quis ipsum at dolor venenatis fringilla a dapibus sem. Maecenas pulvinar egestas urna, eu pharetra mauris efficitur sed. Nam et mollis velit. Curabitur at metus sollicitudin turpis elementum aliquam. In blandit, urna at convallis suscipit, tortor dui ultricies magna, eget pretium mi lorem et tortor. Suspendisse potenti. Duis mattis arcu in molestie volutpat. Sed scelerisque tristique nisl, sit amet efficitur diam luctus et. Praesent consectetur, nisi nec sodales dignissim, magna sem varius massa, commodo mollis arcu massa in turpis. Nullam scelerisque libero eu ipsum tempor scelerisque.
                                            <br /><br />
                                            Suspendisse at augue odio. Nulla pellentesque, tortor et rutrum consequat, leo lectus interdum eros, vel elementum purus mauris at nunc. Sed tristique blandit neque id gravida. Proin velit turpis, dictum ut purus sit amet, scelerisque pretium neque. Morbi a iaculis sapien. Vivamus lacinia scelerisque accumsan. Integer non rhoncus ipsum, at suscipit dui. Aliquam erat volutpat. Proin non ex lacus.
                                        </p>
                                    </blockquote>
                                </p>
                            </div>
                        </div>
                        <div id="status_complaint_div" class="animated fadeInUp mt30">
                            <div class="section-divider">
                                <span style="color: #4a89dc;">Status da Denúncia</span>
                            </div>
                            <div id="opened_info" class="alert alert-micro alert-border-left alert-info">
                                <i class="fa fa-info pr10"></i>
                                Sua denúncia ainda consta como aberta, sendo assim, aguarde a nossa análise que deve acontecer em até 24 horas após abertura da denúncia. Você vai receber uma notificação quando a denúncia for atualizada.
                            </div>
                            <div id="pending_info" class="alert alert-micro alert-border-left alert-warning">
                                <i class="fa fa-info pr10"></i>
                                Sua denúncia está em análise, sendo assim, aguarde a conclusão da nossa análise que deve acontecer em até 24 horas após abertura da denúncia. Você vai receber uma notificação quando a denúncia for atualizada.
                            </div>
                            <div id="accepted_info" class="alert alert-micro alert-border-left alert-success">
                                <i class="fa fa-check pr10"></i>
                                Sua denúncia foi deferida.<br /><br />
                                <b>Punição aplicada:</b> Banimento Temporário (6 dias)<br />
                                <b>Motivo:</b> Jogador cometeu Drive-by conforme evidenciado.<br />
                            </div>
                            <div id="denied_info" class="alert alert-micro alert-border-left alert-danger">
                                <i class="fa fa-close pr10"></i>
                                Sua denúncia foi indeferida.<br /><br />
                                <b>Motivo:</b> Evidências insuficiente. Reabra a denúncia e insira novas/mais evidências.<br />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer p7 mt0 pt0">
                    <div class="actions btn-group">
                        <a href="complaint_index.html" class="btn btn-sm btn-primary btn-gradient dark"><i class="fa fa-arrow-left"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>
@endsection
