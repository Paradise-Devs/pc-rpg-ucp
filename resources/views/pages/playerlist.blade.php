@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Jogadores')
<!--                                                                        -->
@section('stylesheets')
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
            <li class="crumb-trail">Jogadores</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
    <div class="input-group input-hero mb20">
        <span class="input-group-addon">
            <i class="fa fa-search"></i>
        </span>
        <input type="text" id="player_search" class="form-control" placeholder="Procurar jogadores...">
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">
                    <span class="fa fa-group"></span>Jogadores
                </span>
                <ul class="nav panel-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Todos</a></li>
                    <li><a href="#tab2" data-toggle="tab">Staff</a></li>
                    <li><a href="#tab3" data-toggle="tab">Banidos</a></li>
                </ul>
            </div>
            <div class="panel-body pn">
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <table class="table table-hover" id="datatable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Avatar</th>
                                    <th>Usuário</th>
                                    <th>Tags</th>
                                    <th>Membro Desde</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $player)
                                    <tr>
                                        <td class="text-center"><span class="label label-rounded label-dark fs12">{{ $player->level }}</span></td>
                                        <td class="text-center"><img src="{{ URL::asset('uploads/avatars/' . $player->avatar_url) }}" class="user-avatar" style="width: 30px;"></td>
                                        <td><a href="{{ url('/perfil/'.$player->id) }}" class="link-unstyled">
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
                                        <td>{{ $player->created_at->format("d/m/Y") }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-xs btn-success btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Adicionar como amigo" disabled><i class="glyphicons glyphicons-user_add"></i></a>
                                                <a type="button" class="btn btn-xs btn-info btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Enviar mensagem" disabled><i class="fa fa-envelope"></i></a>
                                                <a type="button" class="btn btn-xs btn-default btn-gradient dark" data-toggle="tooltip" data-placement="top" title="Bloquear" disabled><i class="fa fa-ban"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
          var tableActive = $('#datatable').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
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

          var tableStaff = $('#datatable2').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
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

          var tableBanned = $('#datatable3').dataTable({
              "sDom": 't<"dt-panelfooter clearfix"ip>',
              "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
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
                tableActive.fnFilter($(this).val());
                tableStaff.fnFilter($(this).val());
                tableBanned.fnFilter($(this).val());
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
