@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Inicio')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/footable/css/footable.core.min.css') }}">
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
                <a href="{{ url('/dashboard') }}">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Inicio</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
  <section id="content" class="animated fadeIn">
      <div class="row">
          <div class="col-md-3">
              <div class="panel panel-dark">
                  <div class="panel-heading">
                      <span class="panel-title">
                          <span class="fa fa-group"></span>Staff Online: {{ $staff_online }}
                      </span>
                  </div>
                  <div class="panel-body panel-scroller scroller-sm scroller-primary scroller-pn pn" style="max-height: 246px; height: 246px;">
                      <table class="table tc-bold-last">
                          <thead>
                              <tr class="hidden">
                                  <th>Avatar</th>
                                  <th>Nick</th>
                                  <th>Online</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($players as $player)
                              <tr>
                                  <td class="text-center" style="margin-left: 0px; width:0%">
                                      <a href="{{ url('/perfil/'.$player->id) }}" class="link-unstyled">
                                          <img src="{{ URL::asset('storage/avatars/' . $player->avatar_url) }}" class="user-avatar" style="width: 20px; float: center">
                                      </a>
                                  </td>
                                  <td class="text-left" style="margin-left: 0px; width:100%">
                                      <a href="{{ url('/perfil/'.$player->id) }}" class="link-unstyled">
                                          <b class="text-dev">{{ $player->username }}</b>
                                      </a>
                                  </td>
                                  <td style="margin-left: 0px">
                                    @if($player->admin == 1)
                                        <span class="label label-warning fs10"><i class="fa fa-star-o"></i> paradiser</span>
                                    @elseif($player->admin == 2)
                                        <span class="label label-info fs10"><i class="fa fa-fire"></i> moderador</span>
                                    @elseif($player->admin == 3)
                                        <span class="label label-primary fs10"><i class="imoon imoon-user3"></i> supervisor</span>
                                    @elseif($player->admin == 4)
                                        <span class="label label-primary fs10"><i class="imoon imoon-user3"></i> administrador</span>
                                    @elseif($player->admin > 4)
                                        <span class="label label-success fs10"><i class="fa fa-code"></i> desenvolvedor</span>
                                    @endif
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-md-9">
              <div class="panel panel-dark">
                  <div class="panel-heading">
                      <span class="panel-title">
                          <span class="fa fa-newspaper-o"></span>Notícias
                      </span>
                  </div>
                  <div class="panel-body pn">
                      <table id="news_table" class="table table-hover news-table fw-labels" data-page-navigation=".pagination" data-page-size="3">
                          <thead>
                              <tr>
                                  <th style="width:10%">Categoria</th>
                                  <th>Título</th>
                                  <th>Autor</th>
                                  <th data-toggle="true">Postado</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="news-row row-primary">
                                  <td></td>
                                  <td>Serviço indisponível no momento.</td>
                                  <td></td>
                                  <td></td>
                              </tr>
                          </tbody>
                          <tfoot class="footer-menu">
                              <tr>
                                  <td colspan="5">
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
      <hr class="alt short" style="margin-top: 0px; margin-bottom: 25px">
      <div class="row">
          <div class="col-md-3">
             <a href="{{ url('/message') }}" class="link-unstyled">
                @if($new_msg_count > 0)
                    <div class="panel panel-tile bg-success light">
                @else
                    <div class="panel panel-tile text-primary br-primary-light">
                @endif
                      <div class="panel-body pn pl20 p5">
                          <i class="fa fa-envelope icon-bg" style="font-size: 100px; line-height: 100px"></i>
                          <h2 class="mt15 lh15">
                              <b>{{ $new_msg_count }}</b>
                          </h2>
                          <h5 class="text-muted">Novas MP's</h5>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-md-3">
              <a href="{{ url('/ticket') }}" class="link-unstyled">
                  @if($tickets > 0)
                      <div class="panel panel-tile bg-success light">
                  @else
                      <div class="panel panel-tile text-primary br-primary-light">
                  @endif
                      <div class="panel-body pl20 p5">
                          <i class="fa fa-question-circle icon-bg" style="font-size: 100px; line-height: 100px"></i>
                          <h2 class="lh15">
                              <b>{{ $tickets }}</b>
                          </h2>
                          <h5 class="text-muted">Tickets</h5>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-md-3">
              <a href="{{ url('/denuncias') }}" class="link-unstyled">
                  @if($reports > 0)
                      <div class="panel panel-tile bg-success light">
                  @else
                      <div class="panel panel-tile text-primary br-primary-light">
                  @endif
                      <div class="panel-body pl20 p5">
                          <i class="fa fa-flag icon-bg" style="font-size: 100px; line-height: 100px"></i>
                          <h2 class="lh15">
                              <b>{{ $reports }}</b>
                          </h2>
                          <h5 class="text-muted">Denúncias</h5>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-md-3">
              <div class="panel panel-tile text-primary br-primary-light">
                  <a href="{{ url('/punicoes') }}" class="link-unstyled">
                      <div class="panel panel-tile text-primary br-primary-light">
                          <div class="panel-body pl20 p5">
                              <i class="fa fa-eye icon-bg" style="font-size: 100px; line-height: 100px"></i>
                              <h2 class="lh15">
                                  <b>?</b>
                              </h2>
                              <h5 class="text-muted">Punições</h5>
                          </div>
                      </div>
                  </a>
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
  <script type="text/javascript">
      jQuery(document).ready(function() {
          // Init FooTable
          $('.news-table').footable();
      });
  </script>
@endsection
