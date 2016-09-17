@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Inicio')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fonts/glyphicons-pro/glyphicons-pro.css') }}">
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
                    <a href="{{ url('/dashboard') }}">
                    <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="crumb-trail">Resultados de Pesquisa</li>
            </ol>
        </div>
    </header>
@endsection
<!--                                                                        -->
@section('content')
    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <!-- Search Results Panel  -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title text-muted hidden-xs">{{ count($users) }} resultado(s)</span>
                        <ul class="nav panel-tabs-border panel-tabs-merge panel-tabs">
                            <li class="active"><a href="#users" data-toggle="tab">Usuários</a></li>
                            <!--<li><a href="#bugs" data-toggle="tab">Bugs</a></li>
                            <li><a href="#blueprints" data-toggle="tab">Blueprints</a></li>-->
                        </ul>
                    </div>
                    <!--<div class="panel-menu">
                        <div class="input-group input-hero input-hero-sm">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text" id="icon-filter" class="form-control" placeholder="Digite o que deseja pesquisar..." value="texto da pesquisa">
                        </div>
                    </div>-->
                    <div class="panel-body ph20">
                        <div class="tab-content">
                            <div id="users" class="tab-pane active">
                                <div class="table-responsive mhn20 mvn15">
                                    <table class="table admin-form theme-warning fs13">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="w50">Avatar</th>
                                                <th class="text-center w40">Level</th>
                                                <th class="">Usuário</th>
                                                <th class="">Tags</th>
                                                <th class="">Membro Desde</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $player)
                                                <tr>
                                                    <td class="w50">
                                                        <img src="{{ URL::asset('storage/avatars/' . $player->avatar_url) }}" class="img-responsive">
                                                    </td>
                                                    <td class="text-center"><span class="label label-rounded label-dark fs12">{{ $player->level }}</span></td>
                                                    <td><a href="user_profile.html" class="link-unstyled">
                                                        @if($player->admin == 1)
                                                            <span class="text-warning" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @elseif($player->admin == 2)
                                                            <span class="text-info" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @elseif($player->admin == 3)
                                                            <span class="text-primary" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @elseif($player->admin == 4)
                                                            <span class="text-danger" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @elseif($player->admin > 4)
                                                            <span class="text-system" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @else
                                                            <span class="text-unstyled" style="font-weight: bold;">{{ $player->username }}</span>
                                                        @endif
                                                    </a></td>
                                                    <td>
                                                        @if($player->admin == 1)
                                                            <span class="label label-warning"><i class="fa fa-star-o"></i> paradiser</span>
                                                        @elseif($player->admin == 2)
                                                            <span class="label label-info"><i class="fa fa-fire"></i> moderador</span>
                                                        @elseif($player->admin == 3)
                                                            <span class="label label-primary"><i class="imoon imoon-user3"></i> supervisor</span>
                                                        @elseif($player->admin == 4)
                                                            <span class="label label-danger"><i class="imoon imoon-user3"></i> administrador</span>
                                                        @elseif($player->admin > 4)
                                                            <span class="label label-success"><i class="fa fa-code"></i> desenvolvedor</span>
                                                        @else
                                                            <span class="label label-default"><i class="fa fa-briefcase"></i> Jogador</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $player->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @if($player->id == $user->id)
                                                                <a href="#" class="btn btn-xs btn-success btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Adicionar como amigo" disabled><i class="glyphicons glyphicons-user_add"></i></a>
                                                            @elseif($user->isFriendWith($player))
                                                                <a href="{{ url('/perfil/amizade/desfazer/'.$player->id) }}" class="btn btn-xs btn-danger btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Remover amigo"><i class="glyphicons glyphicons-user_remove"></i></a>
                                                            @else
                                                                <a href="{{ url('/perfil/amizade/enviar/'.$player->id) }}" class="btn btn-xs btn-success btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Adicionar como amigo"><i class="glyphicons glyphicons-user_add"></i></a>
                                                            @endif
                                                            <a type="button" class="btn btn-xs btn-default btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Bloquear" disabled><i class="fa fa-ban"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--<div id="bugs" class="tab-pane">
                                <table class="table table-hover fw-labels fw-labels2">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%">Prioridade</th>
                                            <th style="width: 3%">Status</th>
                                            <th>Título</th>
                                            <th style="width: 10%">Autor</th>
                                            <th class="text-center" style="width: 20%">Stats</th>
                                            <th class="text-right" style="width: 15%">Última resposta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="launchpad-row" onClick="document.location.href='launchpad_bug_details.html';">
                                            <td><span class="label label-danger">crítico</span></td>
                                            <td><span class="label label-success">reparado</span></td>
                                            <td>dialog buttons missing</td>
                                            <td>
                                                <a href="user_profile.html" class="link-unstyled">
                                                    <img src="assets/img/avatars/1.jpg" class="user-avatar" style="width: 30px;">
                                                    <b class="text-dev">Los</b>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="label badge-success"><i class="fa fa-thumbs-up mr5"></i> 8</span>
                                                <span class="label badge-default"><i class="fa fa-quote-right mr5"></i> 2</span>
                                                <span class="label badge-default"><i class="fa fa-eye mr5"></i> 155</span>
                                            </td>
                                            <td class="text-right">3 horas atrás</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="blueprints" class="tab-pane">
                                <table class="table table-hover fw-labels fw-labels2">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%">Prioridade</th>
                                            <th style="width: 3%">Status</th>
                                            <th>Título</th>
                                            <th style="width: 10%">Autor</th>
                                            <th class="text-center" style="width: 20%">Stats</th>
                                            <th class="text-right" style="width: 15%">Última resposta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="launchpad-row" onClick="document.location.href='launchpad_bug_details.html';">
                                            <td><span class="label label-danger">crítico</span></td>
                                            <td><span class="label label-success">reparado</span></td>
                                            <td>some random suggestion</td>
                                            <td>
                                                <a href="user_profile.html" class="link-unstyled">
                                                    <img src="assets/img/avatars/1.jpg" class="user-avatar" style="width: 30px;">
                                                    <b class="text-dev">Los</b>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="label badge-success"><i class="fa fa-thumbs-up mr5"></i> 8</span>
                                                <span class="label badge-default"><i class="fa fa-quote-right mr5"></i> 2</span>
                                                <span class="label badge-default"><i class="fa fa-eye mr5"></i> 155</span>
                                            </td>
                                            <td class="text-right">3 horas atrás</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>--}}
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <nav>
                            <ul class="pagination pull-right">
                                <li class="prev disabled"><a href="#"><i class="fa fa-angle-left"></i> Anterior</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li class="next"><a href="#">Última <i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </nav>
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
  <script type="text/javascript">
      jQuery(document).ready(function() {
          // Init FooTable
          $('.news-table').footable();
      });
  </script>
@endsection
