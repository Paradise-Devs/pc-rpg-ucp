@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Jogadores')
<!--                                                                        -->
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fonts/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fonts/glyphicons-pro/glyphicons-pro.css') }}">
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
                <a href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Ranking</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-angle-double-up"></i>Level
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="level_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th style="width: 2%">Level</th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players_level as $key => $value)
                                <tr>
                                    <td class="text-center"><strong>#{{ $key + 1 }}</strong></td>
                                    <td class="text-center"><span class="label label-rounded label-dark fs12">{{ $value->level }}</span></td>
                                    <td class="text-left">
                                        <img src="{{ URL::asset('uploads/avatars/' . $value->avatar_url) }}" class="user-avatar" style="width: 30px;">
                                        <a href="{{ url('/perfil/'.$value->id) }}" class="link-unstyled"><span class="text-primary" style="font-weight: bold;">{{ $value->username }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-clock-o"></i>Tempo Jogado
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="playedTime_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th style="width: 2%">Horas</th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players_ptime as $key => $value)
                                <tr>
                                    <td class="text-center"><strong>#{{ $key + 1 }}</strong></td>
                                    <td class="text-center">{{ gmdate("H:i:s", $value->played_time) }}</td>
                                    <td class="text-left">
                                        <img src="{{ URL::asset('uploads/avatars/' . $value->avatar_url) }}" class="user-avatar" style="width: 30px;">
                                        <a href="{{ url('/perfil/'.$value->id) }}" class="link-unstyled"><span class="text-primary" style="font-weight: bold;">{{ $value->username }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-usd"></i>Dinheiro
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="money_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th class="text-center" style="width: 6%">$</th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players_money as $key => $value)
                                <tr>
                                    <td class="text-center"><strong>#{{ $key + 1 }}</strong></td>
                                    <td class="text-center"><i class="fa fa-usd text-info"></i> {{ $value->cash }}</td>
                                    <td class="text-left">
                                        <img src="{{ URL::asset('uploads/avatars/' . $value->avatar_url) }}" class="user-avatar" style="width: 30px;">
                                        <a href="{{ url('/perfil/'.$value->id) }}" class="link-unstyled"><span class="text-primary" style="font-weight: bold;">{{ $value->username }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-trophy"></i>Eventos
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="events_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th class="text-center" style="width: 6%">Troféus</th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-level-up"></i>-
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="rateXP_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th style="width: 2%"></th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-usd"></i>-
                    </span>
                </div>
                <div class="panel-body pn">
                    <table class="table table-hover mbn tc-icon-1 tc-med-2 tc-bold-last" id="pat_tbl" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="mw30 text-center" style="width: 5%">#</th>
                                <th class="text-center" style="width: 6%"></th>
                                <th style="width: 40%">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--                                                                        -->
@section('scripts')
    <script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('assets/js/hideseek/jquery.hideseek.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
          // Init DataTables
          var tableLevel = $('#level_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });

          var tablePlayedTime = $('#playedTime_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });

          var tableXPrate = $('#rateXP_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });
          var tableMoney = $('#money_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });
          var tablePatr = $('#pat_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });
          var tableEvents = $('#events_tbl').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum jogador encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
              }
          });

            $('#player_search').keyup(function() {
                tableLevel.fnFilter($(this).val());
                tablePlayedTime.fnFilter($(this).val());
                tableXPrate.fnFilter($(this).val());
                tableMoney.fnFilter($(this).val());
                tablePatr.fnFilter($(this).val());
                tableEvents.fnFilter($(this).val());
            });

            $('#datatable_filter').css('display', 'none');

            $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
                console.log( 'show tab' );
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });
    </script>
@endsection
