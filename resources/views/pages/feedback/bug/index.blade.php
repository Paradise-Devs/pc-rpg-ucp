@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Feedback')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/footable/css/footable.core.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/custom.css') }}">
@endsection
<!--                                                                        -->
@section('topbar')
  <header id="topbar" class="affix">
      <div class="topbar-left">
          <ol class="breadcrumb">
              <li class="crumb-active">
                  <a href="{{ url('/dashboard') }}">UCP</a>
              </li>
              <li class="crumb-icon">
                  <a href="{{ url('/dashboard') }}">
                  <span class="glyphicon glyphicon-home"></span>
                  </a>
              </li>
              <li class="crumb-trail">Feedback</li>
          </ol>
      </div>
  </header>
@endsection
<!--                                                                        -->
@section('content')
  <section id="content" class="table-layout animated fadeIn">
      <div class="tray tray-center">
          <div class="page-tabs">
              <ul class="nav nav-tabs">
                  <li class="active">
                      <a href="#">Bugs</a>
                  </li>
                  <li>
                      <a href="{{ url('/blueprints') }}">Blueprints</a>
                  </li>
              </ul>
          </div>
          @if(Session::has('success'))
              <div class="alert alert-success light ml10" style="width: 99%;">
                  <i class="fa fa-info"></i> Operação realizada com sucesso.
              </div>
          @endif
          <div class="row">
              <div class="col-md-12">
                  <hr style="margin-bottom: 0px; margin-top: 0px">
                  <div class="alert alert-default alert-dismissable">
                      <h3 class="mt5">Bem vindo!</h3>
                      <p>Esta página foi criada com o objetivo de melhorarmos o PC:RPG de uma forma mais aberta.
                          <br /> Aqui, você pode reportar um bug para que nossa equipe possa corrigi-lo.
                          <br /> Você também pode marcar bugs já reportados caso eles já tenham te afetado e acompanhar conforme corrigimos o mesmo.
                          <br />
                          <small class="text-muted">Utilize esta página apenas para reportar bugs, caso tenha alguma dúvida sobre o servidor, abra um ticket ou faça uma pergunta na comunidade.</small>
                      </p>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-info panel-border top">
                      <div class="panel-heading">
                          <span class="panel-title">
                              <span class="fa fa-bug"></span>Bugs
                          </span>
                          <div class="widget-menu pull-right mr10">
                              <div class="btn-group">
                                  <a href="{{ url('/bugs/create') }}" class="btn btn-sm btn-info light"><i class="fa fa-plus"></i> reportar bug</a>
                              </div>
                          </div>
                      </div>
                      <div class="panel-body pn">
                          <table class="main-table table table-hover fw-labels fw-labels2" data-page-navigation=".pagination" data-page-size="10">
                              <thead>
                                  <tr>
                                      <th style="width: 12%">Prioridade</th>
                                      <th style="width: 8%">Status</th>
                                      <th>Título</th>
                                      <th style="width: 20%">Autor</th>
                                      <th class="text-center" style="width: 20%">Stats</th>
                                      <th class="text-right" style="width: 15%">Última atualização</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($bugs as $bug)
                                      <tr class="launchpad-row" onClick="document.location.href='{{ url('/bugs/'.$bug->id) }}';">
                                          <td><span class="label label-{{ $bug->importance_style }}">{{ $bug->importance }}</span></td>
                                          <td><span class="label label-{{ $bug->status_style }}">{{ $bug->status }}</span></td>
                                          <td>{{ $bug->title }}</td>
                                          <td>
                                              <a href="{{ url('/perfil/'.$bug->user->id) }}" class="link-unstyled">
                                                  <img src="{{ URL::asset('storage/avatars/'.$bug->user->avatar_url) }}" class="user-avatar" style="width: 30px;">
                                                  <b class="text-dev">{{ $bug->user->username }}</b>
                                              </a>
                                          </td>
                                          <td class="text-center">
                                              <span class="label badge-success" title="Pessoas afetadas"><i class="fa fa-thumbs-up mr5"></i> {{ count($bug->affects) + 1 }}</span>
                                              <span class="label badge-default" title="Comentários"><i class="fa fa-comment mr5"></i> {{ count($bug->comments) }}</span>
                                              <span class="label badge-default" title="Visualizações"><i class="fa fa-eye mr5"></i> {{ $bug->views }}</span>
                                          </td>
                                          <td class="text-right">{{ App\Utils::timeElapsedString($bug->updated_at) }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                              <tfoot class="footer-menu">
                                  <tr>
                                      <td colspan="8">
                                          <nav class="text-right">
                                              <ul class="pagination hide-if-no-paging"></ul>
                                          </nav>
                                      </td>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
<!--                                                                        -->
@section('scripts')
  <!-- FooTable Plugin -->
  <script src="{{ URL::asset('vendor/plugins/footable/js/footable.all.min.js') }}"></script>

  <!-- FooTable Addon -->
  <script src="{{ URL::asset('vendor/plugins/footable/js/footable.filter.min.js') }}"></script>

  <!-- Theme Javascript -->
  <script type="text/javascript">
      jQuery(document).ready(function() {
        $('.main-table').footable();
      });
  </script>
@endsection
