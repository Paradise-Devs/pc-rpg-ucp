@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Visualizar denúncia')
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
                <a href="/">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail"><a href="{{ url('denuncias') }}">Denúncias</a></li>
            <li class="crumb-trail">Denúncia #{{ $report->id }}</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="animated fadeIn">
  <div class="row mt30">
      <div class="col-md-12">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                  <div class="panel-heading">
                      <span class="panel-title"><span class="fa fa-flag"></span>Denúncia #{{ $report->id }}</span></span>
                      <div class="widget-menu pull-right mr10">
                          <span class="label bg-danger mr10">{{ $report->reason }}</span>
                      </div>
                  </div>
                  <div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
                      <form>
                          <div class="section row">
                              <div class="col-md-12">
                                  <p>
                                      <h5><span style="color: #A1ACBD">({{ App\Utils::timeElapsedString($report->created_at) }})</span> Você relatou:</h5>
                                      <br />
                                      <blockquote class="blockquote-primary" style="font-size: 95%;">
                                          <p id="report-content">{{ $report->content }}</p>
                                      </blockquote>
                                  </p>
                              </div>
                          </div>
                          <div id="status_complaint_div" class="mt30"><!-- animated fadeInUp -->
                              <div class="section-divider">
                                  <span style="color: #4a89dc;">Status da Denúncia</span>
                              </div>
                              @if($report->status == 0)
                                  <div id="opened_info" class="alert light pastel alert-info">
                                      <i class="fa fa-info pr10"></i>
                                      Sua denúncia ainda consta como aberta, sendo assim, aguarde a nossa análise que deve acontecer em até 24 horas após abertura da denúncia. Você vai receber uma notificação quando a denúncia for atualizada.
                                  </div>
                              @elseif($report->status == 1)
                                  <div id="pending_info" class="alert light pastel alert-warning">
                                      <i class="fa fa-info pr10"></i>
                                      Sua denúncia está em análise, sendo assim, aguarde a conclusão da nossa análise que deve acontecer em até 24 horas após abertura da denúncia. Você vai receber uma notificação quando a denúncia for atualizada.
                                  </div>
                              @elseif($report->status == 2)
                                  <div id="accepted_info" class="alert light pastel alert-success">
                                      <i class="fa fa-check pr10"></i>
                                      Sua denúncia foi deferida.<br /><br />
                                      <b>Punição aplicada:</b> Banimento Temporário (6 dias)<br />
                                      <b>Motivo:</b> Jogador cometeu Drive-by conforme evidenciado.<br />
                                  </div>
                              @elseif($report->status == 3)
                                  <div id="denied_info" class="alert light pastel alert-danger">
                                      <i class="fa fa-close pr10"></i>
                                      Sua denúncia foi indeferida.<br /><br />
                                      <b>Motivo:</b> {{ $report->reject_reason }}<br />
                                  </div>
                              @endif
                          </div>
                      </form>
                  </div>
                  <div class="panel-footer p7 mt0 pt0">
                      <div class="actions btn-group">
                          <a href="{{ url('denuncias') }}" class="btn btn-sm btn-primary btn-gradient dark"><i class="fa fa-arrow-left"></i> Voltar</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>

<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        var html = $('#report-content').html();
        var preview = markdown.toHTML(html);
        $('#report-content').html(preview);
    });
</script>
@endsection
